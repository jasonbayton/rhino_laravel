<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;

class AppDeploymentController extends Controller {

	public function __invoke(): JsonResponse {
		Artisan::call('deploy');

		return response()->json([
			'status' => 'success',
			'output' => Artisan::output(),
		]);
	}
}
