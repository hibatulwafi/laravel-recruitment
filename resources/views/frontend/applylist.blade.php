@extends('frontend.layouts.master')
@section('content')
<style>
  .page-title {
    padding-top: 60px !important;
    padding-bottom: 60px !important;
  }
</style>

<section class="page-title title-bg13">
  <div class="d-table">
    <div class="d-table-cell">
      <h2>Apply List</h2>
    </div>
  </div>
</section>

<section class="blog-details-area ptb-100 bg-gray">
  <div class="container">
    <div class="row">

      @include('frontend.partials.sidebar')

      <div class="col-lg-8">
        <!-- Jobs Section Start -->
        <div class="container">
          <div class="section-title text-center">
            <h2>Riwayat Apply</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
          </div>

          <div class="row">
            @if(count($applylist) > 0)

            @foreach($applylist as $row)
            <div class="col-md-6">
              <div class="job-card">
                <div class="row align-items-center">
                  <div class="col-lg-12">
                    <div class="job-info">
                      <h3>
                        <a href="{{ route('career.detail', ['id' => strtolower($row->position)]) }}">{{$row->position}}</a>
                        <hr />
                      </h3>
                      <ul>
                        <li>
                          <i class='bx bx-location-plus'></i>
                          {{$row->city}}
                        </li>
                        <li>
                          <i class='bx bx-filter-alt'></i>
                          Seleksi Tahap 1
                        </li>
                        <li>
                          <i class='bx bx-stopwatch'></i>
                          {{ date('j F Y', strtotime($row->tgl_daftar)) }}
                        </li>
                      </ul>
                      <hr />
                      <div class="text-info"> Status : Menunggu Seleksi tahap 2 </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
            @else
            <div class="col-lg-12 text-center">
              <div class="alert alert-info" role="alert">
                Riwayat apply kosong
              </div>
            </div>
            @endif
          </div>
        </div>
        <!-- Jobs Section End -->
      </div>
    </div>
  </div>
</section>


<!-- Job Section End -->
<section id="loker" class="job-style-two pt-100 pb-70">
  <div class="container">
    <div class="section-title text-center">
      <h2>Lowongan kerja yang tersedia</h2>
      <p>berikut beberapa lowongan pekerjaan yang tersedia dan sedang berlangsung di Merry Riana Group</p>
    </div>

    <div class="row">
      @if(count($position) > 0)

      @foreach($position as $row)
      <div class="col-lg-6">
        <div class="job-card-two">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="job-info">
                <h3>
                  <a href="{{ route('career.detail', ['id' => strtolower($row->position)]) }}">{{$row->position}}</a>
                </h3>
                <hr>
              </div>
            </div>
            <div class="col-md-9">
              <div class="job-info">
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
        <p>Lowongan kerja belum tersedia.</p>
      </div>
      @endif

    </div>
  </div>
</section>

@endsection