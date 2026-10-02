@extends('university.main')
@section('title', 'Biopharma Academy of Clinical Research | Pioneering Clinical Research Education')
@section('meta_description', 'Join Biopharma Academy to advance your career in clinical research. Experience expert-led training, hands-on learning, and access to cutting-edge research methodologies.')
@section('content')
    <div id="full-slider-wrapper">
        <div id="layerslider" style="width:100%;height:650px;">
            <!-- first slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                <img src="{{ asset('university/img/slides/academy-banner1.jpeg') }}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%; font-size: 40px;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    <strong>Pioneering Clinical Research Education</strong>
                </h3>
                
                <p class="ls-l" style="top:62%; left:50%;"
                    data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;">
                    <a href="{{ url('/plan_visit') }}" class="button_intro">Plan A Visit</a> 
                        <a href="{{ url('/about') }}" class="button_intro outline">About us</a>
                </p>
            </div>

            <!-- second slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                <img src="{{ asset('university/img/slides/academy-banner2.jpeg') }}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%; font-size: 40px;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    <strong>Setting New Standards in Clinical Learning</strong>
                </h3>
                
                <p class="ls-l" style="top:65%; left:50%;"
                    data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;">
                    <a href="{{ url('/plan_visit') }}" class="button_intro">Plan A Visit</a>
                    <a href="{{ url('/about') }}" class="button_intro outline">About us</a>
                </p>
            </div>

            <!-- third slide -->
            <div class="ls-slide" data-ls="slidedelay:5000; transition2d:5;">
                <img src="{{ asset('university/img/slides/academy-banner3.jpeg') }}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%; font-size: 40px;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    <strong>Educating Today’s Minds for Tomorrow’s Clinical Research
                    </strong>
                </h3>
                
                <p class="ls-l" style="top:65%; left:50%;"
                    data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;">
                    <a href="{{ url('/plan_visit') }}" class="button_intro">Plan A Visit</a>
                        <a href="{{ url('/about') }}" class="button_intro outline">About us</a>
                </p>
            </div>

            <!-- fourth slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                <img src="{{ asset('university/img/slides/academy-banner4.jpeg') }}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%; font-size: 40px;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    <strong>Inspiring Lifelong Learning in Clinical Science</strong>
                </h3>
                
                <p class="ls-l" style="top:65%; left:50%;"
                    data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;">
                    <a href="{{ url('/plan_visit') }}" class="button_intro">Plan A Visit</a> 
                    <a href="{{ url('/about') }}" class="button_intro outline">About us</a>
                </p>
            </div>
            <!-- fourth slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
                <img src="{{ asset('university/img/slides/academy-banner5.jpeg') }}" class="ls-bg" alt="Slide background">
                <h3 class="ls-l slide_typo" style="top: 45%; left: 50%; font-size: 40px;"
                    data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                    <strong>Revolutionizing Clinical Research Through Education</strong>
                </h3>
                
                <p class="ls-l" style="top:65%; left:50%;"
                    data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;">
                    <a href="{{ url('/plan_visit') }}" class="button_intro">Plan A Visit</a> 
                    <a href="{{ url('/about') }}" class="button_intro outline">About us</a>
                </p>
            </div>

        </div>
    </div>
    <!-- End layerslider -->

    <div class="container_gray_bg" id="home_feat_1">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="home_feat_1_box">
                        <a href="{{ url('/plan_visit') }}">
                            <img src="{{ asset('university/img/home_feat_1_1.jpg.png') }}" class="img-responsive" alt="">
                            <div class="short_info">
                                <h3>Plan a visit</h3><i class="arrow_carrot-right_alt2"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="home_feat_1_box">
                        <a href="{{ route('university_getenrolled')}}">
                            <img src="{{ asset('university/img/slides/academy-enrolled.jpeg') }}" class="img-responsive" alt="">
                            <div class="short_info">
                                <h3>Get Enrolled</h3><i class="arrow_carrot-right_alt2"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="home_feat_1_box">
                        <a href="{{ url('/course') }}">
                            <img src="{{ asset('university/img/slides/academy-course.jpeg') }}" class="img-responsive" alt="">
                            <div class="short_info">
                                <h3>Course Details</h3><i class="arrow_carrot-right_alt2"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </div>
    <!-- End container_gray_bg -->

