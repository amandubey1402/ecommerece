<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderproduictmodel;
use App\Models\addressmodel;
use App\Models\productmodel;
class ordercontroller extends Controller
{
    function orderproduct(Request $req){
        $order=new orderproduictmodel;
        $order->userid=$req['userid'];
        $order->productid=$req['productid'];
        $order->qty=$req['qty'];
        $order->save();
        if($order->save()){
            return response()->json('data succesfully saved');
        }
        else{
            return response()->json('data not saved');
        }
    } 
    function showorder($id){
        $orderproduct= orderproduictmodel::where('userid',$id)->get();
            foreach($orderproduct as $order){
                $product=productmodel::where('id',$order->productid)->get();
                $array[]=$product;
        }
        return response()->json($array);
    }
    function deleteaddress($id){
        $deleteaddress=addressmodel::where('id',$id)->delete();
        return $deleteaddress;
    }
    function deleteproduct($id){
        $deleteproduct=orderproduictmodel::where('productid',$id)->delete();
        return $deleteproduct;
    }
}
