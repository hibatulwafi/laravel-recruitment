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
      <h2>{{$menu}}</h2>
      <ul>
        <li>
          <a href="{{route('applylist.index')}}" class="nav-link ">Apply List</a>
        </li>
        <li>
          <a href="#" class="nav-link ">{{$menu}}</a>
        </li>
      </ul>
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
            <h2>{{$menu}}</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
          </div>

          <div class="row">
            @if(count($results) > 0)
            @foreach($results as $row)

            @if($collapse === 'st1' || $collapse === 'st2' || $collapse === 'sta')
            <div class="col-md-12">
              <div class="job-card">
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
                          Tgl Daftar : {{ date('j F Y', strtotime($row->tgl_daftar)) }}
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-3">
                    @if($collapse === 'st1')
                    <div class="theme-btn text-center">
                      <button onclick="lihatJawaban('st1','{{$row->candidates_id}}')" class="default-btn bg-btn-blue" data-bs-toggle="modal" data-bs-target="#lihatJawabanModal">
                        Lihat Jawaban
                      </button>
                    </div>
                    @elseif($collapse === 'st2')
                    <!-- Cek status isi ST2 -->
                    @if ($row->answer_id === null)
                    <div class="theme-btn text-center">

                      <a href="{{ route('loker.st2', ['id' => $row->position]) }}" class="default-btn bg-btn-green" target="_BLANK">
                        Isi Pertanyaan
                      </a>
                    </div>
                    @else
                    <div class="theme-btn text-center">
                      <button onclick="lihatJawaban('st2','{{$row->answer_id}}')" class="default-btn bg-btn-blue" data-bs-toggle="modal" data-bs-target="#lihatJawabanModal">
                        Lihat Jawaban
                      </button>
                    </div>
                    @endif
                    <!-- End IF Cek Status -->
                    @elseif($collapse === 'sta')
                    <!-- Cek status isi STA -->
                    @if ($row->answer_id === null)
                    <div class="theme-btn text-center">

                      <a href="{{ route('loker.sta', ['id' => $row->position]) }}" class="default-btn bg-btn-green" target="_BLANK">
                        Isi Pertanyaan
                      </a>
                    </div>
                    @else
                    <div class="theme-btn text-center">
                      <button onclick="lihatJawaban('sta','{{$row->answer_id}}')" class="default-btn bg-btn-blue" data-bs-toggle="modal" data-bs-target="#lihatJawabanModal">
                        Lihat Jawaban
                      </button>
                    </div>
                    @endif
                    <!-- End IF Cek Status -->
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <!-- Menu Group Interview -->
            @elseif($collapse === 'gi')
            <div class="col-md-12">
              <div class="job-card">
                <div class="row align-items-center">
                  <div class="col-md-12">
                    <div class="job-info">
                      <h3>
                        {{$row->position}}
                      </h3>
                      <hr>
                      <h6>
                        <a href="{{$row->link}}" target="_BLANK">{{$row->link}}</a>
                      </h6>
                      <i class='bx bx-stopwatch'></i>
                      Tgl Zoom : {{ date('j F Y', strtotime($row->date_zoom)) }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            <!-- End Menu Group Interview -->
            @endforeach
            @else
            <div class="col-lg-12 text-center">
              <div class="alert alert-info" role="alert">
                Data kosong
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

<!-- Modal -->
<div class="modal fade" id="lihatJawabanModal" tabindex="-1" aria-labelledby="lihatJawabanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lihatJawabanModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function lihatJawaban(type, id) {

    if (type == 'st1') {
      $.ajax({
        url: '/get_jawaban/' + type + '/' + id,
        method: 'GET',
        success: function(response) {
          var createdAtDate = new Date(response.created_at);

          // Format tanggal sesuai dengan kebutuhan Anda
          var formattedCreatedAt = createdAtDate.toLocaleString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: 'numeric',
            minute: 'numeric'
          });


          var tableHtml = '<table class="table">';
          tableHtml += '<tr><th>Pertanyaan</th><th>jawaban</th></tr>';
          tableHtml += '<tr><td> Nama </td><td>' + response.name + '</td></tr>';
          tableHtml += '<tr><td> Telepon </td><td>' + response.phone + '</td></tr>';
          tableHtml += '<tr><td> Email </td><td>' + response.email + '</td></tr>';
          tableHtml += '<tr><td> Jenis Kelamin </td><td>' + response.gender + '</td></tr>';
          tableHtml += '<tr><td> Tanggal Lahir </td><td>' + response.birthdate + '</td></tr>';
          tableHtml += '<tr><td> Pendidikan Terakhir </td><td>' + response.education + '</td></tr>';
          tableHtml += '<tr><td> Universitas / Sekolah </td><td>' + response.university + '</td></tr>';
          tableHtml += '<tr><td> Jurusan Kuliah </td><td>' + response.major + '</td></tr>';
          tableHtml += '<tr><td> Tahun Kelulusan </td><td>' + response.graduation_year + '</td></tr>';
          tableHtml += '<tr><td> Status Pekerjaan </td><td>' + response.job_status + '</td></tr>';
          tableHtml += '<tr><td> Referral </td><td>' + response.referral + '</td></tr>';
          tableHtml += '<tr><td> Diinput pada </td><td>' + formattedCreatedAt + '</td></tr>';
          tableHtml += '</table>';

          $('#lihatJawabanModalLabel').html('Jawaban Detail');
          $('#lihatJawabanModal .modal-body').html(tableHtml);
          $('#lihatJawabanModal').modal('show');
        },
        error: function(error) {
          console.error('Error fetching data:', error);
        }
      });
    } else if (type == 'st2') {
      $.ajax({
        url: '/get_jawaban/' + type + '/' + id,
        method: 'GET',
        success: function(response) {
          console.log(response.answer);

          var createdAtDate = new Date(response.created_at);
          // Format tanggal sesuai dengan kebutuhan Anda
          var formattedCreatedAt = createdAtDate.toLocaleString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: 'numeric',
            minute: 'numeric'
          });


          var responseData = JSON.parse(response.answer);
          // Mengecek apakah responseData memiliki properti pertanyaan
          if (Object.keys(responseData).some(key => key.startsWith('question'))) {
            // Membuat tabel HTML
            var tableHtml = '<table class="table">';
            tableHtml += '<tr><th>Pertanyaan</th><th>Jawaban</th></tr>';

            // Melakukan looping untuk setiap pertanyaan dalam responseData
            for (var i = 2; responseData.hasOwnProperty('question' + i); i++) {
              var questionKey = 'question' + i;
              var questionValue = responseData[questionKey];
              var pertanyaan = 'Pertanyaan ' + (i - 1);
              // Menambahkan baris tabel untuk setiap pertanyaan
              tableHtml += '<tr><td>' + pertanyaan + '</td><td>' + questionValue + '</td></tr>';
            }

            tableHtml += '</table>';
            $('#lihatJawabanModal .modal-body').html(tableHtml);

          } else {
            $('#lihatJawabanModal .modal-body').html('<p>Tidak ada pertanyaan yang ditemukan.</p>');
          }
          $('#lihatJawabanModalLabel').html('Jawaban Detail');
          $('#lihatJawabanModal').modal('show');
        },
        error: function(error) {
          console.error('Error fetching data:', error);
        }
      });
    } else if (type == 'sta') {
      $.ajax({
        url: '/get_jawaban/' + type + '/' + id,
        method: 'GET',
        success: function(response) {
          console.log(response.answer);

          var createdAtDate = new Date(response.created_at);
          // Format tanggal sesuai dengan kebutuhan Anda
          var formattedCreatedAt = createdAtDate.toLocaleString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: 'numeric',
            minute: 'numeric'
          });


          var responseData = JSON.parse(response.answer);
          // Mengecek apakah responseData memiliki properti pertanyaan
          if (Object.keys(responseData).some(key => key.startsWith('question'))) {
            // Membuat tabel HTML
            var tableHtml = '<table class="table">';
            tableHtml += '<tr><th>Pertanyaan</th><th>Jawaban</th></tr>';

            // Melakukan looping untuk setiap pertanyaan dalam responseData
            for (var i = 1; responseData.hasOwnProperty('question' + i); i++) {
              var questionKey = 'question' + i;
              var questionValue = responseData[questionKey];
              var pertanyaan = 'Pertanyaan ' + i;
              // Menambahkan baris tabel untuk setiap pertanyaan
              tableHtml += '<tr><td>' + pertanyaan + '</td><td>' + questionValue + '</td></tr>';
            }

            tableHtml += '</table>';
            $('#lihatJawabanModal .modal-body').html(tableHtml);

          } else {
            $('#lihatJawabanModal .modal-body').html('<p>Tidak ada pertanyaan yang ditemukan.</p>');
          }
          $('#lihatJawabanModalLabel').html('Jawaban Detail');
          $('#lihatJawabanModal').modal('show');
        },
        error: function(error) {
          console.error('Error fetching data:', error);
        }
      });
    }
  }
</script>

@endsection