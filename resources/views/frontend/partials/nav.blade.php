<!-- Navbar Area Start -->
<div class="navbar-area">
  <!-- Menu For Mobile Device -->
  <div class="mobile-nav">
    <a href="{{route('career.index')}}" class="logo">
      <img src="{{ asset('assets/frontend/img/mrg-logo.png') }}" style="max-width: 40px;" alt="logo">
    </a>
  </div>

  @auth
  @php
  $nama = Auth::user()->name;
  $nama_array = explode(" ", $nama);
  $kata_pertama = $nama_array[0];
  @endphp
  @endauth

  <!-- Menu For Desktop Device -->
  <div class="main-nav">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{route('career.index')}}">
          <img src="{{ asset('assets/frontend/img/mrg-logo.png') }}" style="max-width: 50px;" alt="logo">
        </a>
        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            @auth
            <li class="mobile-item">
              <a href="#" class="nav-link">Hi,{{ $kata_pertama }}!</a>
            </li>
            @endauth

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
            @auth
            <li class="mobile-item">
              <a href="{{route('logout.flush')}}" class="nav-link">Logout</a>
            </li>
            @else
            <li class="mobile-item">
              <a href="{{route('register.index')}}" class="nav-link">Sign Up</a>
            </li>

            <li class="mobile-item">
              <a href="{{route('login.index')}}" class="nav-link">Sign In</a>
            </li>
            @endauth

          </ul>

          @auth
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link dropdown-toggle">Hi, {{ $kata_pertama }}! &nbsp;
                <div class="notification-icon">
                  <i class="fas fa-bell"></i>
                  <span class="badge">3</span>
                </div>
              </a>

              <ul class="dropdown-menu">
                <li class="nav-item">
                  <a href="{{route('profil.index')}}" class="nav-link">Edit Profile</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('applylist.index')}}" class="nav-link">Apply List  <span class="badge-item">3</span> </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('logout.flush')}}"  class="nav-link">Logout</a>
                </li>
              </ul>
            </li>
          </ul>

          <!-- <div class="other-option">
            <div class="name-auth"> 
              <a href="{{route('logout.flush')}}" class="signin-btn">Logout</a>
            </div>
          </div> -->
          @else
          <div class="other-option">
            <a href="{{route('register.index')}}" class="signup-btn">Sign Up</a>
            <a href="{{route('login.index')}}" class="signin-btn">Sign In</a>
          </div>
          @endauth
        </div>
      </nav>
    </div>
  </div>
</div>
<!-- Navbar Area End -->