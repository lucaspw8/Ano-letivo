<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::paginate(10);
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turmas = Turma::all();
        return view('alunos.create', compact("turmas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AlunoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        $turma = Turma::find($request->turma);
        if(isset($turma)){
            $dados = $request->all();
            $aluno = $turma->alunos()->create($dados);
            if($aluno){
                return redirect()->route('alunos.index')->with("msg-ok", "Aluno cadastrado com sucesso!");
            }        
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
        $aluno = Aluno::find($id);
        $turmas = $aluno->turmas()->orderBy('updated_at')->paginate(10);
       
        return view("alunos.show", compact('aluno', 'turmas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        $turmas = Turma::all();
        $turmasAluno = $aluno->turmas;
        return view('alunos.edit', compact('aluno', 'turmas', 'turmasAluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aluno = Aluno::find($id);
        $dados = $request->all();
           
        $resp = $aluno->update($dados);
        if($resp){
            return redirect()->route('alunos.index')->with('msg-ok', "Aluno atualizado com sucesso!");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        $resp = $aluno->delete();
       if($resp){
            return redirect()->route('alunos.index')->with('msg-ok', 'Aluno removido com sucesso!');
       }else{
            return redirect()->route('alunos.index')->with('msg-erro', 'Erro ao remover Aluno!');
       }
    }
}
