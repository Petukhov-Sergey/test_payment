<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('user/{id}/credit', [UserController::class, 'credit']);
Route::post('user/{id}/debit', [UserController::class, 'debit']);
