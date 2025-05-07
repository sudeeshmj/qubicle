<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'slug'      => $this->slug,
            'body'      => $this->body,
            'status'    => $this->status,
            'category'  => $this->category->name ?? null,
            'created_by' => $this->author->name ?? null,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
