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
            'name' => 'required|unique:users,name,'.$this->teacher.'|min:3',
            'email' => 'required|unique:users,email,'.$this->teacher.'|min:10',
            'avatar' => 'image|mimes:gif,png,jpeg,jpg'.$this->teacher
        ];
    }
}
