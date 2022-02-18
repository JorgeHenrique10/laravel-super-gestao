@extends('app.master.layout')
@section('content')
<h1> Produto - Show</h1>
<div>
    <ul class="nav mb-4 mt-4 d-inline-flex">
        <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.produto.create')}}">Novo</a></li>
        <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.produto.index')}}">Voltar</a></li>
    </ul>
</div>
<div>
    <table class="table">
        <tbody>
            <tr>
                <td scope="col">Nome</td>
                <td scope="col">{{$produto->nome}}</td>
            </tr>
            <tr>
                <td scope="col">Descricao</td>
                <td scope="col">{{$produto->descricao}}</td>
            </tr>
            <tr>
                <td scope="col">Peso</td>
                <td scope="col">{{$produto->peso}}</td>
            </tr>
            <tr>
                <td scope="col">Unidade ID</td>
                <td scope="col">{{$produto->unidade_id}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
