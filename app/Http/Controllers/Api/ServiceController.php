<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        $services = $services->map(function ($service) {
            return [
                'id' => $service->id,
                'title' => $service->title,
                'description' => $service->description,
                'image_url' => $service->image_url,
                'created_at' => $service->created_at,
                'updated_at' => $service->updated_at,
            ];
        });

        if ($services->isEmpty()) {
            return response()->json(['message' => 'No services found.'], 404);
        }

        return response()->json(['services' => $services]);
    }
}
