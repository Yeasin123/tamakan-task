@extends('frontend.user_layout')

@section('main_content')

@if(!$childcategorybyproduct->isEmpty())
<section class="page-content section-ptb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row product-list">
                   @foreach ($childcategorybyproduct as $subcatproduct)
                    <div class="col-sm-6 col-lg-4 col-xl-3 col-6" style="display: block;">
                        <div class="product-item">
                            <div class="product-thumb">
                                <a href="{{route('productdetail',$subcatproduct->id)}} "><img src="{{asset('images/product/'.$subcatproduct->image_one)}}" alt="product"></a>
                                <span class="batch sale">Sale</span>
                                <a class="wish-link addWishlist" href="#" data-id="{{$subcatproduct->id}}">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart fa-w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path></svg>
                                </a>
                            </div>
                            <div class="product-content">
                                <h6><a href="{{route('productdetail',$subcatproduct->id)}}" class="product-title">{{$subcatproduct->product_name}}</a></h6>
                                <p class="quantity">{{$subcatproduct->product_quantity}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    @if($subcatproduct->discount_price == NULL)
                                        <div class="price">{{$subcatproduct->selling_price}} ৳</div>
                                     @else 
                                        <div class="price">{{$subcatproduct->discount_price}} ৳<del>{{$subcatproduct->selling_price}} ৳</del></div>
                                     @endif

                                    <div class="cart-btn-toggle" onclick="cartopen()">
                                        <span class="cart-btn"><i class="fas fa-shopping-cart"></i> Cart</span>

                                        <div class="price-btn">
                                            <div class="price-increase-decrese-group d-flex">
                                                <span class="decrease-btn">
                                                    <button type="button" class="btn quantity-left-minus" data-type="minus" data-field="">-
                                                    </button> 
                                                </span>
                                                <input type="text" name="quantity" class="form-controls input-number" value="1">
                                                <span class="increase">
                                                    <button type="button" class="btn quantity-right-plus" data-type="plus" data-field="">+
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                    <div class="col-12 text-center d-flex justify-content-center mt-4">
                        {{$childcategorybyproduct->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="error-page text-center">
    <div class="container">
        <h1>404</h1>
        <p>It looks like nothing was found at this location.</p>
        <a href="{{route('userHome')}}" class="backhome">Back To Home</a>
    </div>
</section>

@endif

@endsection