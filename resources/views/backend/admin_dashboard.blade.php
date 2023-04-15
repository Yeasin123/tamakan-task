@extends('backend.admin_layout')

@section('admin_content')

<div class="sl-pagebody">

    <div class="row row-sm">

      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">All Orders</h6>
           
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$orders->count()}}</h3>
          </div><!-- card-body -->
        </div>
      </div>
      
      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-warning">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Pending Orders</h6>
            
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$pendingOrders->count()}}</h3>
          </div><!-- card-body -->
        </div>
      </div>
        <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-success">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Completed Orders</h6>
           
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$completedOrders->count()}}</h3>
          </div><!-- card-body -->
        </div>
      </div>
        <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-danger">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Cancled Orders</h6>
           
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$canceledOrders->count()}}</h3>
          </div><!-- card-body -->
        </div>
      </div>
    </div>

  <div class="row row-sm mt-4">
    <div class="col-lg-12">
      <h3>Admin & User login,Register Api Url </h3>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
        <div class="card-header">
          User Login & Register Api Link
        </div>
        <div class="card-body">
          <table>
            <thead>
              <tr>
                <th>Register</th>
                <td>  BaseUrl + 'api/register' the method should be Post Request</td>
              </tr>
               <tr>
                <th>Login</th>
                <td>  BaseUrl + 'api/login' the method should be Post Request</td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
        <div class="card-header">
          Admin Login & Register Api Link
        </div>
        <div class="card-body">
          <table>
            <thead>
              <tr>
                <th col="scope">Register </th>
                <td> BaseUrl + 'api/admin/register' the method should be Post Request</td>
              </tr>
               <tr>
                <th col="scope">Login </th>
                <td> BaseUrl + 'api/admin/login' the method should be Post Request</td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
        </div>
      </div>
      
    </div>
  </div>

  </div>

  @endsection
