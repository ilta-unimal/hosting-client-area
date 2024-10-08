@extends('layouts.app')

@section('content')
<div class="card mb-5 mb-xl-10">
    <div class="card-body border-top p-9">
      <form id="filter-form" class="mb-3">
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control form-control-solid" name="q" placeholder="Search" />
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <select id="kecamatan" class="form-select form-select-solid" data-control="select2" name="district" data-placeholder="Pilih Kecamatan">
              <option></option>
              @if (Auth::user()->role == 'kecamatan')
                <option value="{{ Auth::user()->district->id }}" data-id="{{ Auth::user()->district->code }}">{{ Auth::user()->district->name }}</option>
              @else
                @foreach ($district as $item)
                <option value="{{ $item->id }}" data-id="{{ $item->code }}">{{ $item->name }}</option>
                @endforeach
              @endif
            </select>
          </div>
          <div class="col">
            <select name="village" id="kelurahan" class="form-select form-select-solid" data-control="select2" data-placeholder="Pilih Kelurahan">
              <!-- Populate this select with options dynamically based on the district selected -->
            </select>
          </div>
        </div>
        <div class="row align-items-center">
          @if (Auth::user()->role == 'superadmin')
            <div class="col">
              <button type="button" class="btn btn-primary">
                <i class="ki-duotone ki-plus fs-3"></i>
                Tambah
              </button>
            </div>
          @endif
          <div class="col text-end">
            <button type="button" class="btn btn-light" id="reset-button">
              <i class="ki-duotone ki-arrows-circle fs-3">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
              Reset
            </button>
            <button type="submit" class="btn btn-dark"><i class="ki-outline ki-filter fs-3"></i> Terapkan</button>
          </div>
        </div>
      </form>
      <div class="table-responsive position-relative">
        <div id="loading-spinner" class="position-absolute top-50 start-50 translate-middle" role="status" style="display: none;">
          <span class="badge badge-light shadow fs-6 p-5">Loading...</span>
          </div>
        <table id="users-table" class="table table-row-dashed fs-6 gy-5">
          <thead>
            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
              <th>Pengguna</th>
              <th>Kecamatan</th>
              <th>Kelurahan</th>
              <th>Role</th>
              <th>Created At</th>
              @if (Auth::user()->role == 'superadmin' OR Auth::user()->role == 'admin')
                <th class="text-end">Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
            <!-- Table body will be populated by AJAX -->
          </tbody>
        </table>
      </div>
      <div class="d-md-flex justify-content-lg-between text-center align-items-center my-3">
        <div class="fs-6 fw-semibold text-gray-700 my-5 my-md-0" id="pagination-info">
            <!-- Pagination info will be updated by AJAX -->
        </div>
        <ul class="pagination" id="pagination-links">
            <!-- Pagination links will be updated by AJAX -->
        </ul>
      </div>
    </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    function fetchUsers(page = 1) {
      $('#loading-spinner').show();
      let formData = $('#filter-form').serializeArray();
      formData.push({ name: 'page', value: page });

      $.ajax({
        url: '{{ route('user.active.data') }}',
        data: formData,
        success: function(response) {
          updateTable(response);
          $('#loading-spinner').hide();
        },
        error: function(xhr) {
          console.error("Request failed: " + xhr.status);
          $('#loading-spinner').hide();
        }
      });
    }

    function updateTable(data) {
      let tbody = $('#users-table tbody');
      tbody.empty();

      if (data.data.length === 0) {
        tbody.append('<tr><td colspan="6" class="text-center">No data available in table</td></tr>');
      } else {
        $.each(data.data, function(index, user) {
            let destroyUrl = '{{ route('user.destroy', ':id') }}'.replace(':id', user.id);
            tbody.append(`
                <tr>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-45px symbol-circle me-3" data-bs-toggle="tooltip" title="${user.name}">
                                <img src="https://ui-avatars.com/api/?bold=true&name=${user.name}" alt="">
                            </div>
                            <div class="d-flex flex-column">
                                <span class="text-gray-800 fw-bold mb-1">${user.name}</span>
                                <span class="text-muted fs-7">${user.email}</span>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">${user.district ? user.district.name : '-'}</td>
                    <td class="align-middle">${user.village ? user.village.name : '-'}</td>
                    <td class="align-middle">
                        <div class="badge badge-light fw-bold">${user.role}</div>
                    </td>
                    <td class="align-middle">
                        ${new Date(user.created_at).toLocaleString('en-GB', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false
                        })}
                    </td>
                    @if (Auth::user()->role == 'superadmin')
                    <td class="align-middle text-end">
                        <div class="dropdown">
                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center text-gray-700" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                                <span class="svg-icon fs-5 m-0 ps-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <ul class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4">
                                <li class="menu-item px-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit" class="menu-link px-3">Edit</a>
                                </li>
                                <li class="menu-item px-3">
                                    <a href="#" id="${destroyUrl}" class="menu-link px-3 btn-del">Hapus</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    @endif
                </tr>
            `);
        });
      }

      let paginationInfo = `Showing ${data.from} to ${data.to} of ${data.total} records`;
      $('#pagination-info').text(paginationInfo);

      let paginationLinks = '';
      let currentPage = data.current_page;
      let lastPage = data.last_page;

      let startPage = Math.max(currentPage - 1, 1);
      let endPage = Math.min(startPage + 2, lastPage);

      if (startPage > 1) {
        paginationLinks += `
          <li class="page-item">
            <a class="page-link" href="#" data-page="1">First</a>
          </li>
          <li class="page-item disabled"><span class="page-link">...</span></li>
        `;
      }

      for (let page = startPage; page <= endPage; page++) {
        paginationLinks += `
          <li class="page-item${page === currentPage ? ' active' : ''}">
            <a class="page-link" href="#" data-page="${page}">${page}</a>
          </li>
        `;
      }

      if (endPage < lastPage) {
        paginationLinks += `
          <li class="page-item disabled"><span class="page-link">...</span></li>
          <li class="page-item">
            <a class="page-link" href="#" data-page="${lastPage}">Last</a>
          </li>
        `;
      }

      $('#pagination-links').html(paginationLinks);
    }

    $('#filter-form').on('submit', function(e) {
      e.preventDefault();
      fetchUsers();
    });

    $('#pagination-links').on('click', 'a', function(e) {
      e.preventDefault();
      let page = $(this).data('page');
      fetchUsers(page);
    });

    $('#reset-button').on('click', function() {
      $('#filter-form')[0].reset();
      $('#kecamatan').val(null).trigger('change');
      $('#kelurahan').val(null).trigger('change');
      fetchUsers();
    });

    // Handle kecamatan change
    $('#kecamatan').on('change', function() {
      let district_code = $(this).find(':selected').data('id');
      $.ajax({
        url: `/api/kecamatan/${district_code}`,
        method: "GET",
        success: function(response) {
          let $kelurahan = $('#kelurahan');
          $kelurahan.empty().append('<option value="">Pilih Kelurahan</option>');
          $.each(response.data, function(index, item) {
            $kelurahan.append(`<option value="${item.id}">${item.name}</option>`);
          });
          $kelurahan.select2({
            placeholder: "Pilih Kelurahan"
          });
        },
        error: function(xhr) {
          console.error("Request failed: " + xhr.status);
        }
      });
    });

    // Initialize Select2 for the elements
    $('#kecamatan').select2({
      placeholder: "Pilih Kecamatan"
    });
    $('#kelurahan').select2({
      placeholder: "Pilih Kecamatan terlebih dahulu"
    });

    // Initial fetch
    fetchUsers();
  });
</script>
@endsection
