@extends('frontend.layouts.master')
@section('content')
<!-- Banner Section Start -->
<div class="banner-section banner-style-five">
  <div class="d-table">
    <div class="d-table-cell">
      <div class="container">
        <div class="banner-content text-center">
          <h1>
            Karir
          </h1>
          <h2 style="color:white;">
            Start your journey with Merry Riana Group
          </h2>
          <p>together we create positive impact from indonesia to the world.</p>
        </div>

        <form class="find-form" action="{{ route('career.search') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kata Kunci" name="keyword">
                <i class="bx bx-search-alt"></i>
              </div>
            </div>

            <div class="col-lg-4">
              <select class="category" name="location">
                <option data-display="lokasi">Lokasi</option>
                @foreach($placement as $row)
                <option value="{{$row->city}}">{{$row->city}}</option>
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

<!-- Why Choose Section Start -->
<section class="choose-style-two why-choose pt-100 ">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <div class="why-choose-text pb-70">
          <div class="section-title">
            <h2>Kenapa Harus MRG?</h2>
            MRG adalah sebuah tim yang terdiri atas pribadi-pribadi muda yang berkomitmen dengan suatu misi untuk mencapai kesuksesan bagi diri kami sendiri dan orang-orang yang kami cintai.
          </div>

          <div class="row">
            <h2>Benefits</h2>
            <div class="col-sm-4">
              <div class="media">
                <i class="flaticon-discussion align-self-top mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0">Di Mentori oleh Miss Merry Riana</h5>
                  <p>Memiliki kesempatan untuk mengembangkan diri dan belajar langsung dari Miss Merry Riana.</p>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="media">
                <i class="flaticon-group align-self-top mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0">Menjadi bagian dari Tim MRG</h5>
                  <p>Semua anggota timnya adalah orang-orang muda yang terpilih.</p>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="media">
                <i class="flaticon-left-quotes-sign align-self-top mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0">Memberi Dampak Positif</h5>
                  <p>Menciptakan dampak positif terhadap jutaan orang di negara Indonesia.</p>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="media">
                <i class="flaticon-consultation align-self-top mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0">Lingkungan kerja yang positif</h5>
                  <p>Memiliki Lingkungan kerja yang sangat positif.</p>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="media">
                <i class="flaticon-computer align-self-top mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0">Memiliki jam terbang yang tinggi</h5>
                  <p>Memiliki kesempatan untuk mengembangkan kemampuan.</p>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="media">
                <i class="flaticon-heart align-self-top mr-3"></i>
                <div class="media-body">
                  <h5 class="mt-0">Bekerja sesuai Passion</h5>
                  <p>Dapat bekerja sesuai dengan passion.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Why Choose Section End -->

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
        <p>Lowongan kerja belum tersedia.</p>
      </div>
      @endif

    </div>
  </div>
</section>
<!-- Job Section End -->
@endsection