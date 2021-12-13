<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view('index');
    }

    public function home(){

        $data = [

            'category' => Category::all(),

        ];

        return view('home')->with($data);
    }
}
