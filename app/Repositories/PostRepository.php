<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function all()
    {
        return Post::with(['category', 'author'])->latest()->paginate(10);
    }

    public function find($id)
    {
        return Post::with(['category'])->findOrFail($id);
    }

    public function create(array $data)
    {
        $post = Post::create($data);

        return $post;
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
    public function getPublishedPosts()
    {
        return Post::with('author')
            ->where('status', 'published')
            ->latest()
            ->get();
    }
    public function findBySlug(string $slug): ?Post
    {
        return Post::where('slug', $slug)->with('author')->first();
    }
}
