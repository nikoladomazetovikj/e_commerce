<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeedRequest;
use App\Models\Category;
use App\Models\Seed;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSeeds = Seed::with('category')->orderBy('created_at', 'desc')->paginate(5);

        return view('seeds.index',compact('allSeeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('seeds.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeedRequest $request)
    {
        // get image random name
        $rand = Str::random(100);
        $img = $rand . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $img);

        Seed::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $img,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('seeds.index')->with(['status' => 'Seed inserted']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seed = Seed::with('category')->where('id', $id)->get();

        return view('seeds.show', compact('seed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seed::where('id', $id)->delete();

        return redirect()->route('seeds.index')->with(['status' => 'Seed deleted']);
    }

    public function archived()
    {
        $allSeeds = Seed::onlyTrashed()->with('category')->get();

        return view('seeds.trashed', compact('allSeeds'));
    }

    public function restore(Request $request, $id)
    {
        Seed::withTrashed()->where('id', $id)->restore();

        return redirect()->route('seeds.index')->with(['status' => 'Seed restored']);
    }

}
