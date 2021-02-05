@extends('templates.principal')

@section('titlePage', "Alunos")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Lista de Alunos</h1>
                
                @if (session('msg-ok') || session('msg-erro'))
                    @if (session('msg-ok'))
                        <div class="alert alert-success">
                    <p>{{session('msg-ok')}}</p>
                    @else
                    <div class="alert alert-danger">
                    <p>{{session('msg-erro')}}</p>
                    @endif
                          
                    </div>
                @endif
            </div>      
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href={{ route('alunos.create') }} class="btn btn-primary">Cadastrar Aluno</a>
                @if (isset($alunos))
                <div class="table-responsive">
                    <table class="mt-2 table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col"># Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Matrícula</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody >
                            @foreach ($alunos as $aluno)                   
                                <tr>
                                    <th scope="row">{{$aluno->id}}</th>
                                    <td>{{$aluno->nome}}</td>
                                    <td>{{$aluno->matricula}}</td>
                                    <td>{{$aluno->descricao}}</td>
                                    <td  class="text-center text-nowrap">
                                        <form action={{route('alunos.destroy', $aluno->id)}} method="post">
                                            <a href={{ route('alunos.show', $aluno->id) }} class="btn btn-primary">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            <a href={{ route('alunos.edit', $aluno->id) }} class="btn btn-primary">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            @csrf
                                            @method("DELETE")

                                            <button class="btn btn-danger" 
                                            type="submit" 
                                            onclick="return confirm('Deseja excluir esse registro?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach                       

                        </tbody>
                      </table>
                    </div>
                @endif

                {{ isset($alunos) ? $alunos->links() : ''}}
            </div>
        </div>
    </div>
@endsection