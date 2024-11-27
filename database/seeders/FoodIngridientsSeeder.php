<?php

namespace Database\Seeders;

use App\Models\FoodIngridients;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoodIngridientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('food_ingridients')->insert([
        //     'nama_produk' => 'Beras'
        // ]);
        FoodIngridients::create( [
            'nama_produk' => 'Minyak',
        ]);
        // FoodIngridients::create( [
        //     'nama_produk' => 'Garam',
        // ]);
    }
}
