<div class="container searchDiv mt-5">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-8 offset-md-2">
            @if (!$searchItems->isEmpty())
            <div class="card">
                @foreach ($searchItems as $searchItem)
                    <div class="list border-bottom">
                        <div class="d-flex flex-column ml-3"> <a href="{{route('productdetail',$searchItem->id)}}"><p><img src="{{asset('images/product/'. $searchItem->thumbnail)}}" alt="">  <span>{{$searchItem->title}} </span></p></a>  </div>
                    </div>
                @endforeach
                
            </div>
            @else
            <div class="card">
                <div class="list border-bottom">
                    <div class="d-flex flex-column ml-3"><h5 class="text-center">Product Not Found</h5 class="text-center"> </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>



<style>

.select-search-option{
    position: relative;
}
.searchDiv {
    position: absolute;
    z-index: 999999;
    top: 6px;
    left: -87px;
}
.card {
    background-color: #fff;
    /* padding: 15px; */
    border: 1px solid #ccc
}

.input-box {
    position: relative
}

.input-box i {
    position: absolute;
    right: 13px;
    top: 15px;
    color: #ced4da
}

.form-control {
    height: 50px;
    background-color: #eeeeee69
}

.form-control:focus {
    background-color: #eeeeee69;
    box-shadow: none;
    border-bottom: 2px solid #ccc !important
}

.list {
    padding-top: 20px;
    padding-bottom: 10px;
    display: flex;
    align-items: center
}

.border-bottom {
    border-bottom: 2px solid #ccc !important
}

.list i {
    font-size: 19px;
    color: red
}

.list small {
    color: #dedddd
}

.searchDiv img{
    width: 50px
}


@media (min-width: 320px) and (max-width: 480px) {
    .searchDiv {
    position: absolute;
    z-index: 999999;
    top: 58px;
    left: 0px;
}
  
}

@media (min-width: 481px) and (max-width: 767px) {
    .searchDiv {
    position: absolute;
    z-index: 999999;
    top: 58px;
    left: 0px;
}
 
  
}
</style>
