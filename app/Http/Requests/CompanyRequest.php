<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->role_id == Role::ADMIN->value || Auth::user()->role_id == Role::MANAGER->value) {
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
            'company_name' => 'required',
            'company_address' => 'required',
            'company_email' => 'required|email',
            'company_phone' => 'required',
            'additional_details' => 'nullable',
            'company_website' => 'nullable|url'
        ];
    }
}
