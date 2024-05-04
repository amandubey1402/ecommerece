<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cartmodel;
use App\Models\productmodel;
class cartController extends Controller
{
    function storecart(request $req){
        $cart=new cartmodel;
        $cart->userid=$req['userid'];
        $cart->productid=$req['productid'];
        $cart->qty=$req['qty'];
        $cart->save();
    }
    function cartproduct($id){
        $cart=cartmodel::where('userid',$id)->get();
        $array=[];
        foreach($cart as $products)
        {
            $product = productModel::where('id', $products->productid)->get();
            $array[]=$product;
        }
        $data=compact("cart","array");
        return response()->json($data);
    }
    function deletecart($id){
        $row=cartmodel::where('productid',$id)->first();
        $row->delete();
        return response()->json("product deleted");
    }
}
