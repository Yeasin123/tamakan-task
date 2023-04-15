@extends('frontend.user_layout')

@section('main_content')
@if(!$maincatproducts->isEmpty())
<section class="page-content section-ptb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row product-list">
                   @foreach ($maincatproducts as $maincatproduct)
                    <div class="col-sm-6 col-lg-4 col-xl-3 col-6" style="display: block;">
                        <div class="product-item">
                            <div class="product-thumb">
                                <a href="{{route('productdetail',$maincatproduct->id)}}" ><img src="{{asset('storage/images/product/'.$maincatproduct->thumbnail)}}" alt="product"></a>
                    

                            </div>
                            <div class="product-content">
                                <h6><a href="{{route('productdetail',$maincatproduct->id)}}" class="product-title">{{$maincatproduct->title}}</a></h6>
                                <p class="quantity">Available Stock {{$maincatproduct->product_quantity}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                   <div class="price">{{$maincatproduct->price - $maincatproduct->discountPercentage}}$  <del> ${{$maincatproduct->price}}</del></div>

                                     <div >
                                        <a class="cart-btn addToCart moblie_btn" data-id="{{$maincatproduct->id}}" ><i class="fas fa-shopping-cart"></i> Cart</a>
                                        <a class="cart-btn addToCart web_btn" data-id="{{$maincatproduct->id}}"  onclick="cartopen()"><i class="fas fa-shopping-cart"></i> Cart</a>
                                    </div>

                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                   
                    <div class="col-12 text-center d-flex justify-content-center mt-4">
                        {{$maincatproducts->links()}}
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
