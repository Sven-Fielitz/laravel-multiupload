<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\commentController;

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

Route::get("/", [IndexController::class, "index"]);

Route::prefix('api/file/upload/')->controller(UploadController::class)->group(function () {

    Route::post('/receive', 'receive')->name('file.upload');

    Route::post('/announce', 'announce')->name('file.announce');

});