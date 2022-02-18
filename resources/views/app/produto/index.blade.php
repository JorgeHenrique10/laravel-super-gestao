@extends('app.master.layout')
@section('content')
    <h1> Produto - Lista</h1>
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.produto.create')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.produto.index')}}">Voltar</a></li>
        </ul>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Fornecedor</th>
            <th scope="col">Fornecedor Email</th>
            <th scope="col">Peso</th>
            <th scope="col">Unidade Id</th>
            <th scope="col">Altura</th>
            <th scope="col">Comprimento</th>
            <th scope="col">Largura</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->fornecedor->nome}}</td>
                <td>{{$produto->fornecedor->email}}</td>
                <td>{{$produto->peso}}</td>
                <td>{{$produto->unidade_id}}</td>
                <td>{{$produto->produtoDetalhe->altura ?? ''}}</td>
                <td>{{$produto->produtoDetalhe->comprimento ?? ''}}</td>
                <td>{{$produto->produtoDetalhe->largura ?? ''}}</td>
                <td class="d-inline-flex"> <a href="{{route('app.produto.show', ['produto'=> $produto->id])}}">Visualizar</a>|<a href="{{route('app.produto.edit', ['produto'=>$produto->id])}}">Editar</a>|
                    <form id='form_{{$produto->id}}'  action="{{route('app.produto.destroy', ['produto'=>$produto->id])}}" method="post">
                        @csrf
                        @method('Delete')
                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Deletar</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$produtos->appends($request)->links()}}

@endsection
