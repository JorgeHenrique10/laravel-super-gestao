@extends('app.master.layout')
@section('content')
    <h1> Fornecedor - Consultar</h1>
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.fornecedor.index')}}">Consulta</a></li>
        </ul>
    </div>
    <div>
        <form action="{{route('app.fornecedor.listar')}}" method="get">
            @csrf
            <input class="form-control mb-4" type="hidden" name="id">
            <input class="form-control mb-4" type="text" placeholder="Nome" name="nome">
            <input class="form-control mb-4" type="text" placeholder="Email" name="email">
            <input class="form-control mb-4" type="text" placeholder="UF" name="uf">
            <button type="submit" class="btn btn-primary mb-4">Pesquisar</button>
        </form>
    </div>
@endsection
