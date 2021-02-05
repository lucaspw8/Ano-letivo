<?php

namespace App\Http\Controllers;

use App\Http\Requests\EscolaRequest;
use App\Models\Escola;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escolas = Escola::paginate(10);
        return view('escolas.index', compact('escolas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('escolas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EscolaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscolaRequest $request)
    {
        $data = $request->all();
        
        $response = Escola::create($data);

        if($response){
            return redirect()->route("escolas.index")->with("msg-ok", "Escola cadastrada com sucesso!");
        }else{
            return redirect()->back()->with("msg-erro", "Erro ao cadastrar Escola!");
        }
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
        $escola = Escola::find($id);
        if($escola){
            return view('escolas.edit', compact('escola'));
        }else{
            return redirect()->route('escolas.index')->with('msg-erro', "Escola de código {$id} não encontrada!");
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EscolaRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EscolaRequest $request, $id)
    {
        $data = $request->all();
        $escola = Escola::find($id);

        $resp = $escola->update($data);
        
        if($resp){
            return redirect()->route('escolas.index')->with('msg-ok', "Escola editada com sucesso!");
        }else{
            return redirect()->back()->with('msg-erro', "Erro ao editar!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escola $escola)
    {
        if($escola->delete()){
            return redirect()->route('escolas.index')->with('msg-ok', "Escola deletada com sucesso!");
        }else{
            return redirect()->route('escolas.index')->with('msg-erro', "Erro ao deletar Escola!");
        }
    }
}
