<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Member;
use cae\Telephone;
use cae\Address;
use cae\Delegation;
use cae\City;
use cae\Http\Requests\StoreMember;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = DB::table('members')
                    ->leftJoin('telephones', 'members.id', '=', 'telephones.member_id')
                    ->leftJoin('addresses', 'members.id', '=', 'addresses.member_id')
                    ->leftJoin('cities', 'addresses.city_id', '=', 'cities.id')
                    ->LeftJoin('delegations', 'delegations.id', '=', 'members.delegation_id')
                    ->select('members.name', 'members.lastname', 'members.id', 'members.nationality', 'members.civil_status', 'members.email', 'members.birthdate', 'telephones.telephone', 'addresses.address', 'cities.city', 'delegations.delegation')
                    ->get();

        return view('member.list', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $delegations = Delegation::all();

        return View('member.CreateMember', compact('cities', 'delegations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMember $request)
    {
        $telephone = Telephone::create([
            'telephone' => request('telephone'),
            'member_id' => request('id')
        ]);

        $address = Address::create([
            'address' => request('address'),
            'member_id' => request('id'),
            'city_id' => request('city')
        ]);

        Member::create([
            'name' => request('name'),
            'lastname' => request('lastname'),
            'id' => request('id'),
            'nationality' => request('nationality'),
            'civil_status' => request('civil_status'),
            'birthdate' => request('birthdate'),
            'email' => request('email')
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
