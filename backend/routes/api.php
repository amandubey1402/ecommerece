<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\products;
use App\Http\Controllers\cartController;
use App\Http\Controllers\productddetail;
use App\Http\Controllers\categoryproduct;
use App\Http\Controllers\ordercontroller;
use App\Http\Controllers\address;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/userdetail/{id}',[AuthController::class,'userdetail']);
Route::post('/product',[products::class,'productdetail']);
Route::get('/product',[products::class,'products']);
Route::get('/productdata/{id}',[products::class,'productdata']);
Route::post('/cart',[cartController::class,'storecart']);
Route::get('/cart/{id}',[cartController::class,'cartproduct']);
Route::get('/detail/{id}',[productddetail::class,'productdetail']);
Route::get('/delete/{id}',[cartController::class,'deletecart']);
Route::get('/similar/{id}',[categoryproduct::class,'category']);
Route::post('/address',[address::class,'address']);
Route::post('/orderproduct',[ordercontroller::class,'orderproduct']);
Route::get('/showorder/{id}',[ordercontroller::class,'showorder']);
Route::get('/productaddress/{id}',[address::class,'productaddress']); 
Route::get('/deleteproduct/{id}',[ordercontroller::class,'deleteproduct']);
Route::get('/deleteaddress/{id}',[ordercontroller::class,'deleteaddress']);
Route::post('/productvarity',[categoryproduct::class,'varity']);
Route::get('/varity',[categoryproduct::class,'showallcatego']);
Route::post('/updateuser/{id}',[AuthController::class,'update']);
