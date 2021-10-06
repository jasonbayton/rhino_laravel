<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class AssetController extends Controller {

	public function __invoke(string $route) {
		try {
			return Storage::download($route);
		} catch (\Throwable $throwable) {
			abort(404);
		}
	}
}
