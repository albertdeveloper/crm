<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->user()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:leads,email,' . $this->id,
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'website' => 'required|url',
            'country' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'company.required' => 'Company required',
            'phone.required' => 'Phone required',
            'email.required' => 'Email address required',
            'email.email' => 'Email address invalid',
            'email.unique' => 'Email address already exists',
            'street.required' => 'Street required',
            'city.required' => 'City required',
            'state.required' => 'State required',
            'zipcode.required' => 'Zipcode required',
            'website.required'  => 'Website required',
            'country.required'  => 'Country required'
        ];
    }
}
