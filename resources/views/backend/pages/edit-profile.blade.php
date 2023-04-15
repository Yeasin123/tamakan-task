@extends('backend.admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h2 class="mt-2">Update Profile</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                  <form action="{{route('admin.profile.update')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label >Name</label>
                      <input type="text"  class="form-control" name="name" value="{{$admin->name}}">
                      @if ($errors->has('name'))
                            <span class="invalid feedback"role="alert">
                                <strong class="text-danger">{{ $errors->first('name') }}.</strong>
                            </span>
                      @endif
                    </div>
                     <div class="form-group">
                      <label >Phone</label>
                      <input type="number"  class="form-control" name="phone" value="{{$admin->phone}}">
                      @if ($errors->has('phone'))
                            <span class="invalid feedback"role="alert">
                                <strong class="text-danger">{{ $errors->first('phone') }}.</strong>
                            </span>
                      @endif
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                  </div>
            </div>
        </div>
    </div>
    
@endsection
