<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){

        $product = Product::query();
        
        if(request('s')){
            $product->where('code_product', 'Like', '%' . request('s') . '%' )
            ->orWhere('name_product', 'Like', '%' . request('s') . '%' )
            ->orWhere('price', 'Like', '%' . request('s') . '%' )
            ->first();
        }
        $data = [

            'product' => $product->paginate(5),
            'total' => Category::paginate()->count()
            
            // 'product' => Product::has('category')->get() ,, jika tidak ingin data yang kosong tidak mau ditampilkan
        ];

        return view('admin-dashboard.product.index')->with($data);
    }

    public function storeView(){

        $data = [
            'category' => Category::all()
        ];

        return view('admin-dashboard.product.new-product')->with($data);
    }

    public function store(Request $request){

        $rules = [
            'name_product' => 'required|min:5|max:30|string',
            'code_product' => 'required|min:2',
            'category_id' => 'required',
            'price' => 'required|integer',
        ];

        Validator::make($request->all(), $rules)->validate();

        Product::create([
            'code_product' =>  Str::replace(" ", '-', strtolower($request->code_product)) ."-" . Str::random(10),
            'name_product' => $request->name_product,
            'category_id' => $request->category_id,
            'price' =>  $request->price
        ]);

        return redirect()->route('admin-product');

    }

    public function delete($code){
        $data = Product::where('code_product', $code)->first();

        if ($data == NULL) {
            return redirect()->route('admin-product');
        }

        $data->delete();

        return redirect()->route('admin-product');
    }

}
