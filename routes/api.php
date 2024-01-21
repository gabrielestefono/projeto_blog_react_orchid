<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostComCategoria;
use App\Http\Controllers\PostComCategoriaEUser;
use App\Http\Controllers\PostComUser;
use App\Http\Controllers\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/post', PostController::class)->only(['index', 'show']);
Route::apiResource('/post-com-user', PostComUser::class)->only(['index', 'show']);
Route::apiResource('/post-com-categoria', PostComCategoria::class)->only(['index', 'show']);
Route::apiResource('/post-com-categoria-e-user', PostComCategoriaEUser::class)->only(['index', 'show']);
Route::apiResource('/categoria', CategoriaController::class)->only(['index', 'show']);
Route::apiResource('/newsletter', NewsLetterController::class)->only(['store']);
