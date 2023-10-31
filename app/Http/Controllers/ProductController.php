<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Index()
    {
        $categories=Category::where('is_active',true)->pluck('title','id');
// dd($categories);
        $products = Product::latest()->with(['category'])->get();
        // dd($products);
        return view('product.product_index', compact('products','categories'));
    }

    public function AddProduct(Request $request)
    {
        // dd($request->all());
        // $categories=Category::all();
        // return view('product.product_modal', compact('categories'));

        // $name = $request->name;
        // $product_cat = $request->product_category;

        // Product::create([
        //     'name' => $name,
        //     'product_category' => $product_cat,

        // ]);


        // $category->products()->create([
        //     'name' => $request->name,
        //     'product_category'=> $request->$category->title,

        // ]);
        // Product::create([
        //     'name'=> $request->name,
        //     'category_id'=>$request->category_id

        // ]);
        $category=Category::where('id',$request->category_id)->first();
        $category->products()->create([
            'name'=>$request->name,
            // 'category_id'=>$request->category_id


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
    //  dd($product);
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
        $product = $request->category_id;


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
            'category_id'=>$product
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

    public function Filtering(Request $request){

        // dd($request->all());
        // $category=Category::where('id',$request->category_id)->get();

        // dd($category);
      $products=Product::where('name','like','%'.$request->filtering.'%')
        // ->orWhere('category_id','like','%'.$request->filtering.'%')
        ->orWhereHas('category',function ($q) use ($request) {
            $q->where('title','like','%'.$request->filtering.'%');
        })
        ->orderBy('id','desc')->with(['category'])->get();

        // $category=Category::where('title','like','%'.$request->filtering.'%')
        // ->orWhere('category_id','like','%'.$request->filtering.'%')
        // ->orderBy('id','desc')->with(['products'])->get();


        return response()->json([
            'data'=> $products,
            // 'category'=> $category,
            'status'=>'success'
        ]);


    }




}
