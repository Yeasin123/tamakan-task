@extends('frontend.user_layout')
@section('main_content')
    @if(!$carts->isEmpty())
    <section class="wishlist">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
             <h3 class=" mt-3 text-center">Product Cart Page</h3>
            </div>
                <div class="col-md-8 ">
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
                              <tr>
                                <td colspan="6" class="cartTotal"></td>
                              </tr>
                            </tbody>
                          </table>
                          
                          <div class="container mt-3">
                           <h4 class="text-center"> <a href="{{route('userHome')}}" class="btn btn-success">Back To Home</a></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 cart_page_footer">
                  <div class="cart_total_content">
                      <h4 class="text-center">Cart Total</h4>
                      <div class="cart_total_content_inner">
                          <div class="total_price">
                              <h5>SubTotal</h5>
                          </div>
                          <div class="total_price" id="subTotal">
                              <p class="cartTotal"></p>
                          </div>
                      </div>
                      <hr>
                      <div class="cart_total_content_inner">
                          <div class="total_price">
                              <p>Total</p>
                          </div>

                          <div class="total_price" id="total">
                              <p class="cartTotal"></p>
                          </div>
                      </div>
                  </div>
                  <div class="cart-footer mt-2">
                    <div class="cart-total" style="background: #fff !important">
                        <a href="{{route('checkoutPage')}}" class="procced-checkout">Place Order</a>
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