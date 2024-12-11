<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        $stock = fake()->numberBetween(10, 100);
        $names = Collection::make([]);

        for ($i = 0; $i < 5; $i++) {
            $names->push(fake()->unique()->name());
        }

        return [
            'category_id' => fake()->randomElement(Category::all()->pluck('id')),
            'code' => fake()->unique()->bothify('??###'),
            'stock' => $stock,
            'initial' => $stock,
            'author' => Collection::make(fake()->randomElements($names, count: fake()->numberBetween(2, 5)))->join('|'),
            'title' => fake()->sentence(),
            'publisher' => fake()->company(),
            'year' => fake()->year(),
            'source' => fake()->randomElement(['GPT', 'Beli', 'Hibah']),
            'price' => fake()->numberBetween(25000, 250000),
            'description' => fake()->sentence(),
        ];
    }
}
