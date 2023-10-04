@extends('layouts.master')

@section('tab_tittle', 'Loker')
@section('master-loker', 'active')

@section('content')

<div class="card">
  <div class="card-header">
    <div class="header-title">
      <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#pills-tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">Periode</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#pills-tab-2" type="button" role="tab" aria-controls="tab-2" aria-selected="false">Landing Page</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="tab-3" data-bs-toggle="tab" data-bs-target="#pills-tab-3" type="button" role="tab" aria-controls="tab-3" aria-selected="false">Posisi</button>
        </li>
      </ul>
    </div>
  </div>
  <hr>
  <div class="card-body">
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-tab-1" role="tabpanel" aria-labelledby="pills-tab-1">
        @include('master.vacancies.tab-periode')
      </div>

      <div class="tab-pane fade show" id="pills-tab-2" role="tabpanel" aria-labelledby="pills-tab-2">
        @include('master.vacancies.tab-landing-page')
      </div>

      <div class="tab-pane fade show" id="pills-tab-3" role="tabpanel" aria-labelledby="pills-tab-3">
        @include('master.vacancies.tab-posisi')
      </div> <!-- End Card Body -->

    </div><!-- End Tab 3 -->
  </div><!-- End Tab Content -->
</div><!-- End Card -->

<!-- Start Modal -->

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Vacancy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('vacancy.store') }}">
        <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" required>
          </div>

          <div class="form-group">

            <label for="link">Link</label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon3">https://merryriana.com/loker/</span>
              <input type="text" class="form-control" id="link" name="link" aria-describedby="basic-addon3" required>
            </div>

          </div>

          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal -->
@foreach ($vacancies as $row)
<div class="modal fade" id="editModal{{ $row->vacancy_id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('vacancy.update', $row->vacancy_id) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="position">Nama</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $row->position }}">
          </div>

          <div class="form-group">
            <label for="link">Link</label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon3">https://merryriana.com/loker/</span>
              <input type="text" class="form-control" id="link" name="link" aria-describedby="basic-addon3" value="{{ $row->segment }}" required>
            </div>

          </div>

          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
              <option value="active" {{ $row->status == 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ $row->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Modal -->
@foreach ($vacancies as $row)
<div class="modal fade" id="deleteModal{{ $row->vacancy_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body" style=" overflow-y: auto;">
        <form method="POST" action="{{ route('vacancy.destroy', $row->vacancy_id) }}">
          @csrf
          @method('DELETE')
          <div class="row">
            <div class="col-12">
              <table class="table">
                <tr>
                  <td>Position</td>
                  <td>:</td>
                  <td>{{ $row->position }}</td>
                </tr>
                <tr>
                  <td>link</td>
                  <td>:</td>
                  <td>https://merryriana.com/loker/{{ $row->segment }}</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td>{{ $row->status }}</td>
                </tr>
              </table>
            </div>
          </div>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
  $(document).ready(function() {

    $('#editModal{{ $row->vacancy_id }}').on('shown.bs.modal', function() {});

    $('#editModal{{ $row->vacancy_id }} form').on('submit', function(e) {
      alert('hit')
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(response) {
          if (response.success) {
            // Jika pembaruan berhasil, tutup modal
            $('#editModal{{ $row->vacancy_id }}').modal('hide');
            // Refresh atau perbarui bagian tampilan yang relevan jika perlu
          } else {
            // Jika ada kesalahan validasi, tampilkan pesan kesalahan dalam modal
            // Misalnya, dengan menempatkan pesan kesalahan di dalam elemen dengan ID tertentu
            $('#editModal{{ $row->vacancy_id }} .modal-body').html(response.errors);
          }
        }
      });
    });
  });
</script>
<!-- End Modal -->
@endsection