<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\OnlinePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerInvoicesDetails extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $order_id)
    {
        $query = DB::table('online_payments', 'op')
            ->select(
                's.name as seed_name',
                'c.friendly_name as category_name',
                'op.quantity',
                'op.total_price as subtotal',
            )
            ->join('seeds AS s', 's.id', '=', 'op.seed_id')
            ->join('categories AS c', 'c.id', '=', 's.category_id')
            ->where('op.order_id', $order_id)
            ->where('user_id', $request->user()->id)
            ->get();

        $total = DB::table('online_payments', 'op')
            ->select(
                's.name as seed_name',
                'c.friendly_name as category_name',
                'op.quantity',
                'op.total_price as subtotal',
            )
            ->join('seeds AS s', 's.id', '=', 'op.seed_id')
            ->join('categories AS c', 'c.id', '=', 's.category_id')
            ->where('op.order_id', $order_id)
            ->where('user_id', $request->user()->id)
            ->sum('op.total_price');

        return view('reports.customerInvoiceData', compact('query', 'total'));
    }
}
