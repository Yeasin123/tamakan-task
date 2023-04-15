<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function userInvoice($id)
    {
        $order = Order::orderBy('id','desc')->where('id',$id)->first();
        $shipping = Shipping::orderBy('id','desc')->where('id',$id)->first();
        $orderDetails = OrderDetails::where('order_id',$id)->get();   
        return view('frontend.user.userinvoice',compact('order','shipping','orderDetails'));
        
    }
}
