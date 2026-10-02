@extends('student.main')
@section('content')
<style>
    .result-container {
        background: #f9fafb;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .question-card {
        background: #ffffff;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .question-card h4 {
        font-size: 1.25rem;
        color: #333;
        margin-bottom: 1rem;
    }

    .option {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        padding: 0.75rem;
        border-radius: 6px;
        background: #f3f4f6;
        transition: background 0.2s ease;
    }

    .option.correct {
        background: #e6ffed;
        border-left: 4px solid #4CAF50;
    }
     .option.selected {
        background: #d3e4ff;
        border-left: 4px solid #4c6eaf;
    }

    .option.incorrect {
        background: #ffebee;
        border-left: 4px solid #F44336;
    }

    .option .icon {
        margin-right: 0.75rem;
        font-size: 1.2rem;
    }

    .option.correct .icon {
        color: #4CAF50;
    }

    .option.incorrect .icon {
        color: #F44336;
    }
    .question-card .aswers {
        display: flex;
        margin-top: 30px;
        flex-direction: column;
    }
    
    .question-card .aswers p {
        font-size: 15px;
        margin-bottom: 6px;
    }
</style>
<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Quiz Results</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/student_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Results</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container page__container page-section">
    <div class="result-container">
    @foreach($ExamDetails as $detail)  
    <div class="question-card">
            <h4>{{$detail['question']}}</h4>
            <div class="option">
                <span>{{$detail['optiona']}}</span>
            </div>
            <div class="option">
                <span>{{$detail['optionb']}}</span>
            </div>
            <div class="option">
                <span>{{$detail['optionc']}}</span>
            </div>
            <div class="option">
                <span>{{$detail['optiond']}}</span>
            </div>
            <div class="aswers">
                <p class="option selected">Selected Option: ({{strtoupper($detail['selected_options'])}})</p>
                <p class="option correct">Correct Option: ({{strtoupper($detail['correctanswer'])}})</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection