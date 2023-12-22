<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\empController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\personController;
use App\Http\Controllers\arithController;
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
Route::apiResource('student',studentController::class);
Route::resource('emp',empController::class);
Route::resource('image',imageController::class);
Route::resource('person',personController::class);
Route::resource('arith',arithController::class);
