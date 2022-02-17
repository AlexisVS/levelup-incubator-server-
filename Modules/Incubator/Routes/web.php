<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Incubator\Http\Controllers\StartupUserController;

// use Modules\Incubator\Http\Controllers\StartupUserController;

Route::prefix('incubator')->group(function() {
    Route::get('/', 'IncubatorController@index');
    Route::resource('/startup-users', StartupUserController::class);
});
