<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Charge;
use Illuminate\Support\Facades\Validator;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charge = Charge::paginate(6);

        return view('charge.list', compact('charge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('charge.addCharge');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'charge' => 'bail|required|max:50|min:3|unique:charges'
        ];

        $message = [
            'charge.required' => 'Debe introducir un cargo.',
            'charge.max' => 'El cargo debe tener un maximo de 50 caracteres.',
            'charge.min' => 'El cargo debe tener un minimo de 3 caracteres.',
            'charge.unique' => 'El cargo ya existe.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect('/charge/create')->withInput($request->all())->withErrors($validator->errors());
        }

        Charge::create($request->all());

        return redirect('/charge')->with('status', 'Cargo agregado!');
    }


    public function destroy($id)
    {
        $charge = Charge::find($id);
        $charge->delete();

        return redirect()->back()->with('status', 'Cargo Eliminado!');
    }

    public function edit($id)
    {
        $charge = Charge::find($id);
        return view('charge.edit', compact('charge'));
    }

    public function update(Request $request)
    {
        $message = [
            'charge.required' => 'Debe introducir un cargo',
            'charge.max' => 'El cargo debe tener un maximo de 50 caracteres.',
            'charge.unique' => 'Ya se ha registrado este cargo.',
            'charge.min' => 'El cargo debe tener un minimo de 3 caracteres.'
        ];

        $rules = [
            'charge' => 'bail|required|max:50|min:3|unique:charges'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        $id = $request->input('id');
        $charge = Charge::find($id);
        $charge->charge = $request->input('charge');

        if($charge->save())
        {
            return redirect('/charge')->with('status', 'Cargo Actualizado!');
        }
    }
}
