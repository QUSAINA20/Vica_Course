<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');
        $cityId = $request->input('city_id');

        $courses = Course::with(['category', 'cities'])
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($cityId, function ($query) use ($cityId) {
                $query->whereHas('cities', function ($cityQuery) use ($cityId) {
                    $cityQuery->where('city_id', $cityId);
                });
            })
            ->get();

        $categories = Category::all();
        $cities = City::all();
        return view('courses.index', compact('courses', 'categories', 'cities'));
    }



    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        return view('courses.create', compact('categories', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255|unique:courses',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|in:USD,EUR,GBP',
            'cities' => 'required|array|exists:cities,id',
        ]);


        $imagePath = $request->file('image')->store('public/course_images');

        $course = Course::create([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'price' => $request->input('price'),
            'currency' => $request->input('currency'),
        ]);

        $course->cities()->sync($request->input('cities'));

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        $cities = City::all();
        return view('courses.edit', compact('course', 'categories', 'cities'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|in:USD,EUR,GBP',
            'cities' => 'required|array|exists:cities,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/course_images');
            $course->update(['image' => $imagePath]);
        }

        // Update other fields as needed
        $course->update([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'currency' => $request->input('currency'),
        ]);
        $course->cities()->sync($request->input('cities'));

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
