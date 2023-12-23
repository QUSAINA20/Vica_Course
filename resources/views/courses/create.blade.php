@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create Course</h1>

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Include the shared form partial -->
            @include('courses._form', ['submitButtonText' => 'Create Course'])
        </form>
    </div>
@endsection
