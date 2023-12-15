<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store($society_slug, Post $post) {
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request()->input('body'),

        ]);
        return back();
    }
}
