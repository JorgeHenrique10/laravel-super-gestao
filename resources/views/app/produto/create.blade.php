@extends('app.master.layout')
@section('content')
    @if (isset($produto->id) && $produto->id != '')
        <h1> Produto - Editar</h1>
    @else
        <h1> Produto - Adicionar</h1>
    @endif
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.produto.create')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.produto.index')}}">Voltar</a></li>
        </ul>
    </div>
    <div>
        <span>{{$msg ?? ''}}</span>
        @if (isset($produto->id) && $produto->id != '')
        <form action="{{route('app.produto.update', ['produto'=> $produto->id])}}" method="POST">
            @csrf
            @method('PUT')
        @else
        <form action="{{route('app.produto.store')}}" method="POST">
            @csrf
        @endif
            {{$errors->has('nome') ? $errors->first('nome') : ''}}
            <select class="form-control mb-4" name="fornecedor_id">
                <option value="">Favor selecionar um Fornecedor</option>
                @foreach ($fornecedores as $fornecedor)
                    <option value="{{$fornecedor->id}}" {{$produto->fornecedor_id ?? old('fornecedor_id')  == $fornecedor->id ? 'selected' : ''}}>{{$fornecedor->nome}}</option>
                @endforeach
            </select>
            <input class="form-control mb-4" type="hidden" name="id" value="{{$produto->id ?? ''}}">
            {{$errors->has('nome') ? $errors->first('nome') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Nome" name="nome" value="{{$produto->nome ?? old('nome')}}">
            {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Descricao" name="descricao" value="{{$produto->descricao ?? old('descricao')}}">
            {{$errors->has('peso') ? $errors->first('peso') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Peso" name="peso" value="{{$produto->peso ?? old('peso')}}">
            {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
            <select class="form-control mb-4" name="unidade_id">
                <option value="">Favor selecionar uma Unidade</option>
                @foreach ($unidades as $unidade)
                    <option value="{{$unidade->id}}" {{$produto->unidade_id ?? old('unidade_id')  == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mb-4">Salvar</button>
        </form>
    </div>
@endsection
