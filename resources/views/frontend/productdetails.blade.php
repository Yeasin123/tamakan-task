@extends('frontend.user_layout')
@section('main_content')
    <section class="product-zoom-info-section section-ptb">
        <div class="container">
            <div class="product-zoom-info-container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="product-zoom-area">
                            <div>
                                <img src="{{asset('storage/images/product/'.$product->thumbnail)}}" alt="">
                            </div>
                            <div class="d-flext align-items-center justify-content-between mt-4">
                                @foreach(json_decode($product->images) as $img)
                                <div class=" p-3">
                                    <img src="{{asset('storage/images/product/'.$img)}}" width="75" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content">
                           
                            <form action="{{route('producttoCart',$product->id)}}" method="post">
                              @csrf
                            <p>{{$product->category}} </p>
                            <h2>{{$product->title}}</h2>
                            <p class="quantity">Available Stock {{$product->stock}}</p>
                           
                            <div class="price">{{$product->price - $product->discountPercentage}}$  <del> ${{$product->price}}</del></div>
                           
                            <div class="">
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Quantity</label>
                                                <input type="number" min="1" value="1" width="40" name="product_quantity" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <p>{!!  substr(strip_tags($product->description), 0, 150) !!}</p>
                            <div class="d-flex justify-content-first">
                                <button type="submit" class="btn-success btn text-white addToCart">add to cart</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
