@extends('templates.principal')

@section('titlePage', "Turmas")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Lista de Turmas</h1>
                
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
                <a href={{ route('turmas.create') }} class="btn btn-primary">Cadastrar Turma</a>
                @if (isset($turmas))
                <div class="table-responsive">
                    <table class="mt-2 table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col"># Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Escola</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($turmas as $turma)                   
                                <tr>
                                    <th scope="row">{{$turma->id}}</th>
                                    <td>{{$turma->nome}}</td>
                                    <td>{{$turma->escolas->nome}}</td>
                                    <td>{{$turma->descricao}}</td>
                                    <td class="text-center">
                                        <form action={{route('turmas.destroy', $turma->id)}} method="post">
                                            
                                            <a href={{ route('turmas.edit', $turma->id) }} class="btn btn-primary">
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

                {{ isset($turmas) ? $turmas->links() : ''}}
            </div>
        </div>
    </div>
@endsection