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
use Illuminate\Support\Facades\Validator;

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
                    ->select('members.name', 'members.lastname', 'members.id', 'members.nationality', 'members.civil_status', 'members.email', 'members.birthdate', 'members.gender', 'members.status', 'telephones.telephone', 'addresses.address', 'cities.city', 'delegations.delegation')
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
    public function store(Request $request)
    {
        $rules = [
            'name' => 'bail|required|string|max:30|min:3',
            'lastname' => 'bail|required|string|max:30|min:3',
            'id' => 'bail|required|alpha_num|max:11|min:11',
            'nationality' => 'bail|required|alpha|max:20|min:4',
            'email' => 'bail|required|email|max:50|min:11',
            'telephone' => 'bail|required|alpha_dash|max:12|min:12',
            'address' => 'bail|required|string|max:70|min:10',
            'civil_status' => 'bail|required|alpha|max:10|min:5',
            'birthdate' => 'bail|required|date|',
            'status'=> 'bail|required|alpha|max:11|min:6'
        ];

        $message = [
            'name.required' => 'Debe ingresar un nombre.',
            'name.max' => 'El nombre debe tener un maximo de 30 caracteres.',
            'name.min' => 'El nombre debe tener un mínimo de 3 caracteres.',
            'lastname.required' => 'Debe ingresar un apellido.',
            'lastname.max' => 'El apellido debe tener un maximo de 30 caracteres.',
            'lastname.min' => 'El apellido debe tener un mínimo de 3 caracteres.',
            'id.required' => 'Debe ingresar una cédula.',
            'id.max' => 'La cédula debe tener un maximo de 11 caracteres.',
            'id.min' => 'La cédula debe tener un mínimo de 11 caracteres.',
            'nationality.required' => 'Debe ingresar una nacionalidad.',
            'nationality.max' => 'La nacionalidad debe tener un maximo de 20 caracteres.',
            'nationality.min' => 'La nacionalidad debe tener un mínimo de 4 caracteres.',
            'email.required' => 'Debe ingresar un correo electrónico.',
            'email.max' => 'El correo electrónico debe tener un maximo de 50 caracteres.',
            'email.min' => 'El correo electrónico debe tener un mínimo de 11 caracteres.',
            'email.email' => 'Introduzca un correo electrónico',
            'telephone.required' => 'Debe ingresar un número telefónico.',
            'telephone.max' => 'El número telefónico debe tener un maximo de 12 caracteres.',
            'telephone.min' => 'El número telefónico debe tener un mínimo de 12 caracteres.',
            'telephone.alpha_dash' => 'El número telefónico solo puede contener números y dos guiones.',
            'address.required' => 'Debe ingresar una dirección.',
            'address.max' => 'La dirección debe tener un maximo de 70 caracteres.',
            'address.min' => 'La dirección debe tener un minimo de 10 caracteres.',
            'delegation.required' => 'Debe ingresar una dirección.',
            'delegation.max' => 'La delegación debe tener un maximo de 30 caracteres.',
            'delegation.min' => 'La delegación debe tener un minimo de 3 caracteres.',
            'civil_status.required' => 'Debe ingresar una dirección.',
            'civil_status.max' => 'La dirección debe tener un maximo de 10 caracteres.',
            'civil_status.min' => 'La dirección debe tener un minimo de 5 caracteres.',
            'birthdate.required' => 'Debe ingresar una fecha de nacimiento.',
            'birthdate.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'status.required' => 'Debe ingresar una dirección.',
            'status.max' => 'El estado debe tener un maximo de 11 caracteres.',
            'status.min' => 'El estado debe tener un minimo de 6 caracteres.',
        ];

        $validator = Validator::make( $request->all(), $rules, $message);
        if( $validator->fails() )
        {
            return redirect('/member/create')->withInput($request->all())
                                      ->withErrors($validator->errors());
        }

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
            'email' => request('email'),
            'address_id' => request('address'),
            'delegation_id' => request('delegation'),
            'status' => request('status'),
            'gender' => request('gender')
        ]);


        $member = Member::find(request('id'));

        $telephone = $member->telephone()->save($telephone);
        $address = $member->address()->save($address);

        return redirect('/member')->with('status', 'El miembro se ha guardado!');
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

    public function search(Request $request)
    {
        $search = $request->input('search');
        $member = Member::where('name', 'like', '%'.$search.'%')->orwhere('lastname', 'like', '%'.$search.'%')->orwhere('id', 'like', '%'.$search.'%')->paginate(6);
        return view('/member.list', compact('member'));
    }
}
