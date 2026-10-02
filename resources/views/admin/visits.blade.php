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
</style>

    <style>
        th {
            /* color:white !important; */
            background-color: #1c3866 !important;
            color: #fff !important;
            width: auto !important;
            border-right: 1px solid black !important;
        }

        td {
            /* border-right: 1px solid black !important; */
        }

        .search {
            float: right !important;
        }

        html[dir].dark-mode .table td, html[dir].dark-mode .table th {
    text-align: center;
    /* border-top-color: #19191a; */
    border-top: none !important;
}

        html[dir].dark-mode .table thead th {
    /* border-bottom-color: #19191a; */
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
    /* border: 1px solid #dfe2e6; */
    border: none !important;
    border-radius: .5rem;
}

/* [dir] .card-header{
    background-color: #fff !important;
} */
input#inlineFormFilterBy {
    width: 24%;
    /* background: transparent; */
}
.form-inline {
    display: flex;
    flex-flow: row wrap;
    align-items: end;
    justify-content: end !important;
}
.swal2-backdrop-show {
        pointer-events: auto !important;
    }
    </style>
<div class="pt-32pt">
    <div class="page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Dashboard</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>

                    <li class="breadcrumb-item active">

                        Visits

                    </li>

                </ol>

            </div>
        </div>

    </div>
</div>


<div class="page__container page__container page-section">


    <!-- <div class="page-separator">
        <div class="page-separator__text">Visits</div>
    </div> -->

    <!--<div class="card mb-0">-->

        <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-employee-name"
            data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

            <!--<div class="card-header" style="background-color: #fff; border: none;">-->
            <!--    <form class="form-inline">-->
            <!--        <input type="text" class="form-control search mb-2 mr-sm-2 mb-sm-0" id="inlineFormFilterBy"-->
            <!--            placeholder="Search ...">-->
            <!--    </form>-->
            <!--</div>-->

            <!--<table class="table mb-0 thead-border-top-0 table-nowrap">-->
            <table id='empTable' class='datatable w-100'>
                <thead>
                    <tr>
                         <th>
                           Id
                            </th>
                        <th>
                            First Name
                        </th>
                        <th>
                            Last Name
                        </th>
                        <th>
                            Email
                        </th>

                        <th>
                            Contact
                        </th>

                        <th>
                            Preferred Visit Date
                        </th>

                        <th>
                            Preferred Visit Time
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                    @foreach ($visit_data as $visits )
                    <tr>
                          <td>

                                    <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">

                                        <div class="media-body">

                                            <div class="d-flex flex-column">
                                                <p class="mb-0">
                                                    <strong class="js-lists-values-employee-name">
                                                        {{ $visits->id }}
                                                    </strong>

                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                </td>

                        <td>

                            <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">

                                <div class="media-body">

                                    <div class="d-flex flex-column">
                                        <p class="mb-0">
                                            <strong class="js-lists-values-employee-name">
                                                {{$visits->first_name}}
                                            </strong>

                                        </p>
                                    </div>

                                </div>
                            </div>

                        </td>
                        <td>

                            <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">

                                <div class="media-body">

                                    <div class="d-flex flex-column">
                                        <p class="mb-0">
                                            <strong class="js-lists-values-employee-name">
                                                {{$visits->last_name}}
                                            </strong>
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </td>

                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);" class="text-70"><span
                                        class="js-lists-values-employer-name">
                                        {{$visits->email}}
                                    </span></a>
                            </div>
                        </td>

                        <td class="text-center js-lists-values-projects small">{{$visits->phone_number}}</td>

                        <td>

                            <a href="javascript:void(0);" class="text-70">{{$visits->visit_date}}</a>

                        </td>

                        <td class="text-70 js-lists-values-activity small">{{$visits->visit_time}}</td>
                        <td class="">
                            {{-- <a href="javascript:void(0);" class="edit-visit" data-toggle="modal"
                                data-target="#edit-modal" data-visit-id="{{ $visits->id }}"
                                data-first_name="{{ $visits->first_name }}" data-last_name="{{ $visits->last_name }}"
                                data-email="{{ $visits->email }}" data-phone_number="{{ $visits->phone_number }}"
                                data-visit_date="{{ $visits->visit_date }}" data-visit_time="{{ $visits->visit_time }}">
                                <i class="material-icons">edit</i>
                            </a> --}}
                            <a href="javascript:void(0);" class="delete-alert" data-visit-id="{{ $visits->id }}">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--<div class="card-footer p-8pt">-->

        <!--    <ul class="pagination justify-content-start pagination-xsm m-0">-->
        <!--        <li class="page-item disabled">-->
        <!--            <a class="page-link" href="#" aria-label="Previous">-->
        <!--                <span aria-hidden="true" class="material-icons">chevron_left</span>-->
        <!--                <span>Prev</span>-->
        <!--            </a>-->
        <!--        </li>-->
        <!--        <li class="page-item">-->
        <!--            <a class="page-link" href="#" aria-label="Page 1">-->
        <!--                <span>1</span>-->
        <!--            </a>-->
        <!--        </li>-->
        <!--        <li class="page-item">-->
        <!--            <a class="page-link" href="#" aria-label="Page 2">-->
        <!--                <span>2</span>-->
        <!--            </a>-->
        <!--        </li>-->
        <!--        <li class="page-item">-->
        <!--            <a class="page-link" href="#" aria-label="Next">-->
        <!--                <span>Next</span>-->
        <!--                <span aria-hidden="true" class="material-icons">chevron_right</span>-->
        <!--            </a>-->
        <!--        </li>-->
        <!--    </ul>-->

        <!--</div>-->

    <!--</div>-->

