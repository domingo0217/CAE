<?php

namespace cae\Http\Controllers;

use cae\Topic;
use cae\Assembly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topic = Topic::paginate(10);

        return view('topic.list', compact('topic'));
    }

    public function list(Assembly $assembly)
    {
        $topic = $assembly->topic()->get();

        // dd($topic);

        return view('topic.list', compact('topic', 'assembly'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Assembly $assembly)
    {
        return view('topic.create', compact('assembly'));
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
            'topic' => 'bail|required',
            'assembly_id' => 'bail|required'
        ];

        $message = [
            'topic.required' => 'Debe ingresar un tema.',
            'assembly_id.required' => 'No hay asamblea seleccionada.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        // dd($request->all());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->All())->withErrors($validator->errors());
        }
        else
        {

            Topic::create($request->all());
            $assembly_id = $request->input('assembly_id');

            return redirect('/listTopic/'.$assembly_id)->with('status', 'El tema ha sido creado.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \cae\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \cae\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topic.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \cae\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $rules = [
            'topic' => 'bail|required',
            'assembly_id' => 'bail|required'
        ];

        $message = [
            'topic.required' => 'Debe ingresar un tema.',
            'assembly_id.required' => 'No hay asamblea seleccionada.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        // dd($request->all());

        if($validator->fails())
        {
            return redirect()->back()->withInput($request->All())->withErrors($validator->errors());
        }
        else
        {

            $topic->update($request->all());
            $assembly_id = $request->input('assembly_id');

            return redirect('/listTopic/'.$assembly_id)->with('status', 'El tema ha sido actualizado.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \cae\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
