@extends('layouts.dashboard')

@section('content')
    <h2>Service - {{ $service->title }}</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $service->title }}</h5>
            <p class="card-text">{{ $service->description }}</p>
            <img src="{{ asset('storage/service_images/' . basename($service->image)) }}" alt="{{ $service->title }}"
                class="img-thumbnail mb-2" style="max-width: 200px;">



            <a href="{{ route('categories.edit', $service->id) }}" class="btn btn-primary">Edit</a>
            <!-- Add a delete form here if you want to implement delete action -->
        </div>
    </div>
@endsection
