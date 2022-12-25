<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeedByIdResource;
use App\Http\Resources\SeedResource;
use App\Models\Seed;
use Illuminate\Http\Request;

class SeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSeeds = Seed::paginate(20);

        return SeedResource::collection($allSeeds);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seed = Seed::with('category')->where('id', $id);

        return SeedByIdResource::collection($seed->get());
    }

}
