@extends('university.main')
@section('title', "Our Blog | Insights into Clinical Research and Healthcare")
@section('meta_description', "Stay informed with the latest articles on clinical research advancements, healthcare trends, and success stories from Biopharma Academy's community.")
@section('content')
@php
    $staticBlogs = [
        [
            'category' => 'expert-insights',
            'image' => asset('university/img/event_1_thumb.jpg'),
            'title' => 'The Scope of Clinical Research: From Fundamentals to Advanced Applications',
            'excerpt' => 'Clinical research is an essential part of the healthcare system, driving the development of new treatments, drugs, and medical practices. It bridges the gap between laboratory findings and real-world medical applications, helping to ensure that the treatments we rely on are safe and effective.',
            'url' => url('blogs/the-scope-of-clinical-research'),
        ],
        [
            'category' => 'tips-guides',
            'image' => asset('university/img/event_2_thumb.jpg'),
            'title' => 'Essential Skills You Gain from Clinical Research Programs',
            'excerpt' => 'Clinical research programs equip you with essential skills that support the medical community and open doors to strong career opportunities. From analytical thinking to regulatory understanding, these skills help learners thrive in real-world roles.',
            'url' => url('blogs/essential-skills-you-gain'),
        ],
        [
            'category' => 'latest-advances',
            'image' => asset('university/img/event_3_thumb.jpg'),
            'title' => 'The Global Demand for Clinical Researchers and How to Meet It',
            'excerpt' => 'As the global healthcare industry advances, the demand for professionals who can conduct research, test treatments, and support medical innovation continues to rise. Clinical researchers remain central to that transformation.',
            'url' => url('blogs/the-global-demand-for-clinical-researchers'),
        ],
    ];
@endphp

<div class="sub_header bg_blog">
        <div id="intro_txt">
            <h1> <strong>Blogs</strong></h1>
        </div>
    </div> <!--End sub_header -->

     <div class="container margin_60">
        <div class="main_title">
            <h2>Our Latest Blogs</h2>
            <!--<p>This is Dummy Text This is Dummy Text </p>-->
        </div>

        <div class="text-center blog-filter-wrap">
            <ul class="blog-category-nav" id="blogCategoryNav">
                <li>
                    <a href="javascript:void(0)" class="active" data-filter="all">All</a>
                </li>
                @foreach($blogCategories as $value => $label)
                    <li>
                        <a href="javascript:void(0)" data-filter="{{ $value }}">{{ $label }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <section id="section-3">
            <div class="row list_news_tabs" id="blogList">
                @foreach($staticBlogs as $staticBlog)
                    <div class="col-lg-4 col-md-6 col-sm-6 blog-item" data-category="{{ $staticBlog['category'] }}">
                        <div class="blog-card">
                            <p>
                                <a href="{{ $staticBlog['url'] }}">
                                    <img src="{{ $staticBlog['image'] }}" alt="{{ $staticBlog['title'] }}" class="img-responsive">
                                </a>
                            </p>
                            <span class="blog-category-badge">{{ $blogCategories[$staticBlog['category']] ?? 'Other' }}</span>
                            <h3 class="ellipsis">
                                <a href="{{ $staticBlog['url'] }}">{{ $staticBlog['title'] }}</a>
                            </h3>
                            <p class="multi-ellipsis">{{ $staticBlog['excerpt'] }}</p>
                            <a href="{{ $staticBlog['url'] }}" class="button small">Read more</a>
                        </div>
                    </div>
                @endforeach

                @foreach($blogs as $blog)
                    @php
                        $blogCategory = $blog->category ?? 'other';
                        $blogCategoryLabel = $blogCategories[$blogCategory] ?? 'Other';
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-6 blog-item" data-category="{{ $blogCategory }}">
                        <div class="blog-card">
                            <p>
                                <a href="{{ route('blogs.detail', $blog->slug) }}">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-responsive">
                                </a>
                            </p>
                            <span class="blog-category-badge">{{ $blogCategoryLabel }}</span>
                            <h3 class="ellipsis">
                                <a href="{{ route('blogs.detail', $blog->slug) }}">{{ $blog->title }}</a>
                            </h3>
                            <p class="multi-ellipsis">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}...</p>
                            <a href="{{ route('blogs.detail', $blog->slug) }}" class="button small">Read more</a>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12" id="noBlogResults" style="display:none;">
                    <p class="text-center" style="margin: 30px 0; color: #777;">No blog posts found in this category yet. Check back soon!</p>
                </div>
            </div>
        </section><!-- /content -->

    </div>

    <style>
        .blog-filter-wrap {
            margin: 0 0 35px;
        }

        .blog-category-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .blog-category-nav a {
            display: inline-block;
            padding: 8px 18px;
            border: 1px solid #d4d8df;
            border-radius: 30px;
            text-decoration: none;
            color: #032855;
            background: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .blog-category-nav a:hover,
        .blog-category-nav a.active {
            background-color: #032855;
            color: #fff;
            border-color: #032855;
        }

        .blog-card {
            margin-bottom: 30px;
        }

        .blog-category-badge {
            display: inline-block;
            margin-bottom: 12px;
            padding: 5px 12px;
            border-radius: 20px;
            background: #e9eef6;
            color: #032855;
            font-size: 12px;
            font-weight: 600;
        }
        @media (max-width: 767px) {
            .blog-category-nav {
                justify-content: center;
            }

            .blog-category-nav a {
                font-size: 13px;
                padding: 8px 14px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tabs = document.querySelectorAll('#blogCategoryNav a');
            var items = document.querySelectorAll('#blogList .blog-item');
            var noResults = document.getElementById('noBlogResults');

            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    tabs.forEach(function (t) { t.classList.remove('active'); });
                    tab.classList.add('active');

                    var filter = tab.getAttribute('data-filter');
                    var visibleCount = 0;

                    items.forEach(function (item) {
                        var itemCategory = item.getAttribute('data-category') || 'other';

                        if (filter === 'all' || itemCategory === filter) {
                            item.style.display = '';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    if (noResults) {
                        noResults.style.display = (visibleCount === 0) ? '' : 'none';
                    }
                });
            });
        });
    </script>

 @endsection
