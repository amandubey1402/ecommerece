<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productmodel;
use App\Models\categorymodel;
class categoryproduct extends Controller
{
    function category($id){
        $cate=productmodel::where('category',$id)->get();
        return $cate;
    }
    //varities on home section header
    function varity(Request $request){
        $category=new categorymodel;
        $category->name=$request['name'];
        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/category', $fileName);
        $category->file = $fileName;
        $category->save();
    }
    function showallcatego(){
        return categorymodel::all();
    }
}
