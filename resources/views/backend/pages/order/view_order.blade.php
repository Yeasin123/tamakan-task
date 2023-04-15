@extends('backend.admin_layout')
@section('admin_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-2 text-center"> Order View Page</h2>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-6">
            <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                <h4 class="text-center">Order Details</h4>
                <div class="table-wrapper">
                    <table class="table">  
                        <tr>
                            <th class="wd-15p">Payment Id:</th>
                            <th class="wd-15p">{{$order->payment_id}}</th>
                        </tr>
                        <tr>
                            <th class="wd-15p">Payment Type:</th>
                            <th class="wd-15p">{{$order->payment_type}}</th>
                        </tr>
                        <tr>
                            <th class="wd-15p">User Phone:</th>
                            <th class="wd-15p">{{$order->user->phone}}</th>
                        </tr>
                        <tr>
                            @if($order->status == 1 || $order->status == 2 || $order->status == 3)
                            <th class="wd-15p">PayAble Price:</th> 
                            <th class="wd-15p">Paid</th>
                            @else
                            <th class="wd-15p">Paying Amount:</th> 
                            <th class="wd-15p">$ {{$order->paying_amout+$shipping->delivery_charge }}</th>
                            @endif
                        </tr>
                        <tr>
                            <th class="wd-15p">Total Price:</th>
                            <th class="wd-15p">${{$order->total+$shipping->delivery_charge}}</th>
                        </tr> 
                        <tr>
                            <th class="wd-15p">Order Date:</th>
                            <th class="wd-15p">{{$order->month}}</th>
                        </tr> 
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                <h4 class="text-center">Shiping Details</h4>
                <div class="table-wrapper">
                    <table class="table"> 
                        <tr>
                            <th class="wd-15p">User Name:</th>
                            <th class="wd-15p">{{$shipping->name}}</th>
                        </tr>
                        <tr>
                            <th class="wd-15p">User Email:</th>
                            <th class="wd-15p">{{$shipping->email}}</th>
                        </tr>
                        <tr>
                            <th class="wd-15p">User Address:</th>
                            <th class="wd-15p">{{$shipping->address}}</th>
                        </tr>
                        <tr>
                            <th class="wd-15p">User City:</th>
                            <th class="wd-15p">{{$shipping->city_name}}</th>
                        </tr>
                        <tr>
                            <th class="wd-15p">User Area:</th>
                            <th class="wd-15p">{{$shipping->area}}</th>
                        </tr> 
                        <tr>
                            <th class="wd-15p">Delivery Charge:</th>
                            <th class="wd-15p">$ {{$shipping->delivery_charge}}</th>
                        </tr> 
                        <tr>
                            <th class="wd-15p">Order Status:</th>
                            @if($order->status == 0)
                            <th class="wd-15p"><span class="badge badge-warning">Pendding</span></th>
                            @elseif($order->status == 1)
                            <th class="wd-15p"><span class="badge badge-info">Payment Accepet</span></th>
                            @elseif($order->status == 2)
                            <th class="wd-15p"><span class="badge badge-primary">Order Proccessing</span></th>
                            @elseif($order->status == 3)
                            <th class="wd-15p"><span class="badge badge-success">Order Delivered</span></th>
                            @else
                            <th class="wd-15p"><span class="badge badge-danger">Order Cancled</span></th>
                            @endif
                        </tr> 
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                <div class="d-flex mb-2">
                    @if($order->status == 0)
                    <a href="{{route('change.orderStatus',$order->id)}}" class="btn btn-primary">Payment Accept</a>
                    <a href="{{route('cancle.orderStatus',$order->id)}}" class="btn btn-danger">Payment Cancle</a>
                    @elseif($order->status == 1)
                    <a href="{{route('proccess.orderStatus',$order->id)}}" class="btn btn-primary">Proccess Deliver</a>
                    <a  href="{{route('orderinvoice',$order->id)}}" class="btn btn-info">Invoice</a>
                    @elseif($order->status == 2)
                    <a href="{{route('delivered.orderStatus',$order->id)}}" class="btn btn-primary">Order Delivered</a>
                    @elseif($order->status == 4)
                    <h4 class="text-center text-danger">This order was cancled</h4>
                    @else
                    <h4 class="text-center text-success">This order was successfully delivered</h4>
                    @endif
                </div>
                <div class="table-wrapper">
                    <table class="table display table-responsive nowrap text-center table-bordered">
                      <thead>
                        <tr>
                          <th class="wd-15p">Product Name</th>
                          <th class="wd-15p">Product Image</th>
                          <th class="wd-15p">Product Qty</th>
      
                          <th class="wd-20p">Total Price</th>
                        </tr>
                      </thead>
                      @foreach ($orderDetails as $orderDetail)
                      <tr>
                        <td>{{$orderDetail->product->title}}</td>
                        <td>
                            <img src="{{asset('images/product/'.$orderDetail->product->thumbnail)}}" width="60" alt="proImage">
                        </td>
                        <td>{{$orderDetail->product_qty}}</td>
                        
                       
                        <td>$ {{$orderDetail->single_price*$orderDetail->product_qty}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
