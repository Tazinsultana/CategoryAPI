<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Index(){

        $products=Product::latest()->get();
        return view('product.product_index',compact('products'));
    }

    public function AddProduct(Request $request){

        $name = $request->name;
      $product_cat=$request->product_category;
        // dd($active);
        Product::create([
            'name' => $name,
            'product_cat' => $ $product_cat

        ]);


        return response()->json([
            'status' => 'success',

        ]);

    }
}
