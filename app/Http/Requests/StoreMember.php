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

    public function mensajes()
    {
        return [
            'name.required' => 'Debe ingresar un nombre.',
            'name.max' => 'El nombre debe tener un maximo de 30 caracteres.',
            'name.min' => 'El nombre debe tener un mínimo de 3 caracteres.',
            'lastname.required' => 'Debe ingresar un apellido.',
            'lastname.max' => 'El apellido debe tener un maximo de 30 caracteres.',
            'lastname.min' => 'El apellido debe tener un mínimo de 3 caracteres.',
            'id.required' => 'Debe ingresar una cédula.',
            'id.max' => 'La cédula debe tener un maximo de 11 caracteres.',
            'id.min' => 'La cédula debe tener un mínimo de 11 caracteres.',
            'nationality.required' => 'Debe ingresar una nacionalidad.',
            'nationality.max' => 'La nacionalidad debe tener un maximo de 20 caracteres.',
            'nationality.min' => 'La nacionalidad debe tener un mínimo de 4 caracteres.',
            'email.required' => 'Debe ingresar un correo electrónico.',
            'email.max' => 'El correo electrónico debe tener un maximo de 50 caracteres.',
            'email.min' => 'El correo electrónico debe tener un mínimo de 11 caracteres.',
            'email.email' => 'Introduzca un correo electrónico',
            'telephone.required' => 'Debe ingresar un número telefónico.',
            'telephone.max' => 'El número telefónico debe tener un maximo de 12 caracteres.',
            'telephone.min' => 'El número telefónico debe tener un mínimo de 12 caracteres.',
            'telephone.alpha_dash' => 'El número telefónico solo puede contener números y dos guiones.'
            'address.required' => 'Debe ingresar una dirección.',
            'address.max' => 'La dirección debe tener un maximo de 70 caracteres.',
            'address.min' => 'La dirección debe tener un minimo de 10 caracteres.',
            'delegation.required' => 'Debe ingresar una dirección.',
            'delegation.max' => 'La delegación debe tener un maximo de 30 caracteres.',
            'delegation.min' => 'La delegación debe tener un minimo de 3 caracteres.',
            'civil_status.required' => 'Debe ingresar una dirección.',
            'civil_status.max' => 'La dirección debe tener un maximo de 10 caracteres.',
            'civil_status.min' => 'La dirección debe tener un minimo de 5 caracteres.',
            'birthdate.required' => 'Debe ingresar una fecha de nacimiento.',
            'birthdate.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'status.required' => 'Debe ingresar una dirección.',
            'status.max' => 'El estado debe tener un maximo de 11 caracteres.',
            'status.min' => 'El estado debe tener un minimo de 6 caracteres.',
        ];
    }
}
