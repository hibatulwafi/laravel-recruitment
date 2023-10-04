@extends('layouts.master')

@section('tab_tittle', 'Loker')
@section('master-loker', 'active')

@section('content')


<div class="card">
  <div class="card-header d-flex justify-content-between">
    <div class="header-title">
      <h4 class="card-title">Riwayat Loker</h4>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 mt-3">
        <div class="table-responsive">

          <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-hover" data-toggle="data-table">
              <thead>
                <tr class="text-center" style="color:#2d2d2d;">
                  <th>No</th>
                  <th>Posisi</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($batch as $row)
                <tr>
                  <td class="text-center">
                    {{ $i }}
                  </td>
                  <td>
                    {{ $row->position }}
                  </td>
                  <td class="text-center">
                    {{ \Carbon\Carbon::parse($row->start_date)->format('d M Y') . ' - ' . \Carbon\Carbon::parse($row->end_date)->format('d M Y') }}
                  </td>
                  <td class="text-center">
                    @if(\Carbon\Carbon::now() > \Carbon\Carbon::parse($row->end_date))
                    <span class="badge rounded-pill bg-danger">
                      Berakhir
                    </span>
                    @else
                    <span class="badge rounded-pill bg-success">
                      Berlangsung
                    </span>
                    @endif

                  </td>
                  <td class="text-center">
                    <button data-bs-toggle="modal" data-bs-target="#editModal{{ $row->vacancy_id }}" type="button" class="btn btn-icon btn-success rounded-pill"> <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z" fill="currentColor"></path>
                      </svg> </button>
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
    </div>
  </div>
</div>

@endsection