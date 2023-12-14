<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Society;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;


class SocietyPostController extends Controller
{
    public function create(Society $society) {
      return Inertia::render('Societies/Posts/CreatePost', compact('society')); 
    }
    public function store(StorePostRequest $request, Society $society) {
        $society->posts()->create([
            'user_id' => auth()->id(),
            'header' => $request->header,
            'url' => $request->url,
            'body' => $request->body,
        ]);

        return to_route('frontend.societies.show', $society->slug);
    }
}
