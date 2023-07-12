<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//page
Route::get('/blogs', [PostController::class, 'page']);


//ajax
Route::get('/all-post', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'single']);
Route::get('/posts/{post}/comments', [PostCommentController::class, 'index']);
Route::post('/posts/{post}', [PostCommentController::class, 'storeComment']);
