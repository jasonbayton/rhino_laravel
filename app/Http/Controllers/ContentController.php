<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Services\ContentService;

class ContentController extends Controller {

	protected array $documentTypes = [
		'doc_parent' => 'content.doc',
		'grid' => 'content.grid',
	];

	public function __invoke(string $route, ContentService $contentService) {
		$content = $contentService->getByUrl($route);
		$documentType = $this->documentTypes[$content->type] ?? 'content.doc';

		$path = Str::before(request()->path(), '/');

		return view($documentType, [
			'content' => $content,
			'navigation' => $contentService->getNavEntries($path),
			'topics' => $contentService->getTopicEntries($content->parentID),
		]);
	}
}
