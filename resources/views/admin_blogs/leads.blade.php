@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .main_container {
            margin-top: 70px !important;
            padding: 40px 10px;
            background-color: #fff;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            border-radius: 8px;
        }

        .input_fields {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        }

        .input_fields:focus {
            background-color: #fefeff;
            border-color: #95a0f4;
            outline: none;
        }

        @media (max-width: 567px) {
            .update_btn {
                width: 100% !important;
            }
        }

        .fa-trash,
        .fa-edit {
            font-size: 24px;
        }

        .fa-trash,
        .fa-edit:hover {
            cursor: pointer;
        }

        .fa-edit {
            margin-left: 15px;
        }

        .new_td {
            /* border: 1px solid red; */
            width: 45%;
            margin: 0 auto !important;
            display: block;
        }

        .icon_td {
            width: 20%;
        }

        .fa-trash,
        .fa-edit {
            font-size: 24px;
        }

        .fa-trash,
        .fa-edit:hover {
            cursor: pointer;
        }

        .fa-edit {
            margin-left: 15px;
        }

        .new_td {
            /* border: 1px solid red; */
            width: 50%;
            margin: 0 auto !important;
            display: block;
        }

        .icon_td {
            width: 20%;
        }

        .fs-25 {
            font-size: 16px;
        }

        .btn_pad {
            padding: 3px 7px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Leads</h4>
                                <div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped w-100" id="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    S.no
                                                </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>From</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1
                                                </td>
                                                <td>fake</td>
                                                <td>fake</td>
                                                <td>fake</td>                                                                                                
                                                <td>fake</td>                                                                                                
                                                
                                                <td class="text-center">
                                                    <a href="javascript:void(0);" class="btn btn-primary">
                                                    Assign Group</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </section>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "scrollX": true

            });
        });
    </script>
@endpush
