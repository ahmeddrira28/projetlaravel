<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

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
use App\Http\Controllers\TypeController;
Route::middleware('api')->group(function () {
Route::resource('types', TypeController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('marque',MarqueController::class);
    });
    Route::get('/marque/{idtype}',
    [MarqueController::class,'showMarqueByType']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api')->group(function () {
Route::resource('computers', ComputerController::class);
});

    
Route::group([
 'middleware' => 'api',
 'prefix' => 'auth'
], function ($router) {
 Route::post('/login', [AuthController::class, 'login']);
 Route::post('/register', [AuthController::class, 'register']);
 Route::post('/logout', [AuthController::class, 'logout']);
 Route::post('/refresh', [AuthController::class, 'refresh']);
 Route::get('/user-profile', [AuthController::class, 'userProfile']);
}); 

