<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $categories = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->title,
                'description' => $category->description,
                'image_url' => $category->image_url,
                'created_at' => $category->created_at,
                'updated_at' => $category->updated_at,
            ];
        });

        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No categories found.'], 404);
        }

        return response()->json(['categories' => $categories]);
    }

    public function show(Category $category)
    {

        // Check if there are courses
        if ($category->courses->isEmpty()) {
            return response()->json(['message' => 'No courses found for this category.'], 404);
        }

        // Transform the category to include the image_url attribute
        $transformedCategory = [
            'id' => $category->id,
            'title' => $category->title,
            'description' => $category->description,
            'image_url' => $category->image_url,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'courses' => $category->courses->map(function ($course) {
                return [
                    'id' => $course->id,
                    'title' => $course->title,
                    'description' => $course->description,
                    'image_url' => $course->image_url,
                    'price' => $course->price,
                    'currency' => $course->currency,
                    'cities' => $course->cities->map(function ($city) {
                        return [
                            'id' => $city->id,
                            'name' => $city->name,
                        ];
                    }),
                ];
            }),
        ];

        return response()->json(['category' => $transformedCategory]);
    }
}
