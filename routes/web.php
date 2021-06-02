<?php

use App\Services\ContentService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContentController;

Route::feeds();
Route::get('/', [IndexController::class, '__invoke']);
Route::get('/search', [SearchController::class, '__invoke']);
Route::get('{route}', [ContentController::class, '__invoke'])->where('route', '.*');
