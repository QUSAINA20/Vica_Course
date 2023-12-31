@extends('layouts.dashboard')

@section('content')
    <h2>Teacher - {{ $teacher->name }}</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $teacher->name }}</h5>

            <img src="{{ asset('storage/teacher_images/' . basename($teacher->image)) }}" alt="{{ $teacher->name }}"
                class="img-thumbnail mb-2" style="max-width: 200px;">



            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary">Edit</a>
            <!-- Add a delete form here if you want to implement delete action -->
        </div>
    </div>
@endsection
