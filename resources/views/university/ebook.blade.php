@extends('university.main')

@section('title', 'Clinical Research Excellence Starter Guide | Biopharma Academy')

@section('meta_description', 'Download the Clinical Research Excellence Starter Guide — a comprehensive mini guide to clinical research career readiness.')

@section('content')

<style>
    /* ============================================================
       EBOOK / PRODUCT PAGE
    ============================================================ */

    .ebook-product-page {
        padding: 50px 0 70px;
    }

    /* ---------- LEFT PRODUCT AREA ---------- */

    .ebook-product-left {
        text-align: center;
    }

    .ebook-cover-wrap {
        display: inline-block;
        position: relative;
        margin-bottom: 15px;
    }

    .ebook-cover {
        width: 100%;
        max-width: 360px;
        display: block;
        border-radius: 4px;
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.22);
    }

    .ebook-preview-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #1C3866;
        font-size: 14px;
        margin-bottom: 22px;
        text-decoration: none;
    }

    .ebook-preview-link:hover {
        color: #152c52;
        text-decoration: none;
    }

    .ebook-preview-link i {
        font-size: 17px;
    }

    /* ---------- PRICE ---------- */

    .ebook-price {
        margin-bottom: 18px;
        line-height: 1;
    }

    .ebook-old-price {
        color: #777;
        font-size: 23px;
        text-decoration: line-through;
        margin-right: 10px;
    }

    .ebook-free-price {
        color: #278a0a;
        font-size: 31px;
        font-weight: 700;
    }

    /* ---------- CTA ---------- */

    .ebook-claim-btn {
        display: block;
        width: 100%;
        max-width: 360px;
        margin: 0 auto;
        padding: 14px 20px;
        background: #1C3866;
        color: #fff;
        border-radius: 8px;
        font-size: 17px;
        font-weight: 600;
        text-align: center;
        border: none;
        transition: all 0.25s ease;
        text-decoration: none;
    }

    .ebook-claim-btn:hover {
        background: #152c52;
        color: #fff;
        text-decoration: none;
        transform: translateY(-1px);
    }

    .ebook-small-links {
        max-width: 360px;
        margin: 18px auto 0;
        display: flex;
        justify-content: center;
        gap: 28px;
        font-size: 14px;
    }

    .ebook-small-links a {
        color: #1C6d8c;
        text-decoration: none;
    }

    .ebook-small-links a:hover {
        text-decoration: underline;
    }

    .ebook-small-links i {
        margin-right: 5px;
    }


    /* ============================================================
       RIGHT CONTENT
    ============================================================ */

    .ebook-product-right {
        padding-left: 35px;
    }

    .ebook-breadcrumb {
        color: #777;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .ebook-breadcrumb span {
        margin: 0 6px;
        color: #bbb;
    }

    .ebook-product-title {
        color: #173957;
        font-size: 42px;
        line-height: 1.15;
        font-weight: 700;
        margin: 0 0 15px;
    }

    .ebook-subtitle {
        font-size: 20px;
        line-height: 1.5;
        color: #555;
        margin-bottom: 10px;
    }

    .ebook-author {
        font-size: 17px;
        color: #666;
        margin-bottom: 25px;
    }

    .ebook-author strong {
        color: #1C3866;
    }

    .ebook-product-divider {
        border: 0;
        border-top: 1px solid #ddd;
        margin: 28px 0 28px;
    }

    /* ---------- DESCRIPTION ---------- */

    .ebook-description {
        color: #444;
        font-size: 16px;
        line-height: 1.75;
    }

    .ebook-description .eyebrow {
        font-family: Georgia, "Times New Roman", serif;
        font-size: 18px;
        font-weight: 700;
        color: #333;
        text-transform: uppercase;
        margin-bottom: 25px;
    }

    .ebook-description p {
        margin-bottom: 20px;
    }

    .ebook-description strong {
        color: #222;
    }

    .ebook-description ul {
        padding-left: 20px;
        margin-bottom: 25px;
    }

    .ebook-description li {
        margin-bottom: 8px;
    }

    /* ============================================================
       DOWNLOAD FORM
    ============================================================ */

    .ebook-form-section {
        margin-top: 55px;
        padding: 55px 0;
        background: #f7f9fc;
    }

    .ebook-form-box {
        max-width: 760px;
        margin: 0 auto;
        background: #fff;
        border: 1px solid #e5e9ef;
        border-radius: 12px;
        padding: 35px 40px 40px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
    }

    .ebook-form-title {
        text-align: center;
        margin-bottom: 10px;
        color: #1C3866;
        font-size: 28px;
        font-weight: 700;
    }

    .ebook-form-intro {
        text-align: center;
        color: #666;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .ebook-field {
        position: relative;
        margin-bottom: 20px;
    }

    .ebook-input {
        width: 100%;
        height: 50px;
        border: 1px solid #444;
        border-radius: 6px;
        padding: 0 14px;
        font-size: 14px;
        color: #555;
        box-shadow: none;
    }

    .ebook-input:focus {
        border-color: #1C3866;
        box-shadow: 0 0 0 2px rgba(28, 56, 102, 0.12);
        outline: none;
    }

    .ebook-input.ebook-invalid {
        border-color: #c0392b;
    }

    .ebook-tooltip-error {
        display: none;
        position: absolute;
        right: 0;
        top: -17px;
        background: #fff;
        color: #c0392b;
        font-size: 12px;
        border: 1px solid #c0392b;
        border-radius: 4px;
        padding: 4px 10px;
        z-index: 10;
        white-space: nowrap;
    }

    .ebook-tooltip-error.show {
        display: inline-block;
    }

    #ebook-form-message {
        margin-bottom: 15px;
    }

    #ebook-form-message.success {
        color: #2e7d32;
        background: #e8f5e9;
        border: 1px solid #a5d6a7;
        border-radius: 6px;
        padding: 12px 14px;
        font-size: 14px;
    }

    #ebook-form-message.error {
        color: #c62828;
        background: #ffebee;
        border: 1px solid #ef9a9a;
        border-radius: 6px;
        padding: 12px 14px;
        font-size: 14px;
    }

    .ebook-submit-btn {
        display: block;
        width: 100%;
        background: #1C3866;
        color: #fff;
        border: 0;
        border-radius: 7px;
        padding: 14px 25px;
        font-size: 16px;
        font-weight: 600;
        margin-top: 5px;
        transition: background 0.25s ease;
    }

    .ebook-submit-btn:hover {
        background: #152c52;
    }
    .ebook-free-period {
        color: #1C3866;
        font-size: 16px;
        font-weight: 600;
        margin-top: -15px;
        margin-bottom: 22px;
    }


    /* ============================================================
       RESPONSIVE
    ============================================================ */

    @media (max-width: 991px) {

        .ebook-product-right {
            padding-left: 15px;
            margin-top: 40px;
        }

        .ebook-product-title {
            font-size: 34px;
        }

    }

    @media (max-width: 767px) {

        .ebook-product-page {
            padding: 35px 0 50px;
        }

        .ebook-cover {
            max-width: 300px;
        }

        .ebook-product-title {
            font-size: 30px;
        }

        .ebook-subtitle {
            font-size: 18px;
        }

        .ebook-form-box {
            padding: 25px 20px 30px;
        }

        .ebook-small-links {
            gap: 15px;
        }

    }
