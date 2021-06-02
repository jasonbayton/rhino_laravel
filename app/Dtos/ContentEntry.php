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
