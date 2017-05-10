<?php

namespace cae\Http\Controllers;

use cae\Assembly;
use cae\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        $members = DB::table('assembly_member')
                       ->leftJoin('members', 'members.id', 'assembly_member.member_id')
                       ->leftJoin('delegations', 'delegations.id', 'members.delegation_id')
                       ->select('members.id', 'members.name', 'members.lastname', 'delegations.delegation')
                       ->where('assembly_member.assembly_id', $assembly->id)
                       ->get();

        return view('assembly.attendance', compact('assembly', 'members'));
    }

    public function addAttendance(Assembly $assembly)
    {
        $query = DB::table('assembly_member')->select('member_id')
                                             ->where('assembly_id', $assembly->id);

        $members = DB::table('members')->select('name', 'id', 'lastname')
                       ->whereNotIn('id',$query)
                       ->where('status', '=', 'activo')
                       ->get();

        return view('assembly.addAttendance', compact('assembly', 'members'));
    }

    public function storeAttendance(Request $request, Assembly $assembly)
    {
        // dd($request->all());

        $members = $request->input('members');


        if(!empty($members))
        {
            $assembly->member()->attach($members);

            return redirect()->back()->with('status', 'Asistencia pasada exitosamente!');
        }
        else
        {
            return redirect()->back()->with('statusNeg', 'Seleccione un miembro.');
        }
    }

    public function editAttendance(Assembly $assembly)
    {
        $members = DB::table('members')
                       ->leftJoin('assembly_member', 'assembly_member.member_id', 'members.id')
                       ->select('members.id' , 'members.name', 'members.lastname')
                       ->where('assembly_member.assembly_id', $assembly->id)
                       ->get();

        return view('assembly.editAttendance', compact('assembly', 'members'));
    }

    public function updateAttendance(Request $request, Assembly $assembly)
    {
        // dd($request->all());

        $members = $request->input('members');

        if(!empty($members))
        {
            $assembly->member()->detach($members);

            return redirect()->back()->with('status', 'Miembros Eliminados exitosamente!');
        }
        else
        {
            return redirect()->back()->with('statusNeg', 'Seleccione un miembro.');
        }
    }

    public function searchAssembly(Request $request)
    {
        $search = $request->input('search');
        $assembly = Assembly::where('assembly', 'like', '%'.$search.'%')->orWhere('date', 'like', '%'.$search.'%')->get();

        return view('assembly.list', compact('assembly'));
    }

    public function search2Assembly(Request $request, $id)
    {
        // dd($request->all());
        $search = $request->input('search');
        $assembly = Assembly::find($id);
        $members = DB::table('members')
                       ->rightJoin('assembly_member', 'assembly_member.member_id', '=', 'members.id')
                       ->leftJoin('delegations', 'delegations.id', '=', 'members.delegation_id')
                       ->select('members.id' , 'members.name', 'members.lastname')
                       ->where('assembly_member.assembly_id', $id)
                       ->where('members.name', 'like', '%'.$search.'%')
                       ->orWhere('members.lastname', 'like', '%'.$search.'%')
                       ->orWhere('members.id', 'like', '%'.$search.'%')
                       ->orWhere('delegations.delegation', 'like', '%'.$search.'%')
                       ->paginate(10);

        return view('assembly.attendance',compact('members', 'assembly'));
    }

    public function searchAssemblyMember(Request $request, $id)
    {
        // dd($request->all());
        $search = $request->input('search');
        $assembly = Assembly::find($id);
        $members = DB::table('members')
                    ->leftJoin('assembly_member', 'assembly_member.member_id', '=', 'members.id')
                    ->leftJoin('delegations', 'delegations.id', '=', 'members.delegation_id')
                    ->select('members.id' , 'members.name', 'members.lastname')
                    ->whereNull('assembly_member.member_id')
                    ->where('members.name', 'like', '%'.$search.'%')
                    ->orWhere('members.lastname', 'like', '%'.$search.'%')
                    ->orWhere('members.id', 'like', '%'.$search.'%')
                    ->orWhere('delegations.delegation', 'like', '%'.$search.'%')
                    ->paginate(10);

        return view('assembly.addAttendance',compact('members', 'assembly'));
    }

    public function search2AssemblyMember(Request $request, $id)
    {
        // dd($request->all());
        $search = $request->input('search');
        $assembly = Assembly::find($id);
        $members = DB::table('members')
                       ->rightJoin('assembly_member', 'assembly_member.member_id', '=', 'members.id')
                       ->leftJoin('delegations', 'delegations.id', '=', 'members.delegation_id')
                       ->select('members.id' , 'members.name', 'members.lastname')
                       ->where('assembly_member.assembly_id', $id)
                       ->where('members.name', 'like', '%'.$search.'%')
                       ->orWhere('members.lastname', 'like', '%'.$search.'%')
                       ->orWhere('members.id', 'like', '%'.$search.'%')
                       ->orWhere('delegations.delegation', 'like', '%'.$search.'%')
                       ->paginate(10);

        return view('assembly.editAttendance',compact('members', 'assembly'));
    }
}
