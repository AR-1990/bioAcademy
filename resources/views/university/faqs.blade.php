@extends('university.main')
@section('title', 'Clinical Research FAQs | Biopharma Academy - Your Questions Answered')
@section('meta_description', 'Find answers to frequently asked questions about Biopharma Academy\'s clinical research programs, including training format, certification, job opportunities, and application process.')
@section('content')
    <div class="sub_header bg_1">
        <div id="intro_txt">
            <h1><strong>Frequently Asked Questions</strong></h1>
            <p>Your Queries, Our Answers - Everything you need to know about our Clinical Research Program</p>
        </div>
    </div> <!--End sub_header -->

  {{--  <div class="container margin_60">
        <div class="main_title">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about our Clinical Research Program</p>
        </div>
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Accordion Section -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    
                    <!-- FAQ 1 -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="icon_question_alt2"></i> What is Clinical Research?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p>Clinical research involves studying new treatments, drugs, or devices in humans to evaluate their safety and effectiveness. It provides diverse career opportunities and requires a solid understanding of regulatory guidelines and ethical practices.</p>
                                <p>This field plays a crucial role in bringing new medical advancements from the laboratory to patients, ensuring that treatments are both safe and effective before they become widely available.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 2 -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">
                                    <i class="icon_question_alt2"></i> Where is the training conducted?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Our courses are offered online through flexible, on-demand learning modules. After passing the required exams, students participate in a four-week, hands-on training session conducted by experienced researchers at select locations.</p>
                                <p>This blended approach ensures you get the theoretical knowledge online at your own pace, followed by practical, real-world experience under expert supervision.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 3 -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsed">
                                    <i class="icon_question_alt2"></i> Is the program certified?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>Upon completing the training and meeting program requirements, participants receive a certificate of completion, reflecting their acquired knowledge and skills in clinical research.</p>
                                <p>Our certification is recognized by industry partners and demonstrates your commitment to professional development in the clinical research field.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 4 -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="collapsed">
                                    <i class="icon_question_alt2"></i> Do you offer job opportunities after training?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <p>Yes, students who demonstrate potential during the training may be offered opportunities to work with Biopharma Informatic. While this is not guaranteed, we strive to identify and support talent for future roles in clinical research.</p>
                                <p>We also provide career guidance, resume building assistance, and interview preparation to help you succeed in your job search.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 5 -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive" class="collapsed">
                                    <i class="icon_question_alt2"></i> Why choose Biopharma Academy?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <p>Our program is crafted by expert researchers and designed to provide a balance of foundational knowledge and practical skills. With mentorship from industry professionals and real-world training, we prepare students to pursue meaningful careers in clinical research.</p>
                                <ul class="list_style_1">
                                    <li>Expert-led curriculum tailored to industry needs</li>
                                    <li>Hands-on training with experienced researchers</li>
                                    <li>Flexible online learning format</li>
                                    <li>Career support and networking opportunities</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 6 -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix" class="collapsed">
                                    <i class="icon_question_alt2"></i> How can I apply?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">
                                <p>Getting started is simple! Just fill out our online application form, and we'll guide you through the process to begin your journey into clinical research.</p>
                                <p>The application process includes:</p>
                                <ol>
                                    <li>Complete the online application form</li>
                                    <li>Submit your educational background</li>
                                    <li>Schedule an interview with our admissions team</li>
                                    <li>Receive your acceptance notification</li>
                                </ol>
                                <a href="{{ url('/contact') }}" class="button_intro" style="margin-top: 15px; display: inline-block;">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 7 - Additional Question -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" class="collapsed">
                                    <i class="icon_question_alt2"></i> What are the prerequisites for enrollment?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="panel-body">
                                <p>To enroll in our Clinical Research Program, applicants should have:</p>
                                <ul class="list_style_1">
                                    <li>A bachelor's degree in life sciences, pharmacy, nursing, or related field</li>
                                    <li>Basic understanding of medical terminology</li>
                                    <li>Strong communication and analytical skills</li>
                                    <li>Proficiency in English language</li>
                                </ul>
                                <p>Exceptions may be made for candidates with relevant professional experience. Contact our admissions team for a personalized assessment.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 8 - Additional Question -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight" class="collapsed">
                                    <i class="icon_question_alt2"></i> How long does the program take to complete?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                            <div class="panel-body">
                                <p>The program duration is flexible, typically ranging from 3-6 months depending on your pace of study. The curriculum includes:</p>
                                <ul class="list_style_1">
                                    <li>Self-paced online modules (8-12 weeks)</li>
                                    <li>Final examinations</li>
                                    <li>Four-week hands-on training session</li>
                                </ul>
                                <p>Students can accelerate their learning or take additional time as needed, with maximum completion time of 12 months.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Still Have Questions Section -->
                <div class="box_style_4 text-center" style="margin-top: 50px;">
                    <h4><i class="icon_mail_alt"></i> Still Have Questions?</h4>
                    <p>Can't find the answer you're looking for? Please contact our admissions team.</p>
                    <a href="{{ url('/contact') }}" class="button_outline" style="margin-bottom: 0;">Contact Us</a>
                </div>
                
            </div>
        </div>
    </div><!--End container --> --}}
    
    <div class="container margin_60">
        <div class="main_title">
            <h2>FAQs about Biopharma Academy’s Clinical Research Program</h2>
            <p>Your Queries, Our Answers</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>What is Clinical Research?</h4>
                    <p>
                    Clinical research involves studying new treatments, drugs, or devices in humans to evaluate their safety and effectiveness. It provides diverse career opportunities and requires a solid understanding of regulatory guidelines and ethical practices.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>Where is the training conducted?</h4>
                    <p>Our courses are offered online through flexible, on-demand learning modules. After passing the required exams, students participate in a four-week, hands-on training session conducted by experienced researchers at select locations.
</p>
<!-- <p>
    Our main office is situated in Houston, US.
</p> -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>Is the program certified?</h4>
                    <p>Upon completing the training and meeting program requirements, participants receive a certificate of completion, reflecting their acquired knowledge and skills in clinical research.
</p>
                </div>
            </div>
        </div><!--End row -->
        <div class="row">
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>Do you offer job opportunities after training?</h4>
                    <p>Yes, students who demonstrate potential during the training may be offered opportunities to work with Biopharma Informatic. While this is not guaranteed, we strive to identify and support talent for future roles in clinical research.
</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>Why choose Biopharma Academy?</h4>
                    <p>Our program is crafted by expert researchers and designed to provide a balance of foundational knowledge and practical skills. With mentorship from industry professionals and real-world training, we prepare students to pursue meaningful careers in clinical research.
</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>How can I apply?</h4>
                    <p>Getting started is simple! Just fill out our online application form, and we’ll guide you through the process to begin your journey into clinical research.
</p>
                </div>
            </div>
        </div><!--End row -->
    </div>

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