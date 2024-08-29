<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_id;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productsController extends Controller
{
    public function home(){
        $products = product::all(); // 获取所有产品
        return view('home', ['products' => $products]); // 将产品传递给视图
    }

    public function cartlist(){
        $carts=Cart::where('u_id',Auth::id())->join("products","carts.p_id","=","products.id")->get();
        return view('cartlist', compact('carts'));
    }

    public function addcart(Request $request, $productId)
    {

        $product = Product::find($productId);
        $Cart_id=Cart_id::latest()->first();
       
        if (!$product) {
            return redirect('/')->with('error', 'Product not found');
        }

        // Check if the product is already in the cart
        $existingCart = Cart::where('u_id', Auth::id())
                            ->where('p_id', $productId)
                            ->where('c_id',$Cart_id->id)
                            ->first();

        if ($existingCart) {
            // If the product is already in the cart, update the quantity
            $existingCart->qty += $request->input('quantity', 1);
            $existingCart->save();
        } else {
            // Otherwise, create a new cart entry
            Cart::create([
                'u_id' => Auth::id(),
                'p_id' => $productId,
                'c_id'=> 0,
                'qty' => $request->input('quantity', 1),
                'c_status'=> 'pending',
            ]);
        }

        return redirect('/cartlist')->with('success', 'Product added to cart');
    }
}
