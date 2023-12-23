@extends('layouts.dashboard')

@section('content')
    <h2>{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($category))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ isset($category) ? $category->title : '' }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ isset($category) ? $category->description : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            @if (isset($category) && $category->image)
                <img src="{{ asset('storage/category_images/' . basename($category->image)) }}" alt="{{ $category->title }}"
                    class="img-thumbnail mb-2" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
