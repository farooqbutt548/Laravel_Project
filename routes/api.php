<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
Route::get('firstApi', [ApiController::class, 'firstApi']);
Route::get('secondApi', [ApiController::class, 'secondApi']);
Route::get('thirdApi/{id}', [ApiController::class, 'thirdApi']);
Route::post('fourthApi', [ApiController::class, 'fourthApi']);
Route::put('update',[ApiController::class, 'update']);
Route::delete('delete/{id}', [ApiController::class, 'delete']);
Route::get('search/{name}', [ApiController::class, 'search']);
