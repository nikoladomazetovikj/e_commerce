<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerInvoices extends Controller
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
            ->select('op.order_id',
                DB::raw('DATE(op.created_at) AS date'),
                DB::raw('sum(op.total_price) as total_price')
            )
            ->where('op.user_id', $request->user()->id)
            ->groupBy('op.order_id')
            ->orderBy('date', 'desc')
            ->paginate(5);

        return view('reports.customerInvoices', compact('query'));
    }
}
