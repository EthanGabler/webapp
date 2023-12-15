<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Society;
use Inertia\Inertia;
use App\Http\Resources\PostShowResource;
use Pages\Frontend\Posts\Show;
use App\Http\Resources\CommentResource;

class PostController extends Controller
{
   public function show($society_slug, $slug){
        $post = new PostShowResource(Post::with('comments')->where('slug', $slug)->first());
        $society= Society::where('slug', $society_slug)->first();
        return Inertia::render('Frontend/Posts/Show', compact('society', 'post'));
   }
}