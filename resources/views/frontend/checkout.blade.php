@extends('frontend.user_layout')
@section('main_content')
<section class="dashboard-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                

                <div class="form-item billing-item bg-color-white box-shadow p-3 p-lg-5 border-radius5">
                    <form action="{{route('stripePage')}}" method="post" class="billing-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-item">
                                    <label> Name*</label>
                                    <input type="text" name="name" value="{{Auth::user()->name}}" required='required'>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-item">
                                    <label>Choose City*</label>
                                    <select class="form-control" name="city_name" required='required'>
                                        <option value="">Choose City</option>
                                        @foreach(App\Models\City::all() as $citys)
                                        <option value="{{$citys->city_name}}">{{$citys->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-item">
                                    <label>Choose Area*</label>
                                        <select class="form-control" name="area" required='required'>
                                          <option value="">Choose Area</option>
                                        @foreach(App\Models\Area::all() as $areas)
                                          <option value="{{$areas->area}}">{{$areas->area}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-item">
                                    <label>Address*</label>
                                    <input type="text" name="address" required='required'>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="input-item">
                                    <label>Email*</label>
                                    <input type="email" name="email" value="{{Auth::user()->email}}" required='required'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-item">
                                    <label>Mobile*</label>
                                    <input type="text" name="phone" value="{{Auth::user()->phone}}" required='required'>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-item">
                                    <label>Order Note*</label>
                                    <textarea name="order_note" class="form-control" cols="3" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cart-item sitebar-cart bg-color-white box-shadow p-3 mb-3 p-lg-5 border-radius5">
                    <div class="cart-footer">
                        
                        <div class="cart-total">
                            @foreach (Cart::content() as $item)
                           <p class="saving d-flex justify-content-between">
                                <span>Name: </span> 
                                <span>{{$item->name}}</span>
                            </p>
                            <p class="saving d-flex justify-content-between">
                                <span>Qty: </span> 
                                <span>{{$item->qty}}</span>
                            </p>
                            @endforeach
                        </div>
                        <div class="cart-total">
                           
                            <p class="saving d-flex justify-content-between">
                                @if(Session::has('coupon'))
                                <span>Total Saving</span> 
                                <span>{{Cart::total()}}  - <span>{{Session::get('coupon')['discount']}} ৳</span>
                                <p class="text-right" style="color:#59B863;font-weight:600">${{Session::get('coupon')['balance']}} </p>
                                @else
                                @endif
                            </p>
                            <p class="total-price d-flex justify-content-between">
                                <span>Total</span> 
                                @if(Session::has('coupon'))
                                <span>{{Session::get('coupon')['balance']}} ৳</span>
                                @else
                                <span>$ {{Cart::total()}}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-item payment-item bg-color-white box-shadow p-3 p-lg-5 border-radius5">
                    <h6>Payment</h6>
                       <div class="item_input d-flex justify-content-between">
                      
                        <div class="input-item ">
                            <input type="radio" name="payment" value="cash">
                            <label>Cash on delivary</label>
                        </div>
                       </div>
                    <div class=" mt-2">
                        <button type="submit" class="btn btn-dark">Place Order</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