</style>


{{-- ============================================================
     HERO / SUB HEADER
============================================================ --}}

<div class="sub_header bg_3">
    <div id="intro_txt">
        <h1><strong>Clinical Research</strong> Excellence Starter Guide</h1>
        <p>A Comprehensive Mini Guide to Clinical Research Career Readiness</p>
    </div>
</div>


{{-- ============================================================
     BREADCRUMB
============================================================ --}}

<div id="position">
    <div class="container">
        <ul>
            <li>
                <a href="{{ url('/') }}">Home</a>
            </li>

            <li>
                Free eBook
            </li>
        </ul>
    </div>
</div>


{{-- ============================================================
     PRODUCT / EBOOK SECTION
============================================================ --}}

<div class="container ebook-product-page">

    <div class="row">

        {{-- ====================================================
             LEFT: EBOOK COVER + PRICE
        ===================================================== --}}

        <div class="col-md-5 col-sm-12 ebook-product-left">

            <div class="ebook-cover-wrap">

                <img
                    src="{{ asset('university/img/Clinical-Research-Excellence-Starter-Guide.jpg') }}"
                    alt="Clinical Research Excellence Starter Guide"
                    class="ebook-cover">

            </div>

            <br>

            <a href="{{ asset('university/files/clinical-research-starter-guide.pdf') }}"
               target="_blank"
               class="ebook-preview-link">

                <i class="icon-eye"></i>
                Preview

            </a>


            {{-- PRICE --}}

            <div class="ebook-price">

                <span class="ebook-old-price">
                    $50
                </span>

                <span class="ebook-free-price">
                    FREE
                </span>

            </div>
            <div class="ebook-free-period">
                <strong>FREE for 2 weeks only</strong>
            </div>


            {{-- CTA --}}

            <a href="#ebook-claim-form"
               class="ebook-claim-btn">

                Get Your Free Guide

            </a>


            <div class="ebook-small-links">

                <a href="#ebook-claim-form">
                    <i class="icon-gift"></i>
                    Free Download
                </a>

                <a href="#ebook-details">
                    <i class="icon-info"></i>
                    Details
                </a>

            </div>

        </div>


        {{-- ====================================================
             RIGHT: EBOOK INFORMATION
        ===================================================== --}}

        <div class="col-md-7 col-sm-12 ebook-product-right">

            {{-- BREADCRUMB --}}

            <div class="ebook-breadcrumb">

                Clinical Research
                <span>›</span>

                Career Resources
                <span>›</span>

                Starter Guide

            </div>


            {{-- TITLE --}}

            <h1 class="ebook-product-title">

                Clinical Research Excellence Starter Guide

            </h1>


            {{-- SUBTITLE --}}

            <div class="ebook-subtitle">

                A Comprehensive Mini Guide to Clinical Research Career Readiness

            </div>


            {{-- AUTHOR / BRAND --}}

            <div class="ebook-author">

                By <strong>Biopharma Academy of Clinical Research</strong>

            </div>


            <hr class="ebook-product-divider">


            {{-- DESCRIPTION --}}

            <div class="ebook-description" id="ebook-details">

                <div class="eyebrow">

                    Build Your Clinical Research Career With Confidence

                </div>

                <p>
                    The <strong>Clinical Research Excellence Starter Guide</strong>
                    is designed to help aspiring and early-career professionals
                    understand the essential knowledge, skills, and preparation
                    needed to move forward in the clinical research field.
                </p>

                <p>
                    This practical mini guide brings together key concepts and
                    career-readiness information in one easy-to-follow resource.
                </p>

                <p>
                    Whether you are exploring clinical research for the first
                    time or preparing to take the next step in your career,
                    this guide gives you a useful starting point.
                </p>

                <ul>
                    <li>Understand the fundamentals of clinical research.</li>
                    <li>Explore key areas of clinical research career readiness.</li>
                    <li>Build awareness of essential industry knowledge.</li>
                    <li>Prepare yourself for your next professional step.</li>
                </ul>

                <p>
                    <strong>
                        Get your copy today — completely FREE.
                    </strong>
                </p>

            </div>

        </div>

    </div>

