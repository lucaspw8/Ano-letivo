@extends('templates.principal')
@section('titlePage', 'Nova Turma')

@section('content')
    <div class="container">
        <div class="row mt-1">
            <div class="col-2">
                <a class="btn btn-outline" href={{route('turmas.index')}}><i class="bi bi-arrow-90deg-left p-1"></i>Voltar</a>
            </div>
            <div class="col">
                <h1>Cadastro de Turma</h1>
            </div>
         
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{$erro}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('msg-erro'))
                    <div class="alert alert-danger">
                        <p>{{session('msg-erro')}}</p>
                    </div>
                @endif
                </div>
            <div class="col"></div>
        </div>
        
        <div class="row">
            <div class="col"></div>
            <div class="col-md-8"> 
                <form action={{route('turmas.store')}} method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" value={{old('nome')}}>
                    </div>

                    <div class="form-group">
                        <label for="escola">Escola:</label>
                        <select class="form-control" name="escola" id="escola">
                            <option value="">Defina a escola...</option>
                            @if (isset($escolas))
                                @foreach ($escolas as $escola)
                                    <option value={{$escola->id}}> {{$escola->nome}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="descricao">Descricao:</label>
                        <textarea name="descricao" id="descricao" class="form-control">{{old('descricao')}}</textarea>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection