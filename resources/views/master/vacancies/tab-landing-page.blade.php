<div class="row">
  <div class="col-6">
    <h4 class="card-title">Landing Page</h4>
    <p>Halaman untuk setting Copywriting</p>
  </div>
  <div class="col-6">
    <div id="alerts-disimissible-component">
      <div class="alert alert-solid alert-primary alert-dismissible fade show " role="alert">
        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2 11.9993C2 6.48027 6.48 1.99927 12 1.99927C17.53 1.99927 22 6.48027 22 11.9993C22 17.5203 17.53 21.9993 12 21.9993C6.48 21.9993 2 17.5203 2 11.9993ZM11.12 8.20927C11.12 7.73027 11.52 7.32927 12 7.32927C12.48 7.32927 12.87 7.73027 12.87 8.20927V12.6293C12.87 13.1103 12.48 13.4993 12 13.4993C11.52 13.4993 11.12 13.1103 11.12 12.6293V8.20927ZM12.01 16.6803C11.52 16.6803 11.13 16.2803 11.13 15.8003C11.13 15.3203 11.52 14.9303 12 14.9303C12.49 14.9303 12.88 15.3203 12.88 15.8003C12.88 16.2803 12.49 16.6803 12.01 16.6803Z" fill="currentColor" />
        </svg>
        <strong>Info!</strong> LP akan tergenerate otomatis saat input <strong>posisi</strong> baru.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color:white;"> </button>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="table-responsive">
      <table id="datatable_lp" class="table table-bordered table-hover">
        <thead>
          <tr class="text-center" style="color:#2d2d2d;">
            <th>No</th>
            <th>Posisi</th>
            <th>Link</th>
            <th>Header</th>
            <th>...</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i = 1;
          @endphp
          @foreach ($lp as $row)
          <tr>
            <td class="text-center">{{ $i }}</td>
            <td>{{ $row->position }}</td>
            <td><a href="https://merryriana.com/loker/{{ $row->segment }}" target="_BLANK">https://merryriana.com/loker/{{ $row->segment }}</a></td>
            <td>{{ $row->section_head }}</td>
            <td class="text-center">...</td>
            <td class="text-center">
              <button data-id="{{ $row->lp_id }}" type="button" class="btn btn-icon btn-primary rounded-pill edit-landingpage-btn"> <svg width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.4" d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z" fill="currentColor"></path>
                  <path d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z" fill="currentColor"></path>
                  <path opacity="0.4" d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z" fill="currentColor"></path>
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


<div class="modal fade" id="editLPModal" tabindex="-1" role="dialog" aria-labelledby="editLPModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLPModalLabel">Edit Landing Page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('lp.update') }}">
          @csrf
          @method('PUT')
          <input type="hidden" class="form-control" id="id_edit" name="id" required>

          <div class="form-group">
            <label for="start_date">Section Head</label>
            <textarea name="section_head" id="section_head" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="start_date">Section 1</label>
            <textarea name="section_1" id="section_1" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="start_date">Section 2</label>
            <textarea name="section_2" id="section_2" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="start_date">Section 3</label>
            <textarea name="section_3" id="section_3" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="start_date">Section 4</label>
            <textarea name="section_4" id="section_4" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="start_date">Section 5</label>
            <textarea name="section_5" id="section_5" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="start_date">Section 6</label>
            <textarea name="section_6" id="section_6" class="form-control"></textarea>
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

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

<!-- Jquery -->
<script>
  $(document).ready(function() {
    $('.edit-landingpage-btn').click(function() {
      var primaryId = $(this).data('id');
      $.ajax({
        url: "{{ url('lp/detail')}}/" + primaryId,
        type: 'GET',
        data: {
          id: primaryId
        },
        success: function(data) {
          $('#id_edit').val(data.batch_id);

          var selectElement = document.getElementById('vacancy_id_edit');
          selectElement.value = data.vacancy_id;

          $('#section_head').val(data.section_head);
          $('#end_date_edit').val(data.end_date);



          $('#editLPModal').modal('show');
        },
        error: function() {
          alert('Terjadi kesalahan saat memuat data.');
        }
      });
    });
  });

  ClassicEditor
    .create(document.querySelector('#section_head'))

    .catch(error => {
      console.error(error);
    });

  ClassicEditor
    .create(document.querySelector('#section_1'))
    .catch(error => {
      console.error(error);
    });

  ClassicEditor
    .create(document.querySelector('#section_2'))
    .catch(error => {
      console.error(error);
    });

  ClassicEditor
    .create(document.querySelector('#section_3'))
    .catch(error => {
      console.error(error);
    });

  ClassicEditor
    .create(document.querySelector('#section_4'))
    .catch(error => {
      console.error(error);
    });

  ClassicEditor
    .create(document.querySelector('#section_5'))
    .catch(error => {
      console.error(error);
    });

  ClassicEditor
    .create(document.querySelector('#section_6'))
    .catch(error => {
      console.error(error);
    });
</script>