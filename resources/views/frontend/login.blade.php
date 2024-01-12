@extends('frontend.layouts.master')
@section('content')

<section class="page-title title-bg13">
  <div class="d-table">
    <div class="d-table-cell">
      <h2>Sign In</h2>
      <ul>
        <li>
          <a href="{{route('career.index')}}" class="nav-link ">Home</a>
        </li>
        <li>
          <a href="#" class="nav-link ">Sign In</a>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- Sign up Section Start -->
<div class="signin-section ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
        <form class="signin-form" action="{{route('login.signin')}}" method="POST" id="regForm">
          {{ csrf_field() }}

          @error('login_gagal')
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
          </div>
          @enderror

          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter Your Email" name="email" id="email" value="{{ old('email') }}" required>
            <span class="error text-danger">{{ $errors->first('email') }}</span>

          </div>

          <div class="form-group password-container">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter Your Password" name="password" id="password" value="{{ old('password') }}" required>
            <img src="{{ asset('assets/frontend/img/icon/eye.svg') }}" id="password-icon" class="password-icon" onclick="togglePassword()" alt="Toggle Password Visibility">
            <span class="error text-danger">{{ $errors->first('password') }}</span>

          </div>

          <div class="form-group row">
            <div class="col-md-12 align-center captcha-container"> {!! htmlFormSnippet() !!} </div>
            <span class="error  text-danger text-center">{{ $errors->first('g-recaptcha-response') }}</span>
          </div>

          <div class="signin-btn text-center">
            <button type="submit">Sign In</button>
          </div>

          <div class="create-btn text-center">
            <p>
              Don't have an account?
              <a href="{{route('register.index')}}">
                Sign Up
                <i class='bx bx-chevrons-right bx-fade-right'></i>
              </a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function togglePassword() {
    var passwordField = document.getElementById("password");
    var icon = document.getElementById("password-icon");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.src = "{{ asset('assets/frontend/img/icon/crossed-eye.svg') }}";
    } else {
      passwordField.type = "password";
      icon.src = "{{ asset('assets/frontend/img/icon/eye.svg') }}";
    }
  }
</script>
<!-- Job Section End -->
@endsection