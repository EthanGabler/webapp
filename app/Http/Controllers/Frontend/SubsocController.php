<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\SocietyStoreRequest;
use App\Models\Society;

class SubsocController extends Controller
{
    public function show($slug) {
        $subsoc = Society::where('slug', $slug)->first();

        return Inertia::render('Subsoc/Show', compact('subsoc'));
    }
}
