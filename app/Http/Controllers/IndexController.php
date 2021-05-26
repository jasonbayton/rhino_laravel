<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContentService;

class IndexController extends Controller {

	public function __invoke(ContentService $service) {
		return view('index', [
			'content' => $service->home(),
			'contentView' => 'home',
		]);
	}
}
