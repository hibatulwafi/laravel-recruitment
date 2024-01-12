<div class="row">
  <!-- <div class="col-6">
    <h4 class="card-title">Loker Aktif</h4>
    <p>Lowongan yang sedang berlangsung</p>
  </div>
  <div class="col-6">
    <button type="button" style="float: right; margin-left:8px;" class="btn btn-icon btn-primary rounded-pill">
      <svg width="16" viewBox="0 0 24 24">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1535 16.64L14.995 13.77C15.2822 13.47 15.2822 13 14.9851 12.71C14.698 12.42 14.2327 12.42 13.9455 12.71L12.3713 14.31V9.49C12.3713 9.07 12.0446 8.74 11.6386 8.74C11.2327 8.74 10.896 9.07 10.896 9.49V14.31L9.32178 12.71C9.03465 12.42 8.56931 12.42 8.28218 12.71C7.99505 13 7.99505 13.47 8.28218 13.77L11.1139 16.64C11.1832 16.71 11.2624 16.76 11.3515 16.8C11.4406 16.84 11.5396 16.86 11.6386 16.86C11.7376 16.86 11.8267 16.84 11.9158 16.8C12.005 16.76 12.0842 16.71 12.1535 16.64ZM19.3282 9.02561C19.5609 9.02292 19.8143 9.02 20.0446 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5 22 16.0446 22H8.17327C5.58911 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.4901 2 7.96535 2H13.2525C13.5 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.1931 9.01 17.0149 9.02C17.4333 9.02 17.8077 9.02318 18.1346 9.02595C18.3878 9.02809 18.6125 9.03 18.8069 9.03C18.9479 9.03 19.1306 9.02789 19.3282 9.02561ZM19.6045 7.5661C18.7916 7.5691 17.8322 7.5661 17.1421 7.5591C16.047 7.5591 15.145 6.6481 15.145 5.5421V2.9061C15.145 2.4751 15.6629 2.2611 15.9579 2.5721C16.7203 3.37199 17.8873 4.5978 18.8738 5.63395C19.2735 6.05379 19.6436 6.44249 19.945 6.7591C20.2342 7.0621 20.0223 7.5651 19.6045 7.5661Z" fill="currentColor" />
      </svg>
      <small> Export Data </small>
    </button>
  </div> -->
  <div class="col-12">
    <div class="table-responsive">
      <table id="datatable" class="table table-bordered table-hover" data-toggle="data-table">
        <thead>
          <tr class="text-center" style="color:#2d2d2d;">
            <th>No</th>
            <th>Posisi</th>
            <th>Tanggal</th>
            <th>Link</th>
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
            <td class="text-left">
              <a href="{{config('app.url').'/loker/seleksi-tahap-akhir/'.$row->segment}}" target="_BLANK">{{config('app.url').'/loker/seleksi-tahap-akhir/'.$row->segment}}</a>
            </td>
            <td class="text-center">
              @if(\Carbon\Carbon::now() > \Carbon\Carbon::parse($row->end_date))
              <span class="badge rounded-pill bg-danger">
                Closed
              </span>
              @else
              <span class="badge rounded-pill bg-success">
                Berlangsung
              </span>
              @endif
            </td>
            <td class="text-center">
              <button data-id="{{ $row->batch_id }}" type="button" class="btn btn-icon btn-success rounded-pill lihat-data-kandidat" data-toggle="popover" title="Lihat Kandidat" data-content="Lihat Kandidat">
                <svg class="icon-32" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor"></path>
                </svg>
              </button>
              <a href="{{ route('sta.detail', ['id' => $row->batch_id]) }}" class="btn btn-icon btn-info rounded-pill" data-toggle="popover" title="Seleksi Kandidat" data-content="Seleksi Kandidat" target="_BLANK">
                <svg class="icon-32" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor" />
                </svg>
                </svg>
              </a>
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

<div class="modal fade" id="lihatDatakandidat" role="dialog" aria-labelledby="lihatDatakandidatLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lihatDatakandidatLabel">Data Kandidat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="export-container">
        </div>
        <table id="tablekandidat" class="table table-bordered table-hover" data-toggle="data-table">
          <thead>
            <tr class="text-center" style="color:#2d2d2d;">
              <th>No</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Pendidikan</th>
              <th>Universitas</th>
              <th>Jurusan</th>
              <th>Tahun Lulus</th>
              <th>Status Pekerjaan</th>
              <th>CV</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Jquery -->
