<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Helpers\ApiResponseHelper;
use App\Http\Requests\Api\PostApiRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\Api\PostApiService;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\AuthorizationException;

class PostApiController extends Controller
{
    protected $postService;

    public function __construct(PostApiService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        try {
            $filters = $request->only(['category', 'status', 'search']);
            $posts = $this->postService->getAllPosts($filters);

            if ($posts->isEmpty()) {

                return ApiResponseHelper::success('No posts found.', 200,  $posts);
            }

            return ApiResponseHelper::success(
                'Posts fetched successfully.',
                200,
                PostResource::collection($posts),
            );
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return ApiResponseHelper::error('Failed to fetch posts.', 500);
        }
    }


    public function store(PostApiRequest $request)
    {
        try {
            $post = $this->postService->createPost($request->validated());

            return ApiResponseHelper::success('Post created successfully', 201, new PostResource($post));
        } catch (\Exception $e) {

            return ApiResponseHelper::error('Failed to create post.', 500);
        }
    }

    public function update(PostApiRequest $request, Post $post)
    {
        try {
            $this->authorize('update', $post);

            $post = $this->postService->updatePost($post, $request->validated());

            return ApiResponseHelper::success('Post updated successfully', 200, new PostResource($post));
        } catch (AuthorizationException $e) {
            return ApiResponseHelper::error('You are not authorized to update this post.', 403);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Failed to update post.', 500);
        }
    }

    public function destroy(Post $post)
    {
        try {
            $this->authorize('delete', $post);

            $this->postService->deletePost($post);

            return ApiResponseHelper::success('Post deleted successfully');
        } catch (AuthorizationException $e) {
            return ApiResponseHelper::error('You are not authorized to delete this post.', 403);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Failed to delete post.', 500);
        }
    }
}
