<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CompanyPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->role_id == Role::MANAGER->value) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'seed_id' => ['required', 'exists:seeds,id'],
            'company_email' => ['required', 'exists:companies,company_email'],
            'agreement' => 'required',
            'agreement_date' => 'required',
            'quantity' => ['required', 'numeric'],
            'total_price' => ['required', 'numeric']
        ];
    }
}
