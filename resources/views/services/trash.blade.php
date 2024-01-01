@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">Trash</h2>
        <a href="{{ route('services.index') }}" class="btn btn-primary mb-3">Back to Services</a>

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
                @forelse ($trashedServices as $trashedService)
                    <tr>
                        <td>{{ $trashedService->id }}</td>
                        <td>{{ $trashedService->title }}</td>
                        <td>{{ $trashedService->description }}</td>
                        <td>
                            <form action="{{ route('services.restore', $trashedService->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Restore</button>
                            </form>

                            <form action="{{ route('services.force-delete', $trashedService->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to permanently delete this service?')">Force
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No services in the trash.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
