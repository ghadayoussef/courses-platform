<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;
//use Validator;
class StoreUserRequest extends FormRequest
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
            // 'name' => ['required'|Rule::unique('users', 'name')->ignore($this->id)],
            // 'email' => ['required'|Rule::unique('users', 'email')->ignore($this->id)],
            'name' => 'required|unique:users,name,'.$this->teacher.'|min:3',
            'email' => 'required|unique:users,email,'.$this->teacher.'|min:10',
            //'avatar' => 'required|image|mimes:gif,png,jpeg,jpg'
        ];
    }
}
