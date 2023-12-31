<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course)
    {

        $course->load(['duration', 'cities']);

        // Check if the course exists
        if (!$course) {
            return response()->json(['message' => 'Course not found.'], 404);
        }

        // Transform the course data to include durations and city information
        $transformedCourse = [
            'id' => $course->id,
            'title' => $course->title,
            'description' => $course->description,
            'image_url' => $course->image_url,
            'price' => $course->price,
            'currency' => $course->currency,
            'teacher' => $course->teacher->name,
            'from' => $course->duration->from,
            'to' => $course->duration->to,
            'cities' => $course->cities->map(function ($city) {
                return [
                    'id' => $city->id,
                    'name' => $city->name,
                ];
            }),
        ];

        return response()->json(['course' => $transformedCourse]);
    }
}
