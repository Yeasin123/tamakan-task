@extends('backend.admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h2 class="mt-2">Product Edit Page</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                  <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   <div class="row mb-2">
                     <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Product Name</label>
                        <input type="text" value="{{$product->title}}" class="form-control" name="title">
                        @if ($errors->has('title'))
                              <span class="invalid feedback"role="alert">
                                  <strong class="text-danger">{{ $errors->first('title') }}.</strong>
                              </span>
                        @endif
                      </div>
                     </div>
                     <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Category Name</label>
                         <select name="category" class="form-control">
                           <option>Choose Category</option>
                           @foreach ($categorys as $category)
                              <option value="{{$category->name}}"  @if($category->name == $product->category)  selected @endif >{{$category->name}}</option> 
                           @endforeach
                         </select>
                      </div>
                    </div>

                    
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Brand Name</label>
                         <select name="brand" class="form-control">
                           <option value="">Choose Brand</option>
                           @foreach ($brands as $brand)
                           <option value="{{$brand->name}}"  @if($brand->name == $product->brand)  selected @endif >{{$brand->name}}</option>
                           @endforeach
                         </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Price</label>
                        <input type="number" min="1"  class="form-control" value="{{$product->price}}" name="price">
                        @if ($errors->has('price'))
                              <span class="invalid feedback"role="alert">
                                  <strong class="text-danger">{{ $errors->first('price') }}.</strong>
                              </span>
                        @endif
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlFile1" >Discount %</label>
                        <input type="number" min="1"  class="form-control" value="{{$product->discountPercentage}}" name="discountPercentage">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlFile1" >Rating </label>
                        <input type="number" min="1"  class="form-control"  value="{{$product->rating}}" name="rating">
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Stock</label>
                        <input type="number" min="1"  class="form-control" value="{{$product->stock}}" name="stock">
                      </div>
                    </div>
                    <div class="col-md-12 mt-3">
                      <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description">{{$product->description}}</textarea>
                      </div>
                      </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Thubnail Image</label>
                        <label class="custom-file">
                          <input type="file" class="custom-file-input" onchange="readURL(this)" name="thumbnail">
                          <span class="custom-file-control"></span>
                        </label>
                        <img src="{{asset('images/product/'.$product->thumbnail)}}" width="50" id="one" alt="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Images</label><br>
                        <label class="custom-file">
                          <input type="file" id="file" class="custom-file-input" multiple onchange="readURL2(this)" name="images[]" multiple>
                          <span class="custom-file-control"></span>
                        </label>
                      <div id="image-preview"></div>
                      
                      </div>
                    </div>
                   </div>
                    <div class="col-md-12">
                      <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                   </form>
                 </div>                   
                </div>
            </div>
        </div>
    </div>
    


<script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  };
  </script>

  <script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  };
</script>

<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  };

</script>
    
@endsection
