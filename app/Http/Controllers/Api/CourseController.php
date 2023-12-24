<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        // Load the 'durations' relationship with 'city' for the course
        $course->load('durations.city');

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
            'durations' => $course->durations->map(function ($duration) {
                return [
                    'id' => $duration->id,
                    'date_from' => $duration->date_from,
                    'date_to' => $duration->date_to,
                    'city' => [
                        'id' => $duration->city->id,
                        'name' => $duration->city->name,
                    ],
                ];
            }),
        ];

        return response()->json(['course' => $transformedCourse]);
    }
}
