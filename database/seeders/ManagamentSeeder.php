<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'surname' => 'SuperSeeds',
                'email' => 'admin@superseeds.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // password (12345678)
                'remember_token' => Str::random(10),
                'role_id' => \App\Enums\Role::ADMIN
            ],
            [
                'name' => 'content',
                'surname' => 'writer',
                'email' => 'cw@superseeds.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // password (12345678)
                'remember_token' => Str::random(10),
                'role_id' => \App\Enums\Role::CONTENT_WRITER
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Manager',
                'email' => 'andrea@superseeds.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // password (12345678)
                'remember_token' => Str::random(10),
                'role_id' => \App\Enums\Role::MANAGER
            ],
            [
                'name' => 'Emilija',
                'surname' => 'Manager',
                'email' => 'emilija@superseeds.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // password (12345678)
                'remember_token' => Str::random(10),
                'role_id' => \App\Enums\Role::MANAGER
            ],
            [
                'name' => 'Nikola',
                'surname' => 'Manager',
                'email' => 'nikola@superseeds.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // password (12345678)
                'remember_token' => Str::random(10),
                'role_id' => \App\Enums\Role::MANAGER
            ],

        ]);
    }
}
