<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Seed;
use Illuminate\Http\Request;

class SeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $seed = Seed::with('sale', 'category')->where('id', $id)->get();

        return view('frontend.seeds.seed', compact('seed'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function search(Request $request)
    {
        $name = $request->search;

        $result = Seed::where('name', 'like', "%{$name}%")->get();

        return response()->json($result);
    }


    public function searched(Request $request)
    {
        $name = $request->search;

        $result = Seed::where('name', $name)->value('id');

        if ($result == null) {
            return view('frontend.seeds.errors.not-found');
        }

        return redirect()->route('frontend.seed.id', $result);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
