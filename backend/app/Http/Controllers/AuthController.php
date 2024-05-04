<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usermodel;
class AuthController extends Controller
{
    function Register(Request $req){
        $userdata=new usermodel;
        $userdata->name=$req['name'];
        $userdata->email=$req['email'];
        $userdata->password=$req['password'];
        $userdata->dob=$req['dob'];
        if($req->hasfile('file')){
            $file = $req->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/userpic', $fileName);
            $userdata->file = $fileName;
            $userdata->save();
        }
        $userdata->save();
        return response()->json(["status",$userdata]);
    }
    function login(Request $req){
        $email=$req['email'];
        $password=$req['password'];
        $user=usermodel::where('email',$email)->where('password',$password)->first();
        if($user){
            // $req->session()->put('id',user->id);
            return response()->json($user);
        }
        else{
            return response()->json("User does not exist");
        }
    }
    function userdetail($id){
        $data = usermodel::find($id);
        return $data;
    }
    function logout(){
        session()->flush();
    }
    function update($id,request  $req){
        $user=usermodel::find($id);
        $user->name=$req['name'];
        $user->email=$req['email'];
        $user->dob=$req['dob'];
        $file = $req->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/userpic', $fileName);
        $user->file = $fileName;
        $user->save();
        return response()->json(["status",$user]);
    }
}
