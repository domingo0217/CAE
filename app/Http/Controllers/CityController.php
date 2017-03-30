<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\City;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::paginate(6);

        return view('city.list', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.addCity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'city.required' => 'Debe introducir una ciudad',
            'city.max' => 'La ciudad debe tener un maximo de 50 caracteres.',
            'city.unique' => 'Ya se ha registrado esta ciudad.',
            'city.min' => 'La ciudad debe tener un minimo de 50 caracteres.'
        ];

        $rules = [
            'city' => 'bail|required|max:50|min:3|unique:cities'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect('/city/create')->withInput($request->all())->withErrors($validator->errors());
        }

        City::create($request->all());

        return redirect('/city')->with('status', 'Ciudad Agregada!');
    }

    public function destroy($id)
    {
        // dd($id);

        $city = City::find($id);
        $city->delete();

        return redirect()->back()->with('status', 'Ciudad Eliminada!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $city = City::where('city', 'like', '%'.$search.'%')->paginate(6);
        return view('/city.list', compact('city'));
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('city.edit', compact('city'));
    }

    public function update(Request $request)
    {
        $message = [
            'city.required' => 'Debe introducir una ciudad',
            'city.max' => 'La ciudad debe tener un maximo de 50 caracteres.',
            'city.unique' => 'Ya se ha registrado esta ciudad.',
            'city.min' => 'La ciudad debe tener un minimo de 3 caracteres.'
        ];

        $rules = [
            'city' => 'bail|required|max:50|min:3|unique:cities'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        $id = $request->input('id');
        $city = City::find($id);
        $city->city = $request->input('city');

        if($city->save())
        {
            return redirect('/city')->with('status', 'Ciudad Actualizada!');
        }
    }
}
