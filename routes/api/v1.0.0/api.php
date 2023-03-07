<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Esp8266Controller;

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

//Rutas sin grupo
Route::post('login', [AuthController::class, 'login']);
Route::post('temperature', [Esp8266Controller::class, 'update'])->middleware('arduino_key');

//Rutas de autorización interna
Route::group([
        'middleware'=>'auth',
        'prefix' => 'auth'
    ], function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('check', [AuthController::class, 'checkToken']);
    Route::get('channels/show', []);
    Route::post('channels/create', []);
});

//Rutas del cliente
Route::group([
    'middleware'=>'client',
    'prefix' => 'client',
], function () {
    Route::get('arduino/key', [AuthController::class, 'arduino']);
    Route::group(['prefix' => 'channels'], function () {
        Route::get('show', []);
        Route::post('create', []);
        Route::put('update', []);
    });
});