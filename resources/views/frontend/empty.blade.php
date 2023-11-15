@extends('frontend.layouts.master')
@section('content')

<style>
  .banner-section-search {
    height: 500px !important;
  }
</style>
<!-- Banner Section Start -->
<div class="banner-section banner-section-search banner-style-five">
  <div class="d-table">
    <div class="d-table-cell">
      <div class="container">
        <div class="banner-content text-center">
          <h2 style="color:white;">
            {{$data['message']}}
          </h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Banner Section End -->
@endsection