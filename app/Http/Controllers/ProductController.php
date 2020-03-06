<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Product;
use App\Order;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showad(){
        $user = auth()->user();
        $categories = Category::all();
        return view('admininfo.pages.newad', compact('user','categories'));
    }

    public function storeProduct(Request $request){

        $validatedData = $request->validate([
            'entitlement' => 'required',
            'info' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'cat_id' => 'required'
        ]);
        $products = Product::create([
            'entitlement' => request('entitlement'),
            'info' => request('info'),
            'quantity' => request('quantity'),
            'price' => request('price'),
            'cat_id' => request('cat_id'),
        ]);
        return redirect ('/allproducts');
    }

    public function allProducts(){
        $products = Product::all();
        $user = auth()->user();
        return view('admininfo.pages.allproducts', compact('user','products'));
    }

    public function deleteProduct(Product $product){
        $product->delete();{

            return redirect('/allproducts');
        }
    }


    public function updateProduct(Product $product, Request $request){
        $validatedData = $request->validate([
            'entitlement' => 'required',
            'info' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
        ]);
        Product::where('id', $product->id)->update($request->except(['_token', 'img']));
        return redirect('/allproducts');
    }

    public function updateForm(Product $product){
        $categories = Category::all();
        $products = Product::all();
        $user = auth()->user();
        return view('admininfo.pages.updateproduct',['product' => $product], compact('user','categories', 'products'));
    }

    public function newOrder(){
        $user = auth()->user();
        return view('admininfo.pages.neworder', compact('user'));
    }

}
