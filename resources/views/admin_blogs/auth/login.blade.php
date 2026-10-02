<!DOCTYPE HTML>
<html>

<head>
    <link href='style.css' rel='stylesheet'>
    <title>Login form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/login.css') }}">
</head>



<body>
    <div class='wrapper'>
        <div class='pcon'>
            <h2>Welcome! Please login.</h2>
            <form action="{{route('user-login')}}" method="POST" >
                @csrf
                <div class='inputs'>
                    <h3>Email</h3>
                    <input type='email' class='textfield' id='un' required name="email">
                    <!-- {{-- <h3 class='forgot' id='fun'>Forgot username</h3> --}} -->
                </div>
                <div class='inputs'>
                    <h3>Password</h3>
                    <input type='password' class='textfield' id='pw' required name="password">
                    <!-- {{-- <h3 class='forgot' id='fpw'>Forgot password</h3> --}}
                    {{-- <input type='checkbox'><label for='check' class='checkbox'>Remember me</label></input> --}} -->
                </div>
                <input type="submit" class='btn' value="Login" />
               
            </form>
        </div>
    </div>


    <script>
       /* const forgotUn = document.getElementById('fun');
        const forgotPw = document.getElementById('fpw');
        const submit = document.querySelector('.btn');


        submit.addEventListener('click', (e) => {
            e.preventDefault();
            const username = document.getElementById('un').value;
            const password = document.getElementById('pw').value;
            if (username === 'user' && password === '123aBc') {
                alert('Login successful!');
            } else {
                alert('Login unsuccessful! Check "Forgot username" and "Forgot password" for more info.')
            }
        });

        forgotUn.addEventListener('click', () => {
            alert('Username is "user".');
        });
        forgotPw.addEventListener('click', () => {
            alert('Password is "123aBc", remember it is case sensitive.');
        });*/
    </script>
</body>

</html>
