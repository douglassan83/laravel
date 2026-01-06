@extends('layouts.main_layout')
@section('content')
    <h2> todas as tarefas</h2>

    <table class="table">
        <thead>
            <tr>
                {{-- aqui pode colocar o nome que preferir --}}
                {{-- colocado o mesmo da DB por questão didática --}}
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">status</th>
                <th scope="col">due at</th>
                <th scope="col">user id</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ dd($tasks) }}  --}}

            @foreach ($tasks as $task)
                <tr>
                    {{-- precisa ser o nome exato da coluna da DB --}}
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_at }}</td>
                    {{-- na coluna abaixo username é uma var da
                    função getAlltasks que recebe o nome do user
                    no lugar onde estava user_id original da tabela --}}
                    <td>{{ $task->username }}</td>
                    <td><a href="{{ route('tasks.view', $task->id) }}" class="btn btn-info">Ver</a></td>
                    <td><a href= "{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar</a></td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
