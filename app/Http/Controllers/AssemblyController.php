<?php

namespace cae\Http\Controllers;

use cae\Assembly;
use cae\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssemblyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assembly = Assembly::paginate(10);

        return view('assembly.list', compact('assembly'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assembly.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            // 'assembly' => 'required',
            'date' => 'bail|required|date|unique:assemblies',
            'record' => 'bail|required|'
        ];

        $message = [
            'assembly.required' => 'Debe ingresar un nombre.',
            'date.required' => 'Debe ingresar una fecha.',
            'date.date' => 'Debe ingresar una fecha valida.',
            'date.unique' => 'Ya existe una asamblea para esa fecha.',
            'record.required' => 'Debe ingresar un Acta.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->All())->withErrors($validator->errors());
        }
        else
        {
            Assembly::create($request->All());
            // $assembly->date = $request->input('date');
            // $assembly->record = $request->input('record');
            return redirect('/assembly')->with('status', 'La asamblea ha sido creada.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \cae\Assembly  $assembly
     * @return \Illuminate\Http\Response
     */
    public function show(Assembly $assembly)
    {
        return view('assembly.show', compact('assembly'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \cae\Assembly  $assembly
     * @return \Illuminate\Http\Response
     */
    public function edit(Assembly $assembly)
    {
        return view('assembly.edit', compact('assembly'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \cae\Assembly  $assembly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assembly $assembly)
    {
        $rules = [
            // 'assembly' => 'required',
            'date' => 'bail|required|date',
            'record' => 'bail|required|'
        ];

        $message = [
            'assembly.required' => 'Debe ingresar un nombre.',
            'date.required' => 'Debe ingresar una fecha.',
            'date.date' => 'Debe ingresar una fecha valida.',
            'date.unique' => 'Ya existe una asamblea para esa fecha.',
            'record.required' => 'Debe ingresar un Acta.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->All())->withErrors($validator->errors());
        }
        else
        {
            $assembly->update($request->all());
            return redirect('/assembly')->with('status', 'La asamblea ha sido Actualizada.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \cae\Assembly  $assembly
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assembly $assembly)
    {
        //
    }

    public function attendance(Assembly $assembly)
    {
        $members = Member::all();
        return view('assembly.attendance', compact('assembly', 'members'));
    }

    public function addAttendance(Assembly $assembly)
    {
        $members = Member::all();
        return view('assembly.addAttendance', compact('assembly', 'members'));
    }

    public function storeAttendance(Request $request, Assembly $assembly)
    {
        dd($request->all());
    }

    public function editAttendance(Assembly $assembly)
    {
        $members = Member::all();
        return view('assembly.editAttendance', compact('assembly', 'members'));
    }

    public function updateAttendance(Request $request, Assembly $assembly)
    {
        dd($request->all());
    }
}
