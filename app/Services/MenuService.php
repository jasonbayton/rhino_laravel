<?php

namespace App\Services;

use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Collection;

class MenuService {
	public function getMainMenu(): ?Collection {
		return collect(Yaml::parseFile(resource_path('yaml/menu.yml')));
	}

	public function getSupportMenu() {
		$contentService = resolve(ContentService::class);

		$supportContent = $contentService->all()->where('parent', 'Support');

		return $supportContent->mapToGroups(function ($item) {
			return [$item->topic => $item];
		});
	}
}
