<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $content = DB::table('site_details')->get();

        return view('frontend.aboutUs.index', compact('content'));
    }
}
