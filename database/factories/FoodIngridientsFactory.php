<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodIngridients>
 */
class FoodIngridientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->sentence(rand(1, 2), false),
            'stok_awal' => fake()->numberBetween(1, 50),
            'masuk' => fake()->numberBetween(1, 50),
            'keluar' => fake()->numberBetween(1, 50),
            'stok_akhir' => fake()->numberBetween(1, 50),
            'tanggal' => fake()->date('Y-m-d', 'now')
        ];
    }
}
