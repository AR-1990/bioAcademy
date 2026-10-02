<!DOCTYPE html>
<html lang="en" dir="ltr" class="dark-mode">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Biopharma Academy Of Clinical Research</title>
    <!-- Fav icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/images/favicon-biopharma.png') }}">
    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
        rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('admin/vendor/spinkit.css') }}" rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('admin/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('admin/css/material-icons.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('admin/css/fontawesome.css') }}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('admin/css/preloader.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('admin/css/app.css') }}" rel="stylesheet">

    <!-- Dark Mode CSS -->
    <link type="text/css" href="{{ asset('admin/css/dark.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Sweet Alert  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css">
    <!-- jQuery -->
    <script src="{{ asset('admin/vendor/jquery.min.js') }}"></script>
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

                <a href="index.html" class="navbar-brand mr-16pt d-lg-none">

                    <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">

                        <span class="avatar-title rounded bg-primary"><img
                                src="{{ asset('admin/images/illustration/teacher/128/white.svg') }}" alt="logo"
                                class="img-fluid" /></span>

                    </span>

                    <span class="d-none d-lg-block">Biopharma Academy Of Clinical Research</span>
                </a>

                <!-- // END Navbar Brand -->

                <span class="d-none d-md-flex align-items-center mr-16pt logo-center">


                    <small class="flex d-flex flex-column">
                        <a href="{{ url('/admin_dashboard') }}">
                            <img src="{{ asset('admin/images/academy-logo-white.png') }}" class="logo-university">
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

                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action unread">
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
                            <a class="dropdown-item" href="{{ route('edit-account') }}">Edit Profile</a>
                            <!-- <a class="dropdown-item" href="url()">Logout</a> -->
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                  <input type="submit" class="dropdown-item" value="Logout">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add this in your Blade view where you want the logout button -->



                <!-- // END Navbar Menu -->

            </div>


            <!-- // END Header -->
            @yield('content')
        </div>
        <!-- // END Navbar -->
        @include('admin.layouts.navbar')

    </div>
    @include('admin.layouts.footer')
</body>

</html>
