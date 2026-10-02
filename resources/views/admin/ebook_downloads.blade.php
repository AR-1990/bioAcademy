@extends('admin.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />

<style>
    @media (min-width: 992px) {
        .mdk-drawer-layout .container {
            max-width: 1600px;
        }
    }

    table.dataTable thead th {
        width: fit-content !important;
        text-align: start !important;
    }

    thead {
        background: #1c3866;
        color: white;
    }

    div#empTable_info {
        background: #1c3866;
        color: #fff;
        width: 100%;
        padding: 10px;
    }

    div#empTable_paginate {
        position: relative;
        bottom: 47px;
    }

    a#empTable_previous,
    a#empTable_next {
        color: #fff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #fff !important;
    }

    th {
        background-color: #1c3866 !important;
        color: #fff !important;
        width: auto !important;
        border-right: 1px solid black !important;
    }

    html[dir].dark-mode .table td, html[dir].dark-mode .table th {
        text-align: center;
        border-top: none !important;
    }

    html[dir].dark-mode .table thead th {
        border-bottom: none !important;
    }

    html.dark-mode .table {
        background: white !important;
        color: #000 !important;
    }

    html.dark-mode .text-70 {
        color: #000 !important;
        justify-content: center;
        display: flex;
        text-align: center;
    }

    tbody#staff i {
        color: #1c3866 !important;
    }

    [dir] .card-header {
        padding: 1rem;
        margin-bottom: 0;
        background-color: #fff !important;
    }

    html[dir].dark-mode .card-header {
        background-color: #fff;
        border-bottom-color: #19191a;
    }

    [dir] .card, [dir] .card-nav .tab-content {
        background-color: #fff;
        background-clip: border-box;
        border: none !important;
        border-radius: .5rem;
    }

    .swal2-backdrop-show {
        pointer-events: auto !important;
    }

    .badge-form-type {
        display: inline-block;
        padding: 4px 10px;
        background: #e8f0fe;
        color: #1c3866;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }
</style>

<div class="pt-32pt">
    <div class="page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Ebook Downloads</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Ebook / Campaign Downloads</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="page__container page__container page-section">
    <div class="table-responsive" data-toggle="lists">
        <table id='empTable' class='datatable w-100'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Form Type / Campaign</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Submitted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="list" id="staff">
                @foreach ($ebookDownloads as $dl)
                <tr>
                    <td>
                        <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <p class="mb-0"><strong>{{ $dl->id }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-form-type">{{ $dl->form_type }}</span>
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <p class="mb-0"><strong>{{ $dl->name }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="javascript:void(0);" class="text-70">
                                <span class="js-lists-values-employer-name">{{ $dl->email }}</span>
                            </a>
                        </div>
                    </td>
                    <td class="text-center js-lists-values-projects small">
                        {{ !empty($dl->phone) ? $dl->phone : '—' }}
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="text-70">
                            {{ $dl->created_at ? $dl->created_at->format('M j, Y g:i A') : '—' }}
                        </a>
                    </td>
                    <td class="">
                        <a href="javascript:void(0);" class="delete-alert" data-id="{{ $dl->id }}">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        var empTable = $('#empTable').DataTable({
            pageLength: 50,
            scrollX: true,
            order: [[0, 'desc']],
        });
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.delete-alert', function () {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/ebook-downloads/' + id,
                    type: 'DELETE',
                    success: function (response) {
                        Swal.fire(
                            'Deleted!',
                            'The record has been deleted.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the record.',
                            'error'
                        );
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>

@endsection
