@extends('layouts.main_layout')

@section('content')
    <h6>Info da task</h6>
    <p>Name: {{ $task->name }}</p>
    <p>Status: {{ $task->status }}</p>
     
@endsection
