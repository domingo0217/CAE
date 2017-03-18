<?php

namespace cae\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMember extends FormRequest
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
            'name' => 'bail|required|string|max:30|min:3',
            'lastname' => 'bail|required|string|max:30|min:3',
            'id' => 'bail|required|alpha_num|max:11|min:11',
            'nationality' => 'bail|required|alpha|max:20|min:4',
            'email' => 'bail|required|email|max:50|min:11',
            'telephone' => 'bail|required|alpha_dash|max:12|min:12',
            'address' => 'bail|required|string|max:70|min:10',
            'delegation' => 'bail|required|string|max:30|min:3',
            'civil_status' => 'bail|required|alpha|max:10|min:5',
            'birthdate' => 'bail|required|date|',
            'status'=> 'bail|required|alpha|max:11|min:6'
        ];
    }
}
