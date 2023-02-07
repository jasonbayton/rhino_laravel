<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Query;
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

			$ch = curl_init('https://gridapi-sandbox.azurewebsites.net/api/v1/items/warranty?q[]=imei:eq:' . $imei);
			curl_setopt($ch, CURLOPT_USERPWD, config('rhino.user') . ":" . config('rhino.password'));
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$return = curl_exec($ch);
			curl_close($ch);

			$response = json_decode($return, true);

			if (count($response['items']) === 0) {
				$warranty = false;
			} else {

				$warranty = new DeviceWarranty($response['items'][0]);
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
