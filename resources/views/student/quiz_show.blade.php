@extends('student.main')
@section('content')
<style>
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #2196F3;
        border-color: #2196F3;
    }

    .custom-control-input:checked ~ .custom-control-label.checkbox-label {
        color: #2196F3;
    }

    .custom-control-input:not(:checked) ~ .custom-control-label::before {
        background-color: #fff;
        border-color: #2196F3; 
    }

    .custom-control-input:not(:checked) ~ .custom-control-label.checkbox-label {
        color: #333; 
    }

    .custom-control-label::before {
        border-radius: 50%; 
        border: 2px solid #2196F3;
    }
</style>
<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Quiz Name</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/student_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Quiz Name</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container page__container">
    <div class="page-section">
        <div class="page-separator">
            <div class="page-separator__text">Note: There can be multiple correct answers to this question.</div>
        </div>
        <form method="POST" action="{{ route('student-submit-quiz') }}">
            @csrf
            @if ($questions)
                @foreach($questions as $index => $question)
                    <input type="hidden" name="quiz_id[]" value="{{ $question->id }}">
                    <p class="hero__lead measure-hero-lead">
                        Q. {{ $index + 1 }} {{ $question->question }}
                        <input type="hidden" name="question_id[]" value="{{ $question->id }}">
                    </p>

                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input id="customRadio{{ $index * 4 + 1 }}" name="answers[{{ $question->id}}]" type="radio" class="custom-control-input" value="{{ $question->option_one }}">
                            <label for="customRadio{{ $index * 4 + 1 }}" class="custom-control-label">{{ $question->option_one }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input id="customRadio{{ $index * 4 + 2 }}" name="answers[{{ $question->id}}]" type="radio" class="custom-control-input" value="{{ $question->option_two }}">
                            <label for="customRadio{{ $index * 4 + 2 }}" class="custom-control-label">{{ $question->option_two }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input id="customRadio{{ $index * 4 + 3 }}" name="answers[{{ $question->id}}]" type="radio" class="custom-control-input" value="{{ $question->option_three }}">
                            <label for="customRadio{{ $index * 4 + 3 }}" class="custom-control-label">{{ $question->option_three }}</label>
                        </div>
                    </div>
                    <div class="form-group mb-32pt mb-lg-48pt">
                        <div class="custom-control custom-radio">
                            <input id="customRadio{{ $index * 4 + 4 }}" name="answers[{{$question->id }}]" type="radio" class="custom-control-input" value="{{ $question->option_four }}">
                            <label for="customRadio{{ $index * 4 + 4 }}" class="custom-control-label">{{ $question->option_four }}</label>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="form-group mb-32pt mb-lg-48pt">
                <button type="submit" class="btn btn-accent">
                    Submit <i class="material-icons icon--right">keyboard_arrow_right</i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
