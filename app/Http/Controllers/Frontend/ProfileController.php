<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function userProfile()
    {
        $orders = Order::orderBy('id','desc')->where('user_id',Auth::user()->id)->with('orderDetail')->get();
        return view('frontend.user.profile',compact('orders'));
    }

    public function userProfileUpdate( Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;


         $user->save();
         $notification = array(
            'message' => 'Profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('userProfile')->with($notification);
    }

    public function userPassword()
    {
        return view('frontend.user.userchangepassword');
    }

    public function userPasswordChange(Request $request)
    { 
        $this->validate($request,[
            'password' => 'required|min:8'
        ]);

        $password = Auth::user()->password;
        $oldpassword = $request->oldpassword;
        $newpassword = $request->password;
        $confirmpassword = $request->password_confirmation;

        if(Hash::check($oldpassword,$password)){
            
            if($newpassword === $confirmpassword){
            
               $user = User::find(Auth::user()->id);
               $user->password = Hash::make($request->password);
               $user->save();
               $notification = array(
                'message' => 'Password Change Successfully Login Now',
                'alert-type' => 'success'
              );
               Auth::logout();
               return redirect()->route('login')->with($notification);
            }
            else{

                $notification = array(
                    'message' => 'Password not match',
                    'alert-type' => 'error'
                  );
                return redirect()->back()->with($notification);
            }
        }

        else{
            
            $notification = array(
                'message' => 'Old Password not match',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
        
    }

    public function userOrderDetail($id)
    {
        $order = Order::where('id',$id)->first();
        $shipping = Shipping::where('shippings.id',$id)->first();    
        $orderDetails = OrderDetails::where('order_id',$id)->get();        
        return view('frontend.user.orderdetails',compact('order','shipping','orderDetails'));
    }
}
