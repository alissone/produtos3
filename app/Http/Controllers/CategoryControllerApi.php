<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends AbstractCrudController
{
    public function __construct(Category $model)
    {

        $this->model = Category::class;
    }
}
