<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Category;

class CategoryController extends Controller
{
    public function Index(Request $request){
$categories=new Category();
$categories->title = $request->input['title'];
$categories->is_active = $request->input['is_active'];
$categories->save();
return response()->json($categories);

    }

}
