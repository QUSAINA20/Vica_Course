@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Add Duration</h1>

        <form action="{{ route('durations.store') }}" method="POST">
            @csrf
            <!-- Include the _form.blade.php file here -->
            @include('durations._form', ['submitButtonText' => 'Add Duration'])
        </form>
    </div>
@endsection
