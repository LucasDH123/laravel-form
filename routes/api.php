<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIGetController;

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

Route::get('/all_posts', [APIGetController::class, 'getAllPosts'])->middleware('auth:sanctum');
Route::get('/single_post/{id}', [APIGetController::class, 'getSinglePosts'])->middleware('auth:sanctum');
Route::get('/all_comments', [APIGetController::class, 'getAllComments'])->middleware('auth:sanctum');
Route::get('/single_comment', [APIGetController::class, 'getSingleComments'])->middleware('auth:sanctum');

