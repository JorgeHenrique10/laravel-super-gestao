@extends('site.master.layout')

@section('content')
<h1>Contato</h1>
@component('site.componentes.formulario_contato', ['motivo_contatos' => $motivo_contatos])

@endcomponent
@endsection
