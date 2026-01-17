@extends('layouts.main_layout')

@section('content')
    <h6>Info do Tarefa</h6>

    <form method="POST" action="{{ route('tasks.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $task->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input value="{{ $task->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            Nome inválido
        @enderror
        <div class="mb-3">
            <label for="exampleInputDescriprition" class="form-label">Description</label>
            <input value="{{ $task->description }}" name="description" type="text" class="form-control"
                id="exampleInputDescriprition" aria-describedby="emailDescription">
        </div>

        <div class="mb-3">
            <label for="exampleInputUser_id" class="form-label">user_id</label>
            <input value="{{ $task->user_id }}" name="user_id" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>



        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
