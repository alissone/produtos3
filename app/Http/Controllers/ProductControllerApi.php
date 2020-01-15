<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends AbstractCrudController
//class ProductController extends Controller
{
    public function __construct(Product $model)
    {

        $this->model = Product::class;
    }
}
