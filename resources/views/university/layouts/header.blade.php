<!DOCTYPE html>
{{-- <html> --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="college, campus, university, courses, school, educational">
    <title>@yield('title', 'Biopharma Academy Of Clinical Research')</title>
    <meta name="description" content="@yield('meta_description', 'Biopharma Academy Of Clinical Research')">
    <meta name="author" content="Ansonika">
    <meta name="google-site-verification" content="q_9c6iBSuIr76R6n_wXRPdiKJ-IVHuBld2hq6eZWsqw" />
    
    <link rel="canonical" href="{{ url()->current() }}" />
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('university/img/favicon-biopharma.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('university/img/favicon-biopharma.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('university/img/favicon-biopharma.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('university/img/favicon-biopharma.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('university/img/favicon-biopharma.png') }}">

    <!-- BASE CSS -->
    <link href="{{ asset('university/css/main_font/main_font.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/animate.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('university/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/elegant_font/elegant_font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/icon_font/pe-icon-7-stroke.min.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/fontello/css/fontello.min.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/edu_fonts/edu_fonts.min.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/magnific-popup.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('university/css/custom.css') }}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('university/layerslider/css/layerslider.css') }}" rel="stylesheet">
    <link href="{{ asset('university/css/tabs.css') }}" rel="stylesheet">

    {{-- @if(Route::current()->getName() != 'university_getenrolled') --}}

    <script src="{{ asset('university/js/jquery-1.11.2.min.js') }}"></script>

    {{-- @else --}}

    
      <!-- Include jQuery -->
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    {{-- @endif --}}
    
   <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "CollegeOrUniversity",
      "name": "Biopharma Academy of Clinical Research",
      "url": "https://biopharmaacademy.com/",
      "logo": "https://biopharmaacademy.com/university/img/academy-logo-white.png",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "(361) 219-6321",
        "contactType": "customer service",
        "areaServed": "US",
        "availableLanguage": "en"
      },
      "sameAs": [
        "https://www.facebook.com/people/Biopharma-Institute-Of-Clinical-Research/61573959513155/",
        "https://www.linkedin.com/company/biopharma-institute-of-clinical-research/",
        "https://www.youtube.com/@BiopharmaIOCR",
        "https://biopharmaacademy.com/"
      ]
    }
    </script>
    @stack('head_scripts')
</head>
<body>
    

    <div id="preloader">
        <div class="pulse"></div>
    </div><!-- Pulse Preloader -->

    @include('university.layouts.navbar')
    @yield('content')

    @include('university.layouts.footer')

</body>
</html>
