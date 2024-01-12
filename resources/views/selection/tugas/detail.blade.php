@extends('layouts.master')

@section('tab_tittle', 'sta')
@section('sta', 'active')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between">
    <div class="header-title">
      <h4 class="card-title">Seleksi Tahap Akhir</h4>
    </div>
    <div>
      <a href="{{ route('export.kandidat_bybatch', ['id' => $segment]) }}" class="btn btn-icon btn-info rounded-pill" data-toggle="popover" title="Seleksi Kandidat" data-content="Seleksi Kandidat" target="_BLANK"> <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1535 16.64L14.995 13.77C15.2822 13.47 15.2822 13 14.9851 12.71C14.698 12.42 14.2327 12.42 13.9455 12.71L12.3713 14.31V9.49C12.3713 9.07 12.0446 8.74 11.6386 8.74C11.2327 8.74 10.896 9.07 10.896 9.49V14.31L9.32178 12.71C9.03465 12.42 8.56931 12.42 8.28218 12.71C7.99505 13 7.99505 13.47 8.28218 13.77L11.1139 16.64C11.1832 16.71 11.2624 16.76 11.3515 16.8C11.4406 16.84 11.5396 16.86 11.6386 16.86C11.7376 16.86 11.8267 16.84 11.9158 16.8C12.005 16.76 12.0842 16.71 12.1535 16.64ZM19.3282 9.02561C19.5609 9.02292 19.8143 9.02 20.0446 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5 22 16.0446 22H8.17327C5.58911 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.4901 2 7.96535 2H13.2525C13.5 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.1931 9.01 17.0149 9.02C17.4333 9.02 17.8077 9.02318 18.1346 9.02595C18.3878 9.02809 18.6125 9.03 18.8069 9.03C18.9479 9.03 19.1306 9.02789 19.3282 9.02561ZM19.6045 7.5661C18.7916 7.5691 17.8322 7.5661 17.1421 7.5591C16.047 7.5591 15.145 6.6481 15.145 5.5421V2.9061C15.145 2.4751 15.6629 2.2611 15.9579 2.5721C16.7203 3.37199 17.8873 4.5978 18.8738 5.63395C19.2735 6.05379 19.6436 6.44249 19.945 6.7591C20.2342 7.0621 20.0223 7.5651 19.6045 7.5661Z" fill="currentColor" />
        </svg> Export Excel</a>
    </div>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('sta.good') }}" enctype="multipart/form-data">
      <div class="row">
        @csrf

        <div class="col-6 mt-3">
          <div class="alert alert-solid alert-info alert-dismissible fade show " role="alert">
            <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2 11.9993C2 6.48027 6.48 1.99927 12 1.99927C17.53 1.99927 22 6.48027 22 11.9993C22 17.5203 17.53 21.9993 12 21.9993C6.48 21.9993 2 17.5203 2 11.9993ZM11.12 8.20927C11.12 7.73027 11.52 7.32927 12 7.32927C12.48 7.32927 12.87 7.73027 12.87 8.20927V12.6293C12.87 13.1103 12.48 13.4993 12 13.4993C11.52 13.4993 11.12 13.1103 11.12 12.6293V8.20927ZM12.01 16.6803C11.52 16.6803 11.13 16.2803 11.13 15.8003C11.13 15.3203 11.52 14.9303 12 14.9303C12.49 14.9303 12.88 15.3203 12.88 15.8003C12.88 16.2803 12.49 16.6803 12.01 16.6803Z" fill="currentColor" />
            </svg>
            <strong>Info!</strong> Pilih pada checkbox, klik button good/not good.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color:white;"> </button>
          </div>

        </div>
        <div class="col-6 d-flex justify-content-end align-items-center">


          <button class="btn btn-icon btn-success rounded-pill lihat-data-kandidat" style="width: 200px;" data-toggle="popover">Good</button>
          &nbsp;
          <button class="btn btn-icon btn-danger rounded-pill lihat-data-kandidat" formaction="{{ route('sta.not_good') }}" style="width: 200px;" data-toggle="popover">Not Good</button>

          &nbsp;

        </div>

        <div class="col-12 mt-3">
          <div class="table-responsive">
            <table id="datatable" class="table table-striped" data-toggle="data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>#</th>
                  <th>Status</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  @php $i = 0; @endphp
                  @foreach ($question as $key => $value)
                  <td>
                    {{$value->question}}
                  </td>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($data as $row)
                @php $decodedData = json_decode($row->answer) @endphp
                <tr>
                  <td class="text-center">{{ $i }}</td>
                  <td class="text-center">
                    <input style="zoom:1.3" type="checkbox" name="answer_id[]" value="{{ $row->answer_id }}" />
                    <input type="hidden" name="vacancy_id[]" value="{{ $row->vacancy_id }}" />
                    <input type="hidden" name="batch_id[]" value="{{ $row->batch_id }}" />
                  </td>
                  <td class="text-center">
                    @if($row->status == 'lolos')
                    <span class="badge bg-success">Good</span>
                    @elseif($row->status == 'tidak')
                    <span class="badge bg-danger">Not Good</span>
                    @else
                    {{ $row->status }}
                    @endif
                  </td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>{{ $row->email }}</td>

                  @foreach ($decodedData as $answer)
                  <td>
                    {{$answer}}
                  </td>
                  @endforeach
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
    </form>
  </div>
</div>

@endsection