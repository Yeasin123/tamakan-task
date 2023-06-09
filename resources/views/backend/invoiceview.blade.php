{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-151 {
    font-size: 100%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
/* .item_direction{
    display: flex;
    justify-content: space-between;
} */

</style>
</head>
<body>
    
<div class="page-content container">
    <div class="page-header text-blue-d2">
            <small class="page-info">
                <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo">
            </small>
        <div class="page-tools">
            <div class="action-buttons">
                <button class="print"  data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </button>
            </div>
        </div>
    </div>

    <div class="container px-0" id="printable">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <h1 class="page-title text-secondary-d1">Invoice</h1>
                            <small class="page-info">
                                <i class="fa fa-angle-double-right text-80"></i>
                                {{$order->order_invoice}}
                            </small>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$order->user->name}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                Street:- {{$shipping->address}}
                            </div>
                            <div class="my-1">
                                City:- {{$shipping->city_name}}, Area:- {{$shipping->area}}
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{$shipping->phone}}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> </div>
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> 
                                @if($order->status == 1)
                                <span class="badge badge-warning badge-pill px-25">Unpaid</span>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                
                    <div class="text-95 text-secondary-d3">
                        <table class="table table-borderless text-center table-striped">
                            <thead class="bg-info text-white">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Single Price</th>
                                <th scope="col">Total Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                 @foreach ($orderDetails as $orderDetail) 
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td><img src="{{asset('images/product/'.$orderDetail->product->image_one)}}" width="75" alt="productImage"></td>
                                    <td>{{$orderDetail->product_name}}</td>
                                    <td>{{$orderDetail->product_qty}}</td>
                                    <td>{{$orderDetail->single_price}}</td>
                                    <td>{{$orderDetail->totalprice}}</td>
                                  </tr>
                                @endforeach
                             
                            
                            </tbody>
                          </table>
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-4 text-grey text-90 order-first order-sm-last ">
                            <div class="row my-2 item_direction">
                                <div class="col-7 ">
                                    <span class="text-151"> Delivery Charge </span>  
                                </div>
                                <div class="col-5">
                                    <span class="text-151">{{$shipping->delivery_charge }} ৳</span>
                                </div>
                            </div>

                            <div class="row my-2 item_direction">
                                <div class="col-7 ">
                                    <span class="text-151">Paying Amount</span>   
                                </div>
                                <div class="col-5">
                                    <span class="text-151 ">{{$order->paying_amout+$shipping->delivery_charge }} ৳</span>
                                </div>
                            </div>

                            <div class="row my-2 item_direction">
                                <div class="col-7 ">
                                    <span class="text-151">Total Amount</span>
                                </div>
                                <div class="col-5">
                                    <span class="text-151 ">{{$order->paying_amout+$shipping->delivery_charge }} ৳</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html> --}}