<div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <h2 class="mt-2">Category Create Page</h2>
                <div class="card pd-20 pd-sm-40 mg-t-50 mb-3">
                  <form action="{{route('category.store')}}" method="POST" id="ajaxForm">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Category Name</label>
                      <input type="text"  class="form-control" name="name">
                      <p class="em text-danger" id="errname"></p>
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
    

