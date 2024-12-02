<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return Response::redirectTo('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('/members')->group(function () {
            Route::get('/', [MemberController::class, 'index'])->name('manage user');
            Route::delete('/delete-all', [MemberController::class, 'deleteAll'])->name('delete all user');
        });

        Route::prefix('/books')->group(function () {
            Route::get('/', [BookController::class, 'index'])->name('manage book');
            Route::delete('/delete-all', [BookController::class, 'deleteAll'])->name('delete all book');

            Route::prefix('/categories')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('manage category');
                Route::delete('/delete-all', [CategoryController::class, 'deleteAll'])->name('delete all category');
            });
        });

        Route::prefix('/peminjaman')->group(function () {
            Route::get('/', [LoanController::class, 'index'])->name('manage peminjaman');
        });
    });

    Route::get('/website', [WebsiteController::class, 'index'])->name('edit website');
    Route::put('/website', [WebsiteController::class, 'update'])->name('update website');

    Route::prefix('/profile')->group(function () {
        Route::get('/general', [ProfileController::class, 'index'])->name('edit profile');
        Route::put('/general', [ProfileController::class, 'update'])->name('update profile');

        Route::get('/credentials', [LoginController::class, 'edit'])->name('edit credentials');
        Route::put('/credentials', [LoginController::class, 'update'])->name('update credentials');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
