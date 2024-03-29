<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteDetailsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SiteDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteData = DB::table('site_details')->count();
        $siteDetails = DB::table('site_details')->get();
        return view('content.index', compact('siteData','siteDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteDataCount = DB::table('site_details')->count();
        $siteData = DB::table('site_details')->get();

        return view('content.create', compact('siteData', 'siteDataCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteDetailsRequest $request)
    {
        DB::table('site_details')
            ->insert([
                'description' => $request->description,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram
            ]);

        return redirect()->route('site.content')->with(['status' => 'Site details created']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteDetailsRequest $request, $id)
    {
        DB::table('site_details')
            ->where('id', $id)
            ->update([
                'description' => $request->description,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram
            ]);

        return redirect()->route('site.content')->with(['status' => 'Site details updated']);
    }

}
