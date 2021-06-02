<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContentService;

class ContentController extends Controller {

	protected array $documentTypes = [
		'doc_parent' => 'content.doc',
		'grid' => 'content.grid',
	];


	public function __invoke(string $route, ContentService $contentService) {
		$content = $contentService->getByUrl($route);

		$documentType = $this->documentTypes[$content->type] ?? 'content.doc';

		return view($documentType, [
			'content' => $content,
			'navigation' => $contentService->getNavEntries(),
		]);
	}
}
