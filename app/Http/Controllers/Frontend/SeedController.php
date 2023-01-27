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

}
