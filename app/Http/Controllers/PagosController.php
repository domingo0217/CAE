<?php

namespace cae\Http\Controllers;

use cae\member;
use cae\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
  {
$member=member::all();
  $pago=Pago::paginate(5);
   return view('Pagos.list')->with("pago",$pago)->with("member", $member);

}
    public function create()
    {
        $member = member::all();
       

        return View('Pagos.Create')->with("member", $member);
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
         
         
            'fecha_pago' => 'bail|required|date|',
           

        $message = [
            
           
           
            'fecha_pago.required' => 'Debe ingresar una fecha de pago.',
            'fecha_pago.date' => 'La fecha  debe ser una fecha válida.',
            
        ]];

        $validator = Validator::make( $request->all(), $rules, $message);
        if( $validator->fails() )
        {
            return redirect('/Pagos/create')->withInput($request->all())
                                      ->withErrors($validator->errors());
        }

       
            
    

       
        Pago::create([
            'monto' => request('monto'),
            'fecha_pago' => request('fecha_pago'),
            'id' => request('id'),
           
        ]);


        $Pagos = Pago::find(request('id'));

        $member = $Pagos->member()->save($member);
       
        return redirect('/Pagos')->with('status', 'El Pago se ha Registrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function show($id)
    {
         
    $member=member::all();
  $pago=Pago::paginate(5);
   return view('Pagos.list')->with("pago",$pago)->with("member", $member);


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
