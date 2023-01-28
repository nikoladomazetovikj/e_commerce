<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function billing(Request $request)
    {
        $user = $request->user();
        return view('frontend.billings.index', [
            'intent' => $user->createSetupIntent()
        ]);
    }
}