</div>


<div class="modal fade" id="edit-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-visit-form" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="visit-date" class="form-label">Preferred Visit Date</label>
                        <input type="text" name="visit_date" id="visit_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="visit-time" class="form-label">Preferred Visit Time</label>
                        <input type="text" name="visit_time" id="visit_time" class="form-control">
                    </div>
                    <input type="hidden" name="visit_id" id="visit_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-visit">Save</button>
            </div>
        </div>
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
            // processing: true,
            // serverSide: true,
            scrollX: true,
    
        })
    })
</script>

<script>
    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Delete operation with SweetAlert2 confirmation
    $(document).on('click', '.delete-alert', function () {
        var visitId = $(this).data('visit-id');

        // SweetAlert2 confirmation dialog
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
                // Proceed with the delete operation
                $.ajax({
                    url: '/visits/' + visitId,
                    type: 'DELETE',
                    success: function (response) {
                        // Handle success response
                        Swal.fire(
                            'Deleted!',
                            'The visit has been deleted.',
                            'success'
                        ).then(() => {
                            // Reload the page or update the table
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the visit.',
                            'error'
                        );
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    // Edit visit operation
    $('.edit-visit').click(function () {
        var visitId = $(this).data('visit-id');
        var firstName = $(this).data('first-name');
        var lastName = $(this).data('last-name');
        var email = $(this).data('email');
        var phoneNumber = $(this).data('phone-number');
        var visitDate = $(this).data('visit-date');
        var visitTime = $(this).data('visit-time');

        $('#visit_id').val(visitId);
        $('#first_name').val(firstName);
        $('#last_name').val(lastName);
        $('#email').val(email);
        $('#phone_number').val(phoneNumber);
        $('#visit_date').val(visitDate);
        $('#visit_time').val(visitTime);
    });

    // Save visit operation
    $('.save-visit').click(function () {
        var formData = $('#edit-visit-form').serialize();
        var visitId = $('#visit_id').val();

        $.ajax({
            url: '/visits/' + visitId,
            type: 'POST',
            data: formData,
            success: function (response) {
                $('#edit-modal').modal('hide');
                Swal.fire(
                    'Saved!',
                    'The visit has been updated.',
                    'success'
                ).then(() => {
                    // Reload the page or update the table
                    location.reload();
                });
            },
            error: function (xhr, status, error) {
                // Handle error response
                Swal.fire(
                    'Error!',
                    'An error occurred while updating the visit.',
                    'error'
                );
                console.error(xhr.responseText);
            }
        });
    });
</script>

@endsection
