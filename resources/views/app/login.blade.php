@extends('site.master.layout')

@section('content')
@component('app.componentes.formulario_login', ['erro' => $erro])

@endcomponent
@endsection
