<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getRouteKeyName() {
        return 'slug';
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
