<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Services\MenuService;
use App\Services\ContentService;

class ContentController extends Controller {

	protected array $documentTypes = [
		'doc_parent' => 'content.doc',
		'grid' => 'content.grid',
	];

	public function __invoke(string $route, ContentService $contentService, MenuService $menuService) {
		$content = $contentService->getByUrl($route);
		$documentType = $this->documentTypes[$content->type] ?? 'content.doc';

		$path = Str::before(request()->path(), '/');

		$method = 'get' . ucfirst($path) . 'Menu';

		if (method_exists($menuService, $method)) {
			$menu = $menuService->$method();
		} else {
			$menu = $menuService->getSupportMenu();
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
