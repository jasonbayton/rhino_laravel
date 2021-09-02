<?php

namespace App\Http\Controllers;

class AppDeploymentController extends Controller {

	public function __invoke() {
//		Artisan::call('deploy');
		echo 'the script is' . base_path() . '/deploy.sh';
		$command = new \Symfony\Component\Process\Process(['sh', base_path() . '/deploy.sh']);
		$command->setTimeout(15);
		$command->run(function ($type, $buffer) {
			echo $buffer . '\r\n';
		});
	}
}
