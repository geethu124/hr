@extends('todos\layout')

@section('content')
    <h1>Todos</h1>

    <table id="todos-table" class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->title }}</td>
                    <td>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('todos.create') }}" class="btn btn-primary">Add New Todo</a>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#todos-table').DataTable();
        });
    </script>
@endsection
