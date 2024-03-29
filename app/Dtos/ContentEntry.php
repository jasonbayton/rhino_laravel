<?php

namespace App\Dtos;

use ParsedownExtra;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Mni\FrontYAML\Parser;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Services\ContentService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;

class ContentEntry implements Feedable {

	/** @var bool  */
	public bool $is_parent;

	/** @var array|string[]  */
	private array $casts = [
		'date' => 'datetime',
		'updated' => 'datetime',
		'featured' => 'makeBool',
	];

	public function __construct(array $entry) {
		collect($entry)->each(function ($item, $key) {
			if ($item === '') {
				$item = null;
			}

			if (Arr::has($this->casts, $key)) {
				$castMethod = 'cast' . Str::studly($this->casts[$key]);

				if (!method_exists($this, $castMethod)) {
					throw new \Exception('The selected cast type for this key does not exist. Please check the cast type');
				}

				$item = $this->$castMethod($item);
			}

			$this->$key = $item;
		});

		// These are hardcoded for legacy reasons
		$this->is_parent = Arr::has($entry, 'is_parent') && $entry['is_parent'] === 'true';
	}

	private function castDateTime($value): ?Carbon {
		return $value ? Date::parse($value) : null;
	}

	private function castMakeBool($value) {
		return $value === 'true';
	}

	public function content(): string {
		$parser = new Parser;
		$extra = new ParsedownExtra;
		try {
			$fileContent = file_get_contents(storage_path(config('database.content_location')) . (($this->url === '/') ? '/home' : $this->url) . '.md');
		} catch (\Throwable $throwable) {
			return '';
		}
		$parsedContent = $parser->parse($fileContent, false);
		$this->yamlVars = $parsedContent->getYAML();
		return $extra->text($parsedContent->getContent());
	}

	public function readTime(): string {
		$words = explode(" ", $this->content());
		$wordCount = count($words);
		$readtime = ceil($wordCount / 200);
		return $readtime . ' ' . Str::plural('minute', $readtime);
	}

	public function breadcrumb(): string {
		return $this->parent . ' <i class="fas fa-caret-right"></i> ' . $this->topic;
	}

	public function getParent(): ?ContentEntry {
		$contentService = new ContentService();
		return $contentService->all()->firstWhere('parentID', '===', $this->parent);
	}

	public function getChildren(): Collection {
		$contentService = new ContentService();
		return $contentService->all()->whereNotNull('parent')->where('parent', '===', $this->parentID)->sortByDesc('date') ?? collect();
	}

	public function getAppliesToImages(): ?Collection {
		return collect($this->appliesTo)->map(fn($device) => [
			'image' => '/assets/rhino-' . strtolower($device) . '.png',
			'device' => $device,
		]);
	}

	public function mailingSignup(): ?string {
		if ($this->parent === 'Releases') {
			return '<!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:500px;}
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://rhinomobility.us20.list-manage.com/subscribe/post?u=8392e80eaac7f5894fcf0becb&amp;id=29934e0d58" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Subscribe to product releases</h2>
<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8392e80eaac7f5894fcf0becb_29934e0d58" tabindex="-1" value=""></div>
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
			->author('Rhino Team');
	}

	public function __call($name, $arguments) {
		if (method_exists($this, $name)) {
			return $this->$name(...$arguments);
		}

		throw new \Exception('Uh oh, you used a method name that does not exist. Please check and try again');
	}

	public function __get($name) {
		if (property_exists($this, $name)) {
			return $this->$name;
		}

		return null;
	}
}
