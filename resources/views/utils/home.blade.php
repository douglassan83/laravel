@extends('layouts.main_layout')
@section('content')
    @if ($surname)
        


        <h5>Olá {{ $surname }}</h5>
        <img src="{{ asset('images/doug-modelo-removebg-preview.png') }}" alt="" class="image">
    @else
        <h6>Olá Utilizador</h6>
        <img src="{{ asset('images/nophoto.jpg') }}" alt="" class="image">
    @endif

    <h3 class="hero">Home Page do {{ $surname ? $surname : 'escola' }}</h3>
    <img src="{{ asset('images/logo-laravel-256.png') }}" alt="">

    <ul>
        <li><a href="{{ route('prendas.all') }}">Prendas de Natal</a></li>
        <li><a href="{{ route('tasks.all') }}">Todas as tarefas</a></li>



        <li><a href="{{ route('utils.hello') }}">olá mundo</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar Users</a></li>
        <li><a href="{{ route('users.all') }}">All Users</a></li>

        <li><a href="{{ route('turma.name', ['nomeTurma' => 'Laravel']) }}">Nome da turma</a></li>


        {{-- alterar o codigo do nomeTurma qdo tiver base de dados --}}
    </ul>
    <br>
    <br>
@endsection
