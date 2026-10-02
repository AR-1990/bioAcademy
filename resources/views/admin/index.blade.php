@extends('admin.main')
@section('content')

<style>
     img.quiz_img {
        position: absolute;
    width: 75px;
    height: 75px;
    object-fit: cover;
    object-position: center;
    z-index: 999;
    top: 25%;
    left: 35%;
    visibility: visible!important;
    }
    a.card-img-top{
        background-image: none!important;
    }
    html.dark-mode .card-title {
    min-height: 40px;
    text-align: center;
    justify-content: center;
}
</style>
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Dashboard</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>

                        <li class="breadcrumb-item active">

                            Dashboard

                        </li>

                    </ol>

                </div>
            </div>

            <div class="row" role="tablist">
                <div class="col-auto">
                    <a href="{{ url('/module') }}" class="btn btn-outline-secondary">Module</a>
                </div>
            </div>

        </div>
    </div>

    <div class="container page__container">
        <div class="page-section">
            <div class="row card-group-row">

                <div class="col-lg-4 card-group-row__col">

                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover" data-trigger="click">

                        <a href="#" class="card-img-top js-image" style="background: #2f489c;" data-position="" data-height="140">
                            <img class="quiz_img" src="{{ asset(asset('admin/images/logo2.png')) }}" alt="course">
                            <span class="overlay__content">
                                <span class="overlay__action d-flex flex-column text-center">
                                    <i class="material-icons icon-32pt">play_circle_outline</i>
                                    <span class="card-title text-white">Resume</span>
                                </span>
                            </span>
                        </a>

                        <!-- <span
                            class="corner-ribbon corner-ribbon--default-right-top corner-ribbon--shadow bg-accent text-white">NEW</span> -->

                                            <div class="row justify-content-between">
                            <div class="col-auto card-body flex" style="background: #1c3866;">
                                <!-- <span class="material-icons icon-16pt mr-4pt">TotalStudents</span> -->
                                <div class="d-flex">
                                <div class="flex">
                                <a class="card-title" href="{{route('Enrolled_student')}}">Total Number Of Enrolled Students</a>
                                    <h1 class="font-weight-bold mb-4pt">{{ $totalStudentsCount }}</h1>
                                </div>
</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 card-group-row__col">

                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover" data-trigger="click">

                        <a href="#" class="card-img-top js-image" style="background: #2f489c;" data-position="" data-height="140">
                            <img class="quiz_img" src="{{ asset(asset('admin/images/logo2.png')) }}" alt="course">
                            <span class="overlay__content">
                                <span class="overlay__action d-flex flex-column text-center">
                                    <i class="material-icons icon-32pt">play_circle_outline</i>
                                    <span class="card-title text-white">Resume</span>
                                </span>
                            </span>
                        </a>

                        <div class="card-body flex" style="background: #1c3866;">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title" href="{{route('module')}}">Total Number Of Modules</a>
                                    <h1 class="font-weight-bold mb-4pt">{{$totalModules}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- <div class="col-lg-4 card-group-row__col">

                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover" data-trigger="click">

                        <a href="#" class="card-img-top js-image" data-position="" data-height="140">
                            <img class="quiz_img" src="{{ asset(asset('admin/images/logo2.png')) }}" alt="course">
                            <span class="overlay__content">
                                <span class="overlay__action d-flex flex-column text-center">
                                    <i class="material-icons icon-32pt">play_circle_outline</i>
                                    <span class="card-title text-white">Resume</span>
                                </span>
                            </span>
                        </a>

                        <div class="card-body flex">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title" href="{{route('quiz')}}">Total Number Of Quizz</a>
                                    <h1 class="font-weight-bold mb-4pt">{{$totalQuizzes}}</h1>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-lg-4 card-group-row__col">

                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                        data-toggle="popover" data-trigger="click">

                        <a href="#" class="card-img-top js-image" style="background: #2f489c;" data-position="left" data-height="140">
                            <img class="quiz_img" src="{{ asset(asset('admin/images/logo2.png')) }}" alt="course">
                            <span class="overlay__content">
                                <span class="overlay__action d-flex flex-column text-center">
                                    <i class="material-icons icon-32pt">play_circle_outline</i>
                                    <span class="card-title text-white">Resume</span>
                                </span>
                            </span>
                        </a>

                        <div class="card-body flex" style="background: #1c3866;">
                            <div class="d-flex">
                                <div class="flex">
                                <a class="card-title" href="{{route('get_student')}}">Total Number Of Inquiries</a>
                                    <h1 class="font-weight-bold mb-4pt">{{$unenrolledStudents }}</h1>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
