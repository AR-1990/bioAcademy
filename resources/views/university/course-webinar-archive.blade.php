@extends('university.main')
@section('title', 'Webinar Archive | Biopharma Academy')
@section('meta_description', 'Access our collection of clinical research webinars – stay updated on the latest trends, regulatory changes, and best practices.')

@section('content')
<style>
    .webinar-prominent {
    background: #f5f7fa;
    border-radius: 16px;
    padding: 30px 30px 20px 30px;
    border-left: 6px solid #1C3866;
    margin-bottom: 30px;
}

.webinar-prominent h2 {
    font-size: 32px;
    margin-top: 0;
    margin-bottom: 8px;
    color: #1C3866;
    font-family: "proxima_nova_rgbold", Arial, sans-serif;
}

.webinar-prominent .webinar-subtitle {
    font-size: 18px;
    color: #444;
    font-family: "proxima_novalight", Arial, sans-serif;
    margin-bottom: 20px;
}

.webinar-prominent p {
    margin-bottom: 15px;
}

.webinar-prominent p:last-child {
    margin-bottom: 0;
}
</style>

<div class="sub_header bg_1">
    <div id="intro_txt">
        <h1><strong>Webinar Archive</strong></h1>
        <p>Clinical Research Webinars to Keep You Ahead of the Field</p>
    </div>
</div>

<div class="container_gray_bg">
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-12">
                <div class="box_style_1">
                    <p><a href="{{ url('/course') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to Course Overview</a></p>

                    <div class="webinar-prominent">
                        <h2>Webinar Archive</h2>
                        <p class="webinar-subtitle">Clinical Research Webinars to Keep You Ahead of the Field</p>
                        <p>
                            Our webinar sessions are designed for clinical research professionals who want to keep growing without disrupting their routine. Each session is instructor‑led and interactive and with on‑demand access, you can learn at whatever pace works best for you.
                        </p>
                        <p>
                            Stay updated with the latest trends, regulatory changes, and best practices – all from the convenience of your device.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection