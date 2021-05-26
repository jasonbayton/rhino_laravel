<?php

namespace App\Services;

use App\Dtos\ContentEntry;
use Illuminate\Support\Collection;

class ContentService {

	protected Collection $content;

	public function __construct() {
		$content = json_decode(file_get_contents(storage_path(config('database.content_location')) . '/content.json'), true);
		$this->content = collect($content)->mapInto(ContentEntry::class);
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

	public function getByUrl(string $url): ContentEntry {
		return $this->content->firstWhere('url', '===', '/' . $url) ?? $this->notFound();
	}

	public function getByTopic(string $title): ?Collection {
		return $this->content->where('topic', '===', $title)->sortBy('order');
	}

	public function getNavEntries() {
		return $this->content->where('type', '===', 'doc_parent')->where('parent', '===', '')
			->map(fn($entry) => [
				'entry' => $entry,
				'children' => $this->content->where('parent', '===', $entry->parentID),
			]);
	}
}
