<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name' => 'required|min:8|max:30',
            'phone'=>'required|numeric',
            'email' => 'email:rfc,dns'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            //'name.required' => 'Please enter your full name',
        ];
    }
}
