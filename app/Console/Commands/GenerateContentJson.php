<?php

namespace App\Console\Commands;

use Mni\FrontYAML\Parser;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateContentJson extends Command {

	protected $signature = 'generate:content';

	protected $description = 'Generates a JSON file for the content';

	public function handle(): int {

		if (Storage::disk('storageRoot')->exists('content.json')) {
			//backup the existing content json
			Storage::disk('storageRoot')->copy('content.json', time() . '-content.json.bak');
		}


		//default values for first run
		$current = [
			"document_root" => [
				"title" => "Home",
				"subtitle" => "Rhino Mobility Security site",
				"featuredImage" => "",
				"featured" => "false",
				"date" => "2021-01-01",
				"updated" => "2021-01-10",
				"url" => "/",
				"type" => "home",
				"published" => "private",
				"parent" => "",
				"topic" => "",
				"order" => "0",
			],
			'404' => [
				"title" => "Content not found",
				"subtitle" => "Are you looking in the right location?",
				"featuredImage" => "",
				"featured" => "false",
				"date" => "2021-01-01",
				"updated" => "",
				"url" => "/404",
				"type" => "page",
				"published" => "private",
				"parent" => "",
				"topic" => "",
				"order" => "0",
			],
		];

		$dirs = Storage::disk('content')->files(null, true);

		$dirs = collect($dirs)->filter(fn($file) => !Str::startsWith($file, ['.git', '.idea', 'assets', 'content.json']));

		$content = $dirs->mapWithKeys(function ($item) {
			if (Str::endsWith($item, '.md')) {
				$key = Str::before($item, '.md');
			} else {
				$key = $item;
			}

			return [$key => $this->content($item)];
		})->filter();

		$merged = array_merge($current, $content->toArray());

		// Delete the original file
		if (Storage::disk('storageRoot')->exists('content.json')) {
			Storage::disk('storageRoot')->delete('content.json');
		}

		// Write a new file
		Storage::disk('storageRoot')->put('content.json', json_encode($merged, JSON_UNESCAPED_SLASHES));

		$this->info('The content JSON file has been generated successfully');


		return 0;
	}

	public function content(string $file) {
		$parser = new Parser;
		try {
			$fileContent = Storage::disk('content')->get($file);
		} catch (\Throwable $throwable) {
			return [];
		}

		//get the front yaml first
		return $parser->parse($fileContent)->getYAML();
	}
}
