@extends('admin.main')
@section('content')
    <div class="container page__container pt-4">
        <form method="POST" action="{{ route('add-quiz') }}" name="form">
            @csrf
            <h2>Add MCQs</h2>
            <div class="quiz-section">
                <div class="quiz-name">
                    <label for="quiz-name">Write quiz name:</label>
                    <input type="text" name="quiz-name" id="quiz-name" class="option-input mb-2">
                </div>
                <div class="quiz-number">
                    <label for="numOfQuestions">Select the number of questions:</label>
                    <input type="number" id="numOfQuestions" onchange="generateMCQs()" name="numOfQuestions">
                </div>
            </div>
            <div id="mcqContainer">
            </div>
            <button class="btn btn-primary submit-quiz-alert" onclick="submitForm()">Submit</button>
        </form>
    </div>
    <script>
       function generateMCQs() {
    var numQuestions = document.getElementById('numOfQuestions').value;
    var mcqContainer = document.getElementById('mcqContainer');
    mcqContainer.innerHTML = '';

    if (numQuestions > 0) {
        for (var i = 1; i <= numQuestions; i++) {
            var questionDiv = document.createElement('div');
            questionDiv.className = 'question';

            var questionLabel = document.createElement('label');
            questionLabel.innerHTML = 'Question ' + i + ':';
            questionDiv.appendChild(questionLabel);

            var questionInput = document.createElement('input');
            questionInput.type = 'text';
            questionInput.className = 'form-control';
            questionInput.name = 'question' + i;
            questionDiv.appendChild(questionInput);
            for (var j = 1; j <= 4; j++) {
                var choiceLabel = document.createElement('label');
                var choiceInput = document.createElement('input');
                choiceInput.className = 'options';
                choiceInput.type = 'radio';
                choiceInput.name = 'question' + i + 'Choice';
                var choiceText = document.createElement('input');
                choiceText.className = 'option-input';
                choiceText.type = 'text';
                choiceText.name = 'question' + i + 'Choice' + j;
                choiceText.placeholder = 'Option ' + j;
                (function (currentChoiceInput, currentChoiceText) {
                    choiceText.addEventListener('input', function () {
                        currentChoiceInput.value = currentChoiceText.value;
                    });
                })(choiceInput, choiceText);
                choiceLabel.appendChild(choiceInput);
                choiceLabel.appendChild(choiceText);
                questionDiv.appendChild(choiceLabel);
            }
            mcqContainer.appendChild(questionDiv);
        }
    }
}
     function submitForm() {
    var mcqContainer = document.getElementById('mcqContainer');
    var questions = mcqContainer.querySelectorAll('.question');

    var formData = new FormData();

    questions.forEach(function (question, i) {
        var questionInput = question.querySelector('input[type="text"]');
        var selectedChoice = question.querySelector('input[type="radio"]:checked');
        var questionName = questionInput.name;
        var questionValue = questionInput.value;
        formData.append(questionName, questionValue);
        if (selectedChoice) {
        var choiceText = question.querySelector('input[name="' + selectedChoice.name.replace('Choice', 'ChoiceText') + '"]').value;
        formData.append('correct_answer' + i, choiceText);
        }
    });

    formData.append('_token', '{{ csrf_token() }}');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "{{ route('add-quiz') }}", true);
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        } else {
            console.error('Error:', xhr.statusText);
        }
    };
    xhr.onerror = function () {
        console.error('Network Error');
    };
    xhr.send(formData);
}
    </script>
@endsection
