@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="mb-4">Courses</h1>

        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Create Course</a>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>City</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->category->title }}</td>
                        <td>{{ $course->cities()->first()->name }}</td>
                        <td>{{ $course->price }} {{ $course->currency }}</td>
                        <td>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
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
