<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\RateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Seed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $avgRating = Rating::where('seed_id', $id)->selectRaw(DB::raw('CAST(avg(review_score) AS decimal(12,2) ) as rate'))->value('rate');

        $ratings = [
            1 => Rating::where('seed_id', $id)->where('review_score', 1)->count(),
            2 => Rating::where('seed_id', $id)->where('review_score', 2)->count(),
            3 => Rating::where('seed_id', $id)->where('review_score', 3)->count(),
            4 => Rating::where('seed_id', $id)->where('review_score', 4)->count(),
            5 => Rating::where('seed_id', $id)->where('review_score', 5)->count()
        ];

        $totalUsersRatings = Rating::where('seed_id', $id)->count('user_id');

        $totalComments = Comment::where('seed_id', $id)->count();

        $comments = Comment::with('users')->where('seed_id', $id)->orderBy('created_at', 'desc')->paginate(10);


        return view('frontend.seeds.seed', compact('seed', 'ratings', 'avgRating', 'totalUsersRatings', 'totalComments', 'comments'));
    }


    public function products()
    {
        $categories = Category::all();

        return view('frontend.seeds.seeds', compact('categories'));
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
    public function cart()
    {
        return view('frontend.seeds.cart.cart');
    }
    public function addToCart($id)
    {
        if (Auth::user()->profile()->count() == 0) {
            return redirect()->back()->with('info', 'Please complete your profile');
        }

        $product = Seed::with('sale')->findOrFail($id);

        $cart = session()->get('cart', []);

        $price = $product->price;
        if ($product->sale != null) {
            $price = $product->price - ($product->price * ($product->sale->sale / 100));
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "name" => $product->name,
                "image" => $product->image,
                "price" => $price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function comment(CommentRequest $request, $seedId)
    {
        $user = $request->user()->id;

        Comment::create([
            'user_id' => $user,
            'seed_id' => $seedId,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function rate(RateRequest $request, $seedId)
    {
        $user = $request->user()->id;

        $checkForRating = Rating::where('user_id', $user)->where('seed_id', $seedId)->count();

        if ($checkForRating == 0) {
            Rating::create([
                'user_id' => $user,
                'seed_id' => $seedId,
                'review_score' => $request->review_score
            ]);
        } else {

            $findId = Rating::where('user_id', $user)->where('seed_id', $seedId)->value('id');

            $rating = Rating::find($findId);

            $rating->review_score = (int) $request->review_score;

            $rating->save();
        }

        return redirect()->back()->with('success', 'Rating added successfully!');
    }
}
