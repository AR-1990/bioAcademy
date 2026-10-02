@extends('student.main')
@section('content')
    <div class="pt-32pt">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
            <div class="flex d-flex flex-column flex-sm-row align-items-center">

                <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                    <h2 class="mb-0">Profile</h2>

                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/student_dashboard') }}">Home</a></li>

                        <li class="breadcrumb-item active">
                            Edit Profile
                        </li>
                    </ol>

                </div>
            </div>

        </div>
    </div>

    <div class="container page__container page-section d-flex justify-content-center">
        <div class="col-md-6 p-0">
        <form action="{{ route('edit-students', ['id' => $student->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image"/>
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url('{{ $student->image ? asset('storage/' . $student->image) : asset('images/1705072291.png') }}');">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center p-0">
                    <label class="form-label">{{$student->first_name}}</label>
                </div>
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" value="{{$student->email}}"
                        placeholder="Your email address ..." disabled>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="new_password">
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="new_password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
@endsection
