@extends('university.main')
@section('title', isset($blogs[0]->title) ? $blogs[0]->title : 'Blog')
@section('meta_description', isset($blogs[0]->meta_tags) ? $blogs[0]->meta_tags : '')

@section('content')

<!--<div class="sub_header bg_blog_3 blog_inner_bg">-->
        
<!--    </div> -->
    <!--End sub_header -->
    
    <!-- Pagetitle Start-->
    <section class="pagetitle">
        <img src="{{ asset('storage/' . $blogs[0]->image) }}" alt="image" class="img-fluid" />
    </section>    
    <!-- Pagetitle End-->

    <div class="container_gray_bg">
        <div class="container margin_60">
            <div class="row">

                <div class="col-md-12">
                    <div class="box_style_1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="indent_title_in">
                                        <!--<div class="publish_date">-->
                                        <!--    <span class="date_published mb-4">{{ \Carbon\Carbon::parse($blogs[0]->created_at)->format('d F Y') }}</span>-->
                                        <!--</div>-->
                                       {{-- <h3><strong>{{$blogs[0]->heading}}</strong></h3> --}}
                                    </div>
                                    <div class="wrapper_indent">
                                        {!!$blogs[0]->content!!}
                                        
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