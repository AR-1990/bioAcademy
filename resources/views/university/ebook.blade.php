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

    .ebook-field-error {
        color: #c0392b;
        font-size: 13px;
        margin: 6px 2px 0;
        line-height: 1.4;
    }

    .alert-global {
        border-radius: 8px;
        padding: 14px 16px;
        margin-bottom: 22px;
        font-size: 14px;
        line-height: 1.55;
    }

    .alert-global.error {
        color: #c62828;
        background: #ffebee;
        border: 1px solid #ef9a9a;
    }

    .alert-global.success {
        color: #2e7d32;
        background: #e8f5e9;
        border: 1px solid #a5d6a7;
    }

    .ebook-download-banner {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 24px;
        background: linear-gradient(135deg, #1c3866 0%, #264e8c 100%);
        border-radius: 12px;
        color: #fff;
        margin-bottom: 22px;
        box-shadow: 0 8px 24px rgba(28, 56, 102, 0.22);
    }

    .ebook-dl-icon-box {
        flex: 0 0 auto;
        width: 58px;
        height: 58px;
        border-radius: 14px;
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .ebook-dl-content h3 {
        color: #fff;
        margin: 0 0 6px;
        font-size: 20px;
        font-weight: 700;
    }

    .ebook-dl-content p {
        margin: 0 0 14px;
        color: rgba(255,255,255,0.9);
        font-size: 14px;
        line-height: 1.5;
    }

    .ebook-dl-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 20px;
        background: #fff;
        color: #1c3866;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
        transition: transform .15s ease, box-shadow .15s ease;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }

    .ebook-dl-btn:hover {
        color: #1c3866;
        transform: translateY(-1px);
        box-shadow: 0 5px 14px rgba(0,0,0,0.22);
    }

    @media (max-width: 600px) {
        .ebook-download-banner {
            flex-direction: column;
            gap: 14px;
            padding: 20px;
        }
        .ebook-dl-icon-box {
            width: 48px;
            height: 48px;
            font-size: 22px;
        }
        .ebook-dl-content h3 {
            font-size: 18px;
        }
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


            <form id="ebook-download-form"
                  method="POST"
                  action="{{ route('university.ebook.download') }}"
                  novalidate>

                @csrf

                @if (session('ebook_download_ready') && !empty(session('ebook_download_autourl')))
                    <div class="ebook-download-banner">
                        <div class="ebook-dl-icon-box">
                            <i class="icon-book-open"></i>
                        </div>
                        <div class="ebook-dl-content">
                            <h3>Your Free Guide is Ready!</h3>
                            <p>Your download should begin automatically in a moment. If it doesn&rsquo;t, click the button below.</p>
                            <a href="{{ session('ebook_download_autourl') }}"
                               class="ebook-dl-btn"
                               target="_blank"
                               rel="noopener"
                               id="ebook-manual-download-btn">
                                <i class="icon-download"></i>
                                Download PDF Now
                            </a>
                            <small style="opacity:.8;display:block;margin-top:10px;">
                                A copy has also been sent to your email inbox.
                            </small>
                        </div>
                    </div>
                    <script>
                        (function () {
                            var url = @json(session('ebook_download_autourl'));
                            if (url) {
                                setTimeout(function () {
                                    var a = document.createElement('a');
                                    a.href = url;
                                    a.target = '_blank';
                                    a.rel = 'noopener';
                                    document.body.appendChild(a);
                                    a.click();
                                    try { document.body.removeChild(a); } catch (e) {}
                                }, 600);
                            }
                        })();
                    </script>
                @endif

                @if (session('error_message'))
                    <div class="alert-global error">
                        {{ session('error_message') }}
                    </div>
                @endif

                @if (session('success_message') && !session('ebook_download_ready'))
                    <div class="alert-global success">
                        {{ session('success_message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert-global error">
                        <strong>Please fix the following errors:</strong>
                        <ul style="margin:6px 0 0 20px; padding:0;">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden"
                       name="form_type"
                       value="{{ old('form_type', $prefill['form_type']) }}">

                <div class="form-group ebook-field">

                    <input
                        type="text"
                        class="form-control ebook-input @error('name') ebook-invalid @enderror"
                        id="ebook_name"
                        name="name"
                        value="{{ old('name', $prefill['name']) }}"
                        placeholder="*Full Name"
                        maxlength="150"
                        required>

                    <span class="ebook-tooltip-error" id="err_name" data-default="Please enter your full name.">
                        Please enter your full name.
                    </span>

                    @error('name')
                        <p class="ebook-field-error">{{ $message }}</p>
                    @enderror

                </div>


                <div class="form-group ebook-field">

                    <input
                        type="email"
                        class="form-control ebook-input @error('email') ebook-invalid @enderror"
                        id="ebook_email"
                        name="email"
                        value="{{ old('email', $prefill['email']) }}"
                        placeholder="*Email Address"
                        maxlength="190"
                        required>

                    <span class="ebook-tooltip-error" id="err_email" data-default="Please enter a valid email address.">
                        Please enter a valid email address.
                    </span>

                    @error('email')
                        <p class="ebook-field-error">{{ $message }}</p>
                    @enderror

                </div>


                <div class="form-group ebook-field">

                    <input
                        type="tel"
                        class="form-control ebook-input @error('phone') ebook-invalid @enderror"
                        id="ebook_phone"
                        name="phone"
                        value="{{ old('phone', $prefill['phone']) }}"
                        placeholder="*Phone Number"
                        maxlength="30"
                        required>

                    <span class="ebook-tooltip-error" id="err_phone" data-default="Please enter your phone number.">
                        Please enter your phone number.
                    </span>

                    @error('phone')
                        <p class="ebook-field-error">{{ $message }}</p>
                    @enderror

                </div>


                <div id="ebook-form-bottom-message"></div>


                <button type="submit" class="ebook-submit-btn">
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
    if (!form) return;

    var message = document.getElementById('ebook-form-bottom-message');

    var NAME_REGEX  = /^[\p{L}\p{M}\s\-\.\']+$/u;
    var EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

    function setTooltip(id, msg) {
        var el = document.getElementById(id);
        if (el) {
            if (msg) el.textContent = msg;
            el.classList.add('show');
        }
    }
    function clearTooltip(id) {
        var el = document.getElementById(id);
        if (el) {
            var def = el.getAttribute('data-default');
            if (def) el.textContent = def;
            el.classList.remove('show');
        }
    }
    function mark(id, bad) {
        var el = document.getElementById(id);
        if (!el) return;
        if (bad) el.classList.add('ebook-invalid');
        else     el.classList.remove('ebook-invalid');
    }

    var nameEl  = document.getElementById('ebook_name');
    var emailEl = document.getElementById('ebook_email');
    var phoneEl = document.getElementById('ebook_phone');

    function validateName(silent) {
        if (!nameEl) return true;
        var v = nameEl.value.trim();
        if (!v) {
            if (!silent) { setTooltip('err_name', 'Please enter your full name.'); mark('ebook_name', true); }
            return false;
        }
        if (v.length < 2) {
            if (!silent) { setTooltip('err_name', 'Name must be at least 2 characters.'); mark('ebook_name', true); }
            return false;
        }
        if (v.length > 150) {
            if (!silent) { setTooltip('err_name', 'Name cannot exceed 150 characters.'); mark('ebook_name', true); }
            return false;
        }
        if (!NAME_REGEX.test(v)) {
            if (!silent) { setTooltip('err_name', 'Name can only contain letters, spaces, hyphens, dots, and apostrophes.'); mark('ebook_name', true); }
            return false;
        }
        if (!silent) { clearTooltip('err_name'); mark('ebook_name', false); }
        return true;
    }

    function validateEmail(silent) {
        if (!emailEl) return true;
        var v = emailEl.value.trim();
        if (!v) {
            if (!silent) { setTooltip('err_email', 'Please enter your email address.'); mark('ebook_email', true); }
            return false;
        }
        if (v.length > 190) {
            if (!silent) { setTooltip('err_email', 'Email cannot exceed 190 characters.'); mark('ebook_email', true); }
            return false;
        }
        if (!EMAIL_REGEX.test(v)) {
            if (!silent) { setTooltip('err_email', 'Please enter a valid email address (e.g. name@example.com).'); mark('ebook_email', true); }
            return false;
        }
        if (!silent) { clearTooltip('err_email'); mark('ebook_email', false); }
        return true;
    }

    function validatePhone(silent) {
        if (!phoneEl) return true;
        var v = phoneEl.value.trim();
        if (!v) {
            if (!silent) { setTooltip('err_phone', 'Please enter your phone number.'); mark('ebook_phone', true); }
            return false;
        }
        if (v.length > 30) {
            if (!silent) { setTooltip('err_phone', 'Phone number cannot exceed 30 characters.'); mark('ebook_phone', true); }
            return false;
        }
        if (!silent) { clearTooltip('err_phone'); mark('ebook_phone', false); }
        return true;
    }

    if (nameEl) {
        nameEl.addEventListener('input',  function () { validateName(false); });
        nameEl.addEventListener('blur',   function () { validateName(false); });
    }
    if (emailEl) {
        emailEl.addEventListener('input', function () { validateEmail(false); });
        emailEl.addEventListener('blur',  function () { validateEmail(false); });
    }
    if (phoneEl) {
        phoneEl.addEventListener('input', function () { validatePhone(false); });
        phoneEl.addEventListener('blur',  function () { validatePhone(false); });
    }

    form.addEventListener('submit', function (e) {

        if (message) {
            message.className = '';
            message.textContent = '';
        }

        var okName  = validateName(false);
        var okEmail = validateEmail(false);
        var okPhone = validatePhone(false);

        if (!(okName && okEmail && okPhone)) {
            e.preventDefault();
            if (message) {
                message.className = 'error';
                message.style.cssText = 'color:#c62828;background:#ffebee;border:1px solid #ef9a9a;border-radius:6px;padding:12px 14px;font-size:14px;';
                message.textContent = 'Please fix the highlighted fields and try again.';
            }
            var firstErr = form.querySelector('.ebook-invalid');
            if (firstErr && typeof firstErr.focus === 'function') firstErr.focus();
            return;
        }

        var btn = form.querySelector('.ebook-submit-btn');
        if (btn) {
            btn.disabled = true;
            btn.style.opacity = '0.7';
            btn.textContent = 'Processing…';
        }
    });

})();

</script>

@endpush