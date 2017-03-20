<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Charge;

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
        $this->validate($request, [
            'charge' => 'bail|required|max:50|unique:charges'
        ]);

        Charge::create($request->all());

        return redirect('/charge')->with('status', 'Cargo agregado!');
    }


    public function destroy($id)
    {
        $charge = Charge::find($id);
        $charge->delete();

        return redirect()->back()->with('status', 'Cargo Eliminado!');
    }
}
