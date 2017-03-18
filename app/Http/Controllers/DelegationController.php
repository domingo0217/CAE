<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Delegation;

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
        $this->validate($request, [
            'delegation' => 'bail|required|max:50|unique:delegations'
        ]);

        Delegation::create($request->all());

        return redirect('/delegation')->with('status', 'Delegaci&oacute;n agregada!');
    }


    public function destroy($id)
    {
        $delegation = Delegation::find($id);

        $delegation->delete();

        return redirect()->back()->with('status', 'Delegaci&oacute;n eliminada!');
    }
}
