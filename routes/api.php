<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

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

Route::get('login', function () {
    return response([
        'message' => 'Unauthorized.'
    ], 403);
})->name('login');

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('articles', ArticleController::class)->except('show');
    Route::get('/articles/latest', [ArticleController::class, 'getLatestNews']);
    Route::post('/articles/category', [ArticleController::class, 'getArticlesByCategoryName']);

    Route::post('/logout', [UserController::class, 'logout']);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
