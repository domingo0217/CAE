<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Charge;
use cae\Member;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charge = Charge::paginate(6);

        return view('charge.list', compact('charge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('charge.addCharge');
    }

    public function create2($id)
    {
        $charge = Charge::find($id);
        $query = DB::table('charge_member')->select('member_id')
                                           ->where('charge_id', $id);

        $members = DB::table('members')->select('id', 'name', 'lastname')
                                       ->whereNotIn('id', $query)
                                       ->get();

        return view('charge.addChargeMember', compact('charge','members'));
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
            'charge' => 'bail|required|max:50|min:3|unique:charges'
        ];

        $message = [
            'charge.required' => 'Debe introducir un cargo.',
            'charge.max' => 'El cargo debe tener un maximo de 50 caracteres.',
            'charge.min' => 'El cargo debe tener un minimo de 3 caracteres.',
            'charge.unique' => 'El cargo ya existe.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect('/charge/create')->withInput($request->all())->withErrors($validator->errors());
        }

        Charge::create($request->all());

        return redirect('/charge')->with('status', 'Cargo agregado!');
    }

    public function store2(Request $request, $id)
    {
        $rules = [
            'member' => 'required',
            'starting_date' => 'bail|required|date',
            'ending_date' => 'bail|required|date'
        ];

        $message = [
            'member.required' => 'Debe seleccionar un miembro.',
            'starting_date.required' => 'Debe introducir una fecha de inicio.',
            'starting_date.date' => 'Debe introducir una fecha Valida.',
            'ending_date.required' => 'Debe introducir una fecha de finalizacion.',
            'ending_date.date' => 'Debe introducir una fecha Valida.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $member = $request->input('member');
            $charge = Charge::find($id);
            $starting_date = Carbon::parse($request->input('starting_date'));
            $ending_date = Carbon::parse($request->input('ending_date'));

            if($ending_date->gt($starting_date))
            {
                $charge->member()->attach([$member => ['starting_date' => $starting_date, 'ending_date' => $ending_date] ] );

                return redirect('/charge/'.$id)->with('status', 'Se ha asignado el cargo al miembro!');
            }
            else
            {
                return redirect()->back()->withInput($request->all())->withErrors($validator->errors())
                                 ->with('statusNeg', 'La fecha de finalizacion no debe ser igual o menor que la fecha de inicio.');;
            }

        }
    }

    public function show($id)
    {
        $charge = Charge::find($id);

        // dd($charges->member);

        return view('charge.show', compact('charge'));
    }


    public function destroy($id)
    {
        $charge = Charge::find($id);
        $h = $charge->member();
        if($h->count() == 0)
        {
            $charge->delete();
            return redirect()->back()->with('status', 'Cargo Eliminado!');
        }
        else
        {
            return redirect()->back()->with('statusNeg', 'Existe un miembro con este cargo, favor eliminar el miembro y luego proceda a eliminar el cargo!');
        }

    }

    public function edit($id)
    {
        $charge = Charge::find($id);
        return view('charge.edit', compact('charge'));
    }

    public function edit2($idM, $idC)
    {
        $charge = DB::table('members')
                      ->rightJoin('charge_member', 'charge_member.member_id', '=', 'members.id')
                      ->select('members.id', 'members.name', 'members.lastname', 'charge_member.starting_date', 'charge_member.ending_date', 'charge_member.charge_id')
                      ->where('charge_id', $idC)
                      ->get();

        // dd($charge[0]);

        return view('charge.editMember', compact('charge'));
    }

    public function update(Request $request)
    {
        $message = [
            'charge.required' => 'Debe introducir un cargo',
            'charge.max' => 'El cargo debe tener un maximo de 50 caracteres.',
            'charge.unique' => 'Ya se ha registrado este cargo.',
            'charge.min' => 'El cargo debe tener un minimo de 3 caracteres.'
        ];

        $rules = [
            'charge' => 'bail|required|max:50|min:3|unique:charges'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        $id = $request->input('id');
        $charge = Charge::find($id);
        $charge->charge = $request->input('charge');

        if($charge->save())
        {
            return redirect('/charge')->with('status', 'Cargo Actualizado!');
        }
    }

    public function update2(Request $request, $idM, $idC)
    {
        $rules = [
            'starting_date' => 'bail|required|date',
            'ending_date' => 'bail|required|date'
        ];

        $message = [
            'starting_date.required' => 'Debe introducir una fecha de inicio.',
            'starting_date.date' => 'Debe introducir una fecha Valida.',
            'ending_date.required' => 'Debe introducir una fecha de finalizacion.',
            'ending_date.date' => 'Debe introducir una fecha Valida.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        else
        {
            $starting_date = Carbon::parse($request->input('starting_date'));
            $ending_date = Carbon::parse($request->input('ending_date'));
            if($ending_date->gt($starting_date))
            {
                $attributes = array('starting_date' => $starting_date, 'ending_date' => $ending_date);
                Member::find($idM)->charge()->updateExistingPivot($idC, $attributes);
                return redirect('/charge/'.$idC)->with('status', 'Miembro Editado');
            }
            else
            {
                return redirect()->back()->withInput($request->all())->withErrors($validator->errors())
                                 ->with('statusNeg', 'La fecha de finalizacion no debe ser igual o menor que la fecha de inicio.');
            }

        }
    }
}
