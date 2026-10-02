
<!-- Header================================================== -->
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div id="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('university/img/academy-logo-white.png') }}" width="400" height="70"
                            alt="biopharma" data-retina="true"></a>
                </div>
            </div>
            <nav class="col-md-9 col-sm-9 col-xs-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu
                        mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{ asset('university/img/academy-logo-white.png') }}" width="250" height="50" alt="biopharma"
                            data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home </a>
                        </li>
                        <li class="submenu">
                            <a href="{{ url('/course') }}" class="show-submenu">Course Details <i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="{{ url('/course-self-paced-learning') }}">Self-Paced Learning Modules</a></li>
                                <li><a href="{{ url('/course-hands-on-training') }}">Hands-On Training</a></li>
                                <li><a href="{{ url('/course-certification-examination') }}">Comprehensive Examination & Certification</a></li>
                                <li><a href="{{ url('/course-fee-structure') }}">Fee Structure</a></li>
                                <li><a href="{{ url('/course-career-salary') }}">Career & Salary Insights</a></li>
                                <li><a href="{{ url('/course-webinar-archive') }}">Webinar Archive</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="{{ url('/about') }}" class="show-submenu">About Us <i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="{{ url('/about-who-we-are') }}">Who We Are</a></li>
                                <li><a href="{{ url('/about-leadership') }}">Leadership</a></li>
                                <li><a href="{{ url('/about-why-choose') }}">Why Choose Our Academy</a></li>
                                <li><a href="{{ route('university.catalog') }}">Explore Our Catalog</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('university.news.insights') }}">News & Insights</a>
                        </li>
                        <li>
                            <a href="{{ url('/plan_visit') }}">Plan A Visit</a>
                        </li>
                        <li>
                            <a href="{{ route('university_login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('university_getenrolled') }}" id="" class="btn btn-primary">Get Enrolled</a>
                        </li>
                        <!-- <li><a href="#search" id="search_bt" class="btn btn-primary">Get Enrolled</a></li> -->
                    </ul>
                </div><!-- End main-menu -->
            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->