</div>


{{-- ============================================================
     CLAIM / DOWNLOAD FORM
============================================================ --}}

<div class="ebook-form-section" id="ebook-claim-form">

    <div class="container">

        <div class="ebook-form-box">

            <h2 class="ebook-form-title">
                Get Your FREE Guide
            </h2>

            <p class="ebook-form-intro">
                Enter your details below to access your complimentary
                copy of the Clinical Research Excellence Starter Guide.
            </p>


            <form id="ebook-download-form" novalidate>

                {{-- NAME --}}

                <div class="form-group ebook-field">

                    <input
                        type="text"
                        class="form-control ebook-input"
                        id="ebook_name"
                        name="name"
                        placeholder="*Full Name"
                        required>

                    <span
                        class="ebook-tooltip-error"
                        id="err_name">
                        This field is required
                    </span>

                </div>


                {{-- EMAIL --}}

                <div class="form-group ebook-field">

                    <input
                        type="email"
                        class="form-control ebook-input"
                        id="ebook_email"
                        name="email"
                        placeholder="*Email Address"
                        required>

                    <span
                        class="ebook-tooltip-error"
                        id="err_email">
                        This field is required
                    </span>

                </div>


                {{-- PHONE --}}

                <div class="form-group ebook-field">

                    <input
                        type="tel"
                        class="form-control ebook-input"
                        id="ebook_phone"
                        name="phone"
                        placeholder="*Phone Number"
                        required>

                    <span
                        class="ebook-tooltip-error"
                        id="err_phone">
                        This field is required
                    </span>

                </div>


                <div id="ebook-form-message"></div>


                <button
                    type="submit"
                    class="ebook-submit-btn">

                    Get FREE eBook

                </button>

            </form>

        </div>

    </div>

