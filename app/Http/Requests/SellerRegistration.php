<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRegistration extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'store_name'  => 'required',
            'store_social_link' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state_id' => 'required',
            'zip_code' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
