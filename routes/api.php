<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Route::get('login', [LoginController::class, 'login']);

Route::get('login', 'apicontroller@login');

Route::post('login', [apicontroller::class, 'login']);
Route::post('/update/profile/{id}', [apicontroller::class, 'updateProfile']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [apicontroller::class, 'logout']);
    Route::get('/get-projects', [apicontroller::class, 'getProjects']);
    Route::get('/get-workspace', [apicontroller::class, 'getworkspace']);
    Route::post('add-tracker', [apicontroller::class, 'addTracker']);
    Route::post('stop-tracker', [apicontroller::class, 'stopTracker']);
    Route::post('upload-photos', [apicontroller::class, 'uploadImage']);
    Route::get('dashboard', [apicontroller::class, 'dashboard']);
    Route::get('UserGet', [apicontroller::class, 'UserGet']);
    Route::get('GroupDepartmenProject', [apicontroller::class, 'GroupDepartmenProject']);
    Route::get('requestedTask', [apicontroller::class, 'requestedTask']);
    Route::get('requestedTaskId/{id}', [apicontroller::class, 'requestedTaskId']);
    Route::delete('NotesDelete/{id}', [apicontroller::class, 'NotesDelete']);
    Route::get('requestedTaskUser', [apicontroller::class, 'requestedTaskUser']);
    Route::get('requestedTaskUser', [apicontroller::class, 'requestedTaskUser']);

    Route::get('showProject/{id}', [apicontroller::class, 'showProject']);
    Route::delete('destroyProject/{id}', [apicontroller::class, 'destroyProject']);
    Route::post('updateProject/{id}', [apicontroller::class, 'updateProject']);

    Route::get('employeeEvaluation', [apicontroller::class, 'employeeEvaluation']);
    Route::post('addPromotion/{id}', [apicontroller::class, 'addPromotion']);

    //chat
    Route::get('chatUser', [apicontroller::class, 'chatIndex']);
    Route::get('getMessage/{user_id}', [apicontroller::class, 'getMessage']);
    Route::post('sendMessage', [apicontroller::class, 'sendMessage']);

    /// project report
    Route::get('ProjectReport', [apicontroller::class, 'ProjectReport']);
    Route::post('ProjectReportShow/{id}', [apicontroller::class, 'ProjectReportShow']);


          /// task
    Route::post('allTasks', [apicontroller::class, 'allTasks']);
    Route::get('getTaskShow/{project_id}', [apicontroller::class, 'getTaskShow']);
    Route::post('taskStore/{id}', [apicontroller::class, 'taskStore']);
    Route::post('taskOrderUpdate/{id}', [apicontroller::class, 'updateTaskOrder']);
    Route::post('ProjectStore', [apicontroller::class, 'ProjectStore']);

    Route::delete('taskDestroy/{id}', [apicontroller::class, 'taskDestroy']);
    Route::post('taskUpdate/{projectId}/{taskId}', [apicontroller::class, 'taskUpdate']);


    ///taskboard
    Route::get('taskBoard/{id}', [apicontroller::class, 'taskBoard']);
    Route::post('commentsAdd/{id}', [apicontroller::class, 'commentsAdd']);
    Route::get('getComments/{id}', [apicontroller::class, 'getComments']);
    Route::get('notificationSeen', [apicontroller::class, 'notificationSeen']);
    Route::get('notificationcount', [apicontroller::class, 'notificationcount']);
    Route::get('projectStatus', [apicontroller::class, 'projectStatus']);


    Route::delete('deleteAccount/{id}', [apicontroller::class, 'delete']);
    Route::post('scanTasks', [apicontroller::class, 'scanTasks']);

//// subtask
Route::post('subTaskStore/{id}', [apicontroller::class, 'subTaskStore']);
Route::post('subTaskUpdate/{id}', [apicontroller::class, 'subTaskUpdate']);
Route::delete('subTaskDestroy/{id}', [apicontroller::class, 'subTaskDestroy']);
Route::get('subTaskGet/{id}', [apicontroller::class, 'subTaskGet']);

/// activity
Route::get('getProjectActivities/{projectID}', [apicontroller::class, 'getProjectActivities']);
Route::post('createUser', [apicontroller::class, 'createUser']);










    


    // Route::post('logout', 'apicontroller@logout');
    // Route::get('/get-projects', 'apicontroller@getProjects');
    //  Route::get('/get-workspace', 'apicontroller@getworkspace');
    // Route::post('add-tracker', 'apicontroller@addTracker');
    // Route::post('stop-tracker', 'apicontroller@stopTracker');
    // Route::post('upload-photos', 'apicontroller@uploadImage')
});
