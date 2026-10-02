@extends('student.main')
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
        left: 30%;
        visibility: visible!important;
    }
    a.card-img-top {
        background-image: none!important;
    }
</style>
<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Quizzes</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/student_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Quizzes Results</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container page__container">
    <div class="page-section">
        <div class="page-separator">
            <div class="page-separator__text">Quizzes</div>
        </div>
        <div class="row card-group-row">
            @foreach($availableQuizzes as $quiz)
                <div class="col-lg-3 card-group-row__col">
                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card" data-toggle="popover" data-trigger="click">
                        <a href="{{ route('student-quiz', ['id' => $quiz->id]) }}" class="card-img-top js-image" data-position="" data-height="140">
                            <img src="{{ asset('admin/images/logo2.png') }}" class="quiz_img" alt="course">
                            <span class="overlay__content">
                                <span class="overlay__action d-flex flex-column text-center">
                                    <i class="material-icons icon-32pt">play_circle_outline</i>
                                    <span class="card-title text-white">Resume</span>
                                </span>
                            </span>
                        </a>
                        @if($quiz->isNew())
                            <span class="corner-ribbon corner-ribbon--default-right-top corner-ribbon--shadow bg-accent text-white">NEW</span>
                        @endif
                        <div class="card-body flex">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title" href="{{ route('student-quiz', ['id' => $quiz->id]) }}">Quiz: {{ $quiz->id }}</a>
                                    <small class="text-50 font-weight-bold mb-4pt">{{ $quiz->QuizName }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
