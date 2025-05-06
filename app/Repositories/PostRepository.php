<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function all()
    {
        return Post::with(['category', 'tags', 'author'])->latest()->paginate(10);
    }

    public function find($id)
    {
        return Post::with(['category', 'tags'])->findOrFail($id);
    }

    public function create(array $data)
    {
        $post = Post::create($data);
        // $post->tags()->sync($data['tags'] ?? []);
        return $post;
    }

    public function update(Post $post, array $data)
    {
        $post->update($data);
        //   $post->tags()->sync($data['tags'] ?? []);
        return $post;
    }

    public function delete(Post $post)
    {
        // $post->tags()->detach();
        return $post->delete();
    }
}
