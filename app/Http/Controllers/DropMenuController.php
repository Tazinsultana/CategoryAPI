<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class DropMenuController extends Controller
{

    //     public function Index(Request $request){


    // // $products=Product::latest()->get();
    // $q=Product::query();

    // $categories=Category::latest()->pluck('title','id');

    // if($request->ajax()){
    //     $products=$q->where('category_id',$request->category)->get();

    //     return response()->json([
    //         'data'=>$products,
    //         'status'=>'success'
    //     ]);


    // }
    //    $products=$q->get();
    //         return view('DropMenu.index',compact('categories','products'));

    // }
    public function Index()
    {

        $categories = Category::where('is_active',true)->get();
        $products = Product::latest()->with(['category'])->get();

        return view('DropMenu.index', compact('categories', 'products'));
    }
    public function SelectProuct(Request $request)

    {
        // dd($request->all());

        $products = Product::where(function ($q) use ($request) {

                if(isset($request->category) && ($request->category != null))
                {
                    $q->whereIn('category_id', $request->category);
                }

            })
            ->orderBy('id', 'desc')->with(['category'])->get();

            dd($products);
        return response()->json([
            'data' => $products,
            'status' => 'success'


        ]);
    }
}
