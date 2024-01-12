<div class="row">
  <div class="col-12 mb-3">
    <h4 class="card-title">Group Interview</h4>
    <p>yang lolos saat Seleksi Tahap 2, akan mendapatkan informasi link Group Interview</p>
  </div>
  <div class="col-12">
    <div class="table-responsive">
      <table id="datatable" class="table table-bordered table-hover" data-toggle="data-table">
        <thead>
          <tr class="text-center" style="color:#2d2d2d;">
            <th>No</th>
            <th>Posisi</th>
            <th>Link</th>
            <th>Tanggal Zoom</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i = 1;
          @endphp
          @foreach ($data as $row)
          <tr>
            <td class="text-center">
              {{ $i }}
            </td>
            <td>
              {{ $row->position }}
            </td>
            <td class="text-center">
              <a href="{{$row->link}}">{{$row->link}}</a>
            </td>
            <td class="text-center">
              @if($row->date_zoom != null)
              {{ \Carbon\Carbon::parse($row->date_zoom)->format('d M Y') }} </br>

              @if(\Carbon\Carbon::now() > \Carbon\Carbon::parse($row->date_zoom))
              <span class="badge rounded-pill bg-danger">
                Berakhir
              </span>
              @else
              <span class="badge rounded-pill bg-success">
                Berlangsung
              </span>
              @endif
              @endif

            </td>
            <td class="text-center">
              @if($row->gi_id != null)
              <button data-id="{{ $row->gi_id }}" type="button" class="btn btn-icon btn-primary rounded-pill edit-link-btn"> <svg width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                  <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                  <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                </svg>
              </button>
              @else
              <button data-id="{{ $row->batch_id }}" type="button" class="btn btn-icon btn-success rounded-pill add-link-btn"> <svg width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                  <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                  <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
                </svg>
              </button>
              @endif
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

<div class="modal fade" id="editLinkZoom" tabindex="-1" role="dialog" aria-labelledby="editLinkZoomLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLinkZoomLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('gi.update') }}">
          @csrf
          @method('PUT')
          <input type="hidden" class="form-control" id="gi_id" name="gi_id" required>


          <div class="form-group">
            <label for="link">Link Zoom</label>
            <input type="text" class="form-control" id="link" name="link" required>
          </div>
          <div class="form-group">
            <label for="date_zoom">Tanggal Zoom</label>
            <input type="date" class="form-control" id="date_zoom" name="date_zoom" required>
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


<div class="modal fade" id="addLinkZoom" tabindex="-1" role="dialog" aria-labelledby="addLinkZoomLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLinkZoomLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('gi.store') }}">
          @csrf
          <input type="hidden" class="form-control" id="batch_id" name="batch_id" required>
          <div class="form-group">
            <label for="link">Link Zoom</label>
            <input type="text" class="form-control" id="link" name="link" required>
          </div>
          <div class="form-group">
            <label for="date_zoom">Tanggal Zoom</label>
            <input type="date" class="form-control" id="date_zoom" name="date_zoom" required>
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

<!-- Jquery -->
<script>
  $(document).ready(function() {

    $('.edit-link-btn').click(function() {
      var primaryId = $(this).data('id');
      $.ajax({
        url: "{{ url('gi/')}}/" + primaryId,
        type: 'GET',
        data: {
          id: primaryId
        },
        success: function(data) {
          if (data && typeof data === 'object') {
            $('#gi_id').val(data.gi_id);
            $('#link').val(data.link);
            $('#date_zoom').val(data.date_zoom);
            $('#editLinkZoom').modal('show');
          } else {
            console.error('Data tidak valid atau kosong');
          }
        },
        error: function() {
          alert('Terjadi kesalahan saat memuat data.');
        }
      });
    });

    $('.add-link-btn').click(function() {
      var primaryId = $(this).data('id');
      $('#batch_id').val(primaryId);
      $('#addLinkZoom').modal('show');
    });

    $('[data-toggle="popover"]').popover({
      trigger: 'hover' // Mengatur trigger ke hover
    });

    $('.lihat-data-kandidat').click(function() {

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