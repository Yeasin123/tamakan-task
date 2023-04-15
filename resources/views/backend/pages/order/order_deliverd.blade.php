@extends('backend.admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <h2 class="mt-2">Delivered Order Page</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                  <div></div>
                    <div class="table-wrapper">
                        @if(!$orderdelivered->isEmpty())
                        <table id="datatable1" class="table display responsive nowrap text-center table-bordered">
                          <thead>
                            <tr>
                              <th class="wd-15p">SL</th>
                              <th class="wd-15p">Order Id</th>
                              <th class="wd-15p">User Name</th>
                              <th class="wd-15p">Payment Type</th>
                              <th class="wd-20p">Order Date</th>
                              <th class="wd-15p">Status</th>
                              <th class="wd-10p">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                            $i = 1;
                          @endphp
                            @foreach ($orderdelivered as $orderdelivereds )
                            <tr>
                              <td>{{$i++}}</td>
                              <td>{{$orderdelivereds->id}}</td>
                              <td>{{$orderdelivereds->user->name}}</td>
                              <td>{{$orderdelivereds->payment_type}}</td>
                              <td>{{$orderdelivereds->month}} </td>
                              <td>
                                <div>
                                  @if($orderdelivereds->status == 3 && Route::is('order.deliverd'))
                                    <span class="badge badge-success status">Deliverd</span>
                                  @endif
                                </div>
                              </td>
                              <td>
                                <div class="d-flex justify-content-between">
                                  <a href="{{route('view.order', $orderdelivereds->id)}}" class="btn btn-success">View</a>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        @else
                        <div class="alert alert-primary" role="alert">
                          <h1 class="text-center">Empty  Delivered Orders</h1>
                        </div>
                      @endif 
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
 
@endsection