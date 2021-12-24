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

class WarrantyController extends Controller {

	public function __invoke(Request $request, ContentService $contentService, MenuService $menuService): Response {
		$content = $contentService->getByUrl('/warranty');


		$imei = $request->imei;

		$warranty = null;

		$documentType = $this->documentTypes[$content->type] ?? 'content.doc';

		$path = Str::before(request()->path(), '/');

		if ($imei) {
			//354658111328446
			$response = Http::withBasicAuth(config('rhino.user'), config('rhino.password'))
				->get('https://api.businesscentral.dynamics.com/v2.0/909ebb00-4191-4c08-bab4-2fca7d020089/SMProduction/ODataV4/Company(\'Social%20Mobile\')/WarrentyInfo?$filter=IMEI eq \''.$imei.'\'');
			$decodedResponse = $response->json();
			if (Arr::has($decodedResponse, 'error')) {
				$warranty = false;
			} else {
				$warranty = new DeviceWarranty($response->json('value')[1]);
			}


		}


		return response()->view('warranty', [
			'nav' => 'navs.' . $path,
			'content' => $content,
			'navigation' => $contentService->getNavEntries($path),
//			'topics' => $contentService->getTopicEntries($content->parentID, Str::before($route, '/')),
//			'allTopics' => $contentService->getTopicEntries(null, Str::before($route, '/')),
			'supportmenu' => $menuService->getSupportMenu(),
			'devicesmenu' => $menuService->getDevicesMenu(),
			'securitymenu' => $menuService->getSecurityMenu(),
			'warranty' => $warranty,
		]);
	}
}
