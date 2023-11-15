@include('frontend.partials.header')
<body class="">
  <!-- Pre-loader Start -->
  <div class="loader-content">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="sk-circle">
          <div class="sk-circle1 sk-child"></div>
          <div class="sk-circle2 sk-child"></div>
          <div class="sk-circle3 sk-child"></div>
          <div class="sk-circle4 sk-child"></div>
          <div class="sk-circle5 sk-child"></div>
          <div class="sk-circle6 sk-child"></div>
          <div class="sk-circle7 sk-child"></div>
          <div class="sk-circle8 sk-child"></div>
          <div class="sk-circle9 sk-child"></div>
          <div class="sk-circle10 sk-child"></div>
          <div class="sk-circle11 sk-child"></div>
          <div class="sk-circle12 sk-child"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Pre-loader End -->

  @include('frontend.partials.nav')
  @yield('content')
  @include('frontend.partials.footer')
  @include('frontend.partials.scripts')

</body>
</html>