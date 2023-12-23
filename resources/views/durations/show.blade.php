@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Duration Details</h1>

        <ul class="list-group">
            <li class="list-group-item"><strong>Course:</strong> {{ $duration->course->title }}</li>
            <li class="list-group-item"><strong>City:</strong> {{ $duration->city->name }}</li>
            <li class="list-group-item"><strong>Date From:</strong> {{ $duration->date_from }}</li>
            <li class="list-group-item"><strong>Date To:</strong> {{ $duration->date_to }}</li>
            <!-- Add other details here -->
        </ul>

        <div class="mt-3">
            <a href="{{ route('durations.edit', $duration->id) }}" class="btn btn-primary">Edit</a>
            <!-- Add a delete form here if you want to implement delete action -->
        </div>
    </div>
@endsection
