@extends('admin.main')
@section('content')

<style>

    /* History Table Start */
    
    html.dark-mode .table,
    html.dark-mode .text-50, 
    html.dark-mode .text-muted {
        color: #000 !important;
    }
    
    .table-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    
    .table-head .main-heading {
        margin: 0;
    }
    
    .table-head .btn.btn-primary {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .modal-dialog-centered {
        display: flex;
        align-items: center;
        min-height: calc(100% - 1rem);
    }
    
    /* History Table End */
    
    /* Compose Popup Start */
    
    /* Modal Content */
    #composeModal .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0px 8px 30px rgba(0,0,0,0.15);
    }
    
    /* Header */
    #composeModal .modal-header {
        padding: 18px 24px;
        border-bottom: none;
    }
    
    #composeModal .modal-title {
        font-weight: 600;
        font-size: 18px;
    }
    
    #composeModal .close {
        font-size: 2rem;
        filter: brightness(0) invert(1);
        opacity: 1;
        position: absolute;
        top: 0.75rem;
        right: 1.25rem;
        text-shadow: none;
        outline: none;
    }
    
    /* Body */
    #composeModal .modal-body {
        padding: 20px 24px;
    }
    
    /* Textarea */
    #composeModal textarea {
        width: 100%;
        border-radius: 8px;
        resize: none;
        font-size: 14px;
        padding: 10px 12px;
        border: 1px solid #dcdcdc;
        transition: 0.2s ease;
    }
    
    #composeModal textarea:focus {
        border-color: #7a57ff;
        box-shadow: 0 0 0 0.15rem rgba(122,87,255,0.25);
    }
    
    /* Footer Buttons */
    #composeModal .modal-footer {
        border-top: none;
        padding: 15px 24px 20px;
    }
    
    #composeModal .btn-light {
        color: #666;
        border-radius: 6px;
        padding: 8px 22px;
    }
    
    #composeModal .btn-primary {
        background-color: #7453f8;
        border-color: #7453f8;
        border-radius: 6px;
        padding: 8px 22px;
        font-weight: 500;
    }
    
    #composeModal .btn-primary:hover {
        background-color: #6242e4;
        border-color: #6242e4;
    }
    
    /* Compose Popup End */

    section.student-details {
        width: 100%;
        height: 100%;
        min-height: 600px;
        align-content: center;
        position: relative;
        margin: 40px 0;
    }

    .wrapper {
        box-shadow: 2px 2px 10px black;
        padding: 40px;
        margin: 0 20px;
        border-radius: 10px;
    }

    html.dark-mode h4.main-heading {
        color: #1c3866;
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .detail-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 10px 0;
    } 
    
    .form-control {
        width: 50%;
    }
    
    option {
    font-size: 0.85rem;
    }
    
    .btn-wrapper {
       display: flex;
       align-items: center;
       justify-content: center;
       padding: 20px 0;
    }
    
    .detail-row {
    display: flex;
    align-items: center;
    gap: 15px;
    margin: 10px 0;
    flex-wrap: wrap;
    }
    
    .detail-row strong,
    .detail-row label {
        width: 150px; /* fixed width for labels */
        margin-bottom: 0;
        font-weight: 600;
        font-size: 0.95rem;
    }
    
    .detail-row .form-control,
    .detail-row textarea,
    .detail-row select {
        flex: 1; /* take remaining space */
        min-width: 200px;
    }
    
    textarea#additional-comments {
        height: 80px;
        resize: vertical;
        padding-top: 5px;
        padding-left: 5px;
    }
    
    @media (max-width: 576px) {
        .detail-row {
            flex-direction: column;
            align-items: flex-start;
        }
    
        .detail-row strong,
        .detail-row label {
            width: auto;
        }
    
        .detail-row .form-control,
        .detail-row textarea,
        .detail-row select {
            width: 100%;
        }
    }
    
    .previous-comments {
    background-color: #e9ecef;
    border: 1px solid #ccc;
    padding: 12px;
    border-radius: 6px;
    margin-top: 8px;
    font-size: 14px;
    color: #333;
    box-shadow: 1px 1px 10px #80808045;
    }
    
    .previous-comment-row {
    margin: 40px 0;
    }
    
    .swal2-container:not(.in).swal2-backdrop-show {
    pointer-events: initial ;
    }

    input#username,
    input#password {
    width: 100%;
}

