@extends('university.main')
@section('title', 'Certification & Examination | Biopharma Academy')
@section('meta_description', 'Validate your clinical research knowledge with our comprehensive exam and earn a Certificate of Completion to stand out to employers.')

@section('content')
<style> /* same as above */ </style>

<div class="sub_header bg_1">
    <div id="intro_txt">
        <h1><strong>Comprehensive Examination & Certificate</strong></h1>
        <p>Validate your knowledge and earn your certificate.</p>
    </div>
</div>

<div class="container_gray_bg">
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-12">
                <div class="box_style_1">
                    <p><a href="{{ url('/course') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to Course Overview</a></p>

                    <div class="indent_title_in">
                        <i class="pe-7s-medal"></i>
                        <h3>Comprehensive Examination & Certificate of Completion</h3>
                    </div>
                    <div class="wrapper_indent">
                        <p>
                            After completing all 18 modules, students take a comprehensive three‑hour examination designed to assess their readiness for the field. Upon successfully passing the exam, they become eligible to begin hands‑on training. After completing the training, students receive a Certificate of Completion, helping prepare them for industry‑recognized roles in clinical research.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection