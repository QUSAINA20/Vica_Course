@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">Services</h2>
        <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Create Service</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
