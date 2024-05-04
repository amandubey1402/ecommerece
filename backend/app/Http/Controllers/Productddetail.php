<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productmodel;
class Productddetail extends Controller
{
    function productdetail($id){
        $detail=productmodel::where('id',$id)->get();
        return response()->json($detail);
    }
}
