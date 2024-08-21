<?php

use App\Http\Controllers\Api\AuthContoller;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});

Route::get('/product',[ProductController::class, 'index'] );
Route::get('/show/{id}',[ProductController::class, 'show'] );
Route::post('/product',[ProductController::class, 'store'] );
Route::post('/product/{id}',[ProductController::class, 'update'] );

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthContoller::class, 'login']);
    Route::post('/register', [AuthContoller::class, 'register']);
    Route::post('/logout', [AuthContoller::class, 'logout']);
    Route::post('/refresh', [AuthContoller::class, 'refresh']);
    Route::get('/user-profile', [AuthContoller::class, 'userProfile']); });