@extends('student.main')
@section('content')
<style>
    .result_box .image img {
        max-width: 100%;
        height: 130px;
        width: 130px;
        border-radius: 50% !important;
        overflow: hidden;
        object-fit: cover;
        object-position: center;
    }

    .result_box .image {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 20px;
    }

    .exam_result_data {
        padding: 20px 50px;
    }

    .exam_result_data .data_name h3 {
        color: #ffffff;
        font-size: 1.25rem;
    }
    .result_box {
    padding-top: 30px;
}

a.anchor {
    color: #fff;
    font-size: 16px;
    transition: .3s ease-out;
    font-weight: 700;
}

a.anchor:hover {
    color: #e55123 !important;
    transition: .3s ease-out;
}
</style>
<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Results</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/student_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Results
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container page__container page-section">
    <div class="card stack">
        <!-- <div class="list-group list-group-flush">
            @foreach($results as $result)

            <div class="list-group-item d-flex flex-column flex-sm-row align-items-sm-center px-12pt">
                <div class="flex d-flex align-items-center mr-sm-16pt mb-8pt mb-sm-0">
                    <a href="javascript:void(0)" class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                        <img src="{{ asset('student/images/paths/invision_200x168.png') }}" alt="inVision App"
                            class="avatar-img rounded">
                        <span class="overlay__content"></span>
                    </a>
                    <div class="flex">
                        <a class="card-title" href="#"> {{ $result['student_name'] }}</a>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-center mr-16pt">
                    <span style="color:white">Score</span>
                    <small class="text-50 text-uppercase text-headings">{{ $result['correct_answers']}}</small>
                </div>
                <div class="d-flex flex-column align-items-center mr-16pt">
                    <span style="color:white">Attempted Questions</span>
                    <small class="text-50 text-uppercase text-headings">180</small>
                </div>
                <div class="d-flex flex-column align-items-center mr-16pt">
                    <span style="color:white">Percentage</span>
                    <small class="text-50 text-uppercase text-headings">{{ number_format(($result['correct_answers'] * 100) / 180, 2) }} %</small>
                </div>
                <div class="d-flex flex-column align-items-center mr-16pt">
                    <span style="color:white">Exam Taken </span>
                    <small class="text-50 text-uppercase text-headings">{{ $result['quiz_dates'][0] }}</small>
                </div>
            </div>

            @endforeach
        </div> -->
        <div class="result_box">
        @foreach($results as $result)
            <div class="image">
            <img src="{{ $result['image'][0] ? url('/storage/'.$result['image'][0]) : url('/storage/default-profile.png') }}" alt="profile" class="avatar-img rounded">
                <div class="sudent_name">
                    <a class="card-title" href="#"> {{ $result['student_name'] }}</a>
                </div>
            </div>
            <div class="exam_result_data">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="data_name">
                            <h3>Score : {{ $result['correct_answers']}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="data_name">
                            <h3>Attempted Questions : {{ $result['total_questions'] }}</h3>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="data_name">
                            <h3>Percentage : {{ $result['total_questions'] > 0 ? number_format(($result['correct_answers'] * 100) / $result['total_questions'], 2) : '0.00' }} %</h3>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="data_name">
                            <h3>Exam Taken : {{ $result['quiz_dates'][0] }}</h3>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="data_name">
                             <a href="{{ Route('student-result-details')}}" class="anchor"> 
                                More Details
                             </a> 
                         </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
