<?php

use App\Http\Controllers\Users;
use App\Http\Controllers\Videos;
use App\Http\Controllers\Channels;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Users::class,'dashboard']);


Route::get('all-channels',[Channels::class,'list_channels']);
Route::get('all-videos', [Videos::class,'list_videos']);
Route::get('import-data', [Videos::class,'import_data']);
Route::get("video-data/{id}",[Videos::class,'video_data']);

Route::post('import-video-data-exe',[Videos::class,'import_data_exe']);