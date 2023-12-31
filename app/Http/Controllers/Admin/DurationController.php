<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Course;
use App\Models\Duration;
use Illuminate\Http\Request;

class DurationController extends Controller
{
    public function index()
    {
        $durations = Duration::all();
        return view('durations.index', compact('durations'));
    }

    public function create()
    {
        $courses = Course::all();
        $cities = City::all();
        return view('durations.create', compact('courses', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',

            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after_or_equal:from',
        ]);

        Duration::create($request->all());

        return redirect()->route('durations.index')->with('success', 'Duration added successfully');
    }

    public function show(Duration $duration)
    {
        return view('durations.show', compact('duration'));
    }

    public function edit(Duration $duration)
    {
        $courses = Course::all();
        $cities = City::all();
        return view('durations.edit', compact('duration', 'courses', 'cities'));
    }

    public function update(Request $request, Duration $duration)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after_or_equal:from',
        ]);

        $duration->update($request->all());

        return redirect()->route('durations.index', $duration->id)->with('success', 'Duration updated successfully');
    }

    public function destroy(Duration $duration)
    {
        $duration->delete();

        return redirect()->route('durations.index')->with('success', 'Duration deleted successfully');
    }
}
