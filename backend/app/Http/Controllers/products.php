<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productmodel;
class products extends Controller
{
    function productdetail(Request $req){
        $product=new productmodel;
        $product->name=$req['name'];
        $product->desc=$req['desc'];
        $product->ldesc=$req['ldesc'];
        $product->price=$req['price'];
        $product->category=$req['category'];
        $product->brand=$req['brand'];
        $file = $req->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/product', $fileName);
        $product->file = $fileName;
        $product->save();
        if($product->save()){
            return response()->json('data submited');
        }   
        else{
            return response()->json('data not submited');
        }
    }
    function products(){
        return productmodel::all();
    }
    function productdata($id){
        $product=productmodel::where($id)->get();
        return $product;
    }
}
