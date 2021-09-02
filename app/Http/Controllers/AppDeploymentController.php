<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;

class AppDeploymentController extends Controller {

	public function __invoke(): JsonResponse {
//		Artisan::call('deploy');
		$logging = '';
		$command = new Process(['sh', base_path() . '/deploy.sh']);
		$command->setTimeout(15);
		$command->run(function ($type, $buffer) use ($logging) {
			$logging .= $buffer;
		});

		return response()->json([
			'status' => 'success',
			'logging' => $logging,
		]);

	}
}
