@extends('admin.layouts.master')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-style1">
                        <div class="card-statistic-3 bg-dark">
                            <div class="card-icon card-icon-large">
                                <i class="fa fa-award"></i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Blogs</h4>
                                {{$blogcount}}
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-style2">
                        <div class="card-statistic-3 bg-dark">
                            <div class="card-icon card-icon-large">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Active Blogs</h4>
                                {{$Activeblogcount}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-style2">
                        <div class="card-statistic-3 bg-dark">
                            <div class="card-icon card-icon-large">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Unactive/h4>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-style2">
                        <div class="card-statistic-3 bg-dark">
                            <div class="card-icon card-icon-large">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Unactive Blogs</h4>
                                {{$InActiveblogcount}}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
