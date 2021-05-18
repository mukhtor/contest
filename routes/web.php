<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'beginContest'])->name('begin');
Route::get('start/{id}', [\App\Http\Controllers\SiteController::class, 'start'])->name('start');
Route::patch('answer/{id}', [\App\Http\Controllers\SiteController::class, 'answer'])->name('site.answer')->middleware('auth');
Route::get('more/{id}', [\App\Http\Controllers\SiteController::class, 'moreHistory'])->name('more');
Route::get('start_contest/{id}', [\App\Http\Controllers\SiteController::class, 'startContest'])->name('start_contest');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

