<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addressmodel;
use App\Models\productmodel;
class address extends Controller
{
    function address(Request $req){
        $useraddress=new addressmodel;
        $useraddress->userid=$req['userid'];
        $useraddress->name=$req['name'];
        $useraddress->mobile=$req['mobile'];
        $useraddress->address1=$req['address1'];
        $useraddress->address2=$req['address2'];
        $useraddress->city=$req['city'];
        $useraddress->state=$req['state'];
        $useraddress->pincode=$req['pincode'];
        $useraddress->save();
    }
    function productaddress($id){
        $address= addressmodel::where('userid',$id)->get();
        return $address;
    }
}
