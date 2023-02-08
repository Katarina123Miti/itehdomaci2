<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SvedokController;
use App\Http\Controllers\KrivicnoDeloController;
use App\Http\Controllers\SudijaController;
use App\Http\Controllers\UserController;

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
Route::resource('krivicno_delos', KrivicnoDeloController::class);

Route::resource('sudijas', SudijaController::class);

Route::resource('svedok', SvedokController::class);

Route::resource('users', UserController::class)->only(['index', 'show']);
