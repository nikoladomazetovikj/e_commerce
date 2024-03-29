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
                'chart_color' => '0,0,255',
                'fill' => 'true'
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
                'chart_color' => '255,0,0',
                'fill' => 'true'
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
                'chart_color' => '0, 0, 0, 0.5',
                'fill' => 'true'
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

            $mostSailedSeedThisMonth = DB::table('online_payments', 'op')
                ->select('op.seed_id',
                    DB::raw('sum(op.quantity) as sum'),
                    's.name'
                )
                ->join('seeds as s', 's.id', '=', 'op.seed_id')
                ->whereRaw('MONTH(op.created_at) = MONTH(now())
                                and YEAR(op.created_at) = YEAR(now())')
                ->groupBy('op.seed_id')
                ->orderBy('sum', 'desc')
                ->limit(1)
                ->get()->toArray();

            $lessSailedSeedThisMonth = DB::table('online_payments', 'op')
                ->select('op.seed_id',
                    DB::raw('sum(op.quantity) as sum'),
                    's.name'
                )
                ->join('seeds as s', 's.id', '=', 'op.seed_id')
                ->whereRaw('MONTH(op.created_at) = MONTH(now())
                                and YEAR(op.created_at) = YEAR(now())')
                ->groupBy('op.seed_id')
                ->orderBy('sum', 'asc')
                ->limit(1)
                ->get()->toArray();


          return view('dashboard', compact('statsBySeeds', 'lessSailedSeed', 'mostSailedSeedThisMonth', 'lessSailedSeedThisMonth'));
        }

        if (Auth::user()->role_id == Role::CUSTOMER->value) {
            $query = DB::table('online_payments', 'op')
                ->select('op.order_id',
                    DB::raw('DATE(op.created_at) AS date'),
                    DB::raw('sum(op.total_price) as total_price')
                )
                ->where('op.user_id', Auth::user()->id)
                ->groupBy('op.order_id')
                ->orderBy('date', 'desc')
                ->paginate(5);

            return view('dashboard', compact('query'));
        }


    }
}
