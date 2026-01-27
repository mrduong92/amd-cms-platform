<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();

        return view('frontend.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->active()->firstOrFail();
        $otherServices = Service::where('id', '!=', $service->id)->active()->ordered()->limit(4)->get();

        return view('frontend.services.show', compact('service', 'otherServices'));
    }
}
