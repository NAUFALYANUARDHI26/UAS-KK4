<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtisController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;

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


Route::get('/tikets', [TiketController::class, 'index']);
Route::get('/tikets/{id}', [TiketController::class, 'show']);
Route::post('/Tikets', [TiketController::class, 'store']);
Route::put('/tikets/{id}', [TiketController::class, 'update']);
Route::delete('/tikets/{id}', [TiketController::class, 'destroy']);


Route::get('/konsers', [KonserController::class, 'index']);
Route::get('/konsers/{id}', [KonserController::class, 'show']);
Route::post('/konsers', [KonserController::class, 'store']);
Route::put('/konsers/{id}', [KonserController::class, 'update']);
Route::delete('/konsers/{id}', [KonserController::class, 'destroy']);


//  PUBLIC ROUTES
//Route::post('artis/login', [ArtisController::class, 'login']);
//Route::post('artis/register', [ArtisController::class, 'register']);

//Route::post('user/login', [UserController::class, 'login']);
//Route::post('user/register', [UserController::class, 'register']);

//Route::get('tikets', [TiketController::class, 'index']);
//Route::get('tikets/{id}', [TiketController::class, 'show']);

//Route::get('konsers', [KonserController::class, 'index']);
//Route::get('konsers/{id}', [KonserController::class, 'show']);

//  PROTECTED ROUTES

    
    Route::resource('transaksis', TransaksiController::class);
    Route::post('artis/logout', [ArtisController::class, 'logout']);
    Route::post('user/logout', [UserController::class, 'logout']);



