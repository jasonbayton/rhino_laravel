<?php

namespace App\Console\Commands;

use Spatie\Sitemap\Sitemap;
use Illuminate\Console\Command;
use App\Services\ContentService;

class GenerateSitemap extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'sitemap:generate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generates a sitemap';

	/**
	 * Execute the console command.
	 *
	 * @param \App\Services\ContentService $service
	 * @return int
	 */
	public function handle(ContentService $service): int {
		$generator = Sitemap::create();

		$service->all()->each(fn($entry) => $generator->add($entry->url));

		$generator->writeToFile(public_path('sitemap.xml'));
		$this->info('Sitemap Generated');
		return 0;
	}
}
