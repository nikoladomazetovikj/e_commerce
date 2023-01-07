<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCompaniesReports extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $query = DB::table('companies_payments', 'cp')
            ->select('cp.id',
                's.name as seed_name',
                'c.friendly_name as category_name',
                'co.company_name',
                'cp.quantity',
                'cp.total_price',
                DB::raw('DATE(cp.created_at) AS date')
            )
            ->join('seeds AS s', 's.id', '=', 'cp.seed_id')
            ->join('categories AS c', 'c.id', '=', 's.category_id')
            ->join('companies AS co', 'co.id', '=', 'cp.company_id')
            ->orderBy('date', 'desc')
            ->paginate(5);

        return view('reports.adminCompanyAll', compact('query'));
    }
}
