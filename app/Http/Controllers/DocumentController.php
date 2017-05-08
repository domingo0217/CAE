<?php

namespace cae\Http\Controllers;

use Illuminate\Http\Request;
use cae\Document;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::paginate(7);

        return view('document.list', compact('document'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'document.required' => 'Debe introducir el nombre del documento.',
            'document.unique' => 'Este documento ya existe.',
            'document.max' => 'El documento debe tener un maximo de 50 caracteres.'
        ];

        $rules = [
            'document' => 'bail|required|unique:documents|max:50'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        Document::create($request->all());

        return redirect('/document')->with('status', 'Documento Agregado!');
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
        $document = Document::find($id);

        return view('document.edit', compact('document'));
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
        $message = [
            'document.required' => 'Debe introducir el nombre del documento.',
            'document.max' => 'El documento debe tener un maximo de 50 caracteres.'
        ];

        $rules = [
            'document' => 'bail|required|max:50'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        $document = Document::find($id);
        $document->document = $request->input('document');

        if($document->save())
        {
            return redirect('/document')->with('status', 'Documento Actualizado!');
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
        $document = Document::find($id);
        $h = $document->member();
        if($h->count() == 0)
        {
            $document->delete();
            return redirect()->back()->with('status', 'Documento Eliminado!');
        }
        else
        {
            return redirect()->back()->with('statusNeg', 'Debe eliminar los miembros relacionados con este documento antes de borrarlo!');            
        }

    }
}
