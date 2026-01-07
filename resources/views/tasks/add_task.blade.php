@extends('layouts.main_layout')

@section('content')
<h2>Nova Tarefa</h2>

<form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <input type="text" name="nome" placeholder="Nome tarefa" class="form-control">
    <textarea name="descricao" placeholder="Descrição" class="form-control"></textarea>

    <!-- DB USERS -->
    <select name="user_id" class="form-control">
        <option value="">Selecione User</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Criar</button>
</form>
@endsection
