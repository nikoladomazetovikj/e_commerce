<?php

namespace App\Jobs;

use App\Enums\Role;
use App\Mail\SalesMail;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSaleEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sales = Sale::with('seed.category')->whereDate('start', '<=', Carbon::now()->toDateString())->get()->toArray();

        $data = [];

        foreach ($sales as $sale) {
            $data = [
                'start' => Carbon::parse($sale['start'])->format('d-M-y'),
                'end' => Carbon::parse($sale['end'])->format('d-M-y'),
                'sale' => $sale['sale'],
                'seed' => $sale['seed']['name'],
                'old_price' => (int)$sale['seed']['price'],
                'image' => $sale['seed']['image'],
                'category' => $sale['seed']['category']['friendly_name'],
                'total_price' => $sale['seed']['price'] - ($sale['seed']['price'] * ($sale['sale'] / 100))
            ];
        }

        $users = User::where('role_id', Role::CUSTOMER->value)->first();


        //foreach ($users as $user) {
            Mail::to($users->email)->send(new SalesMail($data));
        //}

    }
}
