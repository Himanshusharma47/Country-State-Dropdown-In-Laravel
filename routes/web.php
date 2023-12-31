<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IController;

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
    return view('welcome');
});

// Blade file url
Route::get('/display-data', [IController::class , 'display_data']);
Route::post('/getstate', [IController::class , 'getstate']);
Route::post('/getcity', [IController::class , 'getcity']);
