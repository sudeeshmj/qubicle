<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $repo)
    {
        $this->postRepository = $repo;
    }

    public function getAllPosts()
    {
        return $this->postRepository->all();
    }

    public function getPost($id)
    {
        return $this->postRepository->find($id);
    }

    public function storePost(array $data)
    {
        $data['created_by'] = auth()->id();
        return $this->postRepository->create($data);
    }

    public function updatePost(Post $post, array $data)
    {
        return $this->postRepository->update($post, $data);
    }

    public function deletePost(Post $post)
    {
        return $this->postRepository->delete($post);
    }
}
