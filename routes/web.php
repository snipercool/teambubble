<?php

use GuzzleHttp\Middleware;
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

Route::get('/locale/{lang}', [App\Http\Controllers\LocalizationController::class, 'index']);

Route::group(['middleware' => 'guest'], function()
{
    Auth::routes();
    Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

});

Route::get('/landing', [App\Http\Controllers\HomeController::class, 'landing']);

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('home',function(){return redirect(('/'));});
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
    Route::get('/project/{id}', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('/project/delete/{id}', [App\Http\Controllers\ProjectController::class, 'deleteProject']);
    Route::get('/project/markdone/{id}', [App\Http\Controllers\ProjectController::class, 'markDone']);
    Route::get('/project/marknotdone/{id}', [App\Http\Controllers\ProjectController::class, 'markNotDone']);
    Route::get('/project/{id}/calendar', [App\Http\Controllers\ProjectController::class, 'calendar']);
    Route::get('/project/{id}/chat', [App\Http\Controllers\ProjectController::class, 'chat']);
    Route::get('/project/{id}/chat/{token}', [App\Http\Controllers\ProjectController::class, 'groupchat']);
    Route::get('/project/{id}/drive', [App\Http\Controllers\ProjectController::class, 'drive']);
    Route::get('/project/{id}/map/{token}', [App\Http\Controllers\ProjectController::class, 'gotomap']);
    Route::get('/project/{id}/map/{token}/filefetch', [App\Http\Controllers\ProjectController::class, 'Filesfetch']);
    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('{id}/invitation', [App\Http\Controllers\InvitationController::class, 'index']);
    Route::get('/invitation/{token}', [App\Http\Controllers\InvitationController::class, 'invitationresponse']);
    


    Route::post('addproject', [App\Http\Controllers\ProjectController::class, 'addProject'])->name('addproject');
    Route::post('{id}/invitation', [App\Http\Controllers\InvitationController::class, 'sendInvite']);
    Route::post('/update', [App\Http\Controllers\UserController::class, 'updateuser']);
    Route::post('/invitation/{token}/accept', [App\Http\Controllers\InvitationController::class, 'acceptInvitation']);
    Route::post('/invitation/{token}/decline', [App\Http\Controllers\InvitationController::class, 'declineInvitation']);
    Route::post('/project/{id}/calendar/addevent', [App\Http\Controllers\ProjectController::class, 'AddEvent']);
    Route::post('/project/{id}/calendar/updateevent', [App\Http\Controllers\ProjectController::class, 'updateevent']);
    Route::post('/project/{id}/calendar/deleteevent', [App\Http\Controllers\ProjectController::class, 'deleteevent']);
    Route::post('/project/{id}/drive/create', [App\Http\Controllers\ProjectController::class, 'createmap']);
    Route::post('/project/{id}/drive/delete/{map_id}', [App\Http\Controllers\ProjectController::class, 'createmap']);
    Route::post('/project/{id}/map/{token}/fileupload', [App\Http\Controllers\ProjectController::class, 'Fileupload']);
    Route::post('/project/{id}/map/{token}/filedelete', [App\Http\Controllers\ProjectController::class, 'Filedelete']);
    Route::post('/project/{id}/chat/{token}/filedelete', [App\Http\Controllers\ProjectController::class, 'Filedelete']);
    Route::get('/project/{id}/chat/creategroup', [App\Http\Controllers\ProjectController::class, 'createGroupChat']);

});




