@extends('frontend.user_layout')

@section('main_content')
<section class="login-section section-ptb">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-6 offset-lg-3 mb--30 mb-lg-0">
              <div class="eflux-login-form-area">
                   <form method="POST" action="{{ route('password.email') }}" class="eflux-login-form">
                        @csrf
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="input-item">
                        <label for="user_identifier">Email</label>
                            <input  name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
                         <div>
                          <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                      </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                            </div>
                        </div>
                    </form>
              </div>
          </div>
      </div>
  </div>
</section>

@endsection
