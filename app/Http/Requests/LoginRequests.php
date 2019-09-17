<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class LoginRequests extends FormRequest
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
            'user_name' => 'required | min:4',
            'pass' => 'required | min:4',
        ];
    }
    public function messages()
    {
        return [
            'user_name.required' => 'User name is required',
            'user_name.min' => trans('messages.length'),
            'pass.required'  => 'Password is required',
        ];
    }

    public function validation($request)
    {
        $_validator = Validator::make($request->all(),$request->rules());
        if ($_validator->fails()) {
            return redirect()->back()->withErrors($_validator)->withInput();
        }
    }
}