<div class="container margin_60">
    <div class="main_title">
        <h2>Core Features of Biopharma Academy of Clinical Research</h2>
        <p>Your Path to Clinical Research Expertise Starts Here</p>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="box_feat_home">
                <i class="pe-7s-users"></i> {{-- previously iconcustom-student --}}
                <h3>Start Your Clinical Research Journey</h3>
                <p>Enroll today and take the first step toward building a successful career in clinical research with comprehensive training designed to support your growth.</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="box_feat_home">
                <i class="pe-7s-clock"></i> {{-- replaces iconcustom-education_online --}}
                <h3>Learn on Your Own Time</h3>
                <p>Access pre-recorded sessions and e-learning modules that let you study flexibly while balancing your other commitments.</p>
            </div>
        </div>
    </div>
    <!-- End row -->
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="box_feat_home">
                <i class="pe-7s-id"></i> {{-- replaces iconcustom-know_how --}}
                <h3>Learn from Trusted Experts</h3>
                <p>Study with content created by certified medical researchers and industry professionals, so you gain reliable and relevant knowledge.</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="box_feat_home">
                <i class="pe-7s-tools"></i> {{-- replaces iconcustom-test --}}
                <h3>Gain Practical Experience</h3>
                <p>Complete a four-week hands-on training program after passing the exam and develop real-world clinical research skills under expert guidance.</p>
            </div>
        </div>
    </div>
    <!-- End row -->
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="box_feat_home">
                <i class="pe-7s-graph1"></i> {{-- previously iconcustom-research (keep as is) --}}
                <h3>Stay Ahead in the Industry</h3>
                <p>Build your knowledge of the latest research methods, global regulations, and GCP standards to stay competitive in the field.</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="box_feat_home">
                <i class="pe-7s-rocket"></i> {{-- replaces iconcustom-investment --}}
                <h3>Open the Door to Career Possibilities</h3>
                <p>Strong performers may be considered for job opportunities with Biopharma Informatic, helping you move closer to your professional goals.</p>
            </div>
        </div>
    </div>
    <!-- End row -->
    <hr class="more_margin">
