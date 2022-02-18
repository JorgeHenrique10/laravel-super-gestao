@extends('site.master.layout')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1>Principal</h1>
    </div>
    <div class="col-sm-6">
        @component('site.componentes.formulario_contato', ['motivo_contatos'=>$motivo_contatos])

        @endcomponent
    </div>
</div>
@endsection
