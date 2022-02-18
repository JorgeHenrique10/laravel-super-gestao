@extends('app.master.layout')
@section('content')
    <h1> Pedido - Lista</h1>
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.pedido.create')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.pedido.index')}}">Voltar</a></li>
        </ul>
    </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($pedidos as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->cliente->nome}}</td>
                <td class="d-flex justify-content-center" style="width: 100%;"> <a href="{{route('app.pedido_produto.create', ['pedido'=> $pedido->id])}}">Adicionar Produto</a>|<a href="{{route('app.pedido.edit', ['pedido'=>$pedido->id])}}">Editar</a>|
                    <form id='form_{{$pedido->id}}'  action="{{route('app.pedido.destroy', ['pedido'=>$pedido->id])}}" method="post">
                        @csrf
                        @method('Delete')
                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Deletar</a>
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <span> <strong> Produtos </strong></span>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido->produtos as $produto)
                                <tr>
                                    <td>{{$produto->id}}</td>
                                    <td>{{$produto->nome}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$pedidos->appends($request)->links()}}

@endsection
