@extends('layouts.dashboard')

@section('content')
    <h2>Category - {{ $category->title }}</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->title }}</h5>
            <p class="card-text">{{ $category->description }}</p>
            <img src="{{ asset('storage/category_images/' . basename($category->image)) }}" alt="{{ $category->title }}"
                class="img-thumbnail mb-2" style="max-width: 200px;">



            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
            <!-- Add a delete form here if you want to implement delete action -->
        </div>
    </div>
@endsection
