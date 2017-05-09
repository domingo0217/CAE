<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Member;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pdf.listado_reporte");
    }


      public function crearPDF($datos,$vistaurl,$tipo)
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }


    public function crear_reporte_usuario_activo($tipo){

     $vistaurl="pdf.reporte_por_miembros_activos";
    $member = DB::table('members')->where([
    ['status', '=', 'activo'], ])->get();

     return $this->crearPDF($member, $vistaurl,$tipo);
      }

       public function crear_reporte_usuario_pasivo($tipo){

     $vistaurl="pdf.reporte_por_miembros_pasivos";
    $member = DB::table('members')->where([
    ['status', '=', 'pasivo'], ])->get();

     return $this->crearPDF($member, $vistaurl,$tipo);
      }


       public function crear_reporte_todos($tipo){

     $vistaurl="pdf.reporte_por_todos";
    $member = DB::table('members')->get();

     return $this->crearPDF($member, $vistaurl,$tipo);
      }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
