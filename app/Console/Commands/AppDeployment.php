<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class AppDeployment extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'deploy';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Pulls and builds the application';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle() {
		$command = new Process(['sh ' . base_path() . '/deploy.sh']);
		$command->setTimeout(15);
		$command->run(function ($type, $buffer) {
			$this->info($buffer);
		});


		return 0;
	}
}
