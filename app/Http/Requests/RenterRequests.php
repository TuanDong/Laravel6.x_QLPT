<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenterRequests extends FormRequest
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
            'from-field-name-renter' => 'required',
            'from-field-scmnd' => 'required',//|unique:room_renter,SCMND',
            'from-field-number-phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'from-field-name-renter.required' => 'vui long nhap ten',
            'from-field-scmnd.required' => 'vui long nhap SCMND',
            //'from-field-scmnd.unique' => 'SCMND phong ton tai',
            'from-field-number-phone.required' => 'vui long ko de trong',
        ];
    }
}
