@extends('layouts.dashboard')


@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Course</h1>

        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Include the shared form partial -->
            @include('courses._form', ['submitButtonText' => 'Update Course'])
        </form>
    </div>
@endsection
