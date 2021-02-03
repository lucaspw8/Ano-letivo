@extends('templates.principal')
@section('titlePage', 'Escolas')
@section('content')
    
    <div class="container">
        <h1>Lista de Escolas</h1>
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
        <div class="row">
            <div class="col-md-12">
                <a href={{ route('escolas.create') }} class="btn btn-primary">Cadastrar Escola</a>
                @if ($escolas)
                <div class="table-responsive">
                    <table class="mt-2 table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col"># Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($escolas as $escola)                   
                                <tr>
                                    <th scope="row">{{$escola->id}}</th>
                                    <td>{{$escola->nome}}</td>
                                    <td>{{$escola->descricao}}</td>
                                    <td class="text-center">
                                        <form action={{route('escolas.destroy', $escola->id)}} method="post">
                                            
                                            <a href={{ route('escolas.edit', $escola->id) }} class="btn btn-primary">
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

                {{$escolas->links()}}
            </div>
        </div>
    </div>
@endsection