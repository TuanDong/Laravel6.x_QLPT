<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequests extends FormRequest
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
            'from-field-name-room' => 'required',//|unique:list_room,NAME_ROOM',
            'from-field-price-room' => 'required',
            'from-field-number-electric' => 'required',
            'from-field-number-water' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'from-field-name-room.required' => 'vui long nhap ten phong',
            //'from-field-name-room.unique' => 'Ten phong ton tai',
            'from-field-number-electric.required' => 'vui long ko de trong',
            'from-field-number-water.required' => 'vui long ko de trong',
        ];
    }
}
