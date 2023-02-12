<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SvedokController;
use App\Http\Controllers\KrivicnoDeloController;
use App\Http\Controllers\SudijaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSvedokController;
use App\Http\Controllers\SudijaSvedokController;
use App\Http\Controllers\KrivicnoDeloSvedokController;
use App\Http\Controllers\API\AuthController;

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

//moj profil
Route::middleware('auth:sanctum')->get('/myprofile', function (Request $request) {
    return new UserResource($request->user());
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    //admin
    Route::resource('krivicnadela', KrivicnoDeloController::class)->only(['store', 'update', 'destroy']); 
    Route::resource('sudije', SudijaController::class)->only(['store', 'update', 'destroy']); 
    Route::resource('users', UserController::class)->only(['destroy']); 
    Route::post('/register', [AuthController::class, 'register']); 
    Route::resource('users', UserController::class)->only(['index', 'show']); 

    //user
    Route::resource('svedok', SvedokController::class)->only(['store', 'update', 'destroy']); 
    
    //svi koji su ulogovani
    Route::post('/logout', [AuthController::class, 'logout']); 
    Route::get('/mysvedok', [UserSvedokController::class, 'mysvedok']); 
    Route::resource('users', UserController::class)->only(['update']);

});
//javne
Route::resource('krivicnadela', KrivicnoDeloController::class)->only(['index', 'show']);

Route::resource('sudije', SudijaController::class)->only(['index', 'show']);

Route::resource('svedok', SvedokController::class)->only(['index', 'show']);


Route::get('/users/{id}/svedok', [UserSvedokController::class, 'index']);

Route::get('/sudije/{id}/svedok', [SudijaSvedokController::class, 'index']);

Route::get('/krivicnadela/{id}/svedok', [KrivicnoDeloSvedokController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);

