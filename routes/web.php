<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RestoreController;
use App\Http\Controllers\DeleteAllController;

Route::get('/', function () {
    return Response::redirectTo('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard', [
            'title' => 'Dashboard - Manajemen Perpustakaan',
        ]);
    });

    Route::prefix('/dashboard')->group(function () {
        Route::middleware('admin')->group(function () {
            Route::prefix("/users")->group(function () {
                Route::get("/", [UserController::class, "index"])->name("manage user");
                Route::delete('/delete-all', [UserController::class, 'deleteAll'])->name('delete all user');
            });
        });

        Route::middleware('karyawan')->group(function () {
            Route::post("/restore/{type}/{id}", [RestoreController::class, "restore"])->name("restore")->where("type", "book|user|category")->withTrashed();
            Route::delete("/delete-all/{type}", [DeleteAllController::class, "delete"])->name("delete all")->where("type", "book|user|category");

            Route::get("/categories", [CategoryController::class, "index"])->name("manage category");
            Route::get("/books", [BookController::class, "index"])->name("manage book");
            Route::delete("/books/delete-all", [BookController::class, "deleteAll"])->name("delete all book");
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
