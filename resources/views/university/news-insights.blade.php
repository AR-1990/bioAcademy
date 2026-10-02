@extends('university.main')
@section('title', 'Biopharma Academy News & Insights')
@section('meta_description', '')
@section('content')

<style>
    #section-3 .img-responsive{
            height: 220px;
    width: 100%;
    object-fit: cover;
    }
</style>
    

    <div class="sub_header bg_2">
        <div id="intro_txt">
            <h1>Biopharma Academy </h1>
                <p>
                    News & Insights
                </p>
        </div>
    </div>

    <div class="container margin_60">
        <div class="main_title">
            <h2>Latest From Biopharma Academy</h2>
            <!--<p>This is Dummy Text This is Dummy Text </p>-->
        </div>

        <div class="">

            <section id="section-3">
                <div class="row list_news_tabs">
                    <div class="col-md-4 col-sm-4">
                        <p><a href="{{ route('news.insights.future-healthcare-professionals')}}"><img src="{{ asset('university/img/electrical-lab.webp') }}" alt="" class="img-responsive"></a>
                        </p>
                        <!--<span class="date_published">10 January 2025</span>-->
                        <h3 class="ellipsis"><a href="{{ route('news.insights.future-healthcare-professionals')}}">Biopharma Academy of Clinical Research Connects with Future Healthcare Professionals at Houston Career Institute</a></h3>
                        <p class="multi-ellipsis">Rachel Koenning, Program Director at Biopharma Academy of Clinical Research, is</p>
                        <a href="{{ route('news.insights.future-healthcare-professionals')}}" class="button small">Read more</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p><a href="{{ route('news.insights.galleria')}}"><img src="{{ asset('university/img/user-insight-1.webp') }}" alt="" class="img-responsive"></a>
                        </p>
                        <!--<span class="date_published">10 January 2025</span>-->
                        <h3 class="ellipsis"><a href="{{ route('news.insights.galleria')}}">Galleria Houston Career Fair</a></h3>
                        <p class="multi-ellipsis">At the career fair, the Biopharma Academy team will be there to meet anyone who has been thinking about a career</p>
                        <a href="{{ route('news.insights.galleria')}}" class="button small">Read more</a>
                    </div>
                    
                    <div class="col-md-4 col-sm-4">
                        <p><a href="{{ route('news.insights.houston')}}"><img src="{{ asset('university/img/user-insight-2.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <!--<span class="date_published">10 January 2025</span>-->
                        <h3 class="ellipsis"><a href="{{ route('news.insights.houston')}}">Biopharma Academy Collaborates with the University of Houston</a></h3>
                        <p class="multi-ellipsis">Biopharma Academy continues to strengthen its presence across academic institutions, with Program Director Rachel Koenning invited by the University of Houston as a guest speaker.</p>
                        <a href="{{ route('news.insights.houston')}}" class="button small">Read more</a>
                    </div>
                    
                    <div class="col-md-4 col-sm-4">
                        <p><a href="{{ route('news.insights.open-house')}}"><img src="{{ asset('university/img/user-insight-3.jpg') }}" alt="" class="img-responsive"></a>
                        </p>
                        <!--<span class="date_published">10 January 2025</span>-->
                        <h3 class="ellipsis"><a href="{{ route('news.insights.open-house')}}">Free Online Open House by Biopharma Academy. Explore the Field, Find Your Path & Get Started!</a></h3>
                        <p class="multi-ellipsis">Clinical research is growing rapidly, and with that growth, more career opportunities are being created for individuals looking to enter the healthcare and research field.</p>
                        <a href="{{ route('news.insights.open-house')}}" class="button small">Read more</a>
                    </div>
                </div>
                <!--End row -->
            </section>

        </div><!-- /content -->

    </div>

@endsection