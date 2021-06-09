<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Support\Facades\App;

class ExportToPdfController extends Controller {

	public function __invoke(string $content, ContentService $contentService) {
		$content = $contentService->getByUrl($content);

		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($content->content());
		return $pdf->stream();
	}
}
