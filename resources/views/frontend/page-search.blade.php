@extends('frontend.layouts.master')
@section('content')
<!-- Banner Section Start -->
<div class="banner-section banner-section-search banner-style-five">
  <div class="d-table">
    <div class="d-table-cell">
      <div class="container">
        <div class="banner-content text-center">
          <h2 style="color:white;">
            Hasil Pencarian
          </h2>
        </div>
        <form class="find-form" action="{{ route('career.search') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kata Kunci" name="keyword" value="{{$data['keyword']}}">
                <i class="bx bx-search-alt"></i>
              </div>
            </div>

            <div class="col-lg-4">
              <select class="category form-control form-select" name="location" style="height: 60px; border-radius:10px;">
                <option data-display="lokasi">Lokasi</option>
                @foreach($placement as $row)
                <option value="{{$row->city}}" {{ $data['location'] == $row->city ? 'selected' : '' }}>{{$row->city}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-lg-4">
              <button type="submit" class="find-btn">
                Cari Lowongan
                <i class='bx bx-search'></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Banner Section End -->

<!-- Job Section End -->
<section class="job-style-two pt-100 pb-70">
  <div class="container">
    <div class="row">
      @if(count($result) > 0)
      @foreach($result as $row)
      <div class="col-lg-6">
        <div class="job-card-two">
          <div class="row align-items-center">
            <div class="col-md-8">
              <div class="job-info">
                <h3>
                  <a href="{{ route('career.detail', ['id' => strtolower($row->position)]) }}">{{$row->position}}</a>
                </h3>
                <ul>
                  <li>
                    <i class='bx bx-location-plus'></i>
                    {{$row->city}}
                  </li>
                  <li>
                    <i class='bx bx-stopwatch'></i>
                    Deadline : {{ date('j F Y', strtotime($row->end_date)) }}
                  </li>
                </ul>

                <span>Full Time</span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="theme-btn text-center">
                <a href="{{ route('career.detail', ['id' => strtolower($row->position)]) }}" class="default-btn">
                  Lihat Detail
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <div class="col-lg-12 text-center">
        <p>Lowongan kerja tidak ditemukan.</p>
      </div>
      @endif
    </div>
  </div>
</section>
@endsection