<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSeedRequest extends FormRequest
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
            'name' => ['max:255', 'required'],
            'description' => 'required',
            'image' => ['mimes:jpeg,png,jpg', 'max:2048'],
            'quantity' => ['required','numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:1'], //the price should not be 0
            'category_id' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Name should not be longer than 255 characters',
            'image.mimes' => 'Invalid image format. Please insert .jpeg, .png, or .jpg',
            'image.max' => 'Image is too large. Allowed size is 2MB',
            'description.required' => 'Please provide description for this seed',
            'quantity.required' => 'The quantity is required',
            'quantity.numeric' => 'Only numbers allowed',
            'quantity.min' => 'The quantity should not be negative',
            'price.required' => 'The price is required',
            'price.numeric' => 'Only numbers allowed',
            'price.min' => 'The price should not be negative or equal to 0',
            'category_id.required' => 'The category is required'

        ];
    }
}
