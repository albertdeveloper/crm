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
            'owner' => 'required',
            'company' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'company.required' => 'Company required',
            'owner.required' => 'Owner required',
            'first_name.required' => 'First name required',
            'last_name.required' => 'Last name required',

        ];
    }
}
