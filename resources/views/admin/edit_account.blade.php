@extends('admin.main')
@section('content')

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Profile</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container page__container page-section d-flex justify-content-center">
    <div class="col-md-6 p-0">
        <form action="{{ route('edit-admin', ['id' => $admin->id]) }}" method="POST" enctype="multipart/form-data">
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

            <div class="form-group">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image"/>
                            <label for="imageUpload"></label>
                        </div>

                    <div class="avatar-preview">
                        <div id="imagePreview"
                            style="background-image: url('{{ $admin->image ? asset('storage/' . $admin->image) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}');">
                    
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group text-center p-0">
                <label class="form-label">{{$admin->first_name}}</label>
            </div>
            <div class="form-group">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" value="{{ $admin->email }}" placeholder="Your email address ..."
                    disabled>
                <input type="hidden" class="form-control" value="{{ $admin->id }}" name="id">
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</div>

@endsection
