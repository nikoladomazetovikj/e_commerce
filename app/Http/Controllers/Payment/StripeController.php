<?php

namespace App\Http\Controllers\Payment;

use App\Events\SendOrderNotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\OnlinePayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Event;
use Symfony\Component\Uid\Ulid;

class StripeController extends Controller
{
    public function billing(Request $request)
    {
        $user = $request->user();
        return view('frontend.billings.index', [
            'intent' => $user->createSetupIntent()
        ]);
    }

    // store cart data in database
    public function proceedPayment(Request $request)
    {
        $products = $request->session()->get('cart');

        $created_at = Carbon::now();

        $data = [];

        $orderId = (new Ulid)->toBase32();
        foreach ($products as $id => $value) {
            $data[] = [
                'order_id' => $orderId,
                'seed_id' => $id,
                'user_id' => $request->user()->id,
                'quantity' => (int) $value['quantity'],
                'total_price' => floatval($value['price']) * $value['quantity'],
                'created_at' => $created_at
            ];
        }

        OnlinePayment::insert($data);

        event(new SendOrderNotificationEvent($request->user(), $orderId));
        $request->session()->forget('cart');

        return redirect()->route('home')->with('success', 'Payment successfully completed');
    }
}
