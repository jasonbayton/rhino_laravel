<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContentService;

class SearchController extends Controller {


	public function __invoke(ContentService $contentService, Request $request) {
		$exactMatches = $contentService->search($request->search, true);
		return view('search', [
			'content' => $contentService->getByUrl('search'),
			'results' => $exactMatches,
			'similar' => $contentService->search($request->search)->diff($exactMatches),
		]);
	}
}
