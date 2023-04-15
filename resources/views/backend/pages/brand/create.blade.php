<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h5 class="mt-2">Brand Create Page</h5>
              <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                <form action="{{ route('brand.store') }}" method="POST" id="ajaxForm">
                  @csrf
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Brand Name</label>
                    <input type="text" class="form-control" name="name">
                   <p id="errname" class="em text-danger"></p>
                  </div>

                  <button type="submit" class="btn btn-primary submitBtn">store</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
