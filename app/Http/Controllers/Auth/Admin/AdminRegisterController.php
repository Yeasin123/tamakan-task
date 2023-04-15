<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class AdminRegisterController extends Controller
{
   
    public function index()
    {
        $admin = Admin::orderBy('id','desc')->where('role_id','=',0)->get();
        return view('backend.pages.adminrole.manage',compact('admin'));
    }


    public function create()
    {
        return view('backend.pages.adminrole.adminregister');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);
 
      
         $Admin = new Admin;
         $Admin->name = $request->name;
         $Admin->email = $request->email;
         $Admin->phone = $request->phone;
         $Admin->brand = $request->brand;
         $Admin->category = $request->category;
         $Admin->coupon = $request->coupon;
         $Admin->newslater = $request->newslater;
         $Admin->product = $request->product;
         $Admin->mainslider = $request->mainslider;
         $Admin->adminmanagement = $request->adminmanagement;
         $Admin->stock = $request->stock;
         $Admin->ordermenagement = $request->ordermenagement;
         $Admin->orderreport = $request->orderreport;
         $Admin->password = $request->password;
         $Admin->password = Hash::make($request->password);
         $Admin->save();
 
         $notification = array(
             'message' => 'Admin Created Successfully',
             'alert-type' => 'success'
         );
         return redirect()->route('admin.index')->with($notification);
    }



  
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('backend.pages.adminrole.eadit',compact('admin'));
    }

  
    public function update(Request $request, $id)
    {
        $Admin = Admin::find($id);
        $Admin->name = $request->name;
        $Admin->email = $request->email;
        $Admin->phone = $request->phone;
        $Admin->brand = $request->brand;
        $Admin->category = $request->category;
        $Admin->coupon = $request->coupon;
        $Admin->newslater = $request->newslater;
        $Admin->product = $request->product;
        $Admin->mainslider = $request->mainslider;
        $Admin->adminmanagement = $request->adminmanagement;
        $Admin->stock = $request->stock;
        $Admin->ordermenagement = $request->ordermenagement;
        $Admin->orderreport = $request->orderreport;
        $Admin->save();
 
         $notification = array(
             'message' => 'Admin Updated Successfully',
             'alert-type' => 'success'
         );
         return redirect()->route('admin.index')->with($notification);
    }

  
    public function destroy($id)
    {
        $Admin = Admin::find($id);
         $Admin->delete();
 
         $notification = array(
             'message' => 'Admin Deleted Successfully',
             'alert-type' => 'error'
         );
         return redirect()->route('admin.index')->with($notification);
    }
}


