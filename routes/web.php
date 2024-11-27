<?php

use App\Http\Controllers\{DashboardController, BookController, LoanController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return Response::redirectTo('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::prefix("/dashboard")->group(function () {
        Route::get("/", [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix("/members")->group(function () {
            Route::get("/", [MemberController::class, 'index'])->name('manage user');
            Route::delete("/delete-all", [MemberController::class, 'deleteAll'])->name('delete all user');
        });

        Route::prefix("/books")->group(function () {
            Route::get("/", [BookController::class, 'index'])->name('manage book');
            Route::delete("/delete-all", [BookController::class, 'deleteAll'])->name('delete all book');
        });

        Route::prefix("/peminjaman")->group(function () {
            Route::get("/", [LoanController::class, 'index'])->name('manage peminjaman');
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
