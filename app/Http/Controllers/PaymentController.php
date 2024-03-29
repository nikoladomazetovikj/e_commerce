<?php

namespace App\Http\Controllers;

use App\Events\CompanyOrderEvent;
use App\Http\Requests\CompanyPaymentRequest;
use App\Models\Company;
use App\Models\CompanyPayment;
use App\Models\Seed;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
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
        $companyName = Company::where('company_email', $request->company_email)->value('company_name');
        $seed = Seed::with('category')->where('id', $request->seed_id)->get();
        $companyPayment = CompanyPayment::create([
            'company_id' => $companyId,
            'seed_id' => $request->seed_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'agreement' => $request->agreement,
            'agreement_date' => $request->agreement_date
        ]);

        // by default 20 days
        $estimatedDelivery = Carbon::parse($companyPayment->agreement_date)->addDays(20)->format('d-M-Y');

        $title = "Order # " . $companyPayment->id;

        event(new CompanyOrderEvent($title,
            $companyName,
            $request->user()->email,$seed,
            "{$request->user()->name} {$request->user()->surname}",
            $request->company_email,
            $estimatedDelivery,
            $companyPayment
        ));

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
