<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Foto Profil</div>

        <div class="card-body">
          <form method="POST" action="{{ route('changephoto.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="profile_photo">Pilih Foto Baru</label>
              <input type="file" class="form-control-file" id="profile_photo" name="profile_photo">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>