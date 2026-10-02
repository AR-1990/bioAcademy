@extends('admin.main')
@section('content')

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
    .action-eye-btn {
        border: none;
        outline: none !important;
        background: transparent;
    }
    .action-eye-btn span {
        color: var(--primary) !important;
    }
</style>

<style>
    @media (min-width: 992px) {
        .mdk-drawer-layout .container {
            max-width: 1600px;
        }
    }

    th {
        color: white !important;
        /*background-color: #1c3866 !important;*/
        /* width: auto !important; */
        /*border-right: 1px solid black !important;*/
    }

    td {
        /* border-right: 1px solid black !important; */
        border-right: none !important;


    }

    html[dir].dark-mode .table td,
    html[dir].dark-mode .table th {
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

    [dir] .card,
    [dir] .card-nav .tab-content {
        background-color: #fff;
        background-clip: border-box;
        /* border: 1px solid #dfe2e6; */
        border: none !important;
        border-radius: .5rem;
    }

    input#inlineFormFilterBy {
        width: 40%;
        /* background: transparent !important; */
    }

    .form-inline {
        display: flex;
        flex-flow: row wrap;
        align-items: end;
        justify-content: end !important;
    }

    /* html[dir].dark-mode .card-header {
    border-bottom-color: #19191a;
} */

    /* [dir] .card-header{
    background-color: #fff !important;
} */
</style>
<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Results</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Results</li>
                </ol>

            </div>
        </div>

    </div>
</div>
<div class="container mt-5">

    <!-- <div class="page-separator">
        <div class="page-separator__text">Students</div>
    </div> -->

    <!--<div class="card mb-0">-->

        <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-employee-name"
            data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

            <!--<div class="card-header" style="background-color: #fff !important;">-->
            <!--    <form class="form-inline">-->
            <!--        <input type="text" class="form-control search mb-2 mr-sm-2 mb-sm-0" id="inlineFormFilterBy"-->
            <!--            placeholder="Search ...">-->
            <!--    </form>-->
            <!--</div>-->

            <!--<table class="table mb-0 thead-border-top-0 table-nowrap">-->
            <table id='empTable' class='datatable w-100'>
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Full Name</th>
                        <th>Correct Answers</th>
                        <th>Total Questions</th>
                        <th>Percentage</th>
                        <th>Date Exam Taken </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="list" id="staff">
                    @foreach ($results as $key => $result)
                    <tr>
                        <td>
                            <a href="#" class="text-70">
                                <p> {{$key+1}}</p>
                            </a>
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <p class="mb-0">
                                            <strong class="js-lists-values-employee-name">
                                                {{ $result['full_name'] }}
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="text-70">
                                <p> {{ $result['correct_answers']}}</p>
                            </a>
                        </td>
                        <td>
                            <p> {{ $result['total_questions'] }}</p>
                        </td>
                        <td>
                        <p> {{ $result['total_questions'] > 0 ? number_format(($result['correct_answers'] * 100) / $result['total_questions'], 2) : '0.00' }}%</p>

                        </td>
                        <td>
                            <p> {{ $result['last_quiz_attempt_date'] }}</p>
                        </td>
                        <td>
                          <a href="{{ route('showStudentsResult', $result['user_id']) }}">
                            <button type="button" class="action-eye-btn"><span class="material-icons material-symbols-outlined">visibility</span></button>
                           </a>
                        </td>
                        <!--<td>-->
                        <!--    <a href="javascript:void(0);" data-toggle="modal" data-target="#edit-modal">-->

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

@endsection
