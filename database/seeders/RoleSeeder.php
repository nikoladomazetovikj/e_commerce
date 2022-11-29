<?php

namespace Database\Seeders;

use App\Enums\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => Role::ADMIN->value,
                'name' => Role::ADMIN->name,
            ],
            [
                'id' => Role::CUSTOMER->value,
                'name' => Role::CUSTOMER->name,
            ],
            [
                'id' => Role::CONTENT_WRITER->value,
                'name' => Role::CONTENT_WRITER->name
            ],
            [
                'id' => Role::MANAGER->value,
                'name' => Role::MANAGER->name
            ],

        ]);
    }
}
