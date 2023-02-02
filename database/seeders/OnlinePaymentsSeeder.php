<?php

namespace Database\Seeders;

use App\Models\Seed;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Uid\Ulid;

class OnlinePaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = 500;

        for ($i = 1; $i <= $rows; $i++) {
            $orderId = (new Ulid)->toBase32();
            $userId = User::all()->random()->id;
            $date = Carbon::today()->subDays(rand(0, 550));
            $random = rand(1,5);
            for ($j = 1; $j <= $random; $j++) {
                $seedId = Seed::all()->random()->id;
                $seedPrice = Seed::where('id', $seedId)->value('price');
                $quantity = rand(1,10);
                $totalPrice = $quantity * $seedPrice;

                DB::table('online_payments')->insert([
                    [
                        'order_id' => $orderId,
                        'user_id' => $userId,
                        'seed_id' => $seedId,
                        'quantity' => $quantity,
                        'total_price' => $totalPrice,
                        'created_at' => $date
                    ]
                ]);
            }

        }
    }
}
