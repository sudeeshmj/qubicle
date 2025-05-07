<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->all();
    }

    public function create(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function find($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function update(Category $category, array $data)
    {
        return $this->categoryRepository->update($category, $data);
    }

    public function delete(Category $category)
    {
        return $this->categoryRepository->delete($category);
    }
}
