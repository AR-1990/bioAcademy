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
        visibility: visible !important;
    }

    a.card-img-top {
        background-image: none !important;
    }

    /* FORM STYLING */

    .mcq-container {
        /* max-width: 700px;
        margin: 50px auto; */
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .question {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .correct-answer {
        color: #1c3866;
        font-weight: bold;
        margin-bottom: 10px !important;
        margin-top: 10px !important;
    }

    .progress {
        background-color: #fff;
    }

    .progress-container {
        margin-bottom: 20px;
    }

    .progress-bar {
        background-color: #1c3866;
    }

    #next-btn {
        background-color: #1c3866;
        color: #fff;
        cursor: pointer;
    }

    html[dir].dark-mode .progress {
        background-color: #fff !important;
    }

    .swal2-backdrop-show {
        pointer-events: auto !important;
    }

    label {
        font-size: 1.125rem;
    }

    html.quiz #default-drawer,
    html.quiz #default-navbar {
        display: none;
    }

    #startQuiz {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        cursor: pointer;
        z-index: 9999;
    }
</style>

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Exam</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container page__container" id="quiz_page">
    <button id="startQuiz"></button>
    <div class="page-section">

    </div>
    <div class="mcq-container">
        <h2 class="text-center mb-4">Exam</h2>

        <!-- Timer Display -->
        <div class="text-center mb-3">
            <h3>Time Remaining: <span id="timer">00:00</span></h3>
        </div>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress">
                <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 25%;">
                    1 / {{ $count }}
                </div>
            </div>
        </div>

        <!-- Questions -->
        @foreach($data as $key => $value)
        <div id="step-{{$key+1}}" class="question-step {{ $key > 0 ? 'd-none' : '' }}">
            <h3 class="question">
                {{$value->question}}
            </h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$value->id}}" id="{{$value->id}}-a" required>
                <label class="form-check-label" for="{{$value->id}}-a">{{$value->optiona}}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$value->id}}" id="{{$value->id}}-b" required>
                <label class="form-check-label" for="{{$value->id}}-b">{{$value->optionb}}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$value->id}}" id="{{$value->id}}-c" required>
                <label class="form-check-label" for="{{$value->id}}-c">{{$value->optionc}}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$value->id}}" id="{{$value->id}}-d" required>
                <label class="form-check-label" for="{{$value->id}}-d">{{$value->optiond}}</label>
            </div>
            <!-- Error Message -->
            <div id="error-{{$key+1}}" class="text-danger mt-2 d-none">
                <i class="fas fa-exclamation-circle"></i> Please select an option to proceed.
            </div>
        </div>
        @endforeach

        <!-- Navigation Buttons -->
        <button id="prev-btn" class="btn mt-3 d-none">Previous</button>
        <button id="next-btn" class="btn mt-3">Next</button>
    </div>


