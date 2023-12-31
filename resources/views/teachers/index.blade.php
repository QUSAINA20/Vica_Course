@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">teachers</h2>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Create teacher</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>

                        <td>
                            <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
