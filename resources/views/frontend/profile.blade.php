@extends('frontend.layouts.master')
@section('content')
<!-- Page Title Start -->
<section class="page-title title-bg13">
  <div class="d-table">
    <div class="d-table-cell">
      <h2>Account</h2>
      <ul>
        <li>
          <a href="{{route('career.index')}}" class="nav-link ">Home</a>
        </li>
        <li>
          <a href="#" class="nav-link ">Account</a>
        </li>
      </ul>
    </div>
  </div>
</section>
<!-- Page Title End -->
<style>
  #profileImage {
    width: 150px;
    height: 150px;
    object-fit: cover;
    /* Memotong dan menjaga aspek rasio */
  }
</style>
<!-- Account Area Start {{ asset('assets/frontend/img/account.jpg') }} -->
<section class="account-section ptb-100 bg-gray-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="account-information bg-white">
          <div class="profile-thumb">
            <div class="profile-container">
              @if($profile->photo != null)
              <img src="{{ asset('storage/profile_photos/' . $profile->photo) }}" alt="account holder image" id="profileImage">
              @else
              <img src="{{ asset('assets/frontend/img/account.jpg') }}" alt="account holder image" id="profileImage">
              @endif
              <button class="edit-button" data-bs-toggle="modal" data-bs-target="#editPhotoModal">
                <i class="fas fa-edit"></i>
              </button>
            </div>
            <h3>{{Auth::user()->name}}</h3>
          </div>

          <!-- Modal Edit Foto -->
          <div class="modal fade" id="editPhotoModal" tabindex="-1" role="dialog" aria-labelledby="editPhotoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editPhotoModalLabel">Edit Foto Profil</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Isi dari formulir edit foto -->
                  @include('frontend.editphoto')
                </div>
              </div>
            </div>
          </div>

          <ul>
            <li>
              <a href="{{route('profil.index')}}" class="{{ ($collapse === 'profile') ? 'active' : '' }}">
                <i class='bx bx-user'></i>
                My Profile
              </a>
            </li>
            <li>
              <a href="{{route('applylist.index')}}" class="{{ ($collapse === 'applylist') ? 'active' : '' }}">
                <i class='bx bx-heart'></i>
                Apply List
              </a>
            </li>
            <li>
              <a href="{{route('changepassword.index')}}" class="{{ ($collapse === 'change-password') ? 'active' : '' }}">
                <i class='bx bx-lock-alt'></i>
                Change Password
              </a>
            </li>
            <li>
              <a href="{{route('logout.flush')}}">
                <i class='bx bx-log-out'></i>
                Log Out
              </a>
            </li>
          </ul>
        </div>
      </div>
      @if($collapse === 'profile')
      <div class="col-md-8">
        <div class="account-details bg-white">
          <h3>Basic Information</h3>
          <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
          </div>
          <form action="{{ route('profil.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Your Name" value="{{Auth::user()->name}}" id="nameInput" name="nameInput" disabled>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Your Email" value="{{Auth::user()->email}}" id="emailInput" name="emailInput" disabled>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="number" class="form-control" placeholder="Your Phone" value="{{Auth::user()->phone}}" id="phoneInput" name="phoneInput" disabled>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" id="dobInput" name="dobInput" value="{{ $profile ? $profile->birthdate : '' }}" disabled>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control form-select" id="genderInput" name="genderInput" disabled>
                    <option value="male" {{ ($profile && $profile->gender == 'male') ? 'selected' : '' }}>Laki - laki</option>
                    <option value="female" {{ ($profile && $profile->gender == 'female') ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Pendidikan Terakhir</label>
                  <select class="form-control form-select" id="educationInput" name="educationInput" disabled>
                    <option value="SD" {{ ($profile && $profile->education == 'SD') ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ ($profile && $profile->education == 'SMP') ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ ($profile && $profile->education == 'SMA') ? 'selected' : '' }}>SMA</option>
                    <option value="D3" {{ ($profile && $profile->education == 'D3') ? 'selected' : '' }}>D3</option>
                    <option value="S1" {{ ($profile && $profile->education == 'S1') ? 'selected' : '' }}>S1</option>
                    <option value="S2" {{ ($profile && $profile->education == 'S2') ? 'selected' : '' }}>S2</option>
                    <option value="S3" {{ ($profile && $profile->education == 'S3') ? 'selected' : '' }}>S3</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Universitas / Sekolah</label>
                  <input type="text" class="form-control" placeholder="e.g. Universitas Indonesia" value="{{ $profile->university ?? '' }}" id="universitasInput" name="universitasInput" disabled>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Jurusan Kuliah</label>
                  <input type="text" class="form-control" placeholder="Jurusan Kuliah" value="{{ $profile->major ?? '' }}" id="jurusanInput" name="jurusanInput" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tahun Kelulusan</label>
                  <input type="number" class="form-control" placeholder="Tahun Lulus" value="{{ $profile->graduation_year ?? '' }}" id="tahunlulusInput" name="tahunlulusInput" disabled>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Status Pekerjaan</label>
                  <select class="form-control form-select" id="statuskerjaInput" name="statuskerjaInput" disabled>
                    <option value="kuliah" {{ ($profile && $profile->job_status == 'kuliah') ? 'selected' : '' }}>Kuliah</option>
                    <option value="kerja" {{ ($profile && $profile->job_status == 'kerja') ? 'selected' : '' }}>Kerja</option>
                    <option value="cari kerja" {{ ($profile && $profile->job_status == 'cari kerja') ? 'selected' : '' }}>Cari Kerja</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <button type="button" class="account-btn" onclick="toggleEdit()">Edit</button>
                <button type="submit" class="account-btn bg-btn-green" id="saveButton" hidden>Save</button>
              </div>
            </div>
          </form>

          <h3>File Dokumen</h3>

          <form action="{{ route('upload.file') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>CV</label>
                  <input class="form-control" type="file" name="cv_file" />
                  <sup class="text-danger">*max file size : 2MB</sup>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Portfolio</label>
                  <input class="form-control" type="file" name="portfolio_file" />
                  <sup class="text-danger">*max file size : 2MB</sup>
                </div>
              </div>
              <div class="col-md-12">
                <p class="text-danger">*Kosongkan jika tidak mengubah data</p>
                <button type="submit" class="account-btn bg-btn-green" id="saveButton">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @elseif($collapse === 'change-password')
      <div class="col-md-8">
        <div class="account-details bg-white">
          <h3>Change Password</h3>
          <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('changepassword.update') }}">
              @csrf

              <div class="form-group row">
                <label for="current_password" class="col-md-4 col-form-label text-md-right">Password Saat Ini</label>

                <div class="col-md-8">
                  <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">

                  @error('current_password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="new_password" class="col-md-4 col-form-label text-md-right">Password Baru</label>

                <div class="col-md-8">
                  <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                  @error('new_password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">Konfirmasi Password Baru</label>

                <div class="col-md-8">
                  <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
<!-- Account Area End -->


<script>
  function toggleEdit() {

    var nameInput = document.getElementById('nameInput');
    var emailInput = document.getElementById('emailInput');
    var phoneInput = document.getElementById('phoneInput');
    var dobInput = document.getElementById('dobInput');
    var genderInput = document.getElementById('genderInput');
    var educationInput = document.getElementById('educationInput');
    var universitasInput = document.getElementById('universitasInput');
    var jurusanInput = document.getElementById('jurusanInput');
    var tahunlulusInput = document.getElementById('tahunlulusInput');
    var statuskerjaInput = document.getElementById('statuskerjaInput');
    var editButton = document.querySelector('.account-btn');
    var saveButton = document.getElementById('saveButton');

    if (nameInput.disabled) {
      nameInput.removeAttribute('disabled');
      emailInput.removeAttribute('disabled');
      phoneInput.removeAttribute('disabled');
      dobInput.removeAttribute('disabled');
      genderInput.removeAttribute('disabled');
      educationInput.removeAttribute('disabled');
      universitasInput.removeAttribute('disabled');
      jurusanInput.removeAttribute('disabled');
      statuskerjaInput.removeAttribute('disabled');
      tahunlulusInput.removeAttribute('disabled');
      editButton.textContent = 'Cancel';
      saveButton.removeAttribute('hidden');
    } else {
      nameInput.setAttribute('disabled', true);
      emailInput.setAttribute('disabled', true);
      phoneInput.setAttribute('disabled', true);
      dobInput.setAttribute('disabled', true);
      genderInput.setAttribute('disabled', true);
      educationInput.setAttribute('disabled', true);
      universitasInput.setAttribute('disabled', true);
      jurusanInput.setAttribute('disabled', true);
      statuskerjaInput.setAttribute('disabled', true);
      tahunlulusInput.setAttribute('disabled', true);
      editButton.textContent = 'Edit';
      saveButton.setAttribute('hidden', true);
    }
  }
</script>
</script>

@endsection