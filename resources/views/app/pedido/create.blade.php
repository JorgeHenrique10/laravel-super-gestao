@extends('app.master.layout')
@section('content')
    @if (isset($pedido->id) && $pedido->id != '')
        <h1> Pedido - Editar</h1>
    @else
        <h1> Pedido - Adicionar</h1>
    @endif
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.pedido.create')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.pedido.index')}}">Voltar</a></li>
        </ul>
    </div>
    <div>
        <span>{{$msg ?? ''}}</span>
        @if (isset($pedido->id) && $pedido->id != '')
        <form action="{{route('app.pedido.update', ['pedido'=> $pedido->id])}}" method="POST">
            @csrf
            @method('PUT')
        @else
        <form action="{{route('app.pedido.store')}}" method="POST">
            @csrf
        @endif
        {{-- {{print_r($pedido)}} --}}
            {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}
            <select name="cliente_id" class="form-control mb-4">
                <option value="">Favor selecionar um cliente</option>
                @foreach ($clientes as $key => $cliente)
                    <option value="{{$cliente->id}}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mb-4">Salvar</button>
        </form>
    </div>
@endsection
