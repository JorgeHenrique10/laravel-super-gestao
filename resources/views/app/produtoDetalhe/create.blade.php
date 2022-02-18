@extends('app.master.layout')
@section('content')
    @if (isset($produtoDetalhe->id) && $produtoDetalhe->id != '')
        <h1> ProdutoDetalhe - Editar</h1>
    @else
        <h1> ProdutoDetalhe - Adicionar</h1>
    @endif
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.produto.create')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.produto.index')}}">Voltar</a></li>
        </ul>
    </div>
    <div>
        <span>{{$msg ?? ''}}</span>
        @if (isset($produtoDetalhe->id) && $produtoDetalhe->id != '')
        <form action="{{route('app.produtodetalhe.update', ['produto_detalhe'=> $produtoDetalhe->id])}}" method="POST">
            @csrf
            @method('PUT')
        @else
        <form action="{{route('app.produtodetalhe.store')}}" method="POST">
            @csrf
        @endif
            <input class="form-control mb-4" type="hidden" name="id" value="{{$produtoDetalhe->id ?? ''}}">
            {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
            <select name="produto_id" class="form-control mb-4">
                <option value="">Favor Selecionar Produto</option>
                @foreach ($produtos as $produto)
                <option value="{{$produto->id}}" {{$produtoDetalhe->id ?? old('produto_id')  == $produto->id ? 'selected' : ''}}>{{$produto->nome}}</option>
                @endforeach
            </select>
            {{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Comprimento" name="comprimento" value="{{$produtoDetalhe->comprimento ?? old('comprimento')}}">
            {{$errors->has('largura') ? $errors->first('largura') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Largura" name="largura" value="{{$produtoDetalhe->largura ?? old('largura')}}">
            {{$errors->has('altura') ? $errors->first('altura') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Altura" name="altura" value="{{$produtoDetalhe->altura ?? old('altura')}}">
            <select class="form-control mb-4" name="unidade_id">
                <option value="">Favor selecionar uma Unidade</option>
                @foreach ($unidades as $unidade)
                    <option value="{{$unidade->id}}" {{$produtoDetalhe->unidade_id ?? old('unidade_id')  == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mb-4">Salvar</button>
        </form>
    </div>
@endsection
