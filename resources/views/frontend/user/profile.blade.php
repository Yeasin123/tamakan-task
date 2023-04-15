@extends('frontend.user_layout')
@section('main_content')
<section class="page-content section-ptb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(!$orders->isEmpty())
                <div class="order_details_user">
                    <table class="table table-hover table-borderless  table-responsive-sm table-responsive-md">
                        <thead>
                          <tr>
                            <th scope="col">#SL</th>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Month</th>
                            <th scope="col">Day</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Details</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$order->payment_type}}</td>
                                <td>{{$order->day}}</td>
                                <td>{{$order->day}}</td>
                                <td>{{$order->total}}</td>
                                <td>
                                    @if ($order->status == 0)
                                        <span class="badge badge-warning">Pendding</span>
                                    @endif
                                </td>
                                <td><a href="{{route('userOrderDetail',$order->id)}}" class="btn btn-success btn-sm">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                @else
                @endif
            </div>
           
            <div class="col-lg-4">
              <div class="dashboard-body">
                <div class="profile">
                    <h5 class="title">Your Profile <a href="{{route('userProfileUpdate',Auth::user()->id)}}" data-toggle="modal" data-target="#exampleModal{{Auth::user()->id}}"><span title="Edit Profile" class="edit" ><i class="fas fa-edit"></i></span></a></h5>
                    <ul class="list-profile-info list-unstyled">
                        <li>
                            @if(Auth::user()->image !== NULL)
                            <img src="{{asset('images/user/'.Auth::user()->image)}}" alt="avatar">
                            @else
                            <img src="{{asset('images/avatar.png')}}" alt="">
                            @endif
                        </li>
                        <li>
                            <span class="title">Your Name</span>
                            <span class="desc">{{Auth::user()->name}}</span>
                        </li>
                        <li>
                            <span class="title">Email</span>
                            <span class="desc">{{Auth::user()->email}}</span>
                        </li>
                        <li>
                            <span class="title">Phone</span>
                            <span class="desc">{{Auth::user()->phone}}</span>
                        </li>
                        <li>
                            <span class="title">Password</span>
                            <span class="desc"><strong><a href="{{route('userPassword')}}">Change Password</a></strong></span>
                        </li>
                        <li>
                            <span class="title">
                                <a href="{{ route('logout') }}" class="btn btn-info"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </span>
                        </li>
                    </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('userProfileUpdate',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label >Email</label>
                                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                      </div>
                                      <div class="form-group">
                                        <label >Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                                      </div>
                                      
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                  </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
   </div>
</section>

@endsection
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function readURL(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#profile_img')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    };
    </script>
