<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Dtos\DeviceWarranty;
use Illuminate\Http\Response;
use App\Services\MenuService;
use App\Services\ContentService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WarrantyController extends Controller {

	public function __invoke(Request $request, ContentService $contentService, MenuService $menuService): Response {
		$content = $contentService->getByUrl('/warranty');
		$imei = $request->imei;

		$warranty = null;

		$path = Str::before(request()->path(), '/');

		if ($imei) {
			// This would be useful if we has redis on the server, would speed up repeat requests to the server
//			$response = Cache::remember('warranty-search:' . $imei, 3600, function () {
//				return Http::withBasicAuth(config('rhino.user'), config('rhino.password'))
//				->get('https://api.businesscentral.dynamics.com/v2.0/909ebb00-4191-4c08-bab4-2fca7d020089/SMProduction/ODataV4/Company(\'Social%20Mobile\')/WarrentyInfo?$filter=IMEI eq \'' . $imei . '\'');
//			});

			//354658111328446
			$response = Http::withBasicAuth(config('rhino.user'), config('rhino.password'))
				->get('https://api.businesscentral.dynamics.com/v2.0/909ebb00-4191-4c08-bab4-2fca7d020089/SMProduction/ODataV4/Company(\'Social%20Mobile\')/WarrentyInfo?$filter=IMEI eq \'' . $imei . '\'');
			$decodedResponse = $response->json();

			if (Arr::has($decodedResponse, 'error')) {
				$warranty = false;
			} else {
				$data = $decodedResponse['value'];
				$warranty = count($data) ? new DeviceWarranty($response->json('value')[1]) : false;
			}
		}

		return response()->view('warranty', [
			'nav' => 'navs.' . $path,
			'content' => $content,
			'navigation' => $contentService->getNavEntries($path),
			'supportmenu' => $menuService->getSupportMenu(),
			'devicesmenu' => $menuService->getDevicesMenu(),
			'securitymenu' => $menuService->getSecurityMenu(),
			'warranty' => $warranty,
		]);
	}
}
