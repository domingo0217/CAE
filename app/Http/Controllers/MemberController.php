<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Member;
use cae\Telephone;
use cae\Address;
use cae\City;
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
        $cities = City::all();

        return View('CreateMember', compact('cities'));
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

        Member::create([
            'name' => request('name'),
            'lastname' => request('lastname'),
            'id' => request('id'),
            'nationality' => request('nationality'),
            'civil_status' => request('civil_status'),
            'birthdate' => request('birthdate'),
            'email' => request('email')
        ]);

        $telephone = Telephone::create([
            'telephone' => request('telephone')
        ]);

        $address = Address::create([
            'address' => request('address')
        ]);

        $member = Member::find(request('id'));

        $telephone = $member->telephone()->save($telephone);
        $address = $member->address()->save($address);

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
