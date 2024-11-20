<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;

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
            Route::resource("/users", UserController::class)->except(['show'])->names([
                "index" => "manage user",
                "create" => "view create user",
                "store" => "store user",
                "edit" => "view edit user",
                "update" => "update user"
            ])->whereUuid("user");

            Route::delete('/users/delete-all', [UserController::class, 'deleteAll'])->name('delete all user');
        });

        Route::middleware('karyawan')->group(function () {
            Route::resource("/books/categories", CategoryController::class)->except(["show"])->names([
                "index" => "manage category",
                "create" => "view create category",
                "store" => "store category",
                "edit" => "view edit category",
                "update" => "update category"
            ]);

            Route::resource("/books", BookController::class)->except(["show"])->names([
                "index" => "manage book"
            ]);
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
