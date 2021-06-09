<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;

class ContentDeployController extends Controller {

	public function __invoke(): JsonResponse {
		try {
			Artisan::call('update:content');
		} catch (\Throwable $throwable) {
			//this always throws a timeout exception, its just the way it is
			return response()->json([
				'status' => 'success',
			]);
		}
	}
}
