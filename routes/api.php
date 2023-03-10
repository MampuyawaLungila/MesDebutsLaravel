<?php

use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/store/index', [PostApiController::class, 'index']);

Route::post('/store/insert', [PostApiController::class, 'insert']);

Route::get('store/delete/{id}', [PostApiController::class, 'delete']);

Route::get('store/show/{id}', [PostApiController::class, 'show']);
Route::get('store/getComment/{post_id}', [PostApiController::class, 'getComment']);

Route::get('store/edit/{id}', [PostApiController::class, 'edit']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
