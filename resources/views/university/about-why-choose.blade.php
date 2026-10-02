@extends('university.main')
@section('title', 'Why Choose Biopharma Academy | Clinical Research Training')
@section('meta_description', 'Discover the benefits of training with Biopharma Academy – expert educators, flexible learning, hands‑on experience, and personal mentorship.')

@section('content')
<div class="sub_header bg_2">
    <div id="intro_txt">
        <h1><strong>Why Choose Our Academy</strong></h1>
        <p>Discover what sets Biopharma Academy apart</p>
    </div>
</div>

<div class="container_gray_bg" id="why-choose-our-academy">
    <div class="container margin_60">
        <div class="main_title">
            <h2>Why Choose Biopharma Academy Of Clinical Research?</h2>
            <p>Join us to pursue your passion in a supportive learning environment.</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p><a href="{{ url('/about') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to About Overview</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a class="box_feat" href="https://biopharmaacademy.com/course-hands-on-training#:~:text=1%3A1%20Mentorship%20from%20Certified%20Research%20Professionals">
                    <i class="pe-7s-id"></i>
                    <h3>30+ Years Educator Expertise</h3>
                    <p>Learn from active clinical research professionals holding CCRP, CCRC, and CCRA certifications with 30+ years of cumulative educator experience.</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a class="box_feat" href="https://biopharmaacademy.com/course-self-paced-learning">
                    <i class="pe-7s-display2"></i>
                    <h3>Self-Paced Online Modules</h3>
                    <p>Study through 18 self-paced online modules built around current GCP standards, FDA regulations, and real clinical trial workflows.</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a class="box_feat" href="https://biopharmaacademy.com/course-self-paced-learning#:~:text=flexibility%20to%20learn%20at%20your%20own%20pace%20and%20on%20your%20schedule.">
                    <i class="pe-7s-date"></i>
                    <h3>Flexible Learning Schedule</h3>
                    <p>Progress at your own speed, no fixed class schedule and no deadlines. Designed to fit around your professional and personal life.</p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a class="box_feat" href="https://biopharmaacademy.com/course-hands-on-training">
                    <i class="pe-7s-science"></i>
                    <h3>Real Research Experience</h3>
                    <p>Train hands-on at Biopharma Informatic's active clinical research site in Houston.</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a class="box_feat" href="https://biopharmaacademy.com/course-hands-on-training#:~:text=With%20a%201%3A1%20training%20ratio%20and%20mentorship%20from%20certified%20clinical%20research%20professionals%2C%20you%20gain%20the%20real%E2%80%91world%20experience%20needed%20to%20step%20confidently%20into%20the%20field">
                    <i class="pe-7s-chat"></i>
                    <h3>Guided Personal Mentorship</h3>
                    <p>Every student benefits from a 1:1 training ratio and direct mentorship, so you always have guidance throughout your learning journey.</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a class="box_feat" href="https://biopharmaacademy.com/catalog">
                    <i class="pe-7s-graph1"></i>
                    <h3>Beginner to Professional</h3>
                    <p>Graduate exam-ready for entry-level clinical research roles, open to all backgrounds, no prior experience required.</p>
                </a>
            </div>
        </div>
        <br>
        <div class="text-center">
            <a href="{{ route('university_getenrolled') }}" class="button_intro">Get Enrolled</a>
        </div>
    </div>
</div>
@endsection