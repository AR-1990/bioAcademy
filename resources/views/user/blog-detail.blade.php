@extends('user.partials.app')

@section('title', 'Dashboard | Biopharma Academy Of Clinical Research')

@section('content')
<div class="row g-6">
    <div class="col-md">
        <div class="card">
            <h5 class="card-header">Blog</h5>
            <div class="card-body">
                <div>
                    <p><a href="https://www.biopharmaacademy.com/user/blog/detail"
                            target="_blank">https://www.biopharmaacademy.com/user/blog/detail</a></p>
                </div>
                <div>
                    <p>Your description here</p>
                </div>
                <div>
                    <figure class="user-profile-header-banner">
                        <img src="{{ asset('user-assets/assets/img/pages/profile-banner.png') }}" alt="Banner image"
                            class="rounded">
                    </figure>
                </div>
                <div>
                    <p>11 April 2025</p>
                </div>
                <div>
                    <h2>Title Here</h3>
                </div>
                <div>
                    <h3>Heading Here</h3>
                </div>
                <div>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem velit ipsum
                        perferendis vitae alias. Laboriosam voluptatum optio eaque culpa, reiciendis numquam
                        dignissimos nemo atque fugit earum accusamus temporibus expedita corporis.
                    </p>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection