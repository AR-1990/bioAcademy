@extends('university.main')
@section('title', 'Clinical Research Courses | Biopharma Academy Curriculum')
@section('meta_description', 'Explore our comprehensive clinical research programs designed to equip you with foundational knowledge and practical skills, tailored to meet evolving industry demands.')
@section('content')
<style>
.salary-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 12px;
    text-align: center;
}
.salary-card{
    background:#fff;
    border:1px solid #eee;
    border-radius:12px;
    padding:20px;
}

.salary-role{
    font-size:20px;
    font-weight:600;
    margin-bottom:8px;

    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.salary-main{
    font-size:22px;
    font-weight:700;
    line-height:1;
}

.salary-main span{
    font-size:12px;
    color:#777;
}

.salary-label{
    font-size:11px;
    color:#777;
    margin:4px 0 8px;
}

.salary-progress{
    position:relative;
    height:4px;
    background:#eee;
    border-radius:20px;
}

.salary-progress span{
    position:absolute;
    top:50%;
    transform:translate(-50%,-50%);
    width:8px;
    height:8px;
    background:#6d28d9;
    border-radius:50%;
}

.salary-range{
    display:flex;
    justify-content:space-between;
    margin-top:8px;
    font-size:11px;
    color:#666;
}

@media(max-width:768px){
    .salary-grid{
        grid-template-columns:1fr;
    }
}
/* ---- Webinar Prominent Section ---- */
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
            <h1><strong>Clinical Research Excellence Program</strong></h1>
            <p>A clinical research career readiness program uniquely built on real industry experience.</p>
        </div>
    </div> <!--End sub_header -->

    <div class="container_gray_bg">

        <div class="container margin_60">
            <div class="row">

                <div class="col-md-9">
                    <div class="box_style_1">
                        {{-- ========== SUMMARY (unchanged) ========== --}}
                        <div class="indent_title_in">
                            <i class="pe-7s-news-paper"></i>
                            <h3>Summary</h3>
                            <p>Advance Your Clinical Research Career with Biopharma Academy</p>
                        </div>
                        <div class="wrapper_indent">
                            <p>
                            Biopharma Academy offers comprehensive training and mentorship to equip professionals from all backgrounds with the expertise needed to excel in clinical research. Our programs are designed to provide you with both foundational knowledge and practical skills, ensuring that you are prepared to meet the challenges of an evolving healthcare landscape.
                            </p>
                            <p>
                            Whether you are just beginning your journey or looking to further refine your skills, our focused courses are tailored to meet your career goals. With a curriculum designed to maximize your learning in a condensed time frame, you can gain valuable knowledge and apply it directly to your career in clinical research.
                            </p>
                            <p class="add_bottom_30">
                            For more information about our upcoming courses, please fill out our form. Take the next step in your professional journey today!
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><img src="{{ asset('university/img/course_1_1_thumb.jpg') }}" alt="" class="img-responsive"></p>
                                    <h4>Main Objectives</h4>
                                    <ul class="list_style_1">
                                        <li>Develop a thorough understanding of the core principles of clinical research.</li>
                                        <li>Master key aspects such as study design, data collection techniques, ethics, and regulatory compliance.</li>
                                        <li>Engage in hands-on activities and analyze real-world case studies to enhance practical skills.</li>
                                        <li>Acquire the expertise needed to make impactful contributions in the field of clinical research.</li>
                                        <li>Advance your career by building a strong foundation and specialized knowledge in clinical research</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p><img src="{{ asset('university/img/course_1_2_thumb.jpg') }}" alt="" class="img-responsive"></p>
                                    <h4>Future Applications</h4>
                                    <ul class="list_style_1">
                                        <li>With our exclusive study modules, you'll gain the ability to apply cutting-edge technologies to enhance clinical research practices.</li>
                                        <li>Through expert guidance, you will learn how to utilize innovative approaches to transform traditional methodologies.</li>
                                        <li>Our curriculum will enable you to explore and integrate emerging trends and breakthroughs into your research.</li>
                                        <li>Insights from certified professionals will equip you to implement advancements in clinical trials and drug development.</li>
                                        <li>By the end of the program, you'll be prepared to apply your knowledge in tackling real-world challenges in the field.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- ========== SELF-PACED LEARNING MODULES ========== --}}
                        <hr class="styled_2">
                        <div class="indent_title_in" id="self-paced-learning">
                            <i class="pe-7s-display1"></i>
                            <h3>Self-Paced Learning Modules</h3>
                           
                            <!--<p>Clinical Research Excellence Program</p>-->
                        </div>
                        <div class="wrapper_indent">
                            <!--<p><strong>Positioning Statement:</strong> A clinical research career readiness program uniquely built on real industry experience.</p>-->
                            <p>
                            Biopharma Academy offers clinical research training through our on-demand learning modules, providing flexibility to learn at your own pace and on your schedule.
                            </p>
                            <p>
                                A glimpse into what's covered inside our 18-module curriculum.
                            </p>
                            {{--<div class="row">
                                <div class="col-md-6">
                                    <ul class="list_style_1">
                                        <li>Introduction to Clinical Research</li>
                                        <li>Background and Ethics in Clinical Research</li>
                                        <li>Terminology</li>
                                        <li>Subject Recruitment and Pre-Screening</li>
                                        <li>Documentation</li>
                                        <li>Informed Consent Process</li>
                                        <li>FDA Form 1572/Statement of Investigator</li>
                                        <li>IP Accountability</li>
                                        <li>Temperature Monitoring</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list_style_1">
                                        <li>Types of Logs Pertinent to Clinical Research</li>
                                        <li>Regulatory and Central IRB Submissions</li>
                                        <li>Laboratory Collection/Processing/Shipping</li>
                                        <li>IATA Certification and Packaging Requirements for Biological Goods</li>
                                        <li>Pre-Study/Site Initiation/Interim Monitoring/Close-Out Visits</li>
                                        <li>Concomitant Medication/Adverse Event/Serious Adverse Event Reporting</li>
                                        <li>Data Management and Query Resolution</li>
                                        <li>eCRF and Source Documentation</li>
                                        <li>Code of Federal Regulations</li>
                                    </ul>
                                </div>
                            </div> --}}
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

                        {{-- ========== HANDS-ON TRAINING ========== --}}
                        <hr class="styled_2">
                        <div class="indent_title_in" id="hands-on-training">
                            <i class="pe-7s-display2"></i>
                            <h3>Hands-On Training</h3>
                            <p>Hands-On Training at Real Clinical Research Site</p>
                        </div>
                        <div class="wrapper_indent">
                            <p>
                            Biopharma Academy's hands-on training gives students direct exposure to an active clinical research environment at Biopharma Informatic's research site. With a 1:1 training ratio and mentorship from certified clinical research professionals, you gain the real-world experience needed to step confidently into the field.
                            </p>
                            <p>
                            To learn more, contact us at <a href="mailto:RKoenning@biopharmainfo.net">RKoenning@biopharmainfo.net</a> or call <strong>+1 (361) 219-6321</strong>.
                            </p>
                            <h4>Benefits of Training</h4>
                            <ul class="list_style_1">
                                <li>Train at Active Clinical Site in Houston and Gain Hands-On Experience</li>
                                <li>1:1 Mentorship from Certified Research Professionals</li>
                                <li>Hands-On Exposure to Real Trial Protocols and GCP Standards</li>
                                <li>Build Career Readiness Beyond the Classroom</li>
                            </ul>
                        </div>

                        {{-- ========== CERTIFICATION & COMPREHENSIVE EXAMINATION ========== --}}
                        <hr class="styled_2">
                        <div class="indent_title_in" id="certification-examination">
                            <i class="pe-7s-medal"></i>
                            <h3>Comprehensive Examination & Certificate of Completion</h3>
                            <!--<p>Validate your knowledge and stand out to employers</p>-->
                        </div>
                        <div class="wrapper_indent">
                            <p>
                                After completing all 18 modules, students take a comprehensive three-hour examination designed to assess their readiness for the field. Upon successfully passing the exam, they become eligible to begin hands-on training. After completing the training, students receive a Certificate of Completion, helping prepare them for industry-recognized roles in clinical research.
                            </p>
                            <!--<ul class="list_style_1">-->
                            <!--    <li>Clinical Research Nurse (CRN)</li>-->
                            <!--    <li>Clinical Trial Assistant (CTA)</li>-->
                            <!--    <li>Clinical Research Associate (CRA)</li>-->
                            <!--    <li>Clinical Research Coordinator (CRC)</li>-->
                            <!--    <li>Regulatory Affairs Coordinator</li>-->
                            <!--    <li>Clinical Trial / Project Manager</li>-->
                            <!--</ul>-->
                        </div>

                        {{-- ========== CAREER & SALARY INSIGHTS ========== --}}
                        <hr class="styled_2">
                        <div class="indent_title_in" id="career-salary">
                            <i class="pe-7s-graph1"></i>
                            <h3>Career & Salary Insights</h3>
                            <p>Understand your earning potential in clinical research</p>
                        </div>
                        <div class="wrapper_indent">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Career List</h4>
                                    <ul class="list_style_1">
                                        <li>Clinical Research Nurse (CRN)</li>
                                        <li>Clinical Trial Assistant (CTA)</li>
                                        <li>Clinical Research Associate (CRA)</li>
                                        <li>Clinical Research Coordinator (CRC)</li>
                                        
                                        <li>Clinical Trial / Project Manager</li>
                                        <li>Quality Assurance Assistant</li>
                                        <li>Regulatory Assistant</li>
                                        <li>Business Development Assistant</li>
                                        <li>Finance Assistant</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <!--<h4 class="salary-title"><strong>Earnings Potential</strong></h4>-->
                                
                                
                                    <div class="salary-grid">
                                            <div class="salary-card">
                                
                                                <div class="salary-role">
                                                    <strong>Earnings Potential</strong>
                                                </div>
                                
                                                <div class="salary-main">
                                                    $18-$30
                                                    <span>/hr</span>
                                                </div>
                                
                                                <div class="salary-label">
                                                    Median Hourly Wage
                                                </div>
                                
                                                <div class="salary-progress">
                                                    <span style="left: 40%"></span>
                                                </div>
                                
                                                <div class="salary-range">
                                                    <span>$10/hr</span>
                                                    <span>$50/hr</span>
                                                </div>
                                
                                            </div>
                                
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ========== WEBINAR ARCHIVE ========== --}}
                        <hr class="styled_2">
                        <div class="webinar-prominent" id="webinar-archive">
                            <h2>Webinar Archive</h2>
                            <p class="webinar-subtitle">Clinical Research Webinars to Keep You Ahead of the Field</p>
                            <p>
                                Our webinar sessions are designed for clinical research professionals who want to keep growing without disrupting their routine. Each session is instructor-led and interactive and with on-demand access, you can learn at whatever pace works best for you.
                            </p>
                            <p>
                                Stay updated with the latest trends, regulatory changes, and best practices – all from the convenience of your device.
                            </p>
                        </div>
                        
                        

                        {{-- (commented-out sections remain as they were) --}}
                        <!-- <hr class="styled_2"> -->
                        <!-- ... timetable, pricing etc. (commented) ... -->

                    </div><!-- End box_style_1 -->
                </div><!-- End col-md-9 -->

                {{-- ========== SIDEBAR (unchanged) ========== --}}
                <aside class="col-md-3">
                    <h4><strong>How to apply</strong></h4>
                    <p>
                    Ready to begin your journey in clinical research? Simply fill out our online application form to take the first step. Our admissions team will guide you through the next steps and provide all the details you need to get started.
                    </p>
                    <hr class="styled">
                    <div class="box_side">
                        <h5>Phone</h5>
                        <i class="icon-phone"></i>
                        <p>
                            <a href="tel:(361) 219-6321">(361) 219-6321</a><br>
                            <small>Monday to Friday 9.00am - 5.00pm</small>
                        </p>
                    </div>
                    <!-- <hr class="styled"> -->
                    <!-- <div class="box_side"> ... </div> -->
                </aside>

            </div><!--End row -->
        </div><!--End container -->
    </div><!--End container_gray_bg -->

    {{-- (commented-out FAQ section) --}}
    {{--
    <div class="container margin_60"> ... </div>
    --}}

    {{-- ========== NEWSLETTER (unchanged) ========== --}}
    <div class="container_gray_line" id="newsletter_container">
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