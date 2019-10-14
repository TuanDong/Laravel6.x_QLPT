<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentRoomRequests extends FormRequest
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
            'id-datepicker' => 'required',
            'from-field-name-renter' => 'required',
            'from-field-scmnd' => 'required'//|unique:room_renter,SCMND',
        ];
    }
    public function messages()
    {
        return [
            'id-datepicker.required' => 'vui long nhap ngay thue',
            'from-field-name-renter.required' => 'vui long nhap ten nguoi thue',
            //'from-field-scmnd.unique' => 'So CMND Da Co',
            'from-field-scmnd.required' => 'vui long nhap SCMND',
        ];
    }
}
