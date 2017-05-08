<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Delegation;
use Illuminate\Support\Facades\Validator;

class DelegationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegation = Delegation::paginate(6);

        return view('delegation.list', compact('delegation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('delegation.addDelegation');
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
            'delegation.required' => 'Debe introducir una delegación.',
            'delegation.max' => 'La delegación debe tener un maximo de 50 caracteres.',
            'delegation.unique' => 'Ya se ha registrado esta delegación.',
            'delegation.min' => 'La ciudad debe tener un minimo de 3 caracteres.'
        ];

        $rules = [
            'delegation' => 'bail|required|max:50|min:3|unique:delegations'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect('/delegation/create')->withInput($request->all())->withErrors($validator->errors());
        }

        Delegation::create($request->all());

        return redirect('/delegation')->with('status', 'Delegaci&oacute;n agregada!');
    }


    public function destroy($id)
    {
        $delegation = Delegation::find($id);
        $h = $delegation->member();

        if($h->count() == 0)
        {
            $delegation->delete();
            return redirect()->back()->with('status', 'Delegaci&oacute;n eliminada!');
        }
        else
        {
            return redirect()->back()->with('statusNeg', 'Esta delegacion tiene miembros, favor eliminar los miembros antes de eliminar la delegacion!');
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $delegation = Delegation::where('delegation', 'like', '%'.$search.'%')->paginate(6);
        return view('/delegation.list', compact('delegation'));
    }

    public function edit($id)
    {
        $delegation = Delegation::find($id);
        return view('delegation.edit', compact('delegation'));
    }

    public function update(Request $request)
    {
        $message = [
            'delegation.required' => 'Debe introducir una delegación',
            'delegation.max' => 'La delegaci debe tener un maximo de 50 caracteres.',
            'delegation.unique' => 'Ya se ha registrado esta delegaci.',
            'delegation.min' => 'La delegaci debe tener un minimo de 3 caracteres.'
        ];

        $rules = [
            'delegation' => 'bail|required|max:50|min:3|unique:delegations'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        $id = $request->input('id');
        $delegation = Delegation::find($id);
        $delegation->delegation = $request->input('delegation');

        if($delegation->save())
        {
            return redirect('/delegation')->with('status', 'Delegación Actualizada!');
        }
    }
}
