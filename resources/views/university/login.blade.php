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
			<form class="login-form" action="{{route('user-login')}}" method="POST">
				@csrf
				<img src="{{ asset('university/img/avatar.png') }}">
				<h2 class="title">Welcome</h2>
                                @if ($errors->any())
                                        <div style="width: 100%; margin-bottom: 15px; padding: 12px 14px; border-radius: 8px; background: #fdecea; color: #b42318; font-size: 14px; text-align: left;">
                                                {{ $errors->first('login') ?: $errors->first() }}
                                        </div>
                                @endif
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Username</h5>
                                                <input type="email" class="input" name='email' value="{{ old('email') }}" required>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name='password' required>
					</div>
				</div>
				<a href="/forgot-password" class="forget-pass">Forgot Password?</a>
				<input type="submit" class="btn-login" value="Login">
				<div class="signup-link">
					<p>Don't have account ? fill out the<a href="{{ url('/getenrolled') }}"> form</a> and get enrolled</p>
				</div>
			</form>
			
		</div>
		
	</div>

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

	</script>
@endsection
