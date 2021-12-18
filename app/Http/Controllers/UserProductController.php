<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index($slug){

        $category = Category::where('slug', $slug)->first();
        $product = Product::where('category_id', $category->id)->get();

        $data = [
            'product' => $product,
            'category' => $category
        ];

        return view('user.product-list')->with($data);
    }
}
