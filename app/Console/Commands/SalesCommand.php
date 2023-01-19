<?php

namespace App\Console\Commands;

use App\Enums\Role;
use App\Jobs\SendSaleEmails;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SalesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sale-recommendation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Alert Users about new sales';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        SendSaleEmails::dispatch();
        return Command::SUCCESS;
    }
}
