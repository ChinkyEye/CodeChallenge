<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('user/vacation/{status}', [App\Http\Controllers\Api\UserController::class, 'showResult']);
    Route::post('user/vacation', [App\Http\Controllers\Api\UserController::class, 'store']);
    Route::get('user/showday/vacation', [App\Http\Controllers\Api\UserController::class, 'showDay']);

    Route::get('manager/vacation/{status}', [App\Http\Controllers\Api\ManagerController::class, 'getAllData']);
    Route::get('manager/vacation/individual/{id}', [App\Http\Controllers\Api\ManagerController::class, 'getIndividual']);
    Route::put('manager/vacation', [App\Http\Controllers\Api\ManagerController::class, 'update']);
});

