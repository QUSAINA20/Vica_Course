@extends('layouts.dashboard')


@section('content')
    <div class="container">
        <h1>Durations</h1>
        <a href="{{ route('durations.create') }}" class="btn btn-success mb-3">Add Duration</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>City</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($durations as $duration)
                    <tr>
                        <td>{{ $duration->course->title }}</td>
                        <td>{{ $duration->city->name }}</td>
                        <td>{{ $duration->date_from }}</td>
                        <td>{{ $duration->date_to }}</td>
                        <td>
                            <a href="{{ route('durations.edit', $duration->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('durations.destroy', $duration->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
