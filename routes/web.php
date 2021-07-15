<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CrawlController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('search');
});

Route::get('/crawl', [CrawlController::class, 'crawlPage']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/insertIntoElastic', [SearchController::class, 'insertIntoElastic']);
Route::get('/test', [TestController::class, 'test']);
