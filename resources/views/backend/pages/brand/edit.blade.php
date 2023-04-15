<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <h2 class="mt-2">Brand Edit Page</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                  <form action="{{route('update.brand')}}" method="POST" id="ajaxEditForm">
                    @csrf
                    <input type="hidden" id="in_id" name="id">
                
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Brand Name</label>
                      <input type="text" id="in_name" class="form-control" name="name">
                      <p id="editErr_name" class="em text-danger"></p>
                    </div>
                  
                    <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                  </form>
                  </div>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
</div>
