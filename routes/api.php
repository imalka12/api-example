<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'loggedInUser'])
        ->name('loggedin.user');

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout.user');

    Route::post('/project', [ProjectController::class, 'createProject'])
        ->name('create.project');

    Route::get('/project/{project}', [ProjectController::class, 'getProjectById'])
        ->name('get.project');

    Route::post('/project/update/{project}', [ProjectController::class, 'updateProject'])
        ->name('update.project');

    Route::post('/project/delete/{project}', [ProjectController::class, 'deleteProject'])
        ->name('delete.project');


    Route::post('/client', [ClientController::class, 'createClient'])
        ->name('create.client');
    Route::get('/client/{client}', [ClientController::class, 'getClientById'])
        ->name('get.client');
    Route::post('/client/delete/{client}', [ClientController::class, 'deleteClient'])
        ->name('delete.client');
    Route::post('/client/update/{client}', [ClientController::class, 'updateClient'])
        ->name('update.client');

    Route::post('/member', [MemberController::class, 'createMember'])
        ->name('create.member');
    Route::get('/member/{member}', [MemberController::class, 'getMemberById'])
        ->name('get.member');
    Route::post('/member/delete/{member}', [MemberController::class, 'deleteMember'])
        ->name('delete.member');
    Route::post('/member/update/{member}', [MemberController::class, 'updateMember'])
        ->name('update.member');
});

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
