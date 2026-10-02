@extends('university.main')
@section('content')
    <div class="sub_header bg_1">
        <div id="intro_txt">
            <h1><strong>Collections</strong></h1>
            <p>Discover a dynamic curriculum that fulfills industry needs and enhances career growth.</p>
        </div>
    </div> <!--End sub_header -->

    <div class="container_gray_bg">

        <div class="container margin_60">
            <div class="row">
                <div class="col-md-4 col-sm-4" style="margin-top: 18px">
                        <p><a href="#0"><img src="{{ asset('university/img/event_1_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <h3><a href="#0">Advanced Clinical Research Coordinator Certification (ACRCC)</a></h3>
                        <p>Advanced Clinical Research Coordinator Certification (ACRCC) - Triple-Accredited I 200 Hours I Online I Instant Enrollment... </p>
                        <a href="#0" class="button small">Read more</a>
                </div>
                <div class="col-md-4 col-sm-4" style="margin-top: 18px">
                        <p><a href="#0"><img src="{{ asset('university/img/event_1_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <h3><a href="#0">Advanced Clinical Research Coordinator Certification (ACRCC)</a></h3>
                        <p>Advanced Clinical Research Coordinator Certification (ACRCC) - Triple-Accredited I 200 Hours I Online I Instant Enrollment... </p>
                        <a href="#0" class="button small">Read more</a>
                </div>
                <div class="col-md-4 col-sm-4" style="margin-top: 18px">
                        <p><a href="#0"><img src="{{ asset('university/img/event_1_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <h3><a href="#0">Advanced Clinical Research Coordinator Certification (ACRCC)</a></h3>
                        <p>Advanced Clinical Research Coordinator Certification (ACRCC) - Triple-Accredited I 200 Hours I Online I Instant Enrollment... </p>
                        <a href="#0" class="button small">Read more</a>
                </div>
                <div class="col-md-4 col-sm-4" style="margin-top: 18px">
                        <p><a href="#0"><img src="{{ asset('university/img/event_1_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <h3><a href="#0">Advanced Clinical Research Coordinator Certification (ACRCC)</a></h3>
                        <p>Advanced Clinical Research Coordinator Certification (ACRCC) - Triple-Accredited I 200 Hours I Online I Instant Enrollment... </p>
                        <a href="#0" class="button small">Read more</a>
                </div>
                <div class="col-md-4 col-sm-4" style="margin-top: 18px">
                        <p><a href="#0"><img src="{{ asset('university/img/event_1_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <h3><a href="#0">Advanced Clinical Research Coordinator Certification (ACRCC)</a></h3>
                        <p>Advanced Clinical Research Coordinator Certification (ACRCC) - Triple-Accredited I 200 Hours I Online I Instant Enrollment... </p>
                        <a href="#0" class="button small">Read more</a>
                </div>
                <div class="col-md-4 col-sm-4" style="margin-top: 18px">
                        <p><a href="#0"><img src="{{ asset('university/img/event_1_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <h3><a href="#0">Advanced Clinical Research Coordinator Certification (ACRCC)</a></h3>
                        <p>Advanced Clinical Research Coordinator Certification (ACRCC) - Triple-Accredited I 200 Hours I Online I Instant Enrollment... </p>
                        <a href="#0" class="button small">Read more</a>
                </div>
            </div><!--End row -->
        </div><!--End container -->
    </div><!--End container_gray_bg -->

    <div class=" container_gray_line" id="newsletter_container">
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3>Subscribe to our Newsletter for latest news.</h3>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter" id="newsletter"
                        class="form-inline">
                        <input name="email_newsletter" id="email_newsletter" type="email" value=""
                            placeholder="Your Email" class="form-control">
                        <button id="submit-newsletter" class="button"> Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End newsletter_container -->

@endsection