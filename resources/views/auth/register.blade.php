

@extends('frontend.user_layout')

@section('main_content')
<section class="login-section section-ptb">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-6 offset-lg-3 mb--30 mb-lg-0">
              <div class="eflux-login-form-area">
                  <form action="{{route('register')}}" method="post" class="eflux-login-form">
                      @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-item">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Your Name">
                                @if ($errors->has('name'))
                                    <span class="invalid feedback"role="alert">
                                        <strong class="text-danger">{{ $errors->first('name') }}.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item">
                                <label>Phone</label>
                                <input type="text" name="phone" placeholder="Your Phone">
                                @if ($errors->has('phone'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('phone') }}.</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email Address">
                            </div>
                             @if ($errors->has('email'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('email') }}.</strong>
                                </span>
                                @endif
                        </div>
                        <div class="col-md-6">
                            <div class="input-item">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('password') }}.</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid feedback"role="alert">
                                    <strong class="text-danger">{{ $errors->first('password_confirmation') }}.</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <button type="submit" class="btn btn-success">Register</button>
                                <p><a href="{{route('user.login')}}">Already register ?</a></p>
                            </div>
                        </div>
                        </div>
                    </form>
                        
                     </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
