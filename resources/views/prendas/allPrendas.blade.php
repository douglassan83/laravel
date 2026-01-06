@extends('layouts.main_layout')

@section('content')
    <h6>Info da prendas</h6>

    <h5> prendas que são carregado da base de dados {tabela prendas} </h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor Previsto</th>
                <th scope="col">Pessoa que recebe</th>
                <th scope="col">Valor Gasto</th>
                <th scope="col">Valor diferença</th>

                <th></th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($users) }} usado para verificar no navegador qual é a forma que os dados estão vindo antes de carrega-los --}}
            @foreach ($prendas as $prenda)
                <tr>
                    <th scope="row">{{ $prenda->id }}</th>
                     <td>{{ $prenda->nome }}</td>
                     <td>{{ $prenda->valor_previsto }}</td>
                     <td>{{ $prenda->username}}</td>
                     <td>{{ $prenda->valor_gasto }}</td>
                     <td>{{ $prenda->valor_previsto - $prenda->valor_gasto }}</td>


                      <td><a href="{{ route('prendas.view', $prenda->id) }}" class="btn btn-info">Ver</a></td>
                     <td><a href="{{ route('prendas.delete', $prenda->id) }}" class="btn btn-danger">Apagar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


