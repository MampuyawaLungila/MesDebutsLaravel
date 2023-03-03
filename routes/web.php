<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/create', [PostController::class, 'create']);
Route::post('/store', [PostController::class, 'store']);
Route::get('/delete/{id}', [PostController::class, 'delete']);
Route::get('/edit/{id}', [PostController::class, 'edit']);
Route::post('/update', [PostController::class, 'update']);
Route::get('/getComments/{post_id}', [PostController::class, 'getComment']);
