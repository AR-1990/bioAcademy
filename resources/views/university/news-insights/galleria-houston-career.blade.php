@extends('university.main')
@section('content')

<style>
    .content-wrapper p {
        margin-bottom: 5px;
    }
    .margin-bottom-15 {
      margin-bottom: 15px; /* Adjust the value as needed */
    }
        
</style>
<div class="sub_header bg_2">
        <div class="animated fadeInDown">
            <h1>Galleria Houston Career Fair</h1>
        </div>
    </div>
<!--<div class="sub_header bg_blog_2 blog_inner_bg">-->
<!--    </div> -->
    <!--End sub_header -->

    <div class="container_gray_bg">
        <div class="container margin_60">
            <div class="row">

                <div class="col-md-12">
                    <div class="box_style_1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="indent_title_in">
                                        <!--<div class="publish_date">-->
                                        <!--    <span class="date_published mb-4">10     January 2025</span>-->
                                        <!--</div>-->
                                        <h3>Galleria Houston Career Fair</h3>
                                    </div>
                                    <div class="wrapper_indent content-wrapper">
                                        <p>
                                            At the career fair, the Biopharma Academy team will be there to meet anyone who has been thinking about a career in clinical research and is not sure where to start. Our Program Director Rachel Koenning and HR Manager Crystal Davis will be on hand to guide attendees through a clear, structured pathway into the field, built on over 30 years of combined educational experience. Whether you are a recent graduate, a healthcare professional considering a transition or someone entering the workforce for the first time, Biopharma Academy offers a defined entry point into clinical research, backed by experience, structured for results.
                                        </p>
                                        <p>
                                            What makes Biopharma Academy different is the level of support students receive from day one. At the fair, attendees will get a closer look at how the Academy connects students with clinical research professionals who bring genuine industry experience into the learning environment. And because classroom knowledge only goes so far, the Biopharma Academy's hands-on practical training places students inside active clinical research environments, so they leave with real exposure, not just a certificate. If you are attending the Galleria Houston Career Fair on March 19, stop by the Biopharma Academy booth, meet the team and see what a career in clinical research could look like for you.
                                        </p>
                                        <h4><strong>
                                            Representatives:
                                        </strong></h4>
                                        <div class="row text-center">
                                            <div class="col-lg-offset-2 col-lg-4">
                                                <img src="{{asset('public/university/img/Rachel-new.jpeg')}}" class="img-responsive margin-bottom-15">
                                                <p>
                                                    <strong>Rachel Koenning</strong> <br>
                                                    Program Director, Biopharma Academy
                                                </p>
                                            </div>
                                            <div class="col-lg-4">
                                                <img src="{{asset('public/university/img/Crystal-new.png')}}" class="img-responsive margin-bottom-15">
                                                <p>
                                                    <strong>Crystal Davis</strong> <br>
                                                    HR Manager, Biopharma Informatic
                                                </p>
                                            </div>
                                        </div>
                                                                                
                                       
                                        
                                        <!--<h4><strong>-->
                                        <!--    Speakers:-->
                                        <!--</strong></h4>-->
                                        <!--<p class="mb-0">-->
                                        <!--    <strong>Mette Andersen</strong>-->
                                        <!--    General Manager, Data, Analytics & Insights Solutions, WCG-->
                                        <!--</p>-->
                                        <!--<p>-->
                                        <!--    <strong>Morgan Sellars</strong>-->
                                        <!--    Senior Director, Recruitment & Retention, Data & Insight-->
                                        <!--</p>-->
                                </div>
                            </div>
                        </div>
                        <hr class="styled_2">
                        
                    </div>

                </div>
               
            </div><!--End row -->
        </div><!--End container -->
    </div><!--End bg_gray_container -->



 @endsection