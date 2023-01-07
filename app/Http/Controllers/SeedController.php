<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentWriterSeedRequest;
use App\Http\Requests\SeedRequest;
use App\Http\Requests\UpdateSeedRequest;
use App\Models\Category;
use App\Models\Seed;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        $seed = Seed::with('category')->where('id', $id)->get();
        $categories = Category::all();

        return view('seeds.edit', compact('seed', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeedRequest $request, $id)
    {
        $seed = Seed::find($id);

        if ($request->hasFile('image')) {
            $directory = 'images/' . $seed->image;
            if (File::exists($directory)) {
                File::delete($directory);
            }
            // get image random name
            $rand = Str::random(100);
            $img = $rand . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $img);
            $seed->image = $img;
        }

        $seed->name = $request->name;
        $seed->description = $request->description;
        $seed->price = $request->price;
        $seed->quantity = $request->quantity;

        $seed->save();

        return redirect()->route('seeds.index')->with(['status' => 'Seed updated']);
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


    public function seedsForContentWriters()
    {
        $allSeeds = Seed::with('category')->orderBy('created_at', 'desc')->paginate(5);

        return view('content.seeds',compact('allSeeds'));
    }

    public function editDescription(Request $request, $id)
    {
        $seed = Seed::with('category')->where('id', $id)->get();

        return view('content.seed', compact('seed'));
    }

    public function provideDescription(ContentWriterSeedRequest $request, $id)
    {
        Seed::where('id', $id)->update([
            'description' => $request->description,
        ]);

        return redirect()->route('contentSeeds.all')->with(['status' => 'Seed description added']);
    }

}
