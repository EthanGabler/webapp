<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'society_id',
        'header',
        'body',
        'slug',
        'url',
    ];

    use HasFactory, Sluggable;
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'header'
            ]
        ];
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
