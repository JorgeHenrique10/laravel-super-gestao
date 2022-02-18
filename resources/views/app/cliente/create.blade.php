@extends('app.master.layout')
@section('content')
    @if (isset($cliente->id) && $cliente->id != '')
        <h1> Cliente - Editar</h1>
    @else
        <h1> Cliente - Adicionar</h1>
    @endif
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.cliente.create')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.cliente.index')}}">Voltar</a></li>
        </ul>
    </div>
    <div>
        <span>{{$msg ?? ''}}</span>
        @if (isset($cliente->id) && $cliente->id != '')
        <form action="{{route('app.cliente.update', ['cliente'=> $cliente->id])}}" method="POST">
            @csrf
            @method('PUT')
        @else
        <form action="{{route('app.cliente.store')}}" method="POST">
            @csrf
        @endif
            {{$errors->has('nome') ? $errors->first('nome') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Nome" name="nome" value="{{$cliente->nome ?? old('nome')}}">
            <button type="submit" class="btn btn-primary mb-4">Salvar</button>
        </form>
    </div>
@endsection
