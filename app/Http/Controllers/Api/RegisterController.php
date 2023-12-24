<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request)
    {

        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:50|min:9',
            'course_id' => 'required|exists:courses,id',
            'duration_id' => 'required|exists:durations,id',
        ]);

        // Create a new registration
        $registration = Register::create($validated);

        return response()->json(['registration' => $registration], 201);
    }
}
