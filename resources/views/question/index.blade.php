@extends('layouts.master')

@section('tab_tittle', 'question')
@section('question','active')

@section('content')


<div class="card">
  <div class="card-header d-flex justify-content-between">
    <div class="header-title">
      <h4 class="card-title">Pertanyaan</h4>
      <small>Data master > <font style="color:#002732;">Pertanyaan</font></small>
    </div>
  </div>
  <div class="card-body">

    <!-- Navigation Tab -->
    <div class="bd-example">
      <ul class="nav nav-pills" data-toggle="slider-tab" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="st1-tab" data-bs-toggle="tab" data-bs-target="#pills-st11" type="button" role="tab" aria-controls="st1" aria-selected="true">ST1</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="st2-tab" data-bs-toggle="tab" data-bs-target="#pills-st21" type="button" role="tab" aria-controls="st2" aria-selected="true">ST2</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="sta-tab" data-bs-toggle="tab" data-bs-target="#pills-sta1" type="button" role="tab" aria-controls="sta" aria-selected="false">STA</button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-st11" role="tabpanel" aria-labelledby="pills-st1-tab1">
          <!-- Nav Content 2 -->

          <div class="row">
            <div class="col-6">
              <p>Pertanyaan Seleksi Tahap 1 Merry Riana Group</p>
            </div>

            <div class="col-12 mt-3">
              <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" data-toggle="data-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pertanyaan</th>
                      <th>Posisi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td class="text-center">1</td>
                      <td>Nama</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">2</td>
                      <td>Phone</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">3</td>
                      <td>Email</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>Jenis Kelamin</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">5</td>
                      <td>Tanggal Lahir</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">6</td>
                      <td>Pendidikan Terakhir</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">7</td>
                      <td>Nama Universitas / Sekolah</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">8</td>
                      <td>Jurusan Kuliah</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">9</td>
                      <td>Tahun Kelulusan</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">10</td>
                      <td>Status Pekerjaan</td>
                      <td>All</td>
                    </tr>
                    <tr>
                      <td class="text-center">11</td>
                      <td>Referral</td>
                      <td>All</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End Nav Content 1 -->
        </div>
        <div class="tab-pane fade show" id="pills-st21" role="tabpanel" aria-labelledby="pills-st2-tab1">
          <!-- Nav Content 2 -->

          <div class="row">
            <div class="col-6">
              <p>Pertanyaan Seleksi Tahap 2 Merry Riana Group</p>
            </div>
            <div class="col-6">
              <button type="button" style="float: right;" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-icon  btn-success rounded-pill"> <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor" />
                </svg> <small> Add Data </small></button>
            </div>
            <div class="col-12 mt-3">
              <div class="table-responsive">
                <table id="datatable" class="table table-striped" data-toggle="data-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pertanyaan</th>
                      <th>Posisi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($qst2 as $row)
                    <tr>
                      <td class="text-center">{{ $i }}</td>
                      <td>{{ $row->question }}</td>
                      <td>All</td>
                      <td>
                        <button data-bs-toggle="modal" data-bs-target="#editModal{{ $row->question_id }}" type="button" class="btn btn-icon btn-primary rounded-pill"> <svg width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                            <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                            <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                          </svg></button>
                        <button data-bs-toggle="modal" data-bs-target="#deleteModal{{ $row->question_id }}" type="button" class="btn btn-icon btn-danger rounded-pill"><svg fill="none" xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor" />
                          </svg></button>
                      </td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- End Nav Content 2 -->

        </div>
        <div class="tab-pane fade" id="pills-sta1" role="tabpanel" aria-labelledby="pills-sta-tab1">
          <!-- Nav Content 3 -->
          <div class="row">
            <div class="col-6">
              <p>Pertanyaan Seleksi Tahap Akhir Merry Riana Group</p>
            </div>
            <div class="col-6">
              <button type="button" style="float: right;" data-bs-toggle="modal" data-bs-target="#addModalSTA" class="btn btn-icon  btn-success rounded-pill"> <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor" />
                </svg> <small> Add Data </small></button>
            </div>
            <div class="col-12 mt-3">
              <div class="table-responsive">
                <table id="datatable" class="table table-striped" data-toggle="data-table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pertanyaan</th>
                      <th>Posisi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($qsta as $row)
                    <tr>
                      <td class="text-center">{{ $i }}</td>
                      <td>{{ $row->question }}</td>
                      <td>All</td>
                      <td>
                        <button data-bs-toggle="modal" data-bs-target="#editModalSTA{{ $row->question_sta_id }}" type="button" class="btn btn-icon btn-primary rounded-pill"> <svg width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                            <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                            <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                          </svg></button>
                        <button data-bs-toggle="modal" data-bs-target="#deleteModalSTA{{ $row->question_sta_id }}" type="button" class="btn btn-icon btn-danger rounded-pill"><svg fill="none" xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor" />
                          </svg></button>
                      </td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End Nav Content 3 -->

        </div>
      </div>
    </div>

  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pertanyaan (ST2)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('question.store') }}">
        <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="position">Pertanyaan</label>
            <input type="hidden" class="form-control" id="type" name="type" value="st2" required>
            <textarea type="text" class="form-control" id="question" name="question" required></textarea>
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


<div class="modal fade" id="addModalSTA" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Pertanyaan (STA)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('question.store') }}">
        <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="position">Pertanyaan</label>
            <input type="hidden" class="form-control" id="type" name="type" value="sta" required>
            <textarea type="text" class="form-control" id="question" name="question" required></textarea>
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

<!-- End Add Modal -->

<!-- Edit Modal -->
@foreach ($qst2 as $row)
@php
$type = 'st2';
@endphp
<div class="modal fade" id="editModal{{ $row->question_id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('question.update', [$row->question_id,$type]) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="position">Pertanyaan</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ $row->question }}">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($qsta as $row)
@php
$type = 'sta';
@endphp
<div class="modal fade" id="editModalSTA{{ $row->question_sta_id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('question.update', [$row->question_sta_id,$type]) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="position">Pertanyaan</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ $row->question }}">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- End Edit Modal -->

<!-- Delete Modal -->
@foreach ($qst2 as $row)
@php
$type = 'st2';
@endphp
<div class="modal fade" id="deleteModal{{ $row->question_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body" style=" overflow-y: auto;">
        <form method="POST" action="{{ route('question.destroy', [$row->question_id,$type]) }}">
          @csrf
          @method('DELETE')
          <div class="row">
            <div class="col-12">
              <table class="table">
                <tr>
                  <td>Position</td>
                  <td>:</td>
                  <td>{{ $row->question }}</td>
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

@foreach ($qsta as $row)
@php
$type = 'sta';
@endphp
<div class="modal fade" id="deleteModal{{ $row->question_sta_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body" style=" overflow-y: auto;">
        <form method="POST" action="{{ route('question.destroy', [$row->question_sta_id,$type]) }}">
          @csrf
          @method('DELETE')
          <div class="row">
            <div class="col-12">
              <table class="table">
                <tr>
                  <td>Position</td>
                  <td>:</td>
                  <td>{{ $row->question }}</td>
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
<!-- End Delete Modal -->

@endsection