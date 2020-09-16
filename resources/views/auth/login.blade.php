<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Max Grocery Shop</title>
    <!--BASIC css-->
    @include('admin.partials.style')
</head>


<body class="hold-transition login-page bg-danger">
    <div class="login-box ">
      <div class="login-logo">
       <b>Max</b> Grocery Shop
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
    
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
              <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus >
            
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="input-group mb-3">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
               
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="row">
              <div class="col-4"></div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Login') }}
                </button>
              </div>
              <div class="col-4"></div>
              <!-- /.col -->
            </div>
          </form>
    
          {{-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
          </div> --}}
          <!-- /.social-auth-links -->
    
          {{-- <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
          </p> --}}
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->






            
        {{-- <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                           
                        </div>
                        <div class="form-group">
                        <label for="password" class="">{{ __('Password') }}</label>
                            
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                           
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <a href="index.html" class="btn btn-primary btn-block">Login</a> -->
                            <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                        </div>
                        <div class="form-group text-center">
                            <a href="">Forgot password?</a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<!--BASIC scripts-->
@include('admin.partials.script')
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>
