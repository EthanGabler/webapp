<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Society;
use Inertia\Inertia;
use App\Http\Resources\PostShowResource;

class PostController extends Controller
{
   public function show($society_slug, $slug){
        $society = Society::where('slug', $society_slug)->first();
        $post = new PostShowResource(Post::where('slug', $slug)->first());
        return Inertia::render('Frontend/Posts/Show', compact('society', 'post'));
   }
}