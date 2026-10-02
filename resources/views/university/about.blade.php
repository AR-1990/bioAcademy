@extends('university.main')
@section('title', 'About Us | Biopharma Academy of Clinical Research')
@section('meta_description', "Discover Biopharma Academy's mission to provide exceptional education, innovative curricula, and industry partnerships that prepare professionals for impactful careers in clinical research.")
@section('content')

<style>
    /* ---- Team Member Cards ---- */
    .single-team {
        text-align: center;
        margin-bottom: 30px;
    }
    .team-thumb {
        position: relative;
        display: inline-block;
    }
    .brd {
        border: 4px solid #1C3866;
        border-radius: 50%;
        padding: 6px;
        width: 180px;
        height: 180px;
        margin: 0 auto;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .brd img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    .single-team:hover .brd {
        border-color: #1cafec;
    }
    .single-team:hover .brd img {
        transform: scale(1.05);
    }
    .dropdown {
        position: absolute;
        bottom: 10px;
        right: 10px;
        z-index: 10;
    }
    .xbtn {
        display: inline-block;
        width: 36px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        background: #1C3866;
        color: #fff;
        border-radius: 50%;
        font-size: 22px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    .xbtn:hover {
        background: #1cafec;
        transform: rotate(90deg);
    }
    .team-social ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 12px;
        justify-content: center;
    }
    .team-social ul li a {
        display: block;
        width: 38px;
        height: 38px;
        line-height: 38px;
        text-align: center;
        background: #1C3866;
        color: #fff;
        border-radius: 50%;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    .team-social ul li a:hover {
        background: #1cafec;
        color: #fff;
    }
    .team-info h4 {
        font-size: 20px;
        margin-top: 18px;
        margin-bottom: 4px;
        font-family: "proxima_nova_rgbold", Arial, sans-serif;
        color: #222;
    }
    .team-info span {
        font-size: 14px;
        color: #1C3866;
        font-family: "proxima_novasemibold", Arial, sans-serif;
    }
    .dropdown-menu {
        min-width: auto;
        padding: 12px 16px;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        border: none;
        transform: translateX(-50%);
        left: 50%;
        margin-top: 8px;
    }
    .dropdown-menu::before {
        content: '';
        position: absolute;
        top: -8px;
        left: 50%;
        transform: translateX(-50%);
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #fff;
    }
    .dropdown-toggle::after {
        display: none;
    }

    @media (max-width: 768px) {
        .brd {
            width: 140px;
            height: 140px;
        }
        .xbtn {
            width: 30px;
            height: 30px;
            line-height: 30px;
            font-size: 18px;
            bottom: 0;
            right: 0;
        }
    }
</style>

    <div class="sub_header bg_2">
        <div id="intro_txt">
             <!--<h1><strong>Our Story</strong> and Mission</h1>-->
            <h1><strong>About Us</strong></h1>
            <p>Empowering careers through expert-led clinical research training</p>
        </div>
    </div> <!--End sub_header -->

    <div class="container margin_60" id="who-we-are">
        <div class="main_title">
            <h2>The Biopharma Academy Difference</h2>
            <p>Cultivating Knowledge, Inspiring Growth</p>
        </div>

        {{-- Row 1: About Us + Mission --}}
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <h3>About Us</h3>
                <p>
                    At Biopharma Informatic, now moving forward with Biopharma Academy, we are committed to transforming the clinical research landscape through education and specialized training programs. Founded in 2010, our mission has been to provide accessible and innovative ways to conduct clinical research. As we expand into Biopharma Academy, our goal remains the same: to equip aspiring professionals with the knowledge and expertise they need to thrive in the dynamic world of clinical research.
                </p>
                <p>
                    Our programs are designed and delivered by a team of industry experts who bring decades of experience. These dedicated professionals ensure our students gain a comprehensive understanding of clinical research practices, ethics, and real-world applications. At Biopharma Academy, we are shaping the future of healthcare through education, preparing the next generation of clinical researchers to make meaningful contributions.
                </p>
        <div class="row" id="leadership" style="margin-top: 40px;">
            <div class="col-md-12">
                <h3>Meet Our Team</h3>
                <p>
                    Biopharma Academy is led by a passionate group of leaders who have been driving innovation in clinical research for over a decade. Our founders, <strong>Dr. Syed A. Naqvi, President, Shuja Naqvi, CEO, and Dr. Humayun Naqvi, MD, MBA Medical Director</strong>, bring invaluable expertise and a shared commitment to excellence. Their leadership has been instrumental in growing Biopharma Informatic into a nationwide network of over 100 associates. Their vision and dedication continue to shape the mission of Biopharma Academy as we strive to advance education in clinical research.
                </p>

                {{-- Team Cards --}}
                <div class="row" style="margin-top: 30px;">
                    {{-- Founder 1: Dr. Syed A. Naqvi --}}
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('university/img/team/Dr. Syed Naqvi.webp') }}" alt="Dr. Syed A. Naqvi" />
                                </div>
                                <div class="dropdown">
                                    <a class="xbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <div class="team-social mt-15">
                                            <ul>
                                                <li><a target="_blank" href="https://www.linkedin.com/in/biopharmainformatic"><i class="fab fa-linkedin"></i></a></li>
                                                <li><a href="mailto:rkoenning@biopharmainfo.net"><i class="fa fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Dr. Syed A. Naqvi</h4>
                                <span>President</span>
                            </div>
                        </div>
                    </div>

                    {{-- Founder 2: Shuja Naqvi --}}
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('university/img/team/shuja_naqvi_new.png') }}" alt="Shuja Naqvi" />
                                </div>
                                <div class="dropdown">
                                    <a class="xbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <div class="team-social mt-15">
                                            <ul>
                                                <li><a target="_blank" href="https://www.linkedin.com/in/shujanaqvi"><i class="fab fa-linkedin"></i></a></li>
                                                <li><a href="mailto:rkoenning@biopharmainfo.net"><i class="fa fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Shuja Naqvi</h4>
                                <span>C.E.O</span>
                            </div>
                        </div>
                    </div>

                    {{-- Founder 3: Dr. Humayun Naqvi --}}
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('university/img/team/Humaiyon Naqvi.webp') }}" alt="Dr. Humayun Naqvi" />
                                </div>
                                <div class="dropdown">
                                    <a class="xbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <div class="team-social mt-15">
                                            <ul>
                                                <li><a target="_blank" href="https://www.linkedin.com/in/humayunaqvi"><i class="fab fa-linkedin"></i></a></li>
                                                <li><a href="mailto:rkoenning@biopharmainfo.net"><i class="fa fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Dr. Humayun Naqvi</h4>
                                <span>MD, MBA Medical Director</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End team row -->
            </div><!-- End col-md-12 -->
        </div><!-- End leadership row -->
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

        {{-- Row 2: Leadership with Founder Images --}}

        <hr class="more_margin">

        <div class="row home-iframe">
            <div class="col-md-6 col-sm-6">
                <iframe width="560" height="500" src="https://www.youtube.com/embed/kyZfWxwWQ-s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="col-md-6 col-sm-6">
                <iframe width="560" height="500" src="https://www.youtube.com/embed/bLWcgvLf5oQ" title="Introduction of Rachel" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
        <hr class="more_margin">

    </div><!--End container -->

    {{-- Why Choose Section (unchanged) --}}
    <div class="container_gray_bg" id="why-choose-our-academy">
        <div class="container margin_60">
            <div class="main_title">
                <h2>Why Choose Biopharma Academy Of Clinical Research?</h2>
                <p>Join us to pursue your passion in a supportive learning environment.</p>
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

    {{-- Newsletter (unchanged) --}}
    <div class="container_gray_bg" id="newsletter_container">
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3>Subscribe to our Newsletter for latest news.</h3>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter" id="newsletter" class="form-inline">
                        <input name="email_newsletter" id="email_newsletter" type="email" value="" placeholder="Your Email" class="form-control">
                        <button id="submit-newsletter" class="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection