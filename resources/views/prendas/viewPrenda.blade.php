@extends('layouts.main_layout')

@section('content')
    <h6>Info da Prenda</h6>
    <p>Nome: {{ $prenda->nome }}</p>
    <p>Valor gasto: {{ $prenda->valor_gasto }}</p>

@endsection
