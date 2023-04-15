@extends('frontend.user_layout')
@section('main_content')
    @if(!$carts->isEmpty())
    <section class="wishlist">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
             <h3 class=" mt-3 text-center">Product Cart Page</h3>
            </div>
                <div class="col-md-12">
                    <div class="wislist_table">
                        <table class="table table-bordered text-center table-responsive-sm">
                            <thead>
                              <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i =1;
                                @endphp
                                @foreach ($carts as $cart)
                               
                                <tr class="cartTR">
                                    <th scope="row">{{$i++}}</th>
                                    <td>
                                      <a href="">
                                        <img src="{{asset('images/product/'.$cart->options->images)}}" width="50" height="35" alt="product">
                                      </a>
                                    </td>
                                    <td>{{$cart->name}}</td>
                                    <td>{{$cart->price}} ৳</td>
                                    <td>
                                      <div class="price-increase-decrese-group d-flex">
                                        <span class="decrease-btn">
                                            <button type="button" class="btn quantity-left-minus" onclick="decrementtQty(this.id)" id="{{$cart->rowId}}">-
                                            </button> 
                                        </span>
                                        <input type="text" name="quantity" class="form-controls input-number" value="{{$cart->qty}}">
                                        <span class="increase-btn" >
                                            <button type="button" class="btn quantity-right-plus" onclick="incrementtQty(this.id)" id="{{$cart->rowId}}">+
                                            </button>
                                        </span>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="d-flex justify-content-center">
                                        <a class="btn btn-danger text-white btn-sm cartRemove" data-id="{{$cart->rowId}}">Delete</a>
                                      </div>
                                    </td>
                                  </tr>
                              @endforeach
                             
                            </tbody>
                          </table>
                          
                          <div class="container mt-3">
                           <h4 class="text-center"> <a href="{{route('checkoutPage')}}" class="procced-checkout cla
                            btn btn-success btn-sm">Place Order</a></h4>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </section>
    @else
    <section class="error-page text-center">
      <div class="container">
          <h1 style="font-size:60px">Empty Cart</h1>
          <a href="{{route('userHome')}}" class="backhome">Back Home</a>
      </div>
  </section>
    
    @endif

@endsection
