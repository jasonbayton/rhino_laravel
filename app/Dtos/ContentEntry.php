<?php

namespace App\Dtos;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Services\ContentService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class ContentEntry implements Feedable {

	public $title;
	public $subtitle;
	public $featuredImage;
	public $featured;
	public $date;
	public $updated;
	public $url;
	public $type;
	public $published;
	public $parent;
	public $is_parent;
	public $parentID;
	public $childTopics;
	public $topic;
	public $order;

	public function __construct(array $entry) {
		$this->title = $entry['title'];
		$this->subtitle = $entry['subtitle'] ?? '';
		$this->featuredImage = $entry['featuredImage'] ?? '';
		$this->featured = $entry['featured'] === 'true';
		$this->date = Date::parse($entry['date']);
		$this->updated = $entry['updated'] ? Date::parse($entry['updated']) : null;
		$this->url = $entry['url'];
		$this->type = $entry['type'];
		$this->published = $entry['published'] === 'true';
		$this->parent = $entry['parent'];
		$this->is_parent = Arr::has($entry, 'is_parent') && $entry['is_parent'] === 'true';
		$this->parentID = $entry['parentID'] ?? null;
		$this->childTopics = $entry['childTopics'] ?? [];
		$this->topic = $entry['topic'];
		$this->order = $entry['order'] ?? 0;
	}

	public function content(): string {
		$converter = new GithubFlavoredMarkdownConverter();
		try {
			$fileContent = file_get_contents(storage_path(config('database.content_location')) . (($this->url === '/') ? '/home' : $this->url) . '.md');
		} catch (\Throwable $throwable) {
			return '';
		}
		return $converter->convertToHtml($fileContent);
	}

	public function readTime(): string {
		$words = explode(" ", $this->content());
		$wordCount = count($words);
		$readtime = ceil($wordCount / 200);
		return $readtime . ' ' . Str::plural('minute', $readtime);
	}

	public function getRelatedContent() {
		$contentService = new ContentService();
		return $contentService->all()
			->filter(fn($entry) => $entry->parentID)
			->filter(fn($entry) => $entry->parentID === $this->parent)
			->sortBy('order')
			->map(fn($entry) => [
				collect($entry->childTopics)->map(fn($childTopic) => [
					'topic' => $childTopic,
					'entries' => $contentService->getByTopic($childTopic),
				]),
			])->first();
	}

	public function getChildren(): Collection {
		$contentService = new ContentService();
		return $contentService->all()->where('parent', '===', $this->parentID) ?? collect();
	}

	public function mailingSignup(): ?string {
		if ($this->parent === 'T8') {
			return '<!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://prometheuscomputing.us6.list-manage.com/subscribe/post?u=f36518e5132a2d42a53b8e068&amp;id=5eeb702c49" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<label for="mce-EMAIL">Subscribe</label>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f36518e5132a2d42a53b8e068_5eeb702c49" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->';
		}

		return null;
	}

	public function __toString() {
		return json_encode($this);
	}

	public function toFeedItem(): FeedItem {
		return FeedItem::create()
			->id($this->url)
			->title($this->title)
			->summary($this->content())
			->updated($this->updated ?? $this->date)
			->link(url($this->url))
			->author('Jason Bayton');
	}
}
