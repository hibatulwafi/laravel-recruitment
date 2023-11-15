<!-- Navbar Area Start -->
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
      <a href="index.html" class="logo">
        <img src="{{ asset('assets/frontend/img/mrg-logo.png') }}" style="max-width: 50px;" alt="logo">
      </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="index.html">
            <img src="{{ asset('assets/frontend/img/mrg-logo.png') }}" style="max-width: 50px;"alt="logo">
          </a>
          <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
              <li class="nav-item">
                <a href="{{route('career.index')}}" class="nav-link ">Home</a>
              </li>
              <li class="nav-item">
                <a href="#loker" class="nav-link">Loker</a>
              </li>

              <li class="nav-item">
                <a href="{{route('career.about')}}" class="nav-link">Tentang</a>
              </li>
              <li class="nav-item">
                <a href="#footer" class="nav-link">Kontak</a>
              </li>
            </ul>

            <div class="other-option">
              <a href="sign-up.html" class="signup-btn">Sign Up</a>
              <a href="sign-in.html" class="signin-btn">Sign In</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- Navbar Area End -->