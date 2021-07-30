<?php

namespace App\Services;

use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Collection;

class MenuService {
	public function getMainMenu(): ?Collection {
		return collect(Yaml::parseFile(resource_path('yaml/menu.yml')));
	}
}
