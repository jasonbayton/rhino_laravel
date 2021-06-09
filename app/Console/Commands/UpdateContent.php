<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class UpdateContent extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'update:content';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';


	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle(): int {
		$command = new Process(['git', 'pull']);
		$command->setWorkingDirectory(storage_path('/rhino_content/'));
		$command->setTimeout(15);
		$command->run(function ($type, $buffer) {
			$this->info($buffer);
		});
		return 0;
	}
}
