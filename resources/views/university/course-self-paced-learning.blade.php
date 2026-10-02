@extends('university.main')
@section('title', 'Self‑Paced Learning Modules | Biopharma Academy')
@section('meta_description', 'Explore our flexible, on‑demand clinical research curriculum – 18 modules covering the full trial lifecycle, designed for self‑paced learning.')

@section('content')
<style>
    /* Copy the exact same CSS from the main blade, or include a separate stylesheet */
    .salary-grid { ... } /* (we'll keep it minimal here – refer to original for full) */
    .webinar-prominent { ... }
</style>

<div class="sub_header bg_1">
    <div id="intro_txt">
        <h1><strong>Self‑Paced Learning Modules</strong></h1>
        <p>Flexible, on‑demand training to build your clinical research expertise.</p>
    </div>
</div>

<div class="container_gray_bg">
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-12">
                <div class="box_style_1">
                    <!-- Back link -->
                    <p><a href="{{ url('/course') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to Course Overview</a></p>

                    <div class="indent_title_in">
                        <i class="pe-7s-display1"></i>
                        <h3>Self‑Paced Learning Modules</h3>
                    </div>
                    <div class="wrapper_indent">
                        <p>
                            Biopharma Academy offers clinical research training through our on‑demand learning modules, providing flexibility to learn at your own pace and on your schedule.
                        </p>
                        <p>
                            A glimpse into what's covered inside our 18‑module curriculum.
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list_style_1">
                                    <li>Introduction to Clinical Research</li>
                                    <li>Informed Consent Process</li>
                                    <li>FDA Form 1572/Statement of Investigator</li>
                                    <li>Data Management and Query Resolution</li>
                                    <li>Code of Federal Regulations</li>
                                </ul>
                            </div>
                        </div>
                        <p>
                            Plus 13 more modules covering the full clinical research lifecycle.
                        </p>
                    </div>
                </div><!-- End box_style_1 -->
            </div><!-- End col-md-12 -->
        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End container_gray_bg -->

@endsection