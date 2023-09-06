<?php

namespace App\Http\Controllers;

use App\Models\ClientProductPrice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClientController extends Controller
{

   public function index()
   {
    $clientProducts = ClientProductPrice::with('user', 'product')->get();
    return view('admin.user.index',compact('clientProducts'));
   }
   public function Assign()
   {

      $product=Product::get();
      $users=User::all();
    return view('admin.user.assignproduct',compact('product','users'));

   }

   public function ProductStotr(Request $request)
   {
    $request->validate([
        'user_id'=>'required',
        'product_id'=>'required',
        'price'=>'required',

    ],
    [
        'user_id.required'=>'Please Add User',
        'product_id.required'=>'Please Add Product',
        'price.required'=>'Please Add Price',]);


    ClientProductPrice::insert([
       'user_id'=>Crypt::decrypt($request->user_id),
       'product_id'=>Crypt::decrypt($request->product_id),
       'price'=>$request->price,
    ]);
    $notification = array(
        'message' => 'Product Assign User Successfully',
        'alert-type' => 'success' );
    return redirect()->route('user.product')->with($notification);
   }
   public function ProductDelete($id)
   {
    ClientProductPrice::findOrFail(Crypt::decrypt($id))->delete();
    $notification = array(
        'message' => 'Product Assign  Delte Successfully',
        'alert-type' => 'success' );
    return redirect()->route('user.product')->with($notification);

   }
   public function GetProduct($id)
   {
    $product=Product::where('id',Crypt::decrypt($id))->first();
return json_encode($product);
   }
}
