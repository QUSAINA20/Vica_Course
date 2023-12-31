@extends('layouts.dashboard')

@section('content')
    <h2>{{ isset($teacher) ? 'Edit teacher' : 'Create teacher' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($teacher) ? route('teachers.update', $teacher->id) : route('teachers.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($teacher))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ isset($teacher) ? $teacher->name : '' }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            @if (isset($teacher) && $teacher->image)
                <img src="{{ asset('storage/teacher_images/' . basename($teacher->image)) }}" alt="{{ $teacher->name }}"
                    class="mt-2 img-thumbnail" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($teacher) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
