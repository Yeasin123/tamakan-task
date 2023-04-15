@extends('backend.admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <h2 class="mt-2">Product Stock Page</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                    <div class="table-wrapper">
                  <div> <a class="btn btn-success mb-2" style="float:right;cursor:pointer;color:#fff" href="{{route('product.create')}}">+Products</a></div>

                        @if(!$products->isEmpty())
                        <table id="datatable1" class="table display table-responsive-lg table-responsive-sm table-responsive-md table-responsive-xl nowrap text-center table-bordered">
                          <thead>
                            <tr>
                              <th class="wd-15p">SL</th>
                              <th class="wd-15p">Products Name</th>
                              <th class="wd-15p">Image</th>
                              <th class="wd-15p"> Price</th>
                              <th class="wd-15p">Category</th>
                              <th class="wd-20p">Brand</th>
                              <th class="wd-20p">Stock Qty</th>
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
                              <td>${{$product->price}}</td>
                             
                              <td>{{$product->category}}</td>
                              <td>
                                {{$product->brand}}
                               
                              </td>
                              <td>{{$product->stock}}</td>
                           
                              <td>
                                <div class="d-flex justify-content-between">
                                  <a href="{{route('product.edit', $product->id)}}" class="btn btn-success">Edit</a>
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
                                  <div class="modal-footer">
                                    
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
 
@endsection
