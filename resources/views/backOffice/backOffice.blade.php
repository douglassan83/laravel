@extends('layouts.main_layout')
@section('content')
    @if (Auth::user()->user_type == 1)
        <div class="alert alert-warning" role="alert">
            CONTA DE ADMINISTRADOR AUTENTICADA!
        </div>

        <h2> Olá {{ Auth::user()->name }} </h2>
    @endif


    </body>

    </html>
@endsection
