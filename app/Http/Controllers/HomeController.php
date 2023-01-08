<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\OnlinePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == Role::ADMIN->value) {
            $chart_options = [
                'chart_title' => 'Sales by months',
                'report_type' => 'group_by_date',
                'model' => 'App\Models\OnlinePayment',
                'group_by_field' => 'created_at',
                'group_by_period' => 'month',
                'chart_type' => 'bar',
            ];
            $chart1 = new LaravelChart($chart_options);

            $chart_options2 = [
                'chart_title' => 'Sales by dates',
                'report_type' => 'group_by_date',
                'model' => 'App\Models\OnlinePayment',
                'group_by_field' => 'created_at',
                'group_by_period' => 'day',
                'aggregate_function' => 'sum',
                'aggregate_field' => 'total_price',
                'chart_type' => 'line',
            ];

            $chart2 = new LaravelChart($chart_options2);


            $chart_options3 = [
                'chart_title' => 'Sales by years',
                'report_type' => 'group_by_date',
                'model' => 'App\Models\OnlinePayment',
                'group_by_field' => 'created_at',
                'group_by_period' => 'year',
                'aggregate_function' => 'sum',
                'aggregate_field' => 'total_price',
                'chart_type' => 'line',
            ];

            $chart3 = new LaravelChart($chart_options3);

            return view('dashboard', compact('chart1', 'chart2', 'chart3'));

        } else if (Auth::user()->role_id == Role::MANAGER->value) {

            $statsBySeeds = DB::table('online_payments', 'op')
                            ->select('op.seed_id',
                                    DB::raw('sum(op.quantity) as sum'),
                                's.name'
                            )
                            ->join('seeds as s', 's.id', '=', 'op.seed_id')
                            ->groupBy('op.seed_id')
                            ->orderBy('sum', 'desc')
                            ->limit(1)
                            ->get()->toArray();

            $lessSailedSeed = DB::table('online_payments', 'op')
                ->select('op.seed_id',
                    DB::raw('sum(op.quantity) as sum'),
                    's.name'
                )
                ->join('seeds as s', 's.id', '=', 'op.seed_id')
                ->groupBy('op.seed_id')
                ->orderBy('sum', 'asc')
                ->limit(1)
                ->get()->toArray();


          return view('dashboard', compact('statsBySeeds', 'lessSailedSeed'));
        }

        return view('dashboard');
    }
}
