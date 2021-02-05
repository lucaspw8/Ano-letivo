<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use App\Models\Escola;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = Turma::paginate(10);
        return view('turmas.index', compact('turmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolas = Escola::all();
        return view('turmas.create', compact('escolas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TurmaRequest; $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurmaRequest $request)
    {
        
        $escola = Escola::find($request->escola);
        if(isset($escola)){
            $dados = $request->all();
            $resp = $escola->turmas()->create($dados);

            if($resp){
                return redirect()->route('turmas.index')->with("msg-ok", "Turma cadastrada com sucesso!");
            }
        }else{
            return redirect()->route('turmas.create')->with("msg-erro", "Erro, defina a Escola que a turma pertence!");
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
        $turma = Turma::find($id);
        if(isset($turma)){
            $escolas = Escola::all();

            return view('turmas.edit', compact('turma', 'escolas'));
        }else{
            return redirect()->route('turmas.index')->with('msg-erro', 'Código da Turma inválido!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TurmaRequest;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TurmaRequest $request, $id)
    {
        $turma = Turma::find($id);
        if(isset($turma)){
            $dados = $request->all();
            //Só irá fazer o processo se a escola nova for diferente da cadastrada
            if($turma->id_escolas != $dados['escola']){
                $turma->escolas()->dissociate();
                $escola = Escola::find($dados['escola']);
                $turma->escolas()->associate($escola);
            }      

            $resp = $turma->update($dados);
            if($resp){
                return redirect()->route('turmas.index')->with('msg-ok', "Turma atualizada com sucesso!");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma)
    {
       $resp = $turma->delete();
       if($resp){
            return redirect()->route('turmas.index')->with('msg-ok', 'Turma removida com sucesso!');
       }else{
            return redirect()->route('turmas.index')->with('msg-erro', 'Erro ao remover Turma!');
       }
    }
}
