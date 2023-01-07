<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyPaymentRequest;
use App\Models\Company;
use App\Models\CompanyPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function companyPayments()
    {
        $query = DB::table('companies_payments', 'cp')
            ->select('cp.id',
                's.name as seed_name',
                'c.friendly_name as category_name',
                'co.company_name',
                'cp.quantity',
                'cp.total_price',
                DB::raw('DATE(cp.created_at) AS date')
            )
            ->join('seeds AS s', 's.id', '=', 'cp.seed_id')
            ->join('categories AS c', 'c.id', '=', 's.category_id')
            ->join('companies AS co', 'co.id', '=', 'cp.company_id')
            ->orderBy('date', 'desc')
            ->paginate(5);

        return view('company.payments', compact('query'));
    }

    public function companyPayment()
    {
        return view('company.payment');
    }


    public function companyPaymentStore(CompanyPaymentRequest $request)
    {
        $companyId = Company::where('company_email', $request->company_email)->value('id');
        CompanyPayment::create([
            'company_id' => $companyId,
            'seed_id' => $request->seed_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'agreement' => $request->agreement,
            'agreement_date' => $request->agreement_date
        ]);

        return redirect()->route('companyPayment.index')->with(['status' => 'Order agreement created']);
    }

    public function companyAgreement($id)
    {
        $query = DB::table('companies_payments', 'cp')
            ->select('cp.id',
                's.name as seed_name',
                'c.friendly_name as category_name',
                'co.company_name',
                'cp.quantity',
                'cp.total_price',
                'cp.agreement',
                'cp.agreement_date',
            )
            ->join('seeds AS s', 's.id', '=', 'cp.seed_id')
            ->join('categories AS c', 'c.id', '=', 's.category_id')
            ->join('companies AS co', 'co.id', '=', 'cp.company_id')
            ->where('cp.id', $id)
            ->get();

        return view('company.agreement', compact('query'));
    }
}
