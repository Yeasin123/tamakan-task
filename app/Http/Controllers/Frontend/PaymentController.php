<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function checkoutPage()
    {
        if(Cart::content()->count() > 0){

            return view('frontend.checkout');
        }else{
            $notification = array(
                'message' => 'Your cart is empty',
                'alert-type' => 'warning'
            );
            return redirect()->route('userHome')->with($notification);
        }
    }

    public function stripePage(Request $request)
    {
      
        if($request->payment == 'stripe')
        {
            $data = $request->all();
            return view('frontend.payment.stripe',compact('data'));
        }
        

        elseif($request->payment == 'cash'){

         $user = Auth::user()->id;
         $total = Cart::total();
         $data = array();
         $data['user_id'] =$user;
         $data['paying_amout'] = $total;
         $data['status'] = 0;
         $data['order_invoice'] = "AMARINFO#".mt_rand(1,999999);
         $data['order_status_code'] = mt_rand(100000,999999);
         $data['payment_type'] = 'cash';

        if(Session::has('coupon')){
            $data['subtotal']= Session::get('coupon')['balance'];
        }
        else{
            $data['subtotal']= Cart::total();;
        }

        if(Session::has('coupon')){
            $data['total']= Session::get('coupon')['balance'];
        }
        else{
            $data['total']= Cart::total();;
        }

        $data['day'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
       $order_id = DB::table('orders')->insertGetId($data);

        $cartContent = Cart::content();
        $orderDetail = array();
        foreach($cartContent as $cart)
        {
            $orderDetail['order_id'] =  $order_id;
            $orderDetail['product_id'] = $cart->id;
            $orderDetail['product_name'] = $cart->name;
            $orderDetail['product_qty'] = $cart->qty;
            $orderDetail['single_price'] = $cart->price;
            $orderDetail['totalprice'] = $cart->price*$cart->qty;
            DB::table('order_details')->insert($orderDetail);

        }

        $shipping = array();

        $shipping['order_id'] = $order_id;
        $shipping['name'] = $request->name;
        $shipping['email'] = $request->email;
        $shipping['phone'] = $request->phone;
        $shipping['address'] = $request->address;
        $shipping['city_name'] = $request->city_name;
        $shipping['area'] = $request->area;
        $shipping['delivery_charge'] = 30;
        $shipping['order_note'] = $request->order_note;
        DB::table('shippings')->insert($shipping);

        Cart::destroy();

        if(Session::has('coupon'))
        {
            Session::forget('coupon');
        }

            $notification = array(
                'message' => 'Order Placed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('userHome')->with($notification);
       
        
    
    }

    }

    public function stripePayment(Request $request)
    {
        
        $user = Auth::user()->id;
        $total = Cart::total();
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51JhcVtDJxFZ8gsu9VcANhF05x2Tff6s3K6z8qcbJDWbldHhaGnWjr9P2r49wjXqCNTYM2XIy5AlhdK3QPaOB7oFM00ajsAiuNB');

        $token = $request->input('stripeToken');

        $charge = \Stripe\Charge::create([
        'amount' => $total*100,
        'currency' => 'usd',
        'description' => 'Imranit',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);

        $data = array();
        $data['user_id'] =$user;
        $data['payment_id'] = $charge->payment_method;
        $data['stripe_order_id'] = $charge->metadata->order_id;
        $data['paying_amout'] = $charge->amount;
        $data['bl_transtraction'] = $charge->balance_transaction;
        $data['status'] = 0;
        $data['order_invoice'] = "BDTECHBYTE#".mt_rand(1,999999);
        $data['order_status_code'] = mt_rand(100000,999999);
        $data['payment_type'] = $request->payment_type;
        if(Session::has('coupon')){
            $data['subtotal']= Session::get('coupon')['balance'];
        }
        else{
            $data['subtotal']= Cart::total();;
        }

        if(Session::has('coupon')){
            $data['total']= Session::get('coupon')['balance'];
        }
        else{
            $data['total']= Cart::total();;
        }

        $data['day'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
       $order_id = DB::table('orders')->insertGetId($data);

        $cartContent = Cart::content();
        $orderDetail = array();
        foreach($cartContent as $cart)
        {
            $orderDetail['order_id'] =  $order_id;
            $orderDetail['product_id'] = $cart->id;
            $orderDetail['product_name'] = $cart->name;
            $orderDetail['product_color'] = $cart->options->color;
            $orderDetail['product_size'] = $cart->options->size;
            $orderDetail['product_qty'] = $cart->qty;
            $orderDetail['single_price'] = $cart->price;
            $orderDetail['totalprice'] = $cart->price*$cart->qty;
            DB::table('order_details')->insert($orderDetail);

        }

        $shipping = array();

        $shipping['order_id'] = $order_id;
        $shipping['name'] = $request->name;
        $shipping['email'] = $request->email;
        $shipping['phone'] = $request->phone;
        $shipping['address'] = $request->address;
        $shipping['city_name'] = $request->city_name;
        $shipping['area'] = $request->area;
        $shipping['delivery_charge'] = 30;
        $shipping['order_note'] = $request->order_note;
        DB::table('shippings')->insert($shipping);

        Cart::destroy();

        if(Session::has('coupon'))
        {
            Session::forget('coupon');
        }

            $notification = array(
                'message' => 'Order Placed Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('userHome')->with($notification);
    }

    

}
