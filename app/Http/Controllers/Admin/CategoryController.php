<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index(){

        $data = [
            'category' => Category::all(),
            'product' => Product::all()
        ];  
        return view('admin-dashboard.category.index')->with($data);
    }

    public function storeView(){
        return view('admin-dashboard.category.new-category');
    }

    public function store(Request $request){

        $rules = [
            'name_category' => 'required|min:4|max:30|string'
    ];

        Validator::make($request->all(), $rules)->validate();


        Category::create([

            'code_category' => "category-" . Str::random(10),
            'name_category' => $request->name_category
        ]);

        return redirect()->route('admin-category');

    }
    
    public function editView(Request $request, $code){
        
        $data = [
            'category' => Category::where('code_category', $code)->first(),
        ];

        if ($data['category'] == NULL) {
            return redirect()->route('admin-category');
        }

        return view('admin-dashboard.category.edit')->with($data);

    }

    public function update(Request $request, $code){

        $rules = [
            'name_category' => 'required|min:5|max:30|string'
        ];

        Validator::make($request->all(), $rules)->validate();

        $ct = Category::where('code_category', $code)->first();

        $ct->code_category = $ct->code_category;
        $ct->name_category = $request->name_category;

        $ct->save();

        return redirect()->route('admin-category');

    }

    public function delete($code){

        $data = Category::where('code_category', $code)->first();

        if ($data == NULL) {
            return redirect()->route('admin-category');
        }

        $data->delete();

        return redirect()->route('admin-category');

    }

}
