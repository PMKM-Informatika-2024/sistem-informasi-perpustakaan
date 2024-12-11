<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Teknologi Informasi', 'Psikologi', 'Filsafat', 'Sejarah Dunia', 'Hukum', 'Pengetahuan Umum'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
