<div class="modal fade" id="storeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h2 class="mt-2">Product Create Page</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                  <form action="{{route('product.store')}}" method="POST" id="ajaxForm" enctype="multipart/form-data">
                    @csrf
                   <div class="row mb-2">
                     <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Title</label>
                        <input type="text"  class="form-control" name="title">
                       <p class="em text-danger" id="errtitle"></p>
                      </div>
                     </div>
                     
                     <div class="col-md-6">
                      <div class="form-group">
                        <label >Category Name</label>
                         <select name="category_id" class="form-control">
                           <option>Choose Category</option>
                           @foreach ($categorys as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option> 
                           @endforeach
                         </select>
                      </div>
                      <p class="em text-danger" id="errcategory"></p>
                    </div>
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Brand Name</label>
                         <select name="brand_id" class="form-control">
                           <option value="">Choose Brand</option>
                           @foreach ($brands as $brand)
                               <option value="{{$brand->id}}">{{$brand->name}}</option>
                           @endforeach
                         </select>
                           <p class="em text-danger" id="errbrand"></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Price</label>
                        <input type="number" min="1"  class="form-control" name="price">
                      <p class="em text-danger" id="errprice"></p>
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Discount %</label>
                        <input type="number" min="1"  class="form-control" name="discountPercentage">
                      </div>
                      <p class="em text-danger" id="errdiscountPercentage"></p>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Rating </label>
                        <input type="number" min="1"  class="form-control" name="rating">
                      </div>
                        <p class="em text-danger" id="errrating"></p>
                    </div>
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Stock</label>
                        <input type="number" min="1"  class="form-control" name="stock">
                      </div>
                       <p class="em text-danger" id="errstock"></p>
                    </div>
                    <div class="col-md-12 mt-3">
                      <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description"></textarea>
                      </div>
                       <p class="em text-danger" id="errdescription"></p>
                      </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Thubnail Image</label>
                        <label class="custom-file">
                          <input type="file" class="custom-file-input" onchange="readURL(this)" name="thumbnail">
                          <span class="custom-file-control"></span>
                        </label>
                        <img src="#" id="one" alt="">
                          <p class="em text-danger" id="errthumbnail"></p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label >Images</label><br>
                        <label class="custom-file">
                          <input type="file" id="file" class="custom-file-input" multiple onchange="readURL2(this)" name="images[]" multiple>
                          <span class="custom-file-control"></span>
                        </label>
                      <div id="image-preview"></div>
                       <p class="em text-danger" id="errimages"></p>
                      </div>
                    </div>
                   </div>

                   <div class="form-group mt-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submitBtn">Store</button>
                   </div>
                  </form>
                  </div>
            </div>
        </div>
    </div>
      </div>
     
    </div>
  </div>
</div>



    

