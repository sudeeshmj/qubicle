<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function update(User $user, Post $post)
    {
        return $user->id === $post->created_by;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->created_by;
    }
}