<script>
  $(document).ready(function() {

    $('[data-toggle="popover"]').popover({
      trigger: 'hover' // Mengatur trigger ke hover
    });

    $('.lihat-data-kandidat').click(function() {
      var container = document.getElementById('export-container');
      while (container.firstChild) {
        container.removeChild(container.firstChild);
      }
      var IconDownload = '<svg class="icon-32" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.1535 16.64L14.995 13.77C15.2822 13.47 15.2822 13 14.9851 12.71C14.698 12.42 14.2327 12.42 13.9455 12.71L12.3713 14.31V9.49C12.3713 9.07 12.0446 8.74 11.6386 8.74C11.2327 8.74 10.896 9.07 10.896 9.49V14.31L9.32178 12.71C9.03465 12.42 8.56931 12.42 8.28218 12.71C7.99505 13 7.99505 13.47 8.28218 13.77L11.1139 16.64C11.1832 16.71 11.2624 16.76 11.3515 16.8C11.4406 16.84 11.5396 16.86 11.6386 16.86C11.7376 16.86 11.8267 16.84 11.9158 16.8C12.005 16.76 12.0842 16.71 12.1535 16.64ZM19.3282 9.02561C19.5609 9.02292 19.8143 9.02 20.0446 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5 22 16.0446 22H8.17327C5.58911 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.4901 2 7.96535 2H13.2525C13.5 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.1931 9.01 17.0149 9.02C17.4333 9.02 17.8077 9.02318 18.1346 9.02595C18.3878 9.02809 18.6125 9.03 18.8069 9.03C18.9479 9.03 19.1306 9.02789 19.3282 9.02561ZM19.6045 7.5661C18.7916 7.5691 17.8322 7.5661 17.1421 7.5591C16.047 7.5591 15.145 6.6481 15.145 5.5421V2.9061C15.145 2.4751 15.6629 2.2611 15.9579 2.5721C16.7203 3.37199 17.8873 4.5978 18.8738 5.63395C19.2735 6.05379 19.6436 6.44249 19.945 6.7591C20.2342 7.0621 20.0223 7.5651 19.6045 7.5661Z" fill="currentColor"></path></svg>';

      var primaryId = $(this).data('id');
      $.ajax({
        url: "{{ url('/ajax/candidate-bybatch')}}/" + primaryId,
        type: 'GET',
        data: {
          id: primaryId
        },
        success: function(data) {
          console.log(data)
          var table = $('#tablekandidat').DataTable();
          table.clear();
          var link = document.createElement('a');
          link.href = "/export/kandidat_bybatch/" + primaryId; // URL untuk link
          link.textContent = 'Export'; // Text pada link
          link.className = 'btn btn-primary float-right mb-3'; // Class untuk tampilan link

          // Menambahkan link ke dalam elemen dengan id="export-container"
          document.getElementById('export-container').appendChild(link);
          for (var i = 0; i < data.length; i++) {
            var rowData = data[i];
            var no = i + 1;
            var rowHtml = '<tr>';
            rowHtml += '<td>' + no + '</td>';
            rowHtml += '<td>' + rowData.name + '</td>';
            rowHtml += '<td>' + rowData.phone + '</td>';
            rowHtml += '<td>' + rowData.email + '</td>';
            rowHtml += '<td>' + rowData.birthdate + '</td>';
            rowHtml += '<td>' + rowData.gender + '</td>';
            rowHtml += '<td>' + rowData.education + '</td>';
            rowHtml += '<td>' + rowData.university + '</td>';
            rowHtml += '<td>' + rowData.major + '</td>';
            rowHtml += '<td>' + rowData.graduation_year + '</td>';
            rowHtml += '<td>' + rowData.job_status + '</td>';
            rowHtml += '<td>';
            if (rowData.cv_file) {
              rowHtml += '<a href="{{ asset("storage/cv_files/") }}/' + rowData.cv_file + '" target="_BLANK" class="btn btn-icon btn-success rounded-pill lihat-data-kandidat" data-toggle="popover" title="Download CV" data-content="Download CV">' + IconDownload + ' CV</a> &nbsp;';
            } else {
              rowHtml += '';
            }
            if (rowData.portfolio_file) {
              rowHtml += '<a href="{{ asset("storage/portfolio_files/") }}/' + rowData.portfolio_file + '" target="_BLANK" class="btn btn-icon btn-success rounded-pill lihat-data-kandidat" data-toggle="popover" title="Download CV" data-content="Download CV">' + IconDownload + ' CV</a> &nbsp;';
            } else {
              rowHtml += '';
            }
            rowHtml += '</td>';
            rowHtml += '</tr>';
            // Tambahkan baris ke tabel
            table.row.add($(rowHtml)).draw();
          }

          $('#lihatDatakandidat').modal('show');
        },
        error: function() {
          alert('Terjadi kesalahan saat memuat data.');
        }
      });
    });
  });
</script>