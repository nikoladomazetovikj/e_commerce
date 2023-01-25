<?php

namespace App\Console\Commands;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add site admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $surname = $this->ask('What is your surname?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');

        if ($this->confirm('Do you wish to store the details?')) {

            $user = new User();

            $user->name = $name;
            $user->surname = $surname;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->role_id = Role::ADMIN->value;

            if ($user->save()) {
                $this->info('New admin has been created!');

            } else {
                $this->error('Something went wrong!');
            }
        } else {
            $this->info('Exit');
        }

    }
}
