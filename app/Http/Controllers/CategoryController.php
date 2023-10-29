<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::latest()->get();


        return view('Category.index', compact('category'));
    }

    // create
    public function addlist(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|unique:categories',

            ],
            [
                'title.required' => 'Title is requried',
                'title.unique' => 'Already Exists'
            ]
        );

        $title = $request->title;
        $active = $request->is_active == "true" ? true : false;
        // dd($active);
        Category::create([
            'title' => $title,
            'is_active' => $active

        ]);

        //  $category->save();
        return response()->json([
            'status' => 'success',

        ]);

    }
  // Edit
    public function Editlist(Request $request){
     $category=Category::findOrFail($request->id);
     return response()->json([

        'status'=> 'success',
        'data'=>$category,
     ]);



    }

    // update/edit
    public function updatelist(Request $request){
        // dd($request->all());
        $request->validate(
            [
                'title' => 'required|unique:categories,title,' .$request->id,

            ],
            [
                'title.required' => 'Title is requried',
                'title.unique' => 'Already Exists'
            ]
        );

        $title=$request->title;
         $active=$request->is_active == "true"? true:false;
        Category::findOrFail($request->id)->update([

            'title'=>$title,
            'is_active'=>$active
        ]);


        return response()->json([
            'status' => 'success',

        ]);
    }

    // for delete
    public function deletelist(Request $request){

        Category::find($request->del_id)->delete();
        return response()->json([
            'status' => 'success',

        ]);
    }


}
