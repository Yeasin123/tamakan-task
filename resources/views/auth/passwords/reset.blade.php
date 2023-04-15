@extends('frontend.user_layout')

@section('main_content')
  <section class="login-section section-ptb">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 offset-lg-3 mb--30 mb-lg-0">
          <div class="eflux-login-form-area">
            <form action="{{ route('password.update') }}" method="post" class="eflux-login-form">
              <input type="hidden" name="token" value="{{ $token }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">
              <div class="input-item">
                <label for="user_identifier">Email</label>
                <input name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

              </div>
              <div class="input-item">
                <label>New Password</label>
                <input type="password" name="password" placeholder="Password">
                @if ($errors->has('password'))
                  <span class="invalid feedback"role="alert">
                    <strong class="text-danger">{{ $errors->first('password') }}.</strong>
                  </span>
                @endif
              </div>

              <div class="input-item">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                @if ($errors->has('password_confirmation'))
                  <span class="invalid feedback"role="alert">
                    <strong class="text-danger">{{ $errors->first('password_confirmation') }}.</strong>
                  </span>
                @endif
              </div>

              <div>
                <button type="submit" class="btn btn-success">Reset Password</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