</div>


@endsection


@push('scripts')

<script>

(function () {

    var form = document.getElementById('ebook-download-form');

    if (!form) {
        return;
    }

    var message = document.getElementById('ebook-form-message');


    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    function showError(id) {

        var element = document.getElementById(id);

        if (element) {
            element.classList.add('show');
        }

    }


    function hideError(id) {

        var element = document.getElementById(id);

        if (element) {
            element.classList.remove('show');
        }

    }


    function markInvalid(id) {

        var element = document.getElementById(id);

        if (element) {
            element.classList.add('ebook-invalid');
        }

    }


    function clearInvalid(id) {

        var element = document.getElementById(id);

        if (element) {
            element.classList.remove('ebook-invalid');
        }

    }


    /*
    |--------------------------------------------------------------------------
    | Remove errors while typing
    |--------------------------------------------------------------------------
    */

    document.getElementById('ebook_name')
        .addEventListener('input', function () {

            if (this.value.trim()) {

                hideError('err_name');
                clearInvalid('ebook_name');

            }

        });


    document.getElementById('ebook_email')
        .addEventListener('input', function () {

            if (this.value.trim()) {

                hideError('err_email');
                clearInvalid('ebook_email');

            }

        });


    document.getElementById('ebook_phone')
        .addEventListener('input', function () {

            if (this.value.trim()) {

                hideError('err_phone');
                clearInvalid('ebook_phone');

            }

        });


    /*
    |--------------------------------------------------------------------------
    | Form Submit
    |--------------------------------------------------------------------------
    */

    form.addEventListener('submit', function (e) {

        e.preventDefault();

        var valid = true;

        message.className = '';
        message.textContent = '';


        var name = document.getElementById('ebook_name');
        var email = document.getElementById('ebook_email');
        var phone = document.getElementById('ebook_phone');


        /*
        |--------------------------------------------------------------------------
        | Name
        |--------------------------------------------------------------------------
        */

        if (!name.value.trim()) {

            showError('err_name');
            markInvalid('ebook_name');

            valid = false;

        } else {

            hideError('err_name');
            clearInvalid('ebook_name');

        }


        /*
        |--------------------------------------------------------------------------
        | Email
        |--------------------------------------------------------------------------
        */

        if (!email.value.trim()) {

            document.getElementById('err_email').textContent =
                'This field is required';

            showError('err_email');
            markInvalid('ebook_email');

            valid = false;

        } else if (
            !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())
        ) {

            document.getElementById('err_email').textContent =
                'Please enter a valid email address';

            showError('err_email');
            markInvalid('ebook_email');

            valid = false;

        } else {

            hideError('err_email');
            clearInvalid('ebook_email');

        }


        /*
        |--------------------------------------------------------------------------
        | Phone
        |--------------------------------------------------------------------------
        */

        if (!phone.value.trim()) {

            showError('err_phone');
            markInvalid('ebook_phone');

            valid = false;

        } else {

            hideError('err_phone');
            clearInvalid('ebook_phone');

        }


        /*
        |--------------------------------------------------------------------------
        | Result
        |--------------------------------------------------------------------------
        */

        if (!valid) {

            message.className = 'error';

            message.textContent =
                'Please complete the highlighted fields and try again.';

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | STATIC VERSION
        |--------------------------------------------------------------------------
        |
        | No Laravel backend is being called.
        |
        */

        message.className = 'success';

        message.textContent =
            'Thank you! Your FREE guide is ready.';


        /*
        |--------------------------------------------------------------------------
        | Download PDF
        |--------------------------------------------------------------------------
        |
        | Change this path to the actual PDF location.
        |
        */

        setTimeout(function () {

            window.open(
                "{{ asset('university/files/clinical-research-starter-guide.pdf') }}",
                '_blank'
            );

        }, 500);

    });

})();

</script>

@endpush