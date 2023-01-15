<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SalesRequest extends FormRequest
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
            'seed_id' => [Rule::unique('sales', 'seed_id'), Rule::exists('seeds', 'id'), 'required'],
            'sale' => ['required', 'numeric', 'min:1'],
            'start' => ['required', 'before:end'],
            'end' => ['required', 'after:start']
        ];
    }

}
