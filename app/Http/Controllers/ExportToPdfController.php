<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Support\Facades\App;

class ExportToPdfController extends Controller {

	public function __invoke(string $content, ContentService $contentService) {
		$content = $contentService->getByUrl($content);

		$pdf = App::make('dompdf.wrapper');
		$html = '';

		if ($content->title) {
			$html .= '<h1>' . $content->title . '</h1>';
		}

		if ($content->subtitle) {
			$html .= '<h2>' . $content->subtitle . '</h2>';
		}

		$html .= $content->content();

		$pdf->loadHTML($html);
		return $pdf->download($content->title . '.pdf');
	}
}
