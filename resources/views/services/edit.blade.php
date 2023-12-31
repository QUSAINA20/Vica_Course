@extends('layouts.dashboard')

@section('content')
    <h2>{{ isset($service) ? 'Edit Service' : 'Create Service' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($service))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ isset($service) ? $service->title : '' }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ isset($service) ? $service->description : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            @if (isset($service) && $service->image)
                <img src="{{ asset('storage/service_images/' . basename($service->image)) }}" alt="{{ $service->title }}"
                    class="mt-2 img-thumbnail" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($service) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
