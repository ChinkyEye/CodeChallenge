<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

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

Route::post('login', [App\Http\Controllers\Api\HomeController::class, 'index']);
Route::post('register', [App\Http\Controllers\Api\HomeController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::get('verified/{email}', [App\Http\Controllers\Api\HomeController::class, 'sendVerifyMail']);

    Route::post('logout', [App\Http\Controllers\Api\HomeController::class, 'logout']);
    Route::apiResource('student', StudentController::class );

    // Route::get('student', [App\Http\Controllers\Api\StudentController::class, 'index']);
    // Route::post('student', [App\Http\Controllers\Api\StudentController::class, 'store']);
    // Route::put('student/{id}', [App\Http\Controllers\Api\StudentController::class, 'update']);

    Route::get('user/vacation/{status}', [App\Http\Controllers\Api\UserController::class, 'showResult']);
    Route::post('user/vacation', [App\Http\Controllers\Api\UserController::class, 'store']);
    Route::get('user/showday/vacation', [App\Http\Controllers\Api\UserController::class, 'showDay']);

    Route::get('manager/vacation/{status}', [App\Http\Controllers\Api\ManagerController::class, 'getAllData']);
    Route::get('manager/vacation/individual/{id}', [App\Http\Controllers\Api\ManagerController::class, 'getIndividual']);
    Route::put('manager/vacation', [App\Http\Controllers\Api\ManagerController::class, 'update']);



});

