<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $mostSailedSeedThisMonth = DB::table('online_payments', 'op')
            ->select('op.seed_id',
                DB::raw('sum(op.quantity) as sum'),
                's.name','s.image','c.friendly_name','s.price'
            )
            ->join('seeds as s', 's.id', '=', 'op.seed_id')
            ->join('categories AS c', 'c.id', '=', 's.category_id')
            ->whereNot('s.quantity', 0)
            ->whereRaw('MONTH(op.created_at) = MONTH(now())
                                and YEAR(op.created_at) = YEAR(now())')
            ->groupBy('op.seed_id')
            ->orderBy('sum', 'desc')
            ->limit(6)
            ->get()->toArray();

        $sales = Sale::with('seed')->get();

        $hasSale = count($sales);


        return view('frontend.seeds.index', compact('mostSailedSeedThisMonth', 'sales', 'hasSale'));
    }
}
