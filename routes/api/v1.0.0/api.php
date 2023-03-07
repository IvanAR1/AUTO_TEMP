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

//Rutas de usuario
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware'=>'auth'], function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('check', [AuthController::class, 'checkToken']);
        Route::get('esp8266/index', [Esp8266Controller::class, 'index']);
    });
});

//Rutas de esp8266
Route::group([
    'middleware'=>'client',
    'prefix' => 'esp8266',
], function () {
    Route::get('key', [AuthController::class, 'ESP8266']);
    Route::group([
        'middleware'=>'esp8266_user',
    ], function () {
        Route::post('update', [Esp8266Controller::class, 'update']);
    });
});