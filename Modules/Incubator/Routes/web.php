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
use Modules\Incubator\Http\Controllers\StartupController;

//Tout commence par /incubator

Route::prefix('incubator')->group(function() {
    Route::get('/', 'IncubatorController@index');
    Route::get('/startups', [StartupController::class,'index']);
    Route::get('/startups/create', [StartupController::class,'create']);
    Route::post('/startups/create', [StartupController::class,'store']);
    Route::get('/startups/edit/{id}', [StartupController::class,'edit']);
    Route::put('/startups/update/{id}', [StartupController::class,'update']);
    Route::delete("/startups/delete/{id}", [StartupController::class, "destroy"]);

});

