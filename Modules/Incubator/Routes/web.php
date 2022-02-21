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
use Modules\Incubator\Http\Controllers\AskingDocsController;
use Modules\Incubator\Http\Controllers\GoalTemplateController;
use Modules\Incubator\Http\Controllers\StartupController;
use Modules\Incubator\Http\Controllers\StartupUserController;
use Modules\Incubator\Http\Controllers\TaskController;

//Tout commence par /incubator


Route::prefix('incubator')->group(function () {

    // dashboard
    Route::get('/dashboard', 'IncubatorController@index');

    // CRUD startup 
    Route::get('/startups', [StartupController::class, 'index']);
    Route::get('/startups/create', [StartupController::class, 'create']);
    Route::post('/startups/create', [StartupController::class, 'store']);
    Route::get('/startups/edit/{id}', [StartupController::class, 'edit']);
    Route::put('/startups/update/{id}', [StartupController::class, 'update']);
    Route::delete("/startups/delete/{id}", [StartupController::class, "destroy"]);
    Route::get("/startups/show/{id}", [StartupController::class, "show"]);

    // CRUD startup user except index
    Route::get('/startup-users/create', [StartupUserController::class, 'create']);
    Route::post('/startup-users', [StartupUserController::class, 'store']);
    Route::get('/startup-users/{id}/edit', [StartupUserController::class, 'edit']);
    Route::put('/startup-users/{id}/update', [StartupUserController::class, 'update']);
    Route::delete('/startup-users/{id}/delete', [StartupUserController::class, 'destroy']);

    //CRUD Taches
    Route::post('/tasks/startups/{id}', [TaskController::class, 'store']);
    Route::delete('/tasks/delete/{id}', [TaskController::class, 'destroy']);
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
    Route::put('/tasks/{id}/update', [TaskController::class, 'update']);
    // CRUD goal templates
    Route::get('/goal-templates', [GoalTemplateController::class, 'index']);
    Route::get('/goal-templates/create', [GoalTemplateController::class, 'create']);
    Route::post('/goal-templates', [GoalTemplateController::class, 'store']);
    Route::get('/goal-templates/{id}/edit', [GoalTemplateController::class, 'edit']);
    Route::put('/goal-templates/{id}', [GoalTemplateController::class, 'update']);
    Route::delete("/goal-templates/{id}", [GoalTemplateController::class, "destroy"]);
    Route::get("/goal-templates/{id}", [GoalTemplateController::class, "show"]);

    //Demande de Documents
    Route::get("/asking-docs", [AskingDocsController::class, "create"]);
    Route::post("/asking-docs", [AskingDocsController::class, "store"]);
});

