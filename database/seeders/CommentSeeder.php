<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Seed;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = 1000;

        for ($i = 1; $i <= $rows; $i++) {
            $userId = User::all()->random()->id;
            $date = Carbon::today()->subDays(rand(0, 550));
            $random = rand(1,5);
            for ($j = 1; $j <= $random; $j++) {
                $seedId = Seed::all()->random()->id;

                $checkIfExist = Comment::where('user_id', $userId)->where('seed_id', $seedId)->count();

                if ($checkIfExist == 0) {
                    DB::table('comments')->insert([
                        [
                            'user_id' => $userId,
                            'seed_id' => $seedId,
                            'comment' => 'Test Comment',
                            'created_at' => $date
                        ]
                    ]);
                }
            }
        }
    }

}
