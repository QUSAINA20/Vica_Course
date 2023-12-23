@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">Cities</h2>
        <a href="{{ route('cities.create') }}" class="btn btn-success mb-3">Create city</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>
                            <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this city?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
