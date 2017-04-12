<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Member;
use cae\Telephone;
use cae\Address;
use cae\Delegation;
use cae\City;
use cae\Document;
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
        // $member = DB::table('members')
        //             ->leftJoin('telephones', 'members.id', '=', 'telephones.member_id')
        //             ->leftJoin('addresses', 'members.id', '=', 'addresses.member_id')
        //             ->leftJoin('cities', 'addresses.city_id', '=', 'cities.id')
        //             ->LeftJoin('delegations', 'delegations.id', '=', 'members.delegation_id')
        //             ->select('members.name', 'members.lastname', 'members.id', 'members.nationality', 'members.civil_status', 'members.email', 'members.birthdate', 'members.gender', 'members.status', 'telephones.telephone', 'addresses.address', 'cities.city', 'delegations.delegation')
        //             ->get();

        $member = DB::table('members')
                    ->leftJoin('telephones', 'members.id', '=', 'telephones.member_id')
                    ->select('members.name', 'members.lastname', 'members.id', 'telephones.telephone')
                    ->paginate(7);

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
        $documents = Document::all();

        return View('member.CreateMember', compact('cities', 'delegations', 'documents'));
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
            'id' => 'bail|required|alpha_num|max:11|min:9|unique:members',
            'nationality' => 'bail|required|alpha|max:20|min:4',
            'email' => 'bail|required|email|max:50|min:11',
            'telephone' => 'bail|required|alpha_dash|max:12|min:12',
            'address' => 'bail|required|string|max:70|min:10',
            'civil_status' => 'bail|required|alpha|max:10|min:5',
            'birthdate' => 'bail|required|date|',
            'status'=> 'bail|alpha|max:11|min:5',
            'delegation' => 'bail|required',
            'payment' => 'bail|required|alpha'
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
            'id.min' => 'La cédula debe tener un mínimo de 9 caracteres.',
            'id.unique' => 'Existe un miembro con la misma cédula.',
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
            'delegation.required' => 'Debe ingresar una delegación.',
            'civil_status.required' => 'Debe ingresar una dirección.',
            'civil_status.max' => 'La dirección debe tener un maximo de 10 caracteres.',
            'civil_status.min' => 'La dirección debe tener un minimo de 5 caracteres.',
            'birthdate.required' => 'Debe ingresar una fecha de nacimiento.',
            'birthdate.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'status.required' => 'Debe seleccionar un estado.',
            'status.max' => 'El estado debe tener un maximo de 11 caracteres.',
            'status.min' => 'El estado debe tener un minimo de 5 caracteres.',
            'payment.required' => 'Debe seleccionar un método de pago.'
        ];

        // dd($request->all());

        $validator = Validator::make( $request->all(), $rules, $message);
        if( $validator->fails() )
        {
            return redirect('/member/create')->withInput($request->all())
                                      ->withErrors($validator->errors());
        }

        $documentId = $request->input('document');

        Member::create([
            'name' => request('name'),
            'lastname' => request('lastname'),
            'id' => request('id'),
            'nationality' => request('nationality'),
            'civil_status' => request('civil_status'),
            'birthdate' => request('birthdate'),
            'email' => request('email'),
            'status' => request('status'),
            'gender' => request('gender'),
            'delegation_id' => request('delegation'),
            'payment' => request('payment')
        ]);

        $telephone = Telephone::create([
            'telephone' => request('telephone'),
            'member_id' => request('id')
        ]);

        $address = Address::create([
            'address' => request('address'),
            'member_id' => request('id'),
            'city_id' => request('city')
        ]);



        $member = Member::find(request('id'));

        foreach($documentId as $documentsId)
        {
            $member->document()->sync(array($documentsId => array('confirmed' => true)));
        }

        $member->telephone()->save($telephone);
        $member->address()->save($address);

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
        $members = DB::table('members')
                   ->leftJoin('telephones', 'members.id', '=', 'telephones.member_id')
                   ->leftJoin('addresses', 'members.id', '=', 'addresses.member_id')
                   ->leftJoin('cities', 'addresses.city_id', '=', 'cities.id')
                   ->leftJoin('delegations', 'delegations.id', '=', 'members.delegation_id')
                   ->select('members.name', 'members.lastname', 'members.id', 'members.nationality', 'members.civil_status', 'members.email',
                    'members.birthdate', 'members.gender', 'members.status', 'members.payment', 'telephones.telephone', 'addresses.address', 'cities.city',
                    'delegations.delegation')
                    ->where('members.id', '=', ''.$id)
                   ->get();

        $document = DB::table('members')
                    ->leftJoin('document_member', 'document_member.member_id', '=', 'members.id')
                    ->join('documents', 'documents.id', '=', 'document_member.document_id')
                    ->select('documents.document')
                    ->where('members.id', '=', ''.$id)
                    ->get();

        $member = $members[0];

        return view('member.show', compact('member', 'document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = DB::table('members')
                   ->leftJoin('telephones', 'members.id', '=', 'telephones.member_id')
                   ->leftJoin('addresses', 'members.id', '=', 'addresses.member_id')
                   ->leftJoin('cities', 'addresses.city_id', '=', 'cities.id')
                   ->leftJoin('delegations', 'delegations.id', '=', 'members.delegation_id')
                   ->select('members.name', 'members.lastname', 'members.id', 'members.nationality', 'members.civil_status', 'members.email',
                    'members.birthdate', 'members.gender', 'members.status','members.payment','telephones.telephone', 'addresses.address',
                    'addresses.city_id', 'members.delegation_id')
                    ->where('members.id', '=', ''.$id)
                   ->get();

        $document = DB::table('members')
                   ->leftJoin('document_member', 'document_member.member_id', '=', 'members.id')
                   ->join('documents', 'documents.id', '=', 'document_member.document_id')
                   ->select('documents.id')
                   ->where('members.id', '=', ''.$id)
                   ->get();

        $member = $members[0];

        $cities = City::all();

        $delegations = Delegation::all();

        $documents = Document::all();

        return view('member.edit', compact('member', 'cities', 'delegations', 'documents', 'document'));
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
        $rules = [
            'name' => 'bail|required|string|max:30|min:3',
            'lastname' => 'bail|required|string|max:30|min:3',
            'id' => 'bail|required|alpha_num|max:11|min:9',
            'nationality' => 'bail|required|alpha|max:20|min:4',
            'email' => 'bail|required|email|max:50|min:11',
            'telephone' => 'bail|required|alpha_dash|max:12|min:12',
            'address' => 'bail|required|string|max:70|min:10',
            'civil_status' => 'bail|required|alpha|max:10|min:5',
            'birthdate' => 'bail|required|date|',
            'status'=> 'bail|alpha|max:11|min:5',
            'delegation' => 'bail|required',
            'gender' => 'bail|required|max:1',
            'payment' => 'bail|required|alpha'
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
            'id.min' => 'La cédula debe tener un mínimo de 9 caracteres.',
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
            'civil_status.required' => 'Debe ingresar una dirección.',
            'civil_status.max' => 'La dirección debe tener un maximo de 10 caracteres.',
            'civil_status.min' => 'La dirección debe tener un minimo de 5 caracteres.',
            'birthdate.required' => 'Debe ingresar una fecha de nacimiento.',
            'birthdate.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'status.required' => 'Debe ingresar un estado.',
            'status.max' => 'El estado debe tener un maximo de 11 caracteres.',
            'status.min' => 'El estado debe tener un minimo de 6 caracteres.',
            'gender.required' => 'Debe ingresar un género.',
            'payment.required' => 'Debe seleccionar un método de pago.'
        ];

        $validator = Validator::make( $request->all(), $rules, $message);
        if( $validator->fails() )
        {
            return redirect()->back()->withInput($request->all())
                                      ->withErrors($validator->errors());
        }

        $documentId = $request->input('document');
        // dd($documentId  );


        $member = Member::find($id);
        $member->name = $request->input('name');
        $member->lastname = $request->input('lastname');
        $member->nationality = $request->input('nationality');
        $member->birthdate = $request->input('birthdate');
        $member->civil_status = $request->input('civil_status');
        $member->email = $request->input('email');
        $member->delegation_id = $request->input('delegation');
        $member->status = $request->input('status');
        $member->gender = $request->input('gender');
        $member->payment = $request->input('payment');

        $telephone = Telephone::where('member_id', $id);
        $telephone->telephone = $request->input('telephone');

        $address = Address::where('member_id', $id);
        $address->address = $request->input('address');
        $address->city_id = $request->input('city');

        $member->document()->sync($documentId);

        if( $member->save() )
        {
            return redirect('/member')->with('status', 'El miembro se ha actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect('/member')->with('status', 'Miembro Eliminado!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $member = DB::table('members')
                    ->leftJoin('telephones', 'members.id', '=', 'telephones.member_id')
                    ->select('members.name', 'members.lastname', 'members.id', 'telephones.telephone')
                    ->where('members.name', 'like', '%'.$search.'%')
                    ->orwhere('members.lastname', 'like', '%'.$search.'%')
                    ->orwhere('members.id', 'like', '%'.$search.'%')
                    ->paginate(6);

        return view('/member.list', compact('member'));
    }
}
