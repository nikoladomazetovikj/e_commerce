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
        $invoicesIds = DB::table('online_payments')->select('id')
            ->where('user_id', $request->user()->id)
                    ->groupBy('created_at')
                    ->pluck('id')->toArray();


        $query = DB::table('online_payments', 'op')
            ->select('op.id',
                DB::raw('DATE(op.created_at) AS date'),
                DB::raw('(select sum(op.total_price)
                                from online_payments op
                                where op.user_id = '. $request->user()->id . '
                                and DATE (op.created_at)= date
                                ) as total_price')
            )
            ->whereIn('op.id', $invoicesIds)
            ->orderBy('date', 'desc')
            ->paginate(5);

        return view('reports.customerInvoices', compact('query'));
    }
}
