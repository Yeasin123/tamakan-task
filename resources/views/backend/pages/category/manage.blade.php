@extends('backend.admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h2 class="mt-2">category Page</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
              <div> <a class="btn btn-success mb-2" style="float:right;cursor:pointer;color:#fff" data-toggle="modal" data-target="#brandModal">+category</a></div>
                    <div class="table-wrapper">
                      @if(!$category->isEmpty())
                      <table id="datatable1" class="table display responsive nowrap text-center table-bordered">
                        <thead >
                          <tr>
                            <th class="wd-15p">SL</th>
                            <th class="wd-15p">Category Name</th>
  
                            <th class="wd-10p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                          $i = 1;
                        @endphp
                          @foreach ($category as $categorys )
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$categorys->name}}</td>
                           
                            <td>
                              <div class="d-flex justify-content-between">
                                <a data-toggle="modal" data-target="#editModal" class="btn btn-success editBtn" data-id="{{$categorys->id}}" data-name="{{$categorys->name}}">Edit</a>
                                <a href="{{route('category.destroy', $categorys->id)}}" class="btn btn-danger" data-toggle="modal" data-target="#categoryDeleteModal{{$categorys->id}}">Delete</a>
                              </div>
                            </td>
                          </tr>
                          {{-- Delete Modal --}}
                          <div class="modal fade" id="categoryDeleteModal{{$categorys->id}}" tabindex="-1" role="dialog" aria-labelledby="categoryDeleteModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="categoryDeleteModal">Are you sure to delete this category??</h5>
                                  
                                </div>
                                <div class="modal-body text-center">
                                  <form action="{{route('category.destroy',$categorys->id)}}" method="POST">
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
                        <h1 class="text-center">Empty category</h1>
                      </div>
                    @endif  
                    </div>
                  </div> 
                 

            </div>
        </div>
    </div>
  @include('backend.pages.category.create')
      @include('backend.pages.category.edit')
@endsection
