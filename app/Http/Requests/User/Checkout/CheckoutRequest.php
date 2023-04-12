<?php

namespace App\Http\Requests\User\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        $checkoutArray =  [
           'address_option' => 'required',
           'payment_option' => 'required',
           'advance_transaction_number' => 'required|string',
           'additional_info' => 'nullable|string',
        ];
        return $checkoutArray;
    }
}
