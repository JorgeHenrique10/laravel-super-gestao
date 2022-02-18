@extends('app.master.layout')
@section('content')
    <h1> Fornecedor - Lista</h1>
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.fornecedor.index')}}">Consulta</a></li>
        </ul>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">UF</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($fornecedores as $fornecedor)
            <tr>
                <td>{{$fornecedor->nome}}</td>
                <td>{{$fornecedor->email}}</td>
                <td>{{$fornecedor->uf}}</td>
                <td> <a href="{{route('app.fornecedor.edit', ['id'=>$fornecedor->id])}}">Editar</a>/<a href="{{route('app.fornecedor.delete', ['id'=>$fornecedor->id])}}">Deletar</a>  </td>
            </tr>
            <tr>
                <td colspan="6">
                    <h3 style="align-items: center; text-align: center;">Listar Produtos</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" >Id</th>
                                <th scope="col" >Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $fornecedor->produto as $produto)
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
    <nav aria-label="Page navigation example">
        {{$fornecedores->appends($request)->links()}}
    </nav>
@endsection
