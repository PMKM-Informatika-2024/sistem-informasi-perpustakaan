<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

    Route::prefix("/dashboard")->group(function () {
        Route::get("/manage-users", [UserController::class, "index"])->name("manage user");
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware("admin")->group(function () {
    Route::post("/dashboard/add-member", [UserController::class, "addMember"])->name("add member");
    Route::delete("/dashboard/delete-all-member", [UserController::class, "deleteAllMember"])->name("delete all member");
});
