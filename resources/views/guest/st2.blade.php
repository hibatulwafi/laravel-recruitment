<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Seleksi Tahap 2 - {{$vacancy->position}}</title>
</head>

<body>

  @php
  $name = '';
  $phone = '';
  $email = '';
  $gender = '';
  $birthdate = '';
  $education = '';
  $university = '';
  $major = '';
  $graduation_year = '';
  $job_status = '';
  @endphp

  @auth
  @php
  $name = Auth::user()->name;
  $phone = Auth::user()->phone;
  $email = Auth::user()->email;
  $gender = '';
  $birthdate = '';
  $education = '';
  $university = '';
  $major = '';
  $graduation_year = '';
  $job_status = '';
  @endphp
  @endauth

  <style>
    body {
      background-color: #f7f7f7;
    }
  </style>

  <div class="container mt-5">
    <div class="card mb-3">
      <div class="card-header" style="padding-top:0px; background-color:rgb(103, 58, 183);"></div>

      <div class="card-body">
        <h1>Seleksi Tahap 2 Warrior MRG</h1>
        <h6>Form Lamaran Kerja di PT. Merry Riana Group.</h6>
      </div>
    </div>


    <form method="POST" action="{{ route('store.st2') }}">
      @csrf
      <input type="hidden" class="form-control" id="vacancy_id" name="vacancy_id" value="1">

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="name">Pekerjaan yang di lamar</label>
            <input type="text" class="form-control" value="{{$vacancy->position}}" disabled>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-header" style="padding-top:0px; background-color:rgb(103, 58, 183);"></div>
        <div class="card-body">
          <h3>Silahkan isi data diri Anda</h3>
          <h6>Harap isi dengan data yang benar</h6>
          <hr>
          <div class="form-group">
            <input type="hidden" class="form-control" id="vacancy_id" name="vacancy_id" value="{{$vacancy->vacancy_id}}">
            <input type="hidden" class="form-control" id="batch_id" name="batch_id" value="{{$batch->batch_id}}">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Jawaban Anda"  value="{{ $name ? $name : '' }}" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Jawaban Anda"  value="{{ $phone ? $phone : '' }}" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Jawaban Anda" value="{{ $email ? $email : '' }}"  required>
          </div>
        </div>
      </div>


      @php
      $i = 1;
      @endphp
      @foreach ($question as $row)
      <div class="card mb-3">
        @if($i == 1)
        <div class="card-header" style="padding-top:0px; background-color:rgb(103, 58, 183);">
        </div>
        <div class="card-body">
          <h3>Silahkan isi pertanyaan berikut</h3>
          <h6>Patikan Anda memilih jawaban yang tepat :)</h6>
          <hr>
          @else
          <div class="card-body">
            @endif

            <div class="form-group">
              <label for="name">{{ $i }}.{{$row->question}}</label>
              @if($row->type == 'text')
              <div class="form-group">
                <input type="text" class="form-control" id="question-{{$row->question_id }}" name="answer[]" placeholder="Jawaban Anda">
              </div>
              @elseif($row->type == 'radio')
              @foreach ($answer as $rowa)
              @if($rowa->question_id == $row->question_id)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="answer[{{$i}}]" id="radio-{{$row->question_id }}" value="{{$rowa->answer}}">
                <label class="form-check-label" for="radio-{{$row->question_id }}">
                  {{$rowa->answer}}
                </label>
              </div>

              @endif
              @endforeach
              @endif
            </div>

          </div>
        </div>
        @php
        $i++;
        @endphp
        @endforeach
        <div class="row">
          <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary float-right" style="width:200px;">Save</button>
          </div>
        </div>
    </form>
  </div>

  <!-- Bootstrap JavaScript CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>