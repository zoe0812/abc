<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function home(){
        $products = product::all(); // 获取所有产品
        return view('home', ['products' => $products]); // 将产品传递给视图
    }

    public function cartlist(){
        return view('cartlist');
    }
}
