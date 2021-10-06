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
	];

	public function __invoke(string $route, ContentService $contentService, MenuService $menuService) {
		$content = $contentService->getByUrl($route);

		// Handle people loading content directly which is not published
		if ($content->published === 'false') {
			abort(404);
		}

		$documentType = $this->documentTypes[$content->type] ?? 'content.doc';

		$path = Str::before(request()->path(), '/');

		$method = 'get' . ucfirst($path) . 'Menu';

		if (method_exists($menuService, $method)) {
			$menu = $menuService->$method();
		} else {
			$menu = $menuService->getSupportMenu();
		}

		// This is to handle unexpected views
		if (!view()->exists($documentType) || !view()->exists('navs.' . $path)) {
			Log::error('A view was loaded which did not exist for path ' . $path);
			abort(404);
		}

		return view($documentType, [
			'nav' => 'navs.' . $path,
			'content' => $content,
			'navigation' => $contentService->getNavEntries($path),
			'topics' => $contentService->getTopicEntries($content->parentID, Str::before($route, '/')),
			'menu' => $menu,
		]);
	}
}
