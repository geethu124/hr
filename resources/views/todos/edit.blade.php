<!-- resources/views/todos/edit.blade.php -->
@extends('todos\layout')
@section('content')
<h1>Edit Todo</h1>

<form action="{{ route('todos.update', $todo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $todo->title }}">
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description">{{ $todo->description }}</textarea>
    <br>
    <label for="completed">Completed:</label>
    <input type="checkbox" id="completed" name="completed" {{ $todo->completed ? 'checked' : '' }}>
    <br>
    <button type="submit">Update Todo</button>
</form>
@endsection
