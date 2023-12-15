<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Society;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;



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
    public function edit(Society $society, Post $post) {
        return Inertia::render('Societies/Posts/Edit', compact('society', 'post'));
    }
    public function update(StorePostRequest $request, Society $society, Post $post) {
        $post->update($request->validated());
        return to_route('frontend.societies.show', $society->slug);

    }
    public function destroy(Society $society, Post $post) {
        $post->delete();
        return to_route('frontend.societies.show', $society->slug);
    }
}
