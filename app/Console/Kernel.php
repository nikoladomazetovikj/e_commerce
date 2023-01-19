<?php

namespace App\Console;

use App\Console\Commands\SalesCommand;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // delete expired sales

        $schedule->call(function () {
            Sale::where('end','<',Carbon::now()->toDateString())->delete();
        })->daily();

        $schedule->command(SalesCommand::class)->weeklyOn(1, '0:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
