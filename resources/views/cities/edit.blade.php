@extends('layouts.dashboard')

@section('content')
    <h2>{{ isset($city) ? 'Edit city' : 'Create city' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($city) ? route('cities.update', $city->id) : route('cities.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($city))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Name:</label>
            <input type="text" class="form-control" id="title" name="name"
                value="{{ isset($city) ? $city->name : '' }}" required>
        </div>


        <button type="submit" class="btn btn-primary">{{ isset($city) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