</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentStep = 1;
        const totalSteps = {{$count}};
        const progressBar = document.getElementById("progress-bar");
        const timerDisplay = document.getElementById("timer");
        document.querySelector("html").classList.add("quiz")

        // Timer Configuration (e.g., 10 minutes)
        let timeLimit = 10800; // 10 minutes in seconds
        let timer;

        // Enter Full-Screen Mode
        function enterFullScreen() {
            let elem = document.documentElement;
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
        }

        // Prevent exiting full-screen
        document.addEventListener("fullscreenchange", function() {
            if (!document.fullscreenElement) {
                Swal.fire({
                    title: "Warning!",
                    text: "You cannot exit full-screen mode during the quiz!",
                    icon: "error",
                    confirmButtonText: "Return to Quiz"
                }).then(() => enterFullScreen());
            }
        });

        // Disable Copy, Paste, Cut, Right-Click
        document.addEventListener("copy", (e) => e.preventDefault());
        document.addEventListener("cut", (e) => e.preventDefault());
        document.addEventListener("paste", (e) => e.preventDefault());
        document.addEventListener("contextmenu", (e) => e.preventDefault());

        // Disable Keyboard Shortcuts
        document.addEventListener("keydown", function(event) {
            if (event.ctrlKey || event.key === "F12" || event.key === "PrintScreen") {
                event.preventDefault();
                Swal.fire("Action Blocked", "You cannot use keyboard shortcuts!", "warning");
            }
        });

        // Function to Start Timer
        function startTimer() {
            timer = setInterval(() => {
                if (timeLimit <= 0) {
                    clearInterval(timer);
                    handleTimeUp();
                } else {
                    timeLimit--;
                    updateTimerDisplay();
                }
            }, 1000);
        }

        // Update Timer Display
        function updateTimerDisplay() {
            const minutes = Math.floor(timeLimit / 60);
            const seconds = timeLimit % 60;
            timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }

        // Handle Timeout: Submit Quiz Without Validation
        function handleTimeUp() {
            Swal.fire({
                title: "Time's Up!",
                text: "Your time has expired. The quiz will now submit.",
                icon: "warning",
                confirmButtonText: "OK",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(() => {
                submitQuiz(true); // Pass true to bypass validation
            });
        }

        // Function to Submit the Quiz
        function submitQuiz(bypassValidation = false) {
            document.querySelector("html").classList.remove("quiz")
            let answers = {};

            // Collect answers
            $(".question-step").each(function() {
                let questionId = $(this).find(".form-check-input:checked").attr("name");
                let selectedOption = $(this).find(".form-check-input:checked").attr("id");
                if (questionId && selectedOption) {
                    answers[questionId] = selectedOption.split("-")[1];
                }
            });

            // If no answers are selected, send an empty object `{}` (NOT an empty array `[]`)
            if (Object.keys(answers).length === 0) {
                answers = {}; // Sending an empty object instead of an empty array
            }

            console.log("Submitting Data:", answers); // Debugging: Check what's being sent

            // Send Data to Backend
            $.ajax({
                url: "{{ route('student-submit-quiz') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    answers: answers
                },
                success: function(response) {
                    console.log("Submission Response:", response); // Debugging

                    Swal.fire({
                        title: "Quiz Submitted!",
                        text: "Your answers have been submitted successfully.",
                        icon: "success",
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then(() => {
                        window.location.href = "/student-results"; // Redirect after submission
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Submission Error:", xhr.responseText); // Debugging

                    Swal.fire({
                        title: "Submission Failed",
                        text: "An error occurred while submitting your quiz. Please try again.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        }


        // Function to Update Progress Bar
        function updateProgressBar() {
            const progressPercentage = (currentStep / totalSteps) * 100;
            progressBar.style.width = `${progressPercentage}%`;
            progressBar.textContent = `${currentStep} / ${totalSteps}`;
        }

        // Toggle Next/Previous Buttons
        function toggleButtons() {
            if (currentStep === 1) {
                $("#prev-btn").addClass("d-none");
            } else {
                $("#prev-btn").removeClass("d-none");
            }

            if (currentStep === totalSteps) {
                $("#next-btn").text("Submit");
            } else {
                $("#next-btn").text("Next");
            }
        }

        // Show/Hide Error Messages
        function showError(step) {
            $(`#error-${step}`).removeClass("d-none");
            $(`#step-${step} .form-check-input`).addClass("is-invalid");
        }

        function hideError(step) {
            $(`#error-${step}`).addClass("d-none");
            $(`#step-${step} .form-check-input`).removeClass("is-invalid");
        }

        // Next Button Click Event
        $("#next-btn").click(function() {
            const currentQuestion = $(`#step-${currentStep}`);
            const selectedOption = currentQuestion.find("input[type='radio']:checked");

            if (selectedOption.length === 0) {
                showError(currentStep);
                return;
            }

            hideError(currentStep);

            if (currentStep < totalSteps) {
                currentQuestion.addClass("d-none");
                currentStep++;
                $(`#step-${currentStep}`).removeClass("d-none");

                updateProgressBar();
                toggleButtons();
            } else {
                submitQuiz();
            }
        });

        // Previous Button Click Event
        $("#prev-btn").click(function() {
            if (currentStep > 1) {
                $(`#step-${currentStep}`).addClass("d-none");
                currentStep--;
                $(`#step-${currentStep}`).removeClass("d-none");

                updateProgressBar();
                toggleButtons();
            }
        });

        // Initialize Quiz
        document.querySelector("#startQuiz").addEventListener("click", () => {
            enterFullScreen(); // Make screen full at the start
            toggleButtons(); // Set initial button states
            startTimer(); // Start the timer when the quiz loads
            document.getElementById("startQuiz").style.display = "none"; // Hide overlay

        })
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOMContentLoaded event fired.');
        var myArray = [1, 2, 3, 4, 5];
        if (myArray && myArray.length) {
            console.log('Array has elements. Length:', myArray.length);
        } else {
            console.log('Array is either undefined or has no elements.');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection