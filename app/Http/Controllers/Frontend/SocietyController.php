<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\SocietyStoreRequest;
use App\Models\Society;
use App\Http\Resources\SocietyPostResource;

class SocietyController extends Controller
{
    public function show($slug) {
        $society = Society::where('slug', $slug)->first();
        $posts = SocietyPostResource::collection($society->posts()->paginate(10));
        return Inertia::render('Frontend/Societies/Show', compact('society', 'posts'));
    }
}
