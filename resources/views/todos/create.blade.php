
@extends('todos\layout')
@section('content')

<h1>Create New Todo</h1>

<form action="{{ route('todos.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title">
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>
    <br>
    <button type="submit">Create Todo</button>
</form>
@endsection
