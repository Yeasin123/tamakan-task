<?php

use App\Http\Controllers\Api\Backend\AdminController;
use App\Http\Controllers\Api\Frontend\ProfileController;
use App\Http\Controllers\Api\UersController;
use App\Http\Controllers\Frontend\LocationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('city',[LocationController::class,'City'])->name('city');
Route::get('getcity',[LocationController::class,'getCity'])->name('getcity');

Route::post('area',[LocationController::class,'Area'])->name('area');

Route::post('register', [UersController::class, 'register']);
Route::post('login', [UersController::class, 'login']);

Route::post('admin/register', [AdminController::class, 'register']);
Route::post('admin/login', [AdminController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    
    Route::get('user/profile', [ProfileController::class, 'userProfile'])->name('userProfile');
});

Route::middleware('auth:admin-api')->group(function () {

    Route::get('user/profile/{id}', [ProfileController::class, 'index'])->name('userProfile');
});
