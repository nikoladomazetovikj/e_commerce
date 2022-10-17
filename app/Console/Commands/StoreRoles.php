<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class StoreRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default roles for users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Customer',
            ],
            [
                'name' => 'Content writer'
            ],
            [
                'name' => 'Manager'
            ]
        ]);

    }
}
