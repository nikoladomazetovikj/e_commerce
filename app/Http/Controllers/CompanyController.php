<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCompanies = Company::all();

        return view('company.index', compact('allCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        Company::create($request->validated());

        return redirect()->route('company.index')->with(['status' => 'Company created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where('id', $id)->get();
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->get();
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        Company::where('id', $id)->update($request->validated());

        return redirect()->route('company.index')->with(['status' => 'Company edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::where('id', $id)->delete();

        return redirect()->route('company.index')->with(['status' => 'Company deleted']);
    }

    public function archived()
    {
        $allCompanies = Company::onlyTrashed()->get();

        return view('company.trashed', compact('allCompanies'));
    }


    public function restore(Request $request, $id)
    {
        Company::withTrashed()->where('id', $id)->restore();

        return redirect()->route('company.index')->with(['status' => 'Company restored']);
    }
    /*
     * Method to create users for companies
     * */
    public function createUserCompany(Request $request)
    {
        User::create($request->all());

        // return
    }
}
