@extends('layouts.dashboard')


@section('content')
    <div class="container">
        <h1>Edit Duration</h1>

        <form action="{{ route('durations.update', $duration->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Include the _form.blade.php file here -->
            @include('durations._form', ['submitButtonText' => 'Update Duration'])
        </form>
    </div>
@endsection
