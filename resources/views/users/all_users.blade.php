@extends('layouts.main_layout')
@section('content')
    <h3>Olá, aqui estão todos os Users</h3>


    <h5>lista de todos os users de forma estática {definido num array sem base de dados}</h5>



    <h1> O email do cesae é {{ $cesaeEmail }}</h1>

    <h2> {{ $cesaeInfo['name'] }} , {{ $cesaeInfo['email'] }} , {{ $cesaeInfo['address'] }} </h2>

    <ul>
        @foreach ($students as $student)
            <li>{{ $student['name'] }} , {{ $student['email'] }} </li>
        @endforeach

    </ul>


    {{-- tabela BOOTSTRAP (TABLE ROW) --}}

    <h5> User que são carregado da base de dados {tabela de users} </h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">NIF</th>
                <th></th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($users) }} usado para verificar no navegador qual é a forma que os dados estão vindo antes de carrega-los --}}
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nif }}</td>
                    <td><a href="{{ route('users.view', $user->id) }}" class="btn btn-info">Ver</a></td>
                    <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
