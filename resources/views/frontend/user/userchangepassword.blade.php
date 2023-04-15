@extends('frontend.user_layout')

@section('main_content')
  <section class="page-content section-ptb-90">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class=" mb-1 text-center">Change Your Password</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 offset-md-3">
          <div class="passwordChange">
            <form action="{{ route('userPasswordChange') }}" method="POST">
              @csrf
              <div class="form-group">
                <label>Your Old Password</label>
                <input type="password" class="form-control" name="oldpassword">
              </div>
              <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                  <span class="invalid feedback"role="alert">
                    <strong class="text-danger">{{ $errors->first('password') }}.</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
              <a href="{{ route('userProfile') }}" class="btn btn-danger">Cancle</a>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#avatarpass')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  };
</script>
