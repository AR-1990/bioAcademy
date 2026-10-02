
@extends('university.main')
@section('title', 'Clinical Research Open House Webinar | Biopharma Academy of Clinical Research')
@section('meta_description', "Join our free open house webinar to explore careers in clinical research. Learn about training pathways, industry demand, and opportunities with Biopharma Academy.")
@push('head_scripts')
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1271468251845702');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1271468251845702&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
@endpush
@section('content')
<style>
    
    header,
    header#contacts{
        background-color: #1C3866;
        opacity: 1;
    }
    header a.btn.btn-primary{
        background-color: white;
        color: #1C3866 !important;
    }
    .margin_60 {
        padding-top: 180px;
       
    }
    p {
        font-size: 2rem;
        line-height: 1.25;
    }
    @media only screen and (max-width: 767px) {
        a.button_intro, .button_intro {
            display: block;
        }
        .margin_60 {
            padding-top: 80px;
           
        }
    }
    
</style>
    <!--<div class="sub_header bg_2">-->
    <!--    <div id="intro_txt">-->
    <!--        <h1>Join Our Free Open House Webinar</h1>-->
    <!--    </div>-->
    <!--</div> -->
    <!--End sub_header -->
    
    <div class="container margin_60">
        <div class="row align-items-center">
            <div class="col-md-5 col-sm-12">
                <img src="{{asset('university/img/webinar-academy.jpg')}}" alt="Clinical Research Webinar" class="img-responsive" style="width: 100%; border-radius: 10px; margin-bottom: 20px;">
            </div>
            <div class="col-md-7 col-sm-12">
                <div class="main_title" style="text-align: left; margin-bottom: 20px;">
                    <h2>Join Our Free Open House Webinar & Explore Your Future in Clinical Research</h2>
                </div>
                <p>
                   Learn how you can start or grow your career in the clinical research industry with guidance from experienced professionals at Biopharma Academy.

                </p>
                <p>
                    Whether you're a student, graduate, healthcare professional, or someone looking for a career switch, this webinar will help you understand the opportunities, training pathways, and industry demand in clinical research.
                </p>
                <a href="https://calendly.com/rkoenning-biopharmainfo/biopharma-academy-open-house" class="button_intro" target="_blank" rel="noopener noreferrer">Book Your Slot Now</a>
            </div>
        </div><!--End row -->
        
        <hr class="more_margin">

    </div>
@endsection