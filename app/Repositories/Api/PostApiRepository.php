<?php

namespace App\Repositories\Api;

use App\Models\Post;

class PostApiRepository
{
    public function getAllWithFilters(array $filters = [])
    {

        return Post::with('category', 'author')
            ->when($filters['category'] ?? null, fn($q, $category) => $q->where('category_id', $category))
            ->when($filters['status'] ?? null, fn($q, $status) => $q->where('status', $status))
            ->when($filters['search'] ?? null, fn($q, $search) => $q->where('title', 'like', "%{$search}%"))
            ->latest()
            ->get();
    }
    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update(Post $post, array $data)
    {
        $post->update($data);
        return $post;
    }

    public function delete(Post $post)
    {
        return $post->delete();
    }
}
