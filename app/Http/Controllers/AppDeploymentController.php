<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;

class AppDeploymentController extends Controller {

	public function __invoke() {
//		Artisan::call('deploy');
		$command = new \Symfony\Component\Process\Process(['sh', base_path() . '/deploy.sh']);
		$command->setTimeout(15);
		$command->run(function ($type, $buffer) {
			echo $buffer;
		});
	}
}
