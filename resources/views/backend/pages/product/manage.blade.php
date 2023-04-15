@extends('backend.admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <h2 class="mt-2">Product Page</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                  <div> <a class="btn btn-success mb-2" style="float:right;cursor:pointer;color:#fff" data-toggle="modal" data-target="#storeModal">+Products</a></div>
                    <div class="table-wrapper">
                        @if(!$products->isEmpty())
                        <table id="datatable1" class="table display table-responsive-lg table-responsive-sm table-responsive-md table-responsive-xl nowrap text-center table-bordered">
                          <thead>
                            <tr>
                              <th class="wd-15p">SL</th>
                              <th class="wd-15p">Title</th>
                              <th class="wd-15p">Thumbnail</th>
                              <th class="wd-15p">Price</th>
                              <th class="wd-15p">Category Name</th>
                              <th class="wd-20p">Brand Name</th>
                              <th class="wd-10p">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                            $i = 1;
                          @endphp
                            @foreach ($products as $product )
                            <tr>
                              <td>{{$i++}}</td>
                              <td>{{$product->title}}</td>
                              <td><img src="{{asset('images/product/'.$product->thumbnail)}}" width="50" alt=""></td>
                              <td>{{$product->price}}</td>
                              <td>{{$product->category}}</td>
  
                              <td>
                                @if($product->brand != Null)
                                {{$product->brand}}
                                @else
                                <span class="text-warning">No Brand</span>
                                @endif
                              </td>
                              <td>
                                <div class="d-flex justify-content-between">
                                  <a href="{{route('product.edit',$product->id)}}" class="btn btn-success productEdit">Edit</a>
                                  <a href="{{route('product.destroy', $product->id)}}" class="btn btn-danger" data-toggle="modal" data-target="#productsDeleteModal{{$product->id}}">Delete</a>
                                </div>
                              </td>
                            </tr>
                            {{-- Delete Modal --}}
                            <div class="modal fade" id="productsDeleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="productsDeleteModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="productsDeleteModal">Are you sure to delete this products??</h5>
                                    
                                  </div>
                                  <div class="modal-body text-center">
                                    <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                    </form>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </tbody>
                        </table>
                        @else
                        <div class="alert alert-primary" role="alert">
                          <h1 class="text-center">Empty Product</h1>
                        </div>
                      @endif 
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
    @include('backend.pages.product.create')
    {{-- @include('backend.pages.product.edit') --}}
 
@endsection
    
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        
     $(document).on('click','.productEdit',function(){
          var id = $(this).data('id');
          console.log(id,'dfsdf  ')
          if (id) {
            
            $.ajax({
             url: "{{ route('product.edit', ':id') }}".replace(':id', id),
              type:"GET",
              dataType:"json",
              success:function(data) { 
                console.log(data)
              },
            });

          }

        });

      });

 </script>




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
  function readURL2(input) {
  if (input.files && input.files.length > 0) {
    for (var i = 0; i < input.files.length; i++) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var img = $('<img>').attr('src', e.target.result).width(80).height(80);
        $('#image-preview').append(img);
      };
      reader.readAsDataURL(input.files[i]);
    }
  }
}
</script>
