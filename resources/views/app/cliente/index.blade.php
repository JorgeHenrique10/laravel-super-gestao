@extends('app.master.layout')
@section('content')
    <h1> Cliente - Lista</h1>
    <div>
        <ul class="nav mb-4 mt-4 d-inline-flex">
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.cliente.create')}}">Novo</a></li>
            <li class="pe-4"> <a class="text-decoration-none text-dark" href="{{route('app.cliente.index')}}">Voltar</a></li>
        </ul>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->nome}}</td>
                <td class="d-inline-flex"> <a href="{{route('app.cliente.edit', ['cliente'=>$cliente->id])}}">Editar</a>|
                    <form id='form_{{$cliente->id}}'  action="{{route('app.cliente.destroy', ['cliente'=>$cliente->id])}}" method="post">
                        @csrf
                        @method('Delete')
                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Deletar</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$clientes->appends($request)->links()}}

@endsection
