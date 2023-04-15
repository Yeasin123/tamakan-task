@extends('backend.admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <h2 class="mt-2">This Year Orders</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                  <div></div>
                    <div class="table-wrapper">
                        @if(!$order->isEmpty())
                        <table id="datatable1" class="table display responsive nowrap text-center table-bordered">
                          <thead>
                            <tr>
                              <th class="wd-15p">SL</th>
                              <th class="wd-15p">Order Id</th>
                              <th class="wd-15p">User Name</th>
                              <th class="wd-15p">Payment Type</th>
                              <th class="wd-15p">Paying Amount</th>
                              <th class="wd-20p">Total Price</th>
                              <th class="wd-20p">Order Year</th>
                              <th class="wd-15p">Status</th>
                              <th class="wd-10p">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                            $i = 1;
                          @endphp
                            @foreach ($order as $orders )
                            <tr>
                              <td>{{$i++}}</td>
                              <td>{{$orders->id}}</td>
                              <td>{{$orders->user->name}}</td>
                              <td>{{$orders->payment_type}}</td>
                              <td>{{$orders->paying_amout/100}}</td>
                              <td>{{$orders->total}}</td>
                              <td>{{$orders->year}} </td>
                              <td>
                                <div>
                                  @if($orders->status == 0)
                                  <span class="badge badge-warning">Pendding</span>
                                  @elseif($orders->status == 1)
                                  <span class="badge badge-info">Payment Accepet</span>
                                  @elseif($orders->status == 2)
                                  <span class="badge badge-primary">Order Proccessing</span>
                                  @elseif($orders->status == 3)
                                  <span class="badge badge-success">Order Delivered</span>
                                  @else
                                  <span class="badge badge-danger">Order Cancled</span>
                                  @endif
                              </div>
                              </td>
                              <td>
                                <div class="d-flex justify-content-between">
                                  <a href="{{route('view.order', $orders->id)}}" class="btn btn-success">View</a>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        @else
                        <div class="alert alert-primary" role="alert">
                          <h1 class="text-center">Empty this year orders</h1>
                        </div>
                      @endif 
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
 
@endsection