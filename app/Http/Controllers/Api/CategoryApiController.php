<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\Api\CategoryService;
use App\Helpers\ApiResponseHelper;

class CategoryApiController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();

        if ($categories->isEmpty()) {
            return ApiResponseHelper::success('No categories found.', 200, []);
        }

        return ApiResponseHelper::success('Categories fetched successfully.', 200, CategoryResource::collection($categories));
    }
}
