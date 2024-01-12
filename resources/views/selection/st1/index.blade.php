@extends('layouts.master')

@section('tab_tittle', 'st1')
@section('st1', 'active')

@section('content')

<div class="card-header d-flex justify-content-between">
  <div class="header-title">
    <h4 class="card-title">Seleksi Tahap 1</h4>
  </div>
  <div>
    <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#pills-tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">Berlangsung</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#pills-tab-2" type="button" role="tab" aria-controls="tab-2" aria-selected="false">Berakhir</button>
      </li>
    </ul>
  </div>
</div>
<hr>
<div class="card-body">
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-tab-1" role="tabpanel" aria-labelledby="pills-tab-1">
      @include('selection.st1.tab-1')
    </div>

    <div class="tab-pane fade show" id="pills-tab-2" role="tabpanel" aria-labelledby="pills-tab-2">
      @include('selection.st1.tab-2')
    </div>
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
              <span class="input-group-text" id="basic-addon3">https://recruitment.merryriana.com/</span>
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

<!-- End Modal -->
@endsection