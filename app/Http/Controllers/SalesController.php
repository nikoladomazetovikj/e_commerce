<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSeeds = Sale::with('seed')->get();

        return view('sales.index', compact('allSeeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesRequest $request)
    {
        Sale::create([
            'seed_id' => $request->seed_id,
            'sale' => $request->sale,
            'start' => $request->start,
            'end' => $request->end
        ]);

        return redirect()->route('sales.index')->with(['status' => 'Sale created']);
    }


}
