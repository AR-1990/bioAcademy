@extends('student.main')

@section('content')

<style>
    /* Center the message both horizontally & vertically */
    .no-exam-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh; /* Center within the viewport */
        text-align: center;
    }

    .no-exam {
        font-size: 3rem; /* Large text */
        font-weight: bold;
        color: #ff4d4d; /* Stylish red color */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Subtle shadow for a nice effect */
    }
</style>

<section class="no-exam-container">
    <div>
        <h5 class="no-exam">You have already Completed your exam on <br/> {{ $date}}</h5>
    </div>
</section>

@endsection
