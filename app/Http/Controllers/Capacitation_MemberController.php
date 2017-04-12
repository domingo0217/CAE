<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Capacitation;
use Illuminate\Support\Facades\DB;

class Capacitation_MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capacitation = Capacitation::find($id);

        $members = DB::table('members')
                    ->leftJoin('capacitation_member', 'capacitation_member.member_id', '=', 'members.id')
                    ->select('members.id' , 'members.name', 'members.lastname')
                    ->whereNull('capacitation_member.member_id')
                    ->orWhere('capacitation_member.capacitation_id', '<>', $id)
                    ->paginate(10);
        // dd($members);
        return view('capacitation.addMembers', compact('members', 'capacitation'));
    }

    public function edit2($id)
    {
        $capacitation = Capacitation::find($id);

        $members = DB::table('members')
                       ->rightJoin('capacitation_member', 'capacitation_member.member_id', '=', 'members.id')
                       ->select('members.id' , 'members.name', 'members.lastname')
                       ->where('capacitation_member.capacitation_id', $id)
                       ->paginate(10);

        // dd($members);
        return view('capacitation.edit2', compact('capacitation', 'members'));
    }

    public function search(Request $request, $id)
    {
        // dd($request->all());
        $search = $request->input('search');
        $capacitation = Capacitation::find($id);
        $members = DB::table('members')
                    ->leftJoin('capacitation_member', 'capacitation_member.member_id', '=', 'members.id')
                    ->select('members.id' , 'members.name', 'members.lastname')
                    ->whereNull('capacitation_member.member_id')
                    ->where('members.name', 'like', '%'.$search.'%')
                    ->paginate(10);

        return view('capacitation.addMembers',compact('members', 'capacitation'));
    }

    public function search2(Request $request, $id)
    {
        // dd($request->all());
        $search = $request->input('search');
        $capacitation = Capacitation::find($id);
        $members = DB::table('members')
                       ->rightJoin('capacitation_member', 'capacitation_member.member_id', '=', 'members.id')
                       ->select('members.id' , 'members.name', 'members.lastname')
                       ->where('capacitation_member.capacitation_id', $id)
                       ->where('members.name', 'like', '%'.$search.'%')
                       ->paginate(10);

        return view('capacitation.addMembers',compact('members', 'capacitation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->input('members'));
        $capacitation = Capacitation::find($id);
        $members = $request->input('members');

        $capacitation->member()->attach($members);

        return redirect()->back()->with('status', 'Miembros Agregados exitosamente!');
    }

    public function update2(Request $request, $id)
    {
        // dd($request->all());
        $capacitation = Capacitation::find($id);
        $members = $request->input('members');

        $capacitation->member()->detach($members);

        return redirect()->back()->with('status', 'Miembros Eliminados exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
