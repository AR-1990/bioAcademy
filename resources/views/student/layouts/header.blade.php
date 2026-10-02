<!DOCTYPE html>
<html lang="en" dir="ltr" class="dark-mode">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Biopharma Academy Of Clinical Research</title>
    <!-- Fav icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('student/images/favicon-biopharma.png') }}">
    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
        rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('student/vendor/spinkit.css') }}" rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('student/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('student/css/material-icons.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('student/css/fontawesome.css') }}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('student/css/preloader.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('student/css/app.css') }}" rel="stylesheet">

    <!-- Dark Mode CSS -->
    <link type="text/css" href="{{ asset('student/css/dark.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- jQuery -->
  <script src="{{ asset('student/vendor/jquery.min.js') }}"></script>

<style>

/*Chat Box Styling Start*/
    
    /* Chat Icon */
#chatIcon {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #1c3866;
    color: white;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    z-index: 999;
}

/* Chat Box Wrapper */
.chatBoxWrapper {
    position: fixed;
    bottom: 80px;
    right: 20px;
    display: none;
    z-index: 998;
    animation-duration: 0.3s;
    animation-fill-mode: both;
}

/* Animation Classes */
.chatBoxWrapper.show {
    display: block;
    animation-name: fadeInUp;
}

.chatBoxWrapper.hide {
    animation-name: fadeOutDown;
}

/* Chat Box Design */
#chatBox {
    width: 320px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

.chat-header {
    background-color: #f8f9fa;
    padding: 10px 15px;
    border-bottom: 1px solid #dee2e6;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.chat-body {
    padding: 15px;
}

textarea.form-control {
    resize: none;
}

.chat-body textarea:focus {
    box-shadow: 0 0 0 .2rem rgba(28,56,102,76) !important;
}

#sendBtn {
    background-color: #1c3866;
    color: #fff;
    font-size: 14px;
}

.chatBtn {
    background-color: #1c3866;
    color: #fff;
    font-size: 14px;
}

.chat-body textarea {
    background-color: transparent !important;
}


/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOutDown {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    to {
        opacity: 0;
        transform: translateY(20px);
    }
}

/*Chat Box Styling End*/

</style>

</head>

