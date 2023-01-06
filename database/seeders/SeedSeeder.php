<?php

namespace Database\Seeders;

use App\Enums\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seeds')->insert([
            [
                'name' => 'Brown Flax Seed',
                'description' => 'TBD',
                'image' => 'brown_flax_seed.jpg',
                'price' => '40.00',
                'quantity' => '15000',
                'category_id' => Category::FLAX_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Golden Flax Seed',
                'description' => 'TBD',
                'image' => 'golden_flax_seed.jpg',
                'price' => '60.00',
                'quantity' => '25000',
                'category_id' => Category::FLAX_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'White Sesame',
                'description' => 'TBD',
                'image' => 'white_sesame.jpg',
                'price' => '30.00',
                'quantity' => '120000',
                'category_id' => Category::SESAME_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Red Sesame',
                'description' => 'TBD',
                'image' => 'red_sesame.jpg',
                'price' => '35.00',
                'quantity' => '400000',
                'category_id' => Category::SESAME_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Black Sesame',
                'description' => 'TBD',
                'image' => 'black_sesame.jpg',
                'price' => '45.00',
                'quantity' => '50000',
                'category_id' => Category::SESAME_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Brown Sesame',
                'description' => 'TBD',
                'image' => 'brown_flax_seed.jpg',
                'price' => '55.00',
                'quantity' => '30000',
                'category_id' => Category::SESAME_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sunflower',
                'description' => 'TBD',
                'image' => 'sunflower_seeds.jpg',
                'price' => '25.00',
                'quantity' => '250000',
                'category_id' => Category::SUNFLOWER_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'White Chia',
                'description' => 'TBD',
                'image' => 'white_chia.jpg',
                'price' => '30.00',
                'quantity' => '50000',
                'category_id' => Category::CHIA_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Black Chia',
                'description' => 'TBD',
                'image' => 'black_chia.jpg',
                'price' => '30.00',
                'quantity' => '30000',
                'category_id' => Category::CHIA_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Hemp',
                'description' => 'TBD',
                'image' => 'hemp_seed.jpg',
                'price' => '23.00',
                'quantity' => '80000',
                'category_id' => Category::HEMP_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Pumpkin Seed',
                'description' => 'TBD',
                'image' => 'pumpkin_seed.jpg',
                'price' => '15.00',
                'quantity' => '1000000',
                'category_id' => Category::PUMPKIN_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Pomegranate Seed',
                'description' => 'TBD',
                'image' => 'pomegranate_seed.jpg',
                'price' => '15.00',
                'quantity' => '1000000',
                'category_id' => Category::POMEGRANATE_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Red Quinoa',
                'description' => 'TBD',
                'image' => 'red_quinoa.jpg',
                'price' => '55.00',
                'quantity' => '50000',
                'category_id' => Category::QUINOA->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'White Quinoa',
                'description' => 'TBD',
                'image' => 'white_quinoa.jpg',
                'price' => '45.00',
                'quantity' => '80000',
                'category_id' => Category::QUINOA->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Black Quinoa',
                'description' => 'TBD',
                'image' => 'black_quinoa.jpg',
                'price' => '75.00',
                'quantity' => '40000',
                'category_id' => Category::QUINOA->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Pine Nuts',
                'description' => 'TBD',
                'image' => 'pine_nuts.jpg',
                'price' => '55.00',
                'quantity' => '150000',
                'category_id' => Category::PINE_NUTS->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Caraway',
                'description' => 'TBD',
                'image' => 'caraway_seed.jpg',
                'price' => '15.00',
                'quantity' => '15000000',
                'category_id' => Category::CARAWAY_SEED->value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);
    }
}
