<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContentService;

class ContentController extends Controller {


	public function __invoke(string $route, ContentService $contentService) {
		$content = $contentService->getByUrl($route);

		return view('index', [
			'content' => $content,
			'navigation' => $contentService->getNavEntries(),
			'contentView' => 'layouts.doc',
		]);
	}
}