</div>
        <div class="home-iframe-bg">
            <div class="container">
                <div class="row home-iframe align-items-center">
                <div class="col-md-6 col-sm-6">
                    <!--<iframe width="560" height="500" src="https://www.youtube.com/embed/UlirTRLFTdw?si=u8KCLq-uorf-f35S" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
                    <div class="main_title">
                        <h2>
                            <!--<span class="quote"><i class="fas fa-quote-left"></i></span>-->
                        Get to know the passionate minds behind our success
                        <!--<span class="quote"> <i class="fas fa-quote-right"></i></span>-->
                        </h2>
                        
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <!--<iframe width="560" height="500" src="https://www.youtube.com/embed/7wLfr6yNwok" title="Introduction of Rachel" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
                    <!--<iframe width="560" height="500" src="https://www.youtube.com/embed/68da7H4sx1w" title="Introduction to Biopharma Academy of Clinical Research" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
                    <iframe width="560" height="500" src="https://www.youtube.com/embed/kd8kxLwu2Jk" title="Launch Your Career in Clinical Research" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<!--<iframe width="820" height="461" src="https://www.youtube.com/embed/kd8kxLwu2Jk" title="Launch Your Career in Clinical Research" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
                    <!--<video width="560" height="400" controls>-->
                    <!--    <source src="{{ asset('university/video/Website video with Sub 2.mp4') }}" type="video/mp4">-->
                    <!--    Your browser does not support the video tag.-->
                    <!--</video>-->
                </div>
            </div>
            </div>
        </div>
        
        <div class="container margin_60">
        <!-- End row -->
        <hr class="more_margin">

        <div class="row add_bottom_60">
            <div class="main_title">
                <h2>Key Areas of Focus</h2>
                <p>Nurturing Excellence and Innovation in Clinical Research Education</p>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div id="graph">
                    <img src="{{ asset('university/img/graphic.jpg') }}" class="wow zoomIn" data-wow-delay="0.1s" alt="">
                    <div class="features step_1 wow flipInX" data-wow-delay="1s">
                        <h4><strong>01.</strong> Develop Expertise</h4>
                        <p>Master essential skills with specialized modules tailored to meet industry demands and prepare you for real-world challenges.</p>
                    </div>
                    <div class="features step_2 wow flipInX" data-wow-delay="1.5s">
                        <h4><strong>02.</strong> Foster Innovation</h4>
                        <p>Gain insights into innovative practices that are revolutionizing clinical research and shaping its future.</p>
                    </div>
                    <div class="features step_3 wow flipInX" data-wow-delay="2s">
                        <h4><strong>03.</strong> Build Strong Collaborations</h4>
                        <p>Engage with industry experts and like-minded peers to create meaningful partnerships for advancing clinical research.</p>
                    </div>
                    <div class="features step_4 wow flipInX" data-wow-delay="2.5s">
                        <h4><strong>04.</strong> Deliver Tangible Results</h4>
                        <p>
                            Transform your education into impactful contributions that elevate the standards of clinical trials.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
        
    </div>
    <!-- End container -->

    <div class="bg_content testimonials">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#quote-carousel" data-slide-to="1"></li>
                        <li data-target="#quote-carousel" data-slide-to="2"></li>
                    </ol><!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner">
                        <!-- Quote 1 -->
                        <div class="item active">
                            <blockquote>
                                <p>
                                    I can't thank Biopharma Academy enough for the exceptional education and support they provided throughout my studies. The faculty's expertise and dedication to student success truly set this institute apart. <br> Stefany, Clinical Research Assistant
                                </p>
                            </blockquote>
                            <!--<small><img class="img-circle" src="{{ asset('university/img/testimonial_1.jpg') }}" alt="">Stefany</small>-->
                        </div>
                        <!-- Quote 2 -->
                        <div class="item">
                            <blockquote>
                                <p>
                                    Enrolling at Biopharma Academy of Clinical Research was a game-changer for my career. The comprehensive curriculum and hands-on training provided me with the skills and confidence needed to excel in the field. I highly recommend it to anyone seeking a top-notch clinical research education. <br> Karla, Clinical Trial Coordinator

                                </p>
                            </blockquote>
                            <!--<small><img class="img-circle" src="{{ asset('university/img/testimonial_2.jpg') }}" alt="">Karla</small>-->
                        </div>
                        <!-- Quote 3 -->
                        <div class="item">
                            <blockquote>
                                <p>
                                    Biopharma Academy's alumni network opened doors I didn't know existed. Connecting with experienced professionals in the field provided me with invaluable mentorship and industry insights. It's a supportive community that continues to benefit me long after graduation. <br> Maira, Research Scientist

                                </p>
                            </blockquote>
                            <!--<small><img class="img-circle" src="{{ asset('university/img/testimonial_1.jpg') }}" alt="">Maira</small>-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End bg_content -->

    <div class="container margin_60">
        <div class="main_title">
            <h2>Stay Updated to Our Latest Blog</h2>
            <!--<p>This is Dummy Text This is Dummy Text </p>-->
        </div>

        <div class="">

            <section id="section-3">
                <div class="row list_news_tabs">
                    <div class="col-md-4 col-sm-4">
                        <p><a href="blogs/the-scope-of-clinical-research"><img src="{{ asset('university/img/event_1_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <!--<span class="date_published">10 January 2025</span>-->
                        <h3 class="ellipsis"><a href="blogs/the-scope-of-clinical-research">The Scope of Clinical Research: From Fundamentals to Advanced Applications</a></h3>
                        <p class="multi-ellipsis">Clinical research is an essential part of the healthcare system, driving the development of new treatments, drugs, and medical practices. It bridges the gap between laboratory findings and real-world medical applications, helping to ensure that the treatments we rely on are safe and effective. As healthcare continues to evolve, the scope of clinical research grows, providing numerous opportunities for professionals in this field to make meaningful contributions to public health.</p>
                        <a href="blogs/the-scope-of-clinical-research" class="button small">Read more</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p><a href="blogs/essential-skills-you-gain"><img src="{{ asset('university/img/event_2_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <!--<span class="date_published">10 January 2025</span>-->
                        <h3 class="ellipsis"><a href="blogs/essential-skills-you-gain">Essential Skills You Gain from Clinical Research Programs</a></h3>
                        <p class="multi-ellipsis">Clinical research plays a crucial role in advancing healthcare by helping to develop new treatments, medications, and therapies. As the medical field continues to evolve, the demand for skilled professionals in clinical research is growing rapidly. Clinical research programs equip you with essential skills that not only support the medical community but also open doors to exciting career opportunities.</p>
                        <a href="blogs/essential-skills-you-gain" class="button small">Read more</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p><a href="blogs/the-global-demand-for-clinical-researchers"><img src="{{ asset('university/img/event_3_thumb.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <!--<span class="date_published">10 January 2025</span>-->
                        <h3 class="ellipsis"><a href="blogs/the-global-demand-for-clinical-researchers">The Global Demand for Clinical Researchers and How to Meet It</a></h3>
                        <p class="multi-ellipsis">As the global healthcare industry advances, the need for professionals who can conduct essential research, test new treatments, and ensure the safety and effectiveness of medical innovations continues to grow. In this context, clinical researchers play a crucial role in transforming scientific discoveries into real-world medical applications, making their expertise more valuable than ever.</p>
                        <a href="blogs/the-global-demand-for-clinical-researchers" class="button small">Read more</a>
                    </div>
                </div>
                <!--End row -->
            </section>

        </div><!-- /content -->

    </div>



    <div class="bg_content magnific">
        <div class="research_center_address">
           <a href="https://www.google.com/maps/search/?api=1&query=19255+PARK+ROW+%23205+HOUSTON+TX+77084" target="_blank">
                <i class="fa-solid fa-location-dot"></i> 
                <span>19255 PARK ROW #205<br>HOUSTON, TX 77084</span>
            </a>
        </div>
        <div>
            <h3>Visit Our Research Center</h3>
            <p>
               Experience our breakthroughs up close and discover new possibilities for tomorrow's healthcare.

            </p>
            <a href="{{ url('/plan_visit') }}" class="button_intro">Plan A Visit</a>
            <a href="https://vimeo.com/20370747" class="video_pop"><i class="arrow_triangle-right_alt2"></i></a>
        </div>
    </div><!-- End bg_content -->

    <div class="container_gray_bg" id="newsletter_container">
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
    </div><!-- End newsletter_container -->


    <script type="text/javascript">
        $(document).ready(function() {
            'use strict';
            $('#layerslider').layerSlider({
                autoStart: true,
                responsive: true,
                responsiveUnder: 1280,
                layersContainer: 1170,
                skinsPath: 'university/layerslider/skins/'
                // Please make sure that you didn't forget to add a comma to the line endings
                // except the last line!
            });
        });
    </script>
    {{-- <script src="{{ asset('university/js/tabs.js') }}"></script> --}}
    {{-- <script>
        new CBPFWTabs(document.getElementById('tabs'));
    </script> --}}
@endsection
