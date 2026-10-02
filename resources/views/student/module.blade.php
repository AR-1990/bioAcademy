@extends('student.main')

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

    .module-progress {
        margin-top: 12px;
    }

    .module-progress-label {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        margin-bottom: 6px;
        color: #1c3866;
        font-weight: 600;
    }

    .module-progress-track {
        width: 100%;
        height: 8px;
        background: #e9ecef;
        border-radius: 999px;
        overflow: hidden;
    }

    .module-progress-fill {
        height: 100%;
        background: #1c3866;
        border-radius: 999px;
    }
</style>

@section('content')
<div style="overflow-y:scroll !important;">
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">My Modules</h2>
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/student_dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">My Modules</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container page__container">
        <div class="page-section">
            <div class="page-separator">
                <div class="page-separator__text">Modules</div>
            </div>

            <div class="container-fluid page__container page-section">
                <div class="row card-group-row">
                    @forelse($lessons as $lesson)
                    <div class="col-lg-3 mb-4">
                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                            data-toggle="popover" data-trigger="click">
                            <a href="{{ route('student-lessons', ['lessonsId' => $lesson->id]) }}" class="card-img-top js-image"
                                data-position="" data-height="140">
                                <img src="{{ asset('admin/images/logo2.png') }}" class="quiz_img" alt="course">
                                <span class="overlay__content">
                                    <span class="overlay__action d-flex flex-column text-center">
                                        <i class="material-icons icon-32pt">play_circle_outline</i>
                                        <span class="card-title text-white">Resume</span>
                                    </span>
                                </span>
                            </a>
                            <div class="card-body flex">
                                <div class="d-flex flex-column">
                                    <a class="card-title" href="{{ route('student-lessons', ['lessonsId' => $lesson->id]) }}">Module {{ $lesson->lesson_number}}</a>
                                    <small class="text-50 font-weight-bold mb-4pt">{{ $lesson->lesson_name }}</small>
                                    @php
                                        $progress = $lessonProgress[$lesson->id] ?? null;
                                        $percent = round((float) ($progress['percent'] ?? 0), 2);
                                    @endphp
                                    <div class="module-progress">
                                        <div class="module-progress-label">
                                            <span>{{ !empty($progress['completed']) ? 'Completed' : 'Progress' }}</span>
                                            <span>{{ $percent }}%</span>
                                        </div>
                                        <div class="module-progress-track">
                                            <div class="module-progress-fill" style="width: {{ $percent }}%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row justify-content-between">
                                    <div class="col-auto d-flex align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p>No Module found.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
