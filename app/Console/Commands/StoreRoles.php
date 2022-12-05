<?php

namespace App\Console\Commands;

use App\Enums\Role;
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

        $this->info('The roles was successfully inserted!');
    }
}
