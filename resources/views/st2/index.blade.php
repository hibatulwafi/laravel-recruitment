@extends('layouts.master')

@section('tab_tittle', 'Candidates')

@section('content')


<div class="card">
  <div class="card-header d-flex justify-content-between">
    <div class="header-title">
      <h4 class="card-title">Seleksi Tahap 2</h4>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 mt-3">
        <div class="table-responsive">

          <table id="datatable" class="table table-striped" data-toggle="data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                @php $i = 0; @endphp
                @foreach ($question as $key => $value)
                <td>
                {{$value->question}}
                </td>
                @endforeach
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php
              $i = 1;
              @endphp
              @foreach ($data as $row)
              @php $decodedData = json_decode($row->answer) @endphp

              <tr>
                <td>{{ $i }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->phone }}</td>
                <td>{{ $row->email }}</td>

                @foreach ($decodedData as $answer)
                <td>
                  {{$answer}}
                </td>
                @endforeach

                <td>
                  <button data-bs-toggle="modal" data-bs-target="#editModal{{ $row->answer_id  }}" type="button" class="btn btn-icon btn-primary rounded-pill"> <svg width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                      <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                      <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                    </svg></button>
                  <button data-bs-toggle="modal" data-bs-target="#deleteModal{{ $row->answer_id  }}" type="button" class="btn btn-icon btn-danger rounded-pill"><svg fill="none" xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 24 24">
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
  </div>
</div>

@endsection