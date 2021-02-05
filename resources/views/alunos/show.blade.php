@extends('templates.principal')

@section('titlePage', "Detalhes do Aluno")
@section('content')
    <div class="container">
        <div class="row mt-1">
            <div class="col-2">
                <a class="btn btn-outline" href={{route('alunos.index')}}><i class="bi bi-arrow-90deg-left p-1"></i>Voltar</a>
            </div>
            <div class="col">
                <h1>Detalhes do Aluno</h1>
            </div>
         
        </div>

        <div class="row mt-4">
            <div class="col-md-2">
                <h5>Nome:</h5>
            </div>
            <div class="col-md-10 fs-5">
                <p>{{$aluno->nome}}</p>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-2">
                <h5>Matrícula:</h5>
            </div>
            <div class="col-md-10 fs-5">
                <p>{{$aluno->matricula}}</p>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-2">
                <h5>Turmas inscritas:</h5>
            </div>
            <div class="col-md-10 fs-6">
                @if (isset($turmas))
                <div class="table-responsive">
                    <table class="mt-2 table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                              <th scope="col"># Código</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Escola</th>
                              
                            </tr>
                        </thead>
                        <tbody class="text-nowrap">
                            @foreach ($turmas as $turma)
                                <tr>
                                    <th scope="col">{{$turma->id}}</th>
                                    <td>{{$turma->nome}}</td>
                                    <td>{{$turma->escolas->nome}}</td>
                                </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                    {{ isset($turmas) ? $turmas->links() : ''}}
                </div>
                @endif
                
            </div>
        </div>

        <div class="row ">
            <div class="col-md-2">
                <h5>Descrição:</h5>
            </div>
            <div class="col-md-10 fs-5">
                <p class="">{{$aluno->descricao}}</p>
            </div>
        </div>
    </div>
@endsection