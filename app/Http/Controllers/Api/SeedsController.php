<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeedByIdResource;
use App\Http\Resources\SeedResource;
use App\Models\Comment;
use App\Models\Seed;
use Illuminate\Http\Request;

class SeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $request->category;

        if ($category == 'all') {

            $seeds = Seed::with('category', 'sale')->paginate(6);

            return SeedResource::collection($seeds);

        } else {

            $seeds = Seed::with('category', 'sale')
                ->where('category_id', $category)
                ->paginate(6);

            return SeedResource::collection($seeds);
        }

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

    public function comment(Request $request)
    {
        $comment = new Comment();

        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->seed_id = $request->seed_id;
        $comment->review_score = $request->review_score;

        if ($comment->save()) {
            return response()->status(200);
        } else {
            return response()->json('Error');
        }
    }


}
