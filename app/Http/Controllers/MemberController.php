<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Member;
use cae\Http\Requests\StoreMember;

class MemberController extends Controller
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
        return View('CreateMember');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMember $request)
    {
        dd($request->all());


        // Member::create([
        //     'name' => request('name'),
        //     'lastname' => request('lastname'),
        //     'identification_document' => request('identification_document'),
        //     'nationality' => request('nationality'),
        //     'birthdate' => request('birthdate'),
        //     'civil_status' => request('civil_status'),
        //     'email' => request('email'),
        //     'telephone' => request('telephone'),
        //     'name' => request('name'),
        // ]);
        //
        // cae\Address::create([
        //     'address' => request('address'),
        //     'member_id' => request('id')
        // ]);


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
        //
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
        //
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
