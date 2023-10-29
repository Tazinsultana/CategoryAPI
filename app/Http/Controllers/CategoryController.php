<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $page=0;
        $item=10;
        $todo = Category::latest()->skip($page*$item)->take($item)->get();
        // $todo = Category::latest()->get();

        // total item  count
        $total_item=Category::count();
        // total possible pages
        $total_page=(int)ceil($total_item/10);
        return view('Category.index', compact('todo','total_page'));
    }

    // create
    public function addlist(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|unique:todolists',

            ],
            [
                'title.required' => 'Title is requried',
                'title.unique' => 'Already Exists'
            ]
        );
        //  $todo = new Todolist();
        //  $todo->title=$request->title;
        //  $todo->is_active=$request->is_active ? true:false;
        $title = $request->title;
        $active = $request->is_active == "true" ? true : false;
        // dd($active);
        Category::create([
            'title' => $title,
            'is_active' => $active

        ]);

        //  $todo->save();
        return response()->json([
            'status' => 'success',

        ]);

    }

    public function Editlist(Request $request){
     $todo=Category::findOrFail($request->id);
     return response()->json([

        'status'=> 'success',
        'data'=>$todo,
     ]);



    }

    // update/edit
    public function updatelist(Request $request){
        // dd($request->all());
        $request->validate(
            [
                'title' => 'required|unique:todolists,title' .$request->up_id,

            ],
            [
                'title.required' => 'Title is requried',
                'title.unique' => 'Already Exists'
            ]
        );

        $title=$request->title;
         $active=$request->is_active == "true"? true:false;
         Todolist::findOrFail($request->id)->update([

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
    public function SearchList(Request $request ){

        $page=$request->page;
        $item=10;

        $todo=Category::where('title','like','%'.$request->search.'%')
        ->orderBy('id','desc')->skip($page*$item)->take($item)->get();

        // page list
        $total_count=Category::where('title','like','%'.$request->search.'%')->count();
        $total_page=(int)ceil($total_count/10);

            return response()->json([
               'data'=>$todo,
               'total_page'=>$total_page
            ]);


    }


}
