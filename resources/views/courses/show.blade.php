@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="mb-4">Course Details</h1>

        <ul class="list-group">
            <li class="list-group-item"><strong>Title:</strong> {{ $course->title }}</li>
            <li class="list-group-item"><strong>Category:</strong> {{ $course->category->title }}</li>
            <li class="list-group-item"><strong>Teacher:</strong> {{ $course->teacher->name }}</li>
            <li class="list-group-item"><strong>Duratopn:</strong>
                {{ $course->duration->from }}/{{ $course->duration->to }}
            </li>
            <li class="list-group-item"><strong>Description:</strong> {{ $course->description }}</li>
            <li class="list-group-item"><strong>Price:</strong> {{ $course->price }} {{ $course->currency }}</li>
            <li class="list-group-item"><strong>Cities:</strong>
                @foreach ($course->cities as $city)
                    {{ $city->name }},
                @endforeach
            </li>
            <!-- Add other details here -->
        </ul>
        <img src="{{ asset('storage/course_images/' . basename($course->image)) }}" alt="{{ $course->title }}"
            class="img-thumbnail mb-2" style="max-width: 200px;">

        <div class="mt-3">
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
            <!-- Add a delete form here if you want to implement delete action -->
        </div>
    </div>
@endsection
