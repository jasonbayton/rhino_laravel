<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Services\MenuService;
use App\Services\ContentService;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller {

	protected array $documentTypes = [
		'doc_parent' => 'content.doc',
		'grid' => 'content.grid',
		'release' => 'content.release',
		'support' => 'content.support',
	];

	public function __invoke(string $route, ContentService $contentService, MenuService $menuService) {
		$content = $contentService->getByUrl($route);

		// Handle people loading content directly which is not published
		if ($content->published === 'false') {
			$content = $contentService->notFound();
		}

		$documentType = $this->documentTypes[$content->type] ?? 'content.doc';

		$path = Str::before(request()->path(), '/');

		// This is to handle unexpected views
		if (!view()->exists($documentType)) {
			Log::error('A view was loaded which did not exist for path ' . $path);
			abort(404);
		}

		return view($documentType, [
			'nav' => 'navs.' . $path,
			'content' => $content,
			'navigation' => $contentService->getNavEntries($path),
			'topics' => $contentService->getTopicEntries($content->parentID, Str::before($route, '/')),
			'allTopics' => $contentService->getTopicEntries(null, Str::before($route, '/')),
			'supportmenu' => $menuService->getSupportMenu(),
			'devicesmenu' => $menuService->getDevicesMenu(),
			'securitymenu' => $menuService->getSecurityMenu(),
		]);
	}
}
