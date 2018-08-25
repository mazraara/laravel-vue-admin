<?php

namespace App\Http\Controllers\Api\V1;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category as CategoryResource;


class CategoryController extends Controller
{
    public function index()
    {
        return new CategoryResource(Category::with([])->get());
    }

    public function show($id)
    {
        $company = Category::with([])->findOrFail($id);

        return new CategoryResource($company);
    }
}
