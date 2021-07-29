<?php

use App\Services\ContentService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ExportToPdfController;
use App\Http\Controllers\ContentDeployController;
use App\Http\Controllers\AppDeploymentController;


Route::get('/test', function (ContentService $content) {
	dd($content->getNavEntries('support')->getChildren());


});

Route::feeds();
Route::get('content-deploy', [ContentDeployController::class, '__invoke']);
Route::get('app-deploy', [AppDeploymentController::class, '__invoke']);
Route::get('/', [IndexController::class, '__invoke']);
Route::get('/search', [SearchController::class, '__invoke']);
Route::get('/pdf-export{content}', [ExportToPdfController::class, '__invoke'])
	->where('content', '.*')
	->name('export-to-pdf');
Route::get('{route}', [ContentController::class, '__invoke'])->where('route', '.*');

