<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            ManagamentSeeder::class,
            UserSeeder::class,
            UserProfileSeeder::class,
            CompanySeeder::class,
            SeedSeeder::class,
            OnlinePaymentsSeeder::class,
            CompanyPaymentsSeeder::class,
            SiteDetailsSeeder::class
        ]);
    }
}
