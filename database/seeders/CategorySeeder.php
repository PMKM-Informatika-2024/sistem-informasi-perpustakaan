<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

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
