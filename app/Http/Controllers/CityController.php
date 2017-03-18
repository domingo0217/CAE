<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\City;

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
        $this->validate($request, [
            'city' => 'bail|required|max:70|unique:cities'
        ]);

        City::create($request->all());

        return redirect('/city')->with('status', 'Pa&iacute;s Agregado!');
    }

    public function destroy($id)
    {
        // dd($id);

        $city = City::find($id);
        $city->delete();

        return redirect()->back()->with('status', 'Pa&iacute;s Eliminado!');
    }
}
