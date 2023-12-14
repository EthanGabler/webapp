<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{

    protected $fillable = [
        'post_id',
        'user_id',
        'body',
    ];

    use HasFactory;
    public function posts() {
        return $this->belongsTo(Post::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
