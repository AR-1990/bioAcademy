@extends('university.main')
@section('content')
<style>
	#logo img {
    filter: brightness(1);
	}
	.sticky #logo img {
    filter: brightness(21);
	}
	footer {
   display: none;
	}
	header{
		display: none;
	}
	#copy {
	display: none;
	}
</style>

	<div class="login-container">
		<img class="wave" src="{{ asset('university/img/wave.png') }}">
		<div class="img-login">
			<img src="{{ asset('university/img/login_image_1.png') }}">
		</div>
		<div class="login-content">
		<form class="login-form" id="resetForm">
    @csrf
    <img src="{{ asset('university/img/avatar.png') }}">
    <h2 class="title">Reset Your Password</h2>
    <div class="input-div one">
        <div class="i">
            <i class="fas fa-user"></i>
        </div>
        <div class="div">
            <h5>Enter Your Email</h5>
            <input type="email" class="input" name="email" id="email" required>
        </div>
    </div>
    <button type="submit" class="btn-login">New Password</button>
</form>

			
		</div>
		
	</div>
<!-- jQuery CDN -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		const inputs = document.querySelectorAll(".input");


		function addcl() {
			let parent = this.parentNode.parentNode;
			parent.classList.add("focus");
		}

		function remcl() {
			let parent = this.parentNode.parentNode;
			if (this.value == "") {
				parent.classList.remove("focus");
			}
		}


		inputs.forEach(input => {
			input.addEventListener("focus", addcl);
			input.addEventListener("blur", remcl);
		});
		
$(document).ready(function(){
    $('#resetForm').on('submit', function(e){
        e.preventDefault(); // prevent default form submission

        let email = $('#email').val();
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{ route("/sendMail") }}',
            type: 'POST',
            data: {
                _token: token,
                email: email
            },
            success: function(response){
                Swal.fire({
                    title: 'Success!',
                    text: response.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                $('#resetForm')[0].reset(); // Clear the form after success
            },
            error: function(xhr, status, error){
                Swal.fire({
                    title: 'Error!',
                    text: xhr.responseJSON.message || 'Failed to send email.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>


@endsection