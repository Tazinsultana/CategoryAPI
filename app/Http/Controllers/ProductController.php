<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Index()
    {

        $products = Product::latest()->get();
        return view('product.product_index', compact('products'));
    }

    public function AddProduct(Request $request)
    {
        // dd($request->all());

        $name = $request->name;
        $product_cat = $request->product_category;

        Product::create([
            'name' => $name,
            'product_category' => $product_cat,

        ]);


        return response()->json([
            'status' => 'success',

        ]);
    }
    public function Update(Request $request)
    {
        // dd($request->product);
        // dd($request->all());

        $name = $request->name;
        $category = $request->products;


        //         $product=Product::find($request->id);

        // $product->update([

        //     'name'=>$name,
        //     'product_category'=>$category
        // ]);


        // Product::find($request->id)?->update([
        //     'name'=>$name,
        //     'product_category'=>$category
        // ]);




        // $product = Product::where('name', $request->name)->latest()->first();
        // // dd($product);

        // $product->update([

        //     'name' => $name,
        //     'product_category' => $category
        // ]);

        Product::where('id',$request->id)->update([
            'name'=>$name,
            'product_category'=>$category
        ]);


        return response()->json([

            'status' => 'success'
        ]);
    }

    public function Delete(Request $request){
        // dd($request->all());
        Product::where('id',$request->id)->delete();
        return response()->json([
            'status'=> 'success'
        ]);
    }


    public function EditProduct(Request $request){
        // dd($request->all());
       $product= Product::where('id',$request->id)->select('id','name','product_category')->first();


       return response()->json([
        'status'=> 'success',

        'data'=>$product
       ]);
    }

}
