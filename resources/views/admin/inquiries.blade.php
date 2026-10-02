@extends('admin.main')
@section('content')
   <meta name="csrf-token" content="{{ csrf_token() }}">
   

   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/> -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
    <style>
        @media (min-width: 992px){
            .mdk-drawer-layout .container{
                max-width: 1600px;
                margin-top: 150px;
            } 
        }
        table.dataTable thead th {
            /* width: fit-content!important; */
            text-align: start!important;
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
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    padding: .5em 1em;
    margin-left: 2px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    color: #fff !important;
    border: 1px solid transparent;
    border-radius: 2px;
}
.swal2-backdrop-show {
        pointer-events: auto !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #fff !important;
    }
    
    #empTable tr td:last-child {
        display: flex;
        gap: 0.25rem;
    }

    .full-name-link {
        color: #16325c;
        font-weight: 600;
        text-decoration: underline;
    }

    .full-name-link:hover {
        color: #0f2442;
    }

    .date-filter-bar {
        display: flex;
        gap: 12px;
        align-items: end;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .date-filter-bar .form-group {
        margin-bottom: 0;
        min-width: 180px;
    }
    </style>
</head>
<body>
<div class='container'>

<!-- Modal -->

<div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title">Update</h4>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>  -->
            </div>
            <div class="modal-body">
                <form id="updateform" name="studentForm" method="POST">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="Enter Student Name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth">
                    </div>


                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id='gender' name="gender" class="form-control">
                            <option value='Male'>Male</option>
                            <option value='Female'>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address_line">Address Line </label>
                        <input type="text" class="form-control" id="address_line" name="address_line"
                            placeholder="Enter Your Address">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter country">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="number" class="form-control" id="postal_code" name="postal_code"
                            placeholder="Enter Postal Code">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password"
                            placeholder="Enter Password Code">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="txt_empid" value="0">
                        <button type="submit" class="btn btn-success btn-sm" id="btn_save">Save</button>
                        <button type="button" class="btn btn-default btn-sm text-light" data-dismiss="modal">Close</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

       <!-- Table -->
       <div class="date-filter-bar">
           <div class="form-group">
               <label for="start_date">Start Date</label>
               <input type="date" id="start_date" class="form-control">
           </div>
           <div class="form-group">
               <label for="end_date">End Date</label>
               <input type="date" id="end_date" class="form-control">
           </div>
           <div class="form-group">
               <button type="button" class="btn btn-primary btn-sm" id="filterBtn">Search</button>
               <button type="button" class="btn btn-secondary btn-sm" id="resetBtn">Reset</button>
           </div>
       </div>
       <div class="table-responsive">
           <table id='empTable' class='datatable w-100'>
               <thead >
                   <tr>
                   <th class="js-lists-value s-projects">S.No</th>
                    <th class="js-lists-value s-projects ">Full Name</th>
                    <!-- <th class="js-lists-value s-projects ">Last Name</th> -->
                    <th class="js-lists-value s-projects ">Email</th>
                    <th class="js-lists-value s-projects ">Phone Number</th>
                    <th class="js-lists-value s-source ">source</th>
                    <th class="js-lists-value s-projects ">Created At</th>
                    <!-- <th class="js-lists-value s-projects ">Date of Birth</th>
                    <th class="js-lists-value s-projects ">Gender</th>
                    <th class="js-lists-value s-projects ">Address Line</th>
                    <th class="js-lists-value s-projects ">City</th>
                    <th class="js-lists-value s-projects ">Country</th>
                    <th class="js-lists-value s-projects ">Postal Code</th> -->
                    <th class="js-lists-value s-projects ">Status</th>
                    <th width="100px">Action</th>
                   </tr>
               </thead>
           </table>
       </div>
   </div>

   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>-->
   <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
   <!--<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
   <script type="text/javascript">
   // CSRF Token
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
      $(document).ready(function(){
 
       var empTable = $('#empTable').DataTable({
             pageLength: 50,
             processing: true,
             serverSide: true,
             responsive: true,
             scrollX: true,
                ajax: {
                    url: "{{ route('get_student') }}",
                    type: 'GET',
                    data: function (d) {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                },
             columns: [
                 {
            data: null,       // Use null because this column does not use server data
            name: 'serial',   // Give it a name if you want
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                // meta.row is the row index on the current page starting at 0
                // meta.settings._iDisplayStart is the index of the first row on this page
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
                {
                        data: null,
                    render: function(data, type, row) {
                        var fullName = (row.first_name || '') + ' ' + (row.last_name || '');
                        return '<a href="/student_profile/' + row.id + '" class="full-name-link">' + fullName.trim() + '</a>';
                    }
                },
                // { data: 'last_name', },
                { data: 'email', },
                { data: 'phone_number', },
                { data: 'source', },
                { data: 'created_at', name: 'created_at' },
                // { data: 'dob', },
                // { data: 'gender', },
                // { data: 'address_line', },
                // { data: 'city', },
                // { data: 'country', },
                // { data: 'postal_code',},    
                 { data: 'status',},
                {data: 'action', name: 'action', orderable: false, searchable: false},
             ]
       }); 

       $('#filterBtn').on('click', function () {
            empTable.ajax.reload();
       });

       $('#resetBtn').on('click', function () {
            $('#start_date').val('');
            $('#end_date').val('');
            empTable.ajax.reload();
       });

       // Update record
       $('#empTable').on('click', '.updateUser', function () {
    var id = $(this).data('id');

    $('#txt_empid').val(id);

    $.ajax({
        url: "{{ route('updateStudent') }}",
        type: 'post',
        data: { _token: CSRF_TOKEN, id: id },
        dataType: 'json',
        success: function (response) {
            console.log(response.stdata);

            if (response.status == 200) {
                $('#first_name').val(response.stdata.first_name);
                $('#last_name').val(response.stdata.last_name);
                $('#email').val(response.stdata.email);
                $('#phone_number').val(response.stdata.phone_number);
                $('#dob').val(response.stdata.dob);
                $('#gender').val(response.stdata.gender);
                $('#address_line').val(response.stdata.address_line);
                $('#city').val(response.stdata.city);
                $('#country').val(response.stdata.country);
                $('#postal_code').val(response.stdata.postal_code);
                $('#password').val(response.stdata.password);

                // Open the modal
                $('#updateModal').modal('show');
            } else {
                alert("Invalid ID.");
            }
        }
    });
});

// Save user
$("#updateform").submit(function (e) {
    e.preventDefault();
    var id = $('#txt_empid').val();
    var first_name = $('#first_name').val().trim();
    var last_name = $('#last_name').val().trim();
    var email = $('#email').val().trim();
    var phone_number = $('#phone_number').val().trim();
    var dob = $('#dob').val().trim();
    var gender = $('#gender').val().trim();
    var address_line = $('#address_line').val().trim();
    var city = $('#city').val().trim();
    var country = $('#country').val().trim();
    var postal_code = $('#postal_code').val().trim();
    var password = $('#password').val().trim();

    if (first_name != '' && last_name != '' && email != '' && phone_number != '' && gender != '' && address_line != '' && city != '' && country != '' && postal_code != '' &&password!='') {
        // AJAX request
        $.ajax({
            url: "{{ route('updateStudentData') }}",
            type: 'post',
            data: {
                _token: CSRF_TOKEN,
                id: id,
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone_number: phone_number,
                dob: dob,
                gender: gender,
                address_line: address_line,
                city: city,
                country: country,
                postal_code: postal_code,
                password: password,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                 

                    // Empty and reset the values
                    $('#first_name, #last_name, #email, #phone_number, #dob, #gender, #address_line, #city, #country, #postal_code,#password').val('');
                    $('#txt_empid').val(0);

                    // Reload DataTable
                    empTable.ajax.reload();

                    // Close modal
                    $('#updateModal').modal('hide');
                } 
            }
        });
    } else {
        alert('Please fill all fields.');
    }
});


       // Delete record
       $('#empTable').on('click','.deleteUser',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                 // AJAX request
                 $.ajax({
                       url: "{{ route('deleteStudent') }}",
                     type: 'post',
                     data: {_token: CSRF_TOKEN,id: id},
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");

                               // Reload DataTable
                               empTable.ajax.reload();
                          }else{
                                alert("Invalid ID.");
                          }
                     }
                 });
            }

       });

   });
    $(document).on('click', '#thumbsup', function() {
            var userId = $(this).data('id');
            // updateStatus(userId, 'Interested');
             $.ajax({
                url: "{{ route('user.status.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    user_id: userId,
                    status: 'Interested'
                },
                success: function(response) {
                    if (response.success) {
                        // alert(response.message);
                        $('#empTable').DataTable().ajax.reload(); // if using DataTables
                    } else {
                        console.log("Something went wrong!");
                    }
                },
                error: function(xhr) {
                    console.log("Error occurred");
                    console.log(xhr.responseText);
                }
            });
        });

        // Not Interested
        $(document).on('click', '#thumbdown', function() {
            var userId = $(this).data('id');
            // updateStatus(userId, );
             $.ajax({
                url: "{{ route('user.status.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    user_id: userId,
                    status: 'Not-interested'
                },
                success: function(response) {
                    if (response.success) {
                        // alert(response.message);
                        $('#empTable').DataTable().ajax.reload(); // if using DataTables
                    } else {
                        console.log("Something went wrong!");
                    }
                },
                error: function(xhr) {
                    console.log("Error occurred");
                    console.log(xhr.responseText);
                }
            });
        });

        // function updateStatus(userId, status) {
           
        // }
      // Initialize
   $('#empTable').on('click', '.changeStatus', function () {
    var userId = $(this).data('id');

    // SweetAlert2 confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to change the status!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // AJAX request to change status
            $.ajax({
                url: "{{ route('change-status') }}",
                type: 'post',
                data: { _token: CSRF_TOKEN, id: userId },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // Reload DataTable after a delay (adjust as needed)
                        setTimeout(function () {
                            if ($.fn.DataTable.isDataTable('#empTable')) {
                                $('#empTable').DataTable().ajax.reload();
                            }
                        }, 500);

                        // Show success message
                        Swal.fire(
                            'Changed!',
                            'Status has been changed.',
                            'success'
                        );
                    } else {
                        // Show error message
                        Swal.fire(
                            'Failed!',
                            'Failed to change status: ' + response.message,
                            'error'
                        );
                    }
                },
                error: function (error) {
                    // Show error message
                    Swal.fire(
                        'Error!',
                        'Error occurred while changing status.',
                        'error'
                    );
                }
            });
        }
    });
});

   </script>

@endsection