<body class="layout-app ">

    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>

    <!-- Drawer Layout -->

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page-content">

            <!-- Header -->

            <!-- Navbar -->

            <div class="navbar navbar-expand pr-0 navbar-dark border-bottom-2" id="default-navbar" data-primary>

                <!-- Navbar Toggler -->

                <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0" type="button"
                    data-toggle="sidebar">
                    <span class="material-icons">short_text</span>
                </button>

                <!-- // END Navbar Toggler -->

                <!-- Navbar Brand -->

                <a href="{{ url('/student_dashboard') }}" class="navbar-brand mr-16pt d-lg-none">

                    <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">

                        <span class="avatar-title rounded bg-primary"><img
                                src="{{ asset('student/images/illustration/student/128/white.svg') }}" alt="logo"
                                class="img-fluid" /></span>

                    </span>

                    <span class="d-none d-lg-block">Biopharma Academy Of Clinical Research</span>
                </a>

                <!-- // END Navbar Brand -->

                <span class="d-none d-md-flex align-items-center mr-16pt logo-center">


                    <small class="flex d-flex flex-column">
                        <a href="{{ url('/student_dashboard') }}">
                            <img src="{{ asset('student/images/academy-logo-white.png') }}" class="logo-university">
                        </a>
                    </small>

                </span>

                <div class="flex"></div>


                <div class="nav navbar-nav flex-nowrap d-flex mr-16pt">
                    <!-- Notifications dropdown -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <div data-perfect-scrollbar class="position-relative">
                                <div class="dropdown-header"><strong>System notifications</strong></div>
                                <div class="list-group list-group-flush mb-0">

                                    <a href="javascript:void(0);"
                                        class="list-group-item list-group-item-action unread">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">3 minutes ago</small>

                                            <span class="ml-auto unread-indicator bg-accent"></span>

                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <i
                                                        class="material-icons font-size-16pt text-accent">account_circle</i>
                                                </span>
                                            </span>
                                            <span class="flex d-flex flex-column">

                                                <span class="text-black-70">This is Dummy Text</span>
                                            </span>
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">5 hours ago</small>

                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <i class="material-icons font-size-16pt text-primary">group_add</i>
                                                </span>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong class="text-black-100">Dummy Name</strong>
                                                <span class="text-black-70">This is Dummy Text</span>
                                            </span>
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">1 day ago</small>

                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <i class="material-icons font-size-16pt text-warning">storage</i>
                                                </span>
                                            </span>
                                            <span class="flex d-flex flex-column">

                                                <span class="text-black-70">This is Dummy Text </span>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    <!-- // END Notifications dropdown -->

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex align-items-center dropdown-toggle"
                            data-toggle="dropdown" data-caret="false">

                            <span class="avatar avatar-sm mr-8pt2">

                                <span class="avatar-title rounded-circle bg-primary"><i
                                        class="material-icons">account_box</i></span>

                            </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header"><strong>Account</strong></div>
                            <a class="dropdown-item" href="{{ route('edit-student') }}">Edit Account</a>
                            <!-- <a class="dropdown-item"
                                   href="#">Billing</a>
                                <a class="dropdown-item"
                                   href="#">Payments</a> -->
                                   <form action="{{ route('logout') }}" method="post">
                                @csrf
                                  <input type="submit" class="dropdown-item" value="Logout">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- // END Navbar Menu -->

            </div>

            <!-- // END Navbar -->

            <!-- // END Header -->
             @yield('content')
        </div>
        @include('student.layouts.navbar')
    </div>
    
    <!--Chat Box-->
    
    <div class="chatBox">
        <button id="chatIcon">
            <i class="fas fa-comment-alt"></i>
        </button>
        <div class="chatBoxWrapper" id="chatBoxWrapper">
            <div id="chatBox" class="d-flex flex-column">
                <div class="chat-header">
                    <span>Write your Message</span>
                    <button id="closeChat" class="chatBtn">
                         <i class="fas fa-times" style="cursor: pointer;"></i>
                    </button>
                   
                </div>
                <div class="chat-body">
                    <textarea class="form-control mb-3" rows="8" id="message" placeholder="Type your message..."></textarea>
                    <button class="btn" id="sendBtn">Send</button>
                </div>
            </div>
        </div>
    </div>
    
 
    
    
<!--    @section('script')-->
<!--    <script>-->
<!--        const chatIcon = document.getElementById('chatIcon');-->
<!--const chatBoxWrapper = document.getElementById('chatBoxWrapper');-->
<!--const closeChat = document.getElementById('closeChat');-->
<!--const sendBtn = document.getElementById('sendBtn');-->

<!--chatIcon.addEventListener('click', () => {-->
<!--    chatBoxWrapper.style.display = 'block';-->
<!--    chatBoxWrapper.classList.remove('hide');-->
<!--    chatBoxWrapper.classList.add('show');-->
<!--});-->

<!--closeChat.addEventListener('click', () => {-->
<!--    chatBoxWrapper.classList.remove('show');-->
<!--    chatBoxWrapper.classList.add('hide');-->

    // Delay hiding element to allow animation to finish
<!--    setTimeout(() => {-->
<!--        chatBoxWrapper.style.display = 'none';-->
    }, 300); // Match animation-duration in CSS
<!--});-->

<!--sendBtn.addEventListener('click', () => {-->
<!--    Swal.fire({-->
<!--        icon: 'success',-->
<!--        title: 'Message Sent!',-->
<!--        text: 'Your message has been delivered.',-->
<!--        timer: 2000,-->
<!--        showConfirmButton: false-->
<!--    });-->
<!--});-->
<!--    </script>-->
    
<!--    @endsection-->
    @include('student.layouts.footer')
</body>
</html>
