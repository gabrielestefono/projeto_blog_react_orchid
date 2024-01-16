<?php

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

Route::get("/teste-get", function() {
    return response()->json([
        "mensagem" => "Hello World"
    ]);
});

Route::post("/teste-post", function(Request $request) {
    $request->validate([
        "nome" => "required",
        "email" => "required|email",
        "senha" => "required|min:6"
    ]);

    return response()->json([
        "mensagem" => "Olá, " . $request->nome
        . ', seu e-mail é ' . $request->email . ' e sua senha é ' . $request->senha
    ]);
})->middleware("auth:sanctum");
