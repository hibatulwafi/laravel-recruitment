@extends('frontend.layouts.master')
@section('content')

<section class="page-title title-bg13">
  <div class="d-table">
    <div class="d-table-cell">
      <h2>Sign Up</h2>
      <ul>
        <li>
          <a href="{{route('career.index')}}" class="nav-link ">Home</a>
        </li>
        <li>Sign Up</li>
      </ul>
    </div>
  </div>
</section>

<!-- Sign up Section Start -->
<div class="signup-section ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
        <form class="signup-form" action="{{route('register.store')}}" method="POST" id="regForm">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter Your Name" name="name" id="name" value="{{ old('name') }}" required>
            <span class="error text-danger">{{ $errors->first('name') }}</span>
          </div>

          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" placeholder="Enter Your Phone" name="phone" id="phone" value="{{ old('phone') }}" onkeypress="phoneValidation()" onkeyup="phoneValidation()" maxlength="15" required>
            <span class="error text-danger">{{ $errors->first('email') }}</span>
            <span class="error text-danger" id="phone-validation-message"></span>

          </div>

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

          <div class="signup-btn text-center">
            <button type="submit">Sign Up</button>
          </div>

          <div class="create-btn text-center">
            <p>
              Have an Account?
              <a href="{{route('login.index')}}">
                Sign In
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

  function phoneValidation() {
    isPhoneValid = $('#phone-value-validation').val();
    var phone = document.getElementById('phone');
    var validationMessage = document.getElementById('phone-validation-message');
    var goodColor = "#66cc66";
    var badColor = "#ff0000";
    var firstNumber = phone.value[0];

    var countryData = intelInputNumber.getSelectedCountryData();
    if (phone.value.length == 1 && phone.value[0] != '+') {
      if (firstNumber == '0') {
        var mobile = "+" + countryData.dialCode;
        $('#phone').val(mobile);
      } else {
        var mobile = "+" + countryData.dialCode + phone.value;
        $('#phone').val(mobile);
      }
    }

    let indoPhoneCondition = true;
    if (phone.value.startsWith("+62")) {
      if (phone.value[3] == '8') {
        indoPhoneCondition = true;
      } else {
        indoPhoneCondition = false;
      }
    }

    if (phone.value.length >= 11 && phone.value.length <= 15 && firstNumber != '0' && phone.value.startsWith("+") &&
      phone.value[3] != '0' && indoPhoneCondition) {
      phone.style.borderColor = goodColor;
      validationMessage.style.color = goodColor;
      validationMessage.innerHTML = "";
      isPhoneValid = "true";
      return true;
    } else if (phone.value.length == 0) {
      phone.style.borderColor = badColor;
      validationMessage.style.color = badColor;
      validationMessage.innerHTML = "HP harus diisi"
      isPhoneValid = "false";
      return false;
    } else if (firstNumber == '0') {
      phone.style.borderColor = badColor;
      validationMessage.style.color = badColor;
      validationMessage.innerHTML = "HP tidak bisa dimulai dengan angka 0"
      isPhoneValid = "false";
      return false;
    } else if (!phone.value.startsWith("+")) {
      phone.style.borderColor = badColor;
      validationMessage.style.color = badColor;
      validationMessage.innerHTML = "HP harus diawali kode negara"
      isPhoneValid = "false";
      return false;
    } else if (phone.value[3] == 0) {
      phone.style.borderColor = badColor;
      validationMessage.style.color = badColor;
      validationMessage.innerHTML = "HP tidak bisa dimulai dengan angka 0"
      isPhoneValid = "false";
      return false;
    } else if (!indoPhoneCondition) {
      phone.style.borderColor = badColor;
      validationMessage.style.color = badColor;
      if (phone.value.length > 0 && phone.value.length < 11) {
        validationMessage.innerHTML = "HP minimal 8 karakter"
      } else {
        validationMessage.innerHTML = "HP harus diikuti dengan angka 8"
      }
      isPhoneValid = "false";
      return false;
    } else if (phone.value.length > 0 && phone.value.length < 11) {
      phone.style.borderColor = badColor;
      validationMessage.style.color = badColor;
      validationMessage.innerHTML = "HP minimal 8 karakter"
      isPhoneValid = "false";
      return false;
    }
  }
</script>
<!-- Job Section End -->
@endsection