<?php

namespace App\Providers;

use App\Services\MenuService;
use App\Services\ContentService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot(MenuService $menuService) {
		if ($this->app->runningInConsole()) {
			return;
		}

		if ($this->app->environment('local')) {
			config(['trustedproxy.proxies' => '*']);
		}

		$mainMenu = $menuService->getMainMenu();
		if ($mainMenu) {
			View::share('mainMenu', $mainMenu);
		}


		View::share('contentService', new ContentService);
	}
}
