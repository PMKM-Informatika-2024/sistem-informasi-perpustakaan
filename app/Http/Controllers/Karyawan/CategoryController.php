<?php

namespace App\Http\Controllers\Karyawan;

use Illuminate\Support\Facades\Session;

class CategoryController
{
    public function index()
    {
        Session::put('menu', 'Manage Category');

        return view('dashboard.karyawan.categories', [
            'title' => 'Manage Category - Manajemen Perpustakaan',
        ]);
    }
}
