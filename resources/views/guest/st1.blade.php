<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Seleksi Tahap 1 - {{$vacancy->position}}</title>
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
    <div class="card mb-2">
      <div class="card-header" style="padding-top:0px; background-color:rgb(103, 58, 183);"></div>

      <div class="card-body">
        <h1>Seleksi Tahap 1 Warrior MRG</h1>
        <h6>Form Lamaran Kerja di PT. Merry Riana Group. </h6>
      </div>
    </div>

    <form method="POST" action="{{ route('store.st1') }}">
      @csrf

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
            <input type="text" class="form-control" id="name" name="name" placeholder="Jawaban Anda" value="{{ $name ? $name : '' }}" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Jawaban Anda" value="{{ $phone ? $phone : '' }}" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Jawaban Anda" value="{{ $email ? $email : '' }}" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" name="gender" required>
              <option value="">Pilih</option>
              <option value="male" {{ ($profile && $profile->gender == 'male') ? 'selected' : '' }}>Laki - Laki</option>
              <option value="female" {{ ($profile && $profile->gender == 'female') ? 'selected' : '' }}>Perempuan</option>
            </select>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="email">Tanggal Lahir</label> 
            <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Jawaban Anda"  value="{{ $profile ? $profile->birthdate : '' }}" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="gender">Pendidikan Terakhir</label>
            <select class="form-control" name="education">
              <option value="">Pilih</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMA">SMA</option>
              <option value="D1">D1</option>
              <option value="D2">D2</option>
              <option value="D3">D3</option>
              <option value="D4">D4</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              <option value="S3">S3</option>
            </select>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="phone">Nama Universitas / Sekolah</label>
            <input type="text" class="form-control" id="university" name="university" placeholder="Jawaban Anda" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="phone">Jurusan Kuliah</label>
            <input type="text" class="form-control" id="major" name="major" placeholder="Jawaban Anda" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="phone">Tahun Kelulusan</label>
            <input type="text" class="form-control" id="graduation_year" name="graduation_year" placeholder="Jawaban Anda" required>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="gender">Status Pekerjaan</label>
            <select class="form-control" name="job_status" required>
              <option value="">Pilih</option>
              <option value="kuliah">Kuliah</option>
              <option value="kerja">Kerja</option>
              <option value="cari kerja">Cari kerja</option>
            </select>
          </div>
        </div>
      </div>

      <div class="card mb-2">
        <div class="card-body">
          <div class="form-group">
            <label for="phone">Referral</label>
            <input type="text" class="form-control" id="referral" name="referral" placeholder="Jawaban Anda" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 mb-5">
          <button type="submit" class="btn btn-primary float-right" style="width:200px;">Save</button>
        </div>
      </div>

      <div class="row">
        <div class="col-12 mb-5 mt-5 text-center">
          © 2023 Merry Riana Group. All Rights Reserved
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