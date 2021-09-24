<?php

namespace App\Services;

use App\Dtos\ContentEntry;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ContentService {

	protected Collection $content;

	public function __construct() {
		$content = json_decode(file_get_contents(storage_path(config('database.content_location')) . '/content.json'), true);
		$this->content = collect($content)->mapInto(ContentEntry::class);
	}

	public static function getAllFeedItems(): Collection {
		return (new ContentService())->all()->where('published', '===', true);
	}

	public function all(): Collection {
		return $this->content;
	}

	public function home(): ContentEntry {
		return $this->content->firstWhere('type', '===', 'home');
	}

	public function notFound(): ContentEntry {
		return $this->content->firstWhere('url', '===', '/404');
	}

	public function parents(): Collection {
		return $this->content->filter(fn($content) => $content->is_parent);
	}

	public function getByUrl(string $url): ContentEntry {
		if (!str_starts_with($url, '/')) {
			$url = '/' . $url;
		}
		return $this->content->firstWhere('url', '===', $url) ?? $this->notFound();
	}

	public function getByTopic(string $title): ?Collection {
		return $this->content->where('topic', '===', $title)->sortBy('order');
	}

	public function getTopicEntries(?string $parentId = '', ?string $rootPath = ''): ?Collection {
		$content = $this->content;
		if ($parentId) {
			$content = $this->content->where('parentID', $parentId);
		}
		return $content->where('topic', '!==', '')
			->filter(fn($item) => Str::startsWith($item->url, '/' . $rootPath))
			->groupBy('topic');
	}

	public function getNavEntries(string $parent = ''): ContentEntry {
		return $this->parents()->get($parent) ?? $this->notFound();
	}

	public function search(string $keyword, bool $exact = false) {
		$searchParams = collect(explode(' ' , $keyword))->map(fn($keyword) => strtolower($keyword))->toArray();

		return $exact
			? $this->all()->filter(fn($entry) => Str::containsAll(strtolower($entry->title), $searchParams))
			: $this->all()->filter(fn($entry) => Str::contains(strtolower($entry->title), $searchParams))
			?? collect();
	}
}
