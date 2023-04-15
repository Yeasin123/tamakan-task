@extends('frontend.user_layout')

@section('main_content')
<section class="login-section section-ptb">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-6 offset-lg-3 mb--30 mb-lg-0">
              <div class="eflux-login-form-area">
                  <form action="{{route('login')}}" method="post" class="eflux-login-form">
                      @csrf
                        @if (session('success'))
                        <div class="alert alert-info }}">
                            {{ session('success') }}
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

                      <div class="input-item">
                          <label>Password</label>
                          <input type="password" name="password" placeholder="Password">
                           @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>

                      <div>
                          <button type="submit" class="submit">Login</button>
                          <p><a href="{{route('register')}}"> Register</a> / <a href="{{route('password.request')}}">Forget password?</a></p>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
