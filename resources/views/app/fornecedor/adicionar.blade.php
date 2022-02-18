@extends('app.master.layout')
@section('content')
    <h1> Fornecedor - Adicionar</h1>
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.fornecedor.index')}}">Consulta</a></li>
        </ul>
    </div>
    <div>
        <span>{{$msg ?? ''}}</span>
        <form action="{{route('app.fornecedor.salvar')}}" method="post">
            @csrf
            <input class="form-control mb-4" type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
            {{$errors->has('nome') ? $errors->first('nome') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Nome" name="nome" value="{{$fornecedor->nome ?? old('nome')}}">
            {{$errors->has('email') ? $errors->first('email') : ''}}
            <input class="form-control mb-4" type="text" placeholder="Email" name="email" value="{{$fornecedor->email ?? old('email')}}">
            {{$errors->has('uf') ? $errors->first('uf') : ''}}
            <input class="form-control mb-4" type="text" placeholder="UF" name="uf" value="{{$fornecedor->uf ?? old('uf')}}">
            <button type="submit" class="btn btn-primary mb-4">Salvar</button>
        </form>
    </div>
@endsection
