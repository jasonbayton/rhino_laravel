<?php

namespace App\Console\Commands;

use Spatie\Sitemap\Sitemap;
use Illuminate\Console\Command;
use App\Services\ContentService;
use Spatie\Sitemap\SitemapGenerator;

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
	 * @return int
	 */
	public function handle(ContentService $service): int {
		$generator = Sitemap::create();

		$service->all()->each(function ($entry) use ($generator) {
			$generator->add($entry->url);
		});

		$generator->writeToFile(public_path('sitemap.xml'));
		return 0;
	}
}
