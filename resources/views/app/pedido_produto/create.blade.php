@extends('app.master.layout')
@section('content')
    @if (isset($pedido_produto->id) && $pedido_produto->id != '')
        <h1> Pedido - Editar</h1>
        <h3>Pedido: {{$pedido->id}}</h3>
        <h3>Cliente: {{$pedido->cliente->nome}}</h3>
    @else
        <h1> Adicionar Produto ao Pedido</h1>
        <h3>Pedido: {{$pedido->id}}</h3>
        <h3>Cliente: {{$pedido->cliente->nome}}</h3>
    @endif
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.pedido.create')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.pedido.index')}}">Voltar</a></li>
        </ul>
    </div>
    <div>
        <span>{{$msg ?? ''}}</span>

        <form action="{{route('app.pedido_produto.store', ['pedido'=>$pedido->id])}}" method="POST">
            @csrf
            {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
            <select name="produto_id" class="form-control mb-4">
                <option value="">Favor selecionar um produto</option>
                @foreach ($produtos as $key => $produto)
                    <option value="{{$produto->id}}" >{{$produto->nome}}</option>
                @endforeach
            </select>
            {{$errors->has('quantidade') ? $errors->first('quantidade') : ''}}
            <input type="number" class="form-control mb-4" name="quantidade" placeholder="Quantidade">

            <button type="submit" class="btn btn-primary mb-4">Adicionar</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data Inserção</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->pivot->quantidade}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->pivot->created_at->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <form method="POST" action="{{route('app.pedido_produto.destroy', ['pedido'=>$pedido->id, 'produto'=>$produto, 'pedido_produto'=>$produto->pivot->id ])}}" id="form_{{$produto->id}}">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
