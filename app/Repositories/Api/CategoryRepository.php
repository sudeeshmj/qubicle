<?php

namespace App\Repositories\Api;

use App\Models\Category;

class CategoryRepository
{
    public function getAll()
    {
        return Category::latest()->get();
    }
}
