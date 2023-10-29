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

    // for edit

    public function EditProduct(Request $request){
        // dd($request->all());
    //    $product= Product::where('id',$request->id)->get();
     $product=Product::find($request->id);
       return response()->json([
        'status'=> 'success',
        'data'=>$product
       ]);
    }


// For Update
    public function Update(Request $request)
    {
        // // dd($request->product);
        // dd($request->all());

        $name = $request->name;
        $product = $request->products;


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
            'product_category'=>$product
        ]);


        return response()->json([

            'status' => 'success'
        ]);
    }
// For DELETE
    public function Delete(Request $request){
        // dd($request->all());
        Product::where('id',$request->id)->delete();
        return response()->json([
            'status'=> 'success'
        ]);
    }




}
