@extends('university.main')
@section('title', 'Hands‑On Training | Biopharma Academy')
@section('meta_description', 'Gain real‑world experience with 1:1 mentorship at an active clinical research site in Houston. Apply your knowledge in a real GCP environment.')

@section('content')
<style> /* same as above */ </style>

<div class="sub_header bg_1">
    <div id="intro_txt">
        <h1><strong>Hands‑On Training</strong></h1>
        <p>Real‑world experience at an active clinical research site.</p>
    </div>
</div>

<div class="container_gray_bg">
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-12">
                <div class="box_style_1">
                    <p><a href="{{ url('/course') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to Course Overview</a></p>

                    <div class="indent_title_in">
                        <i class="pe-7s-display2"></i>
                        <h3>Hands‑On Training</h3>
                        <p>Hands‑On Training at Real Clinical Research Site</p>
                    </div>
                    <div class="wrapper_indent">
                        <p>
                            Biopharma Academy's hands‑on training gives students direct exposure to an active clinical research environment at Biopharma Informatic's research site. With a 1:1 training ratio and mentorship from certified clinical research professionals, you gain the real‑world experience needed to step confidently into the field.
                        </p>
                        <p>
                            To learn more, contact us at <a href="mailto:RKoenning@biopharmainfo.net">RKoenning@biopharmainfo.net</a> or call <strong>+1 (361) 219-6321</strong>.
                        </p>
                        <h4>Benefits of Training</h4>
                        <ul class="list_style_1">
                            <li>Train at Active Clinical Site in Houston and Gain Hands‑On Experience</li>
                            <li>1:1 Mentorship from Certified Research Professionals</li>
                            <li>Hands‑On Exposure to Real Trial Protocols and GCP Standards</li>
                            <li>Build Career Readiness Beyond the Classroom</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection