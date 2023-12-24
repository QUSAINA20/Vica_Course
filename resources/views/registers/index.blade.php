@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="mb-4">Registers</h1>



        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registers as $register)
                    <tr>
                        <td>{{ $register->id }}</td>
                        <td>{{ $register->first_name }}</td>
                        <td>{{ $register->last_name }}</td>
                        <td>{{ $register->email }}</td>
                        <td>{{ $register->phone }}</td>
                        <td>{{ $register->course->title }}</td>
                        <td>{{ $register->duration->city->name }}</td>

                        <td>
                            <form action="{{ route('registers.destroy', $register->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
