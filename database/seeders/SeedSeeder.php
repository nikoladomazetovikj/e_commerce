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
                'quantity' => '1500',
                'category_id' => Category::FLAX_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Golden Flax Seed',
                'description' => 'TBD',
                'image' => 'golden_flax_seed.jpg',
                'price' => '60.00',
                'quantity' => '2500',
                'category_id' => Category::FLAX_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'White Sesame',
                'description' => 'TBD',
                'image' => 'white_sesame.jpg',
                'price' => '30.00',
                'quantity' => '12000',
                'category_id' => Category::SESAME_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Red Sesame',
                'description' => 'TBD',
                'image' => 'red_sesame.jpg',
                'price' => '35.00',
                'quantity' => '400',
                'category_id' => Category::SESAME_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Black Sesame',
                'description' => 'TBD',
                'image' => 'black_sesame.jpg',
                'price' => '45.00',
                'quantity' => '500',
                'category_id' => Category::SESAME_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Brown Sesame',
                'description' => 'TBD',
                'image' => 'brown_flax_seed.jpg',
                'price' => '55.00',
                'quantity' => '300',
                'category_id' => Category::SESAME_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Sunflower',
                'description' => 'TBD',
                'image' => 'sunflower_seeds.jpg',
                'price' => '25.00',
                'quantity' => '25000',
                'category_id' => Category::SUNFLOWER_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'White Chia',
                'description' => 'TBD',
                'image' => 'white_chia.jpg',
                'price' => '30.00',
                'quantity' => '5000',
                'category_id' => Category::CHIA_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Black Chia',
                'description' => 'TBD',
                'image' => 'black_chia.jpg',
                'price' => '30.00',
                'quantity' => '3000',
                'category_id' => Category::CHIA_SEED->value,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Hemp',
                'description' => 'TBD',
                'image' => 'hemp_seed.jpg',
                'price' => '23.00',
                'quantity' => '800',
                'category_id' => Category::HEMP_SEED->value,
                'created_at' => Carbon::now()
            ],


        ]);
    }
}
