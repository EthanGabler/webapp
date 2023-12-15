<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostShowResource extends JsonResource
{

public function toArray(Request $request): array{
    return [
        'id' => $this->id,
        'header' => $this->header,
        'body' => $this->body,
        'username' => $this->user->username,
        'slug' => $this->slug,
        'url' => $this->url,
    ];
}
}