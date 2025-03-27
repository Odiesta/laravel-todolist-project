<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyGuestMiddleware;
use App\Http\Middleware\OnlyMemberMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('template');
});

Route::controller(UserController::class)->group(function () {
    Route::get("/login", "login")->middleware(OnlyGuestMiddleware::class);
    Route::post("/login", "doLogin")->middleware(OnlyMemberMiddleware::class);
    Route::post("/logout", "doLogout")->middleware(OnlyMemberMiddleware::class);
});
