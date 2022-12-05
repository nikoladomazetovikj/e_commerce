<?php

namespace Database\Seeders;

use App\Enums\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => Category::FLAX_SEED->value,
                'name' => Category::FLAX_SEED->name
            ],
            [
                'id' => Category::SESAME_SEED->value,
                'name' => Category::SESAME_SEED->name
            ],
            [
                'id' => Category::SUNFLOWER_SEED->value,
                'name' => Category::SUNFLOWER_SEED->name
            ],
            [
                'id' => Category::CHIA_SEED->value,
                'name' => Category::CHIA_SEED->name
            ],
            [
                'id' => Category::HEMP_SEED->value,
                'name' => Category::HEMP_SEED->name
            ],
            [
                'id' => Category::PUMPKIN_SEED->value,
                'name' => Category::PUMPKIN_SEED->name
            ],
            [
                'id' => Category::POMEGRANATE_SEED->value,
                'name' => Category::POMEGRANATE_SEED->name
            ],
            [
                'id' => Category::QUINOA->value,
                'name' => Category::QUINOA->name
            ],
            [
                'id' => Category::PINE_NUTS->value,
                'name' => Category::PINE_NUTS->name
            ],
            [
                'id' => Category::CARAWAY_SEED->value,
                'name' => Category::CARAWAY_SEED->name
            ],

        ]);
    }
}
