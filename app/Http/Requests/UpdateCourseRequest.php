<?php

namespace App\Http\Requests;
use App\Http\Controllers\CourseController;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name'=> 'unique:courses,name,'.$this->course.'|required',
            'image'=>'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
            'price'=> 'required'
        ];
    }
}
