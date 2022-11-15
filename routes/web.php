<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;

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

Auth::routes();

Route::namespace('App\Http\Controllers\Manager')->prefix('manager')->name('manager.')->middleware(['manager'])->group(function(){
    Route::get('/', [App\Http\Controllers\Manager\HomeController::class, 'index'])->name('home');


});
Route::namespace('App\Http\Controllers\Staff')->prefix('staff')->name('staff.')->middleware(['staff'])->group(function(){
    Route::get('/', [App\Http\Controllers\Staff\HomeController::class, 'index'])->name('home');


});
Route::get('token',[App\Http\Controllers\Api\HomeController::class, 'token']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


