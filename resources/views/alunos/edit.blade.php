@extends('templates.principal')
@section('titlePage', 'Editar Aluno')

@section('content')
    <div class="container">
        <div class="row mt-1">
            <div class="col-2">
                <a class="btn btn-outline" href={{route('alunos.index')}}><i class="bi bi-arrow-90deg-left p-1"></i>Voltar</a>
            </div>
            <div class="col">
                <h1>Atualizar dados do Aluno</h1>
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
                <form action={{route('alunos.update', $aluno->id)}} method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{(old('nome')) !== null ? old('nome') : $aluno->nome}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="matricula">Matrícula:</label>
                        <input type="text" class="form-control" name="matricula" id="matricula" value={{(old('matricula') !== null ? old('matricula') : $aluno->matricula)}}>
                    </div>

            

                    <div class="form-group mb-2">
                        <label for="descricao">Descricao:</label>
                        <textarea name="descricao" id="descricao" class="form-control">{{(old('descricao')) !== null ? old('descricao') : $aluno->descricao}}</textarea>
                    </div>
                    @csrf
                    @method("PUT")
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection