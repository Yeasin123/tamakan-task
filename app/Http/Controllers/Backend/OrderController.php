<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function newOrder()
    {
        $order = Order::orderBy('id','desc')->where('status',0)->get();

        return view('backend.pages.order.new_order',compact('order'));
    }

    public function acceptOrder()
    {
        $acceptorder = Order::orderBy('id','desc')->where('status',1)->get();

        return view('backend.pages.order.accept_order',compact('acceptorder'));
    }

    public function orderProccess()
    {
        $orderproccess =Order::where('status',2)->get();
        return view('backend.pages.order.order_proccess',compact('orderproccess'));
    }

    public function orderDeliverd()
    {
        $orderdelivered =Order::where('status',3)->get();
        return view('backend.pages.order.order_deliverd',compact('orderdelivered'));
    }

    public function cancleOrder()
    {
        $cancleorders =Order::where('status',4)->get();
        return view('backend.pages.order.cancle_order',compact('cancleorders'));
    }

    public function viewOrder($id)
    {
    //    $order = DB::table('orders')
    //                 ->join('users','orders.user_id','users.id')
    //                 ->select('orders.*','users.name','users.email','users.phone')
    //                 ->where('orders.id',$id)
    //                 ->first();
        $order = Order::where('id',$id)->first();
        $shipping = Shipping::where('shippings.id',$id)->first();    
        $orderDetails = OrderDetails::where('order_id',$id)->get();        
        return view('backend.pages.order.view_order',compact('order','shipping','orderDetails'));
    }
    

    public function ChangeOrderStatus($id)
    {
        Order::where('id',$id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Payment Accept Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('new.order')->with($notification);
    }

    public function ProcessOrderStatus($id)
    {
        Order::where('id',$id)->update(['status' => 2]);
        $notification = array(
            'message' => 'Proccess Order Accept Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeliveredOrderStatus($id)
    {
        $orders = OrderDetails::where('order_id',$id)->get();

        foreach($orders as $order)
        {
            Product::where('id',$order->product_id)->update(['stock' => DB::raw('stock-'.$order->product_qty)]);
        }

        Order::where('id',$id)->update(['status' => 3]);
        $notification = array(
            'message' => 'Deliverd Order Accept Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function cancleOrderStatus($id)
    {
        Order::where('id',$id)->update(['status' => 4]);
        $notification = array(
            'message' => 'Order Cancled Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('new.order')->with($notification);
    }

   
    public function orderinvoice($id)
    {
        $order = Order::orderBy('id','desc')->where('id',$id)->first();
        $shipping = Shipping::orderBy('id','desc')->where('id',$id)->first();
        $orderDetails = OrderDetails::where('order_id',$id)->get();   
        return view('backend.invoice',compact('order','shipping','orderDetails'));
    }


}
