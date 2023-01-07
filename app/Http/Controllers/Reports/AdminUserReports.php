<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserReports extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $query = DB::table('online_payments', 'op')
                ->select('op.id',
                            's.name as seed_name',
                            'c.friendly_name as category_name',
                            'op.quantity',
                            'op.total_price',
                            DB::raw('DATE(op.created_at) AS date')
                )
                ->join('seeds AS s', 's.id', '=', 'op.seed_id')
                ->join('categories AS c', 'c.id', '=', 's.category_id')
                ->orderBy('date', 'desc')
                ->paginate(15);

        return view('reports.adminUserAll', compact('query'));
    }
}
