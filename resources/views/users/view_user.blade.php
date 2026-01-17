@extends('layouts.main_layout')

@section('content')
    <h6>Info do User</h6>

    <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data"> {{-- rota para atualizar usuario no momento do click do botao do form --}}

        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input value="{{ $user->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            Nome inválido
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input value="{{ $user->email }}" disabled name="email" type="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nif</label>
            <input value="{{ $user->nif }}" name="nif" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input value="{{ $user->address }}" name="address" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
    
        <label for="exampleInputEmail1" class="form-label">Foto do usuario</label>
        <br>
        <input type="file" name="photo" accept="image/*"">
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
