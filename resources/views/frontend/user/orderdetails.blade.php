@extends('frontend.user_layout')

@section('main_content')
<section class="user_order_detail">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <div class="order_status">
                    <a href="{{route('user.invoice',$order->id)}}" target="_blank" class="btn btn-info"> <i class="fa fa-print"></i> Invoice</a>
                    <h5>Order Status</h5>
                    <div class="progress">
                        @if($order->status == 0)
                          <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width:15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Pendding</div>
                        @elseif($order->status == 1)
                          <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width:15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Pendding</div>
                          <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Payment Accept</div>
                        @elseif($order->status == 2)
                          <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width:15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Pendding</div>
                          <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Payment Accept</div>
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Order Proccessing</div>
                        @elseif($order->status == 3)
                          <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width:15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Pendding</div>
                          <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Payment Accept</div>
                          <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Order Proccessing</div>
                          <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Order Deliverd</div>
                        @else
                          <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Order Cancled</div>
                        @endif
                   </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-6">
                <div class="order_details_user">
                    <table class="table table-hover text-center table-borderless">  
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
                            <th class="wd-15p">Payable Price:</th>
                            <th class="wd-15p">$ {{$order->paying_amout}} </th>
                        </tr>
                        <tr>
                            <th class="wd-15p">Total Price:</th>
                            <th class="wd-15p">$ {{$order->total}} </th>
                        </tr> 
                        <tr>
                            <th class="wd-15p">Order Date:</th>
                            <th class="wd-15p">{{$order->month}}</th>
                        </tr> 
                    </table>
               </div>
            </div>
            <div class="col-md-6">
                <div class="order_details_user">
                    <table class="table table-hover text-center table-borderless"> 
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
                            <th class="wd-15p">{{$shipping->delivery_charge}} ৳</th>
                        </tr> 
                    </table>
                </div>
            </div>
        </div>
    
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="order_details_user">
                    <table class="table table-hover text-center table-borderless table-responsive-sm"> 
                          <thead>
                            <tr>
                              <th class="wd-15p">Product Name</th>
                              <th class="wd-15p">Product Image</th>
                              <th class="wd-15p">Product Qty</th>
                 
                              <th class="wd-20p">Total Price</th>
                              <th class="wd-20p">Cancle Order</th>
                            </tr>
                          </thead>
                          @foreach ($orderDetails as $orderDetail)
                          <tr>
                            <td>{{$orderDetail->product->product_name}}</td>
                            <td>
                                <img src="{{asset('images/product/'.$orderDetail->product->thumbnail)}}" width="70" alt="proImage">
                            </td>
                            <td>{{$orderDetail->product_qty}}</td>
                          
                            <td>{{$orderDetail->single_price*$orderDetail->product_qty}}</td>
                            <td>
                                @if ($order->status == 0)
                                <a href="#" class="btn btn-danger btn-sm">Cancle Order</a>
                                @else
                                 <span class="text-danger"> You can not cancled this order now</span>
                                @endif
                            </td>
                          </tr>
                          @endforeach
                          </tbody>
                        </table>
                    </div>
               
            </div>
        </div>
    </div>
</section>
@endsection
