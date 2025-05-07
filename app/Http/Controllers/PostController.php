<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\Support\Facades\Log;
use Exception;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $service)
    {
        $this->postService = $service;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        try {
            $this->postService->storePost($request->validated());
            return redirect()->route('posts.index')->with('success', 'Post created successfully.');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        try {
            $this->postService->updatePost($post, $request->validated());
            return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
        } catch (Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Post updation failed!');
        }
    }

    public function destroy(Post $post)
    {

        try {

            $this->postService->deletePost($post);

            return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
        } catch (Exception $e) {

            return redirect()->route('posts.index')->with('error', 'Delete operation failed. Please try again.');
        }
    }
}
