<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterUserResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['string', 'min:3'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'min:10', 'max:20'],
            'avatar' => ['image', 'mimes:png,jpg,jpeg,svg','max:5120'],
            'project_type' => ['required', 'in:company,small_projects', 'string'],
            'category' => ['required', 'string'],
            'seller' => ['required', 'string'],
            'seller_ar' => ['required', 'string'],
            'max_transactions' => ['numeric'],
            'max_transaction_amount' => ['numeric'],
            'holder_name' => ['string'],
            'account_number' => ['string', 'min:16'],
            'iban' => ['string'],
            'bank_name' => ['string']
        ];
    }
}
