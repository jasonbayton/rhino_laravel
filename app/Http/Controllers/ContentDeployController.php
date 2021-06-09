<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\Process\Process;

class ContentDeployController extends Controller {

	public function __invoke(): JsonResponse {
		$command = new Process(['git', 'pull']);
		$command->setWorkingDirectory(storage_path('/rhino_content/'));
		$command->start();
		return response()->json([
			'status' => 'success',
		]);
	}
}
