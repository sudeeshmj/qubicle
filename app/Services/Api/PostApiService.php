<?php

namespace App\Services\Api;

use App\Models\Post;
use App\Models\User;
use App\Repositories\Api\PostApiRepository;

class PostApiService
{
    protected $postRepository;

    public function __construct(PostApiRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts($filters = [])
    {

        return $this->postRepository->getAllWithFilters($filters);
    }
    public function createPost(array $data)
    {
        $data['created_by'] =  auth()->user()->id;
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
