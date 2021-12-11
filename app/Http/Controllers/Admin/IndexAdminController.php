<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexAdminController extends Controller
{
    public function index(){

        $data = [
            'category' => Category::paginate()->count(),
            'product' => Product::paginate()->count()
        ];

        return view('admin-dashboard.index')->with($data);
    }

}
