<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class AdminController extends Controller
{

  public function index()
  {
    return view('admin.index');
  }
    public function loginForm()
    {
 return view('auth.admin_login');
    }

    public function store(Request $request)
{

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' =>$check['email'], 'password' => $check['password']])) {
            $notification=array(
                'message' =>' Admin Login Successfully ',
                'alert-type' =>'success');
          return redirect()->route('admin.dashboard')->with($notification);
        } else {


            $notification=array(
                'message' =>' invalid Email Or Password ',
                'alert-type' =>'success');

            return back()->with($notification);
        }


    }

    public function destroy(Request $request){
    Auth::guard('admin')->logout();
    return redirect('/')->with('success', 'Student Logout Successfully');
}
}
