<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileDetailsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'country' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'zip_code' => ['string', 'max:255'],
            'street' => ['string', 'max:255'],
            'phone_number' => ['string', 'max:255']
        ];
    }
}
