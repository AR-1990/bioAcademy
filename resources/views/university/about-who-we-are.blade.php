@extends('university.main')
@section('title', 'Who We Are | Biopharma Academy')
@section('meta_description', 'Learn about Biopharma Academy’s mission and our commitment to transforming clinical research education through expert-led training.')

@section('content')
<div class="sub_header bg_2">
    <div id="intro_txt">
        <h1><strong>Who We Are</strong></h1>
        <p>Our story and mission – empowering careers through education</p>
    </div>
</div>

<div class="container margin_60" id="who-we-are">
    <div class="main_title">
        <h2>The Biopharma Academy Difference</h2>
        <p>Cultivating Knowledge, Inspiring Growth</p>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p><a href="{{ url('/about') }}" class="btn_1 rounded"><i class="icon-left-open"></i> Back to About Overview</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h3>About Us</h3>
            <p>
                At Biopharma Informatic, now moving forward with Biopharma Academy, we are committed to transforming the clinical research landscape through education and specialized training programs. Founded in 2010, our mission has been to provide accessible and innovative ways to conduct clinical research. As we expand into Biopharma Academy, our goal remains the same: to equip aspiring professionals with the knowledge and expertise they need to thrive in the dynamic world of clinical research.
            </p>
            <p>
                Our programs are designed and delivered by a team of industry experts who bring decades of experience. These dedicated professionals ensure our students gain a comprehensive understanding of clinical research practices, ethics, and real-world applications. At Biopharma Academy, we are shaping the future of healthcare through education, preparing the next generation of clinical researchers to make meaningful contributions.
            </p>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="box_style_4">
                <h4>Mission</h4>
                <p>Our mission is to empower professionals in clinical research by offering:</p>
                <ul class="list_order">
                    <li><span style="margin-top: 5px;">1</span>Top-tier education that drives impactful careers.</li>
                    <li><span>2</span>Innovative curriculum designed for practical skill development.</li>
                    <li><span style="margin-top: 5px;">3</span>Strategic industry partnerships offering real-world insights.</li>
                    <li><span style="margin-top: 5px;">4</span>Comprehensive skill-building for making meaningful contributions.</li>
                    <li><span style="margin-top: 5px;">5</span>Opportunities to excel in the healthcare and pharmaceutical industries.</li>
                </ul>
            </div>
        </div>
    </div><!--End row -->
</div><!--End container -->
@endsection