</style>
<section class="student-details">
    <div class="wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-12 d-flex align-items-end justify-content-end">
            <button type="button" class="btn btn-primary" id="changePasswordBtn">Change Password</button>
            </div>
            <div class="col-lg-6">
                <h4 class="main-heading">Personal Details</h4>
                <span class="detail-row">
                    <strong>First Name:</strong>
                    <input type="text" class="form-control mb-2" value="{{$details[0]->first_name}}" id="first_name">
                    <input type="hidden" value="{{$details[0]->id}}" id="user">
                </span>
                <span class="detail-row">
                    <strong>Last Name:</strong>
                    <input type="text" class="form-control mb-2" value="{{$details[0]->last_name}}" id="last_name">
                </span>
                <span class="detail-row">
                    <strong>Email:</strong>
                    <input type="email" class="form-control mb-2" value="{{$details[0]->email}}" id="email">
                </span>
                <span class="detail-row">
                    <strong>Phone Number:</strong>
                    <input type="text" class="form-control mb-2" value="{{$details[0]->phone_number}}" id="phone_number">
                </span>
                <span class="detail-row">
                    <strong>Date of Birth:</strong>
                    <input type="date" class="form-control mb-2" value="{{$details[0]->dob}}" id="dob">
                </span>
                <span class="detail-row">
                    <strong>Gender:</strong>
                    <select class="form-control mb-2" id="gender">
                        <option value="">Select</option>
                        <option value="male" {{ strtolower($details[0]->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ strtolower($details[0]->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ strtolower($details[0]->gender) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </span>
            </div>
            <div class="col-lg-6">
                <h4 class="main-heading">Contact Details</h4>
                <span class="detail-row">
                    <strong>Address:</strong>
                    <input type="text" class="form-control mb-2" value="{{$details[0]->address_line}}" id="address_line">
                </span>
                <span class="detail-row">
                    <strong>City:</strong>
                    <input type="text" class="form-control mb-2" value="{{$details[0]->city}}" id="city">
                </span>
                
                <span class="detail-row">
                    <label for="contact-status" class="mb-0">Status</label>
                    <select name="contact_status" id="contact_status" class="form-control mb-2">
                        <option value="">Select</option>
                        <option value="Not contacted" {{ $details[0]->status == 'Not contacted' ? 'selected' : '' }}>Not contacted</option>
                        <option value="Contact Attempt 1" {{ $details[0]->status == 'Contact Attempt 1' ? 'selected' : '' }}>Contact Attempt 1</option>
                        <option value="Contact Attempt 2" {{ $details[0]->status == 'Contact Attempt 2' ? 'selected' : '' }}>Contact Attempt 2</option>
                        <option value="Contact Attempt 3" {{ $details[0]->status == 'Contact Attempt 3' ? 'selected' : '' }}>Contact Attempt 3</option>
                        <option value="Followup-Required" {{ $details[0]->status == 'Followup-Required' ? 'selected' : '' }}>Followup Required</option>
                        <option value="Not-Interested" {{ $details[0]->status == 'Not-Interested' ? 'selected' : '' }}>Not Interested</option>
                        <option value="Duplicate Entry" {{ $details[0]->status == 'Duplicate Entry' ? 'selected' : '' }}>Duplicate Entry</option>
                    </select>
                </span>
            </div>
            <div class="col-lg-12">
                <span class="detail-row">
                    <strong>Additional Comments</strong>
                    <textarea name="additional-comments" id="additional-comments"></textarea>
                </span>
                <span class="detail-row previous-comment-row">
                    <strong>Previous Comments</strong>
                    <div class="mb-0 previous-comments">
                        @foreach($comments as $comment)
                            <div>
                                <b>{{ $comment->admin->first_name ?? 'Admin' }}</b> ({{ $comment->created_at->format('d-m-Y H:i') }}):<br>
                                {{ $comment->comment }}
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </span>
            </div>
        </div>
        <div class="btn-wrapper">
            <button type="button" class="btn btn-primary save-changes mr-2" id="saveStatus">Save Changes</button>
            <!--<button type="button" class="btn btn-primary ml-2" id="smsToggleBtn" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Show SMS History</button>-->
            <button id="smsToggleBtn" 
                type="button" 
                class="btn btn-primary ml-2" 
                data-toggle="collapse" 
                data-target="#collapseExample" 
                aria-expanded="false" 
                aria-controls="collapseExample">
            Show SMS History
        </button>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="table-head">
                <h4 class="main-heading">SMS History Details</h4>
                <!--<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus"></i> Compose New Message</a>-->
                <button class="btn btn-primary" data-toggle="modal" data-target="#composeModal">
                    Compose New Message
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>To</th>
                            <th>From</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Body</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sms as $m)
                            <tr>
                                <td>{{ $m->recipient_number }}</td>
                                <td>{{ $m->sender_number }}</td>
                                <td>{{ ($m->user ?? $m->matched_user)?->first_name }} {{ ($m->user ?? $m->matched_user)?->last_name }}</td>
                                <td>{{ $m->direction === 'outbound' ? 'Sent' : 'Received' }}</td>
                                <td>{{ $m->body }}</td>
                                <td>{{ $m->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted">No messages</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
      </div>
      <div class="modal-body">
        <form id="changePasswordForm">
          <div class="mb-3">
            <label for="username" class="form-label">System ID</label>
            <input type="text" class="form-control" id="system_jd" value="{{$details[0]->id}}" placeholder="System ID" readonly>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter new password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" form="changePasswordForm" id="changePassword">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Send Message Popup Start -->
<div class="modal fade" id="composeModal" tabindex="-1" role="dialog" aria-labelledby="composeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="composeModalLabel">Compose New Text Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="{{ route('admin.mass-text.send') }}">
        @csrf
        <input type="hidden" name="category" value="individual">
        <input type="hidden" name="phone" value="{{ $details[0]->phone_number }}">

        <div class="modal-body">
          <div class="form-group">
            <label><strong>Phone Number:</strong> {{ $details[0]->phone_number }}</label>
          </div>

          <div class="form-group">
            <label>Create Message</label>
            <textarea name="message" class="form-control" rows="6" placeholder="Write message here..." required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- Send Message Popup End -->

</section>
 
   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
   <!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
   <!--<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
<script>

@if(session('status'))
Swal.fire('Success', '{{ session('status') }}', 'success');
@endif


// document.getElementById('changePasswordBtn').addEventListener('click', function () {
//     var myModal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
//     myModal.show();
//   });

//   document.querySelector('.btn.btn-secondary').addEventListener('click', function () {
//   var modalElement = document.getElementById('changePasswordModal');
//   var modalInstance = bootstrap.Modal.getInstance(modalElement);
//   if (modalInstance) {
//     modalInstance.hide();
//   }
// });


  let changePasswordModalInstance;

  document.getElementById('changePasswordBtn').addEventListener('click', function () {
    const modalElement = document.getElementById('changePasswordModal');
    changePasswordModalInstance = new bootstrap.Modal(modalElement);
    changePasswordModalInstance.show();
  });

  document.querySelector('.btn.btn-secondary').addEventListener('click', function () {
    if (changePasswordModalInstance) {
      changePasswordModalInstance.hide();
    }
  });
    

   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
   $(document).on('click', '#saveStatus', function() {
        var data = {
            _token: "{{ csrf_token() }}",
            user_id: $('#user').val(),
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            phone_number: $('#phone_number').val(),
            dob: $('#dob').val(),
            gender: $('#gender').val(),
            address_line: $('#address_line').val(),
            city: $('#city').val(),
            status: $('#contact_status').val(),
            comment: $('#additional-comments').val()
        };
        $.ajax({
            url: "{{ route('admin.student.update') }}",
            type: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire('Changed!', 'Profile has been updated.', 'success');
                    $('#additional-comments').val(''); // clear comment box
                    location.reload(); // reload to show new comments
                } else {
                    Swal.fire('Error', 'Something went wrong!', 'error');
                }
            },
            error: function(xhr) {
                Swal.fire('Error', 'Error occurred: ' + xhr.responseText, 'error');
            }
        });
    });
    $(document).on('click', '#changePassword', function() {
        var userId = document.getElementById('system_jd').value;
        var newPassword = document.getElementById('password').value;
        $.ajax({
            url: "{{ route('admin.student.password') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                user_id: userId,
                password: newPassword
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire('Success', 'Password changed successfully!', 'success');
                    
                    modal.hide();
                    // document.getElementById('new_password').value = '';
                    document.getElementById('password').value = '';
                } else {
                    Swal.fire('Error', response.message || 'Something went wrong!', 'error');
                }
            },
            error: function(xhr) {
                Swal.fire('Error', 'Error occurred: ' + xhr.responseText, 'error');
            }
        });
    });
    
    
    $('#collapseExample').on('show.bs.collapse', function () {
        $('#smsToggleBtn').text('Hide SMS History');
    });
    
    $('#collapseExample').on('hide.bs.collapse', function () {
        $('#smsToggleBtn').text('Show SMS History');
    });
</script>

@endsection
