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
        left: 30%;
        visibility: visible !important;
    }

    a.card-img-top {
        background-image: none !important;
    }
  
</style>


<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Module</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Module
                    </li>
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
        <!-- <div class="add-lesson">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#lesson-modal">Add
             Lesson</a>
        </div> -->
        <div class="row card-group-row">
            @foreach($lessons as $lesson)
            <div class="col-lg-3 card-group-row__col">


                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                    data-toggle="popover" data-trigger="click">
                                
                    <a href="{{ route('show-lesson', ['lessonId' => $lesson->id]) }}"class="card-img-top js-image" data-position="" data-height="140" style="background: rgb(47, 72, 156);">
                        <img src="{{ asset('admin/images/logo2.png')}}" class="quiz_img" alt="course">
                        <span class="overlay__content">
                            <span class="overlay__action d-flex flex-column text-center">
                                <i class="material-icons icon-32pt">play_circle_outline</i>
                                <span class="card-title text-white">Resume</span>
                            </span>
                        </span>
                    </a>
                    
                    <div class="card-body flex" style="background: #1c3866;">
                        <div class="d-flex">
                            <div class="flex" >
                                <a class="card-title"
                                    href="{{ route('show-lesson', ['lessonId' => $lesson->id]) }}">Module {{
                                    $lesson->lesson_number}}</a>
                                <small class="text-50 font-weight-bold mb-4pt ">{{$lesson->lesson_name}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background: #1c3866;">
                        <div class="row justify-content-between">
                            <div class="col-auto d-flex align-items-center">
                           <!-- {{$lesson->created_at}} -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Modal Structure -->
<div class="modal fade" id="lesson-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="lesson-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lesson-modalLabel">Upload Lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form  action="{{ route('add-lesson') }}" method="POST" enctype="multipart/form-data" required id="ModuleForm" >
                    @csrf
                    <div class="form-group">
                        <label for="lesson-number" class="form-label">Lesson Number</label>
                        <input type="number" name="lesson_number" id="lesson_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lesson-name" class="form-label">Lesson Name</label>
                        <input type="text" name="lesson_name" id="lesson_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Description" class="form-label">Lesson Description</label>
                        <textarea cols="56" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file-input" class="form-label">Video File</label>
                        <input id="file-input" type="file" accept="video/*" name="url">
                        <video id="video" width="100%" height="300" controls></video>
                        <progress id="upload-progress" max="105" value="0" style=" width:100%"></progress>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary edit-confirm-alert">Submit</button>
                    </div>
                </form>  
            </div>
        </div> 
    </div> 
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('ModuleForm');
    const input = document.getElementById('file-input');
    const video = document.getElementById('video');
    const progress = document.getElementById('upload-progress');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); 
        const files = input.files || [];
        if (!files.length) return;

        const formData = new FormData(form);
        formData.append('file', files[0]);

        const xhr = new XMLHttpRequest();
        const progressKey = 'lesson_upload_progress_' + '{{ auth()->id() }}';

        xhr.upload.addEventListener('progress', function (e) {
            if (e.lengthComputable) {
                const percentComplete = (e.loaded / e.total) * 100;
                progress.value = percentComplete;

    
                fetch('{{ route("update-progress") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        progress: percentComplete,
                        key: progressKey,
                    }),
                });

                if (percentComplete >= 100) {
                    
                    form.submit();
                }
            }
        });

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log('Upload successful');

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        video.src = e.target.result;
                        video.load();
                        video.play();
                    };
                    reader.readAsDataURL(files[0]);

                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    console.error('Upload failed');
                }
            }
        };

        xhr.open('POST', '{{ route("add-lesson") }}', true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        xhr.send(formData);
    });
});


</script>
@endsection
    