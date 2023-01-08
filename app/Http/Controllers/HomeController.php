<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

          return view('dashboard');
        }

        return view('dashboard');
    }
}
