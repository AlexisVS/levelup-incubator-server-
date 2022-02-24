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
use Modules\Incubator\Http\Controllers\AskHelpController;
use Modules\Incubator\Http\Controllers\GoalTaskTemplateController;
use Modules\Incubator\Http\Controllers\AskingDocsController;
use Modules\Incubator\Http\Controllers\GoalTaskController;
use Modules\Incubator\Http\Controllers\GoalController;
use Modules\Incubator\Http\Controllers\DocumentsController;
use Modules\Incubator\Http\Controllers\GoalTemplateController;
use Modules\Incubator\Http\Controllers\StartupController;
use Modules\Incubator\Http\Controllers\StartupUserController;
use Modules\Incubator\Http\Controllers\TaskController;

//Tout commence par /incubator


Route::prefix('incubator')->middleware('auth')->group(function () {

    // dashboard
    Route::get('/dashboard', 'IncubatorController@index');

    /* -------------------------------------------------------------------------- */
    /*                                   Startup                                  */
    // CRUD startup 
    Route::get('/startups', [StartupController::class, 'index']);
    Route::get('/startups/create', [StartupController::class, 'create']);
    Route::post('/startups/create', [StartupController::class, 'store']);
    Route::get("/startups/show/{id}", [StartupController::class, "show"]);
    Route::get('/startups/edit/{id}', [StartupController::class, 'edit']);
    Route::put('/startups/update/{id}', [StartupController::class, 'update']);
    Route::delete("/startups/delete/{id}", [StartupController::class, "destroy"]);

    //Demande de Documents
    Route::get("/startups/{id}/asking-docs", [AskingDocsController::class, "create"]);
    Route::post("/startups/{id}/asking-docs", [AskingDocsController::class, "store"]);

    //Document
    Route::get("/startups/{id}/documents", [DocumentsController::class, "index"]);

    //Goals
    Route::get('/startups/{id}/goals', [GoalController::class, 'index']);
    Route::get('/startups/{id}/goals/create', [GoalController::class, 'create']);
    Route::post('/startups/{id}/goals', [GoalController::class, 'store']);
    Route::get('/startups/{id}/goals/{goalsId}', [GoalController::class, 'show']);
    Route::get('/startups/{id}/goals/{goalsId}/edit', [GoalController::class, 'edit']);
    Route::put('/startups/{id}/goals/{goalsId}', [GoalController::class, 'update']);
    Route::delete('/startups/{id}/goals/{goalsId}', [GoalController::class, 'destroy']);

    //Goals tasks
    Route::get('/startups/{id}/goals/{goalsId}/tasks', [GoalTaskController::class, 'index']);
    Route::get('/startups/{id}/goals/{goalsId}/tasks/create', [GoalTaskController::class, 'create']);
    Route::post('/startups/{id}/goals/{goalsId}/tasks', [GoalTaskController::class, 'store']);
    Route::get('/startups/{id}/goals/{goalsId}/tasks/{taskId}/edit', [GoalTaskController::class, 'edit']);
    Route::put('/startups/{id}/goals/{goalsId}/tasks/{taskId}', [GoalTaskController::class, 'update']);
    Route::delete('/startups/{id}/goals/{goalsId}/tasks/{taskId}', [GoalTaskController::class, 'destroy']);

    //Ask Helps

    Route::delete('/startups/{id}/askHelps/{askHelpId}', [AskHelpController::class, 'helpDone']);
    Route::put('/startups/{id}/askHelps/{askHelpId}', [AskHelpController::class, 'update']);
    /* -------------------------------------------------------------------------- */

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
    Route::get("/goal-templates/{id}", [GoalTemplateController::class, "show"]);
    Route::get('/goal-templates/{id}/edit', [GoalTemplateController::class, 'edit']);
    Route::put('/goal-templates/{id}', [GoalTemplateController::class, 'update']);
    Route::delete("/goal-templates/{id}", [GoalTemplateController::class, "destroy"]);
    Route::get("/goal-templates/{id}", [GoalTemplateController::class, "show"]);

    //Document
    Route::get("/startups/{id}/documents", [DocumentsController::class, "index"]);
    Route::post("/startups/{id}/documents", [DocumentsController::class, "store"]);
    //download
    Route::get("/startups/{startupId}/documents/{docId}", [DocumentsController::class, "download"]);
    //delete document
    Route::delete("/startups/{startupId}/documents/{docId}", [DocumentsController::class, "destroy"]);

    //Demande de Documents
    Route::get("/startups/{id}/asking-docs", [AskingDocsController::class, "create"]);
    Route::post("/startups/{id}/asking-docs", [AskingDocsController::class, "store"]);
    Route::delete("/askedDoc/{id}", [AskingDocsController::class, "destroy"]);


    // CRUD goal task templates
    Route::get('/goal-task-templates', [GoalTaskTemplateController::class, 'index']);
    Route::get('/goal-task-templates/create', [GoalTaskTemplateController::class, 'create']);
    Route::post('/goal-task-templates', [GoalTaskTemplateController::class, 'store']);
    Route::get('/goal-task-templates/{id}/edit', [GoalTaskTemplateController::class, 'edit']);
    Route::put('/goal-task-templates/{id}', [GoalTaskTemplateController::class, 'update']);
    Route::delete("/goal-task-templates/{id}", [GoalTaskTemplateController::class, "destroy"]);
});
