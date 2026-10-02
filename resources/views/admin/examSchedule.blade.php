@extends('admin.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    .swal2-container:not(.in).swal2-backdrop-show {
        pointer-events: inherit;
    }

    div:where(.swal2-icon) .swal2-icon-content {
        font-size: 4.2rem;
    }
</style>

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Enrolled Students</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam Schedule Status</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class='container mt-5'>
    <table id='empTable' class='datatable w-100'>
        <thead>
            <tr>
                <th>S.No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Exam Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function() {
        var empTable = $('#empTable').DataTable({
            pageLength: 50,
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('exam_schedule') }}",
            type: 'get',
            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'first_name' },
                { data: 'last_name' },
                { data: 'email' },
                { data: 'phone_number' },
                { data: 'exam_status_text' },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        if (row.exam_status_text == 'Assigned') {
                            return "<button class='btn btn-sm btn-danger' data-id='" + row.id + "' id='thumbdown'><i class='fas fa-thumbs-down'></i></button>";
                        } else {
                            return "<button class='btn btn-sm btn-success' data-id='" + row.id + "' id='thumbsup'><i class='fas fa-thumbs-up'></i></button>";
                        }
                    }
                }
            ]
        });

           
            $('#empTable').on('click', '#thumbsup', function() {
                  var id = $(this).data('id');

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to approve this?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, approve it!',
                            cancelButtonText: 'No, cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                updateExamSchedule(id, 1);
                            }
                            // If not confirmed, nothing happens
                        });
            });

            
            $('#empTable').on('click', '#thumbdown', function() {
                var id = $(this).data('id');
                // updateExamSchedule(id, 0);
                  Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to approve this?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, approve it!',
                            cancelButtonText: 'No, cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                updateExamSchedule(id, 0);
                            }
                            // If not confirmed, nothing happens
                        });
            });

            
            function updateExamSchedule(userId, scheduleStatus) {
                $.ajax({
                    url: "{{ route('examScheduleUpdate') }}",
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        id: userId,
                        exam_schedule: scheduleStatus
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            alert(response.message);
                            $('#empTable').DataTable().ajax.reload(null, false);  // refresh table without page reset
                        } else {
                            alert('Something went wrong!');
                        }
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            }


    });
</script>
@endsection
