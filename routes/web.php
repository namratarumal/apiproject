<?php

use App\Mail\sendmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\empController;
use App\Http\Controllers\personController;
use App\Http\Controllers\arithController;

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
  Mail::to('namratarumal2406@gmail.com')
  ->send(new sendmail());
  
    // return view('welcome');
});
Route::resource('studentweb',studentController::class);

Route::resource('imageweb',imageController::class);
Route::resource('empweb',empController::class);
Route::resource('personweb',personController::class);
Route::resource('arithweb',arithController::class);