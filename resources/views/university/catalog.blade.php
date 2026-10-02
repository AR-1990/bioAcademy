@extends('university.main')
@section('title', 'Course & Publications Catalog | Biopharma Academy of Clinical Research')
@section('meta_description', "Download the Biopharma Academy Course and Publications Catalog. Explore our clinical research training programs, certifications, and publications designed for healthcare and pharmaceutical professionals.")
@section('content')

<style>
    /* ---- Catalog Cover Image ---- */
    .catalog-cover-img {
        width: 100%;
        max-width: 520px;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        display: block;
    }

    /* ---- Form field wrapper (relative for tooltip positioning) ---- */
    .catalog-field {
        position: relative;
        margin-bottom: 18px;
    }

    /* ---- Input fields (Barnett style: simple bordered, rounded) ---- */
    .catalog-input {
        border-radius: 6px;
        height: 48px;
        border: 1px solid #444;
        font-size: 14px;
        color: #555;
        box-shadow: none;
        padding-left: 14px;
        width: 100%;
    }

    .catalog-input:focus {
        border-color: #1C3866;
        box-shadow: 0 0 0 2px rgba(28, 56, 102, 0.12);
        outline: none;
    }

    /* Invalid state: red border like the screenshots */
    .catalog-input.catalog-invalid {
        border: 1px solid #c0392b;
    }

    /* ---- Tooltip-style "This field is required" error ---- */
    .catalog-tooltip-error {
        display: none;
        position: absolute;
        right: 0;
        top: -16px;
        background: #fff;
        color: #c0392b;
        font-size: 13px;
        border: 1px solid #c0392b;
        border-radius: 4px;
        padding: 5px 12px;
        z-index: 10;
        box-shadow: 0 2px 6px rgba(0,0,0,0.12);
        white-space: nowrap;
    }

    /* Tooltip pointer arrow (bottom-left of the tooltip) */
    .catalog-tooltip-error:after,
    .catalog-tooltip-error:before {
        content: '';
        position: absolute;
        top: 100%;
        left: 18px;
        border: solid transparent;
        height: 0;
        width: 0;
        pointer-events: none;
    }
    .catalog-tooltip-error:after {
        border-top-color: #fff;
        border-width: 5px;
        margin-left: 1px;
    }
    .catalog-tooltip-error:before {
        border-top-color: #c0392b;
        border-width: 6px;
    }

    /* Visible state */
    .catalog-tooltip-error.show {
        display: inline-block;
    }

    /* Left-positioned variant for radio/checkbox groups */
    .catalog-tooltip-left {
        right: auto;
        left: 0;
        top: auto;
        bottom: -34px;
    }

    /* ---- Title radio row ---- */
    .catalog-radio-row {
        display: flex;
        flex-wrap: wrap;
        gap: 22px;
        padding: 4px 0;
    }

    .catalog-radio-label {
        font-family: "proxima_nova_rgregular", Arial, sans-serif;
        font-weight: normal;
        font-size: 14px;
        color: #444;
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        margin-bottom: 0;
    }

    .catalog-radio-label input[type="radio"] {
        width: 16px;
        height: 16px;
        margin: 0;
        accent-color: #1C3866;
        cursor: pointer;
    }

    /* ---- Preference sections (communication / marketing / courses) ---- */
    .catalog-pref-group {
        padding-top: 6px;
    }

    .catalog-pref-label {
        font-size: 14px;
        color: #222;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .catalog-option-label {
        display: block;
        font-family: "proxima_nova_rgregular", Arial, sans-serif;
        font-weight: normal;
        font-size: 14px;
        color: #444;
        margin-bottom: 8px;
        cursor: pointer;
    }

    .catalog-option-label input[type="radio"],
    .catalog-option-label input[type="checkbox"] {
        width: 15px;
        height: 15px;
        margin-right: 8px;
        vertical-align: middle;
        accent-color: #1C3866;
        cursor: pointer;
    }

    /* ---- Submit button (Barnett blue style) ---- */
    .catalog-submit-btn {
        background-color: #1C3866;
        color: #fff;
        border-radius: 6px;
        font-size: 15px;
        padding: 12px 28px;
        margin-top: 10px;
    }

    .catalog-submit-btn:hover {
        background-color: #152c52;
    }

    /* ---- Form success/error message box ---- */
    #catalog-form-message.success {
        color: #2e7d32;
        background: #e8f5e9;
        border: 1px solid #a5d6a7;
        border-radius: 6px;
        padding: 10px 14px;
        font-size: 14px;
    }

    #catalog-form-message.error {
        color: #c62828;
        background: #ffebee;
        border: 1px solid #ef9a9a;
        border-radius: 6px;
        padding: 10px 14px;
        font-size: 14px;
    }

    /* ---- Quick Link Cards ---- */
    .catalog-quick-btns {
        margin-top: 10px;
    }

    a.catalog-quick-card {
        display: block;
        background: #fff;
        border: 2px solid #e8edf5;
        border-radius: 14px;
        padding: 30px 20px 24px 20px;
        margin-bottom: 25px;
        color: #444;
        transition: all 0.3s ease;
        text-align: center;
    }

    a.catalog-quick-card:hover {
        border-color: #1C3866;
        transform: translateY(-6px);
        box-shadow: 0 10px 28px rgba(28, 56, 102, 0.13);
        color: #1C3866;
    }

    a.catalog-quick-card i {
        font-size: 52px;
        color: #1C3866;
        display: block;
        margin-bottom: 12px;
        transition: color 0.3s;
    }

    a.catalog-quick-card h4 {
        font-size: 16px;
        text-transform: uppercase;
        margin: 0 0 8px 0;
        font-family: "proxima_novasemibold", Arial, Helvetica, sans-serif;
    }

    a.catalog-quick-card p {
        font-size: 13px;
        color: #777;
        margin: 0;
        line-height: 1.5;
    }

    a.catalog-quick-card:hover p {
        color: #555;
    }

    /* ---- Category Cards ---- */
    .catalog-category-box {
        padding: 28px 28px 20px 28px;
        border-radius: 14px;
        border: 1px solid #e8edf5;
        margin-bottom: 28px;
        transition: all 0.35s ease;
    }

    .catalog-category-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 28px rgba(28, 56, 102, 0.1);
        border-color: #1C3866;
    }

    .catalog-cat-icon {
        font-size: 44px;
        color: #1C3866;
        display: block;
        margin-bottom: 14px;
    }

    .catalog-category-box h4 {
        font-size: 17px;
        margin-top: 0;
        margin-bottom: 10px;
        text-transform: uppercase;
        font-family: "proxima_novasemibold", Arial, Helvetica, sans-serif;
        color: #1C3866;
    }

    .catalog-category-box p {
        font-size: 13px;
        color: #666;
        line-height: 1.6;
        margin-bottom: 12px;
    }

    .catalog-category-box ul.list_style_1 li {
        font-size: 13px;
        color: #555;
        padding-top: 3px;
        padding-bottom: 3px;
    }

    /* ---- Responsive tweaks ---- */
    @media (max-width: 768px) {
        .catalog-cover-img {
            max-width: 100%;
            margin-bottom: 30px;
        }

        .catalog-radio-row {
            gap: 14px;
        }

        .catalog-tooltip-error {
            font-size: 12px;
            padding: 4px 8px;
        }
    }
</style>

    {{-- ============================================================
         HERO / SUB-HEADER
    ============================================================ --}}
    <div class="sub_header bg_3">
        <div id="intro_txt">
            <h1><strong>Course &amp; Publications</strong> Catalog</h1>
            <p>Your complete guide to clinical research training &amp; resources</p>
        </div>
    </div><!-- End sub_header -->

    {{-- ============================================================
         BREADCRUMB
    ============================================================ --}}
    <div id="position">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Catalog</li>
            </ul>
        </div>
    </div>

    {{-- ============================================================
         INTRO + DOWNLOAD FORM
    ============================================================ --}}
    <div class="container margin_60" id="catalog-download">
    <div class="main_title">
        <h2>Explore Our Catalog</h2>
        <p>
            Biopharma Academy's Program Catalog is available for download in PDF format.
            To access your copy, simply complete the form below and click the Download button,
            your catalog will be ready to view instantly.
        </p>
    </div>

    <div class="row">
        {{-- LEFT: Catalog Preview (optional) --}}
        <div class="col-md-10 col-sm-12">
            <div class="catalog-preview-wrap">
                <img src="{{asset('university/img/catalog.jfif')}}"
                     alt="Biopharma Academy Catalog Cover"
                     class="img-responsive catalog-cover-img">
            </div>
            {{-- Keep the contact info for support --}}
            <p style="margin-top: 15px; font-size: 14px; color: #666;">
                If you experience any problems downloading, please contact us at
                <a href="mailto:rkoenning@biopharmainfo.net">rkoenning@biopharmainfo.net</a>
                or call <strong>+1 (361) 219-6321</strong>.
            </p>
        </div>

            {{-- DOWNLOAD FORM --}}
            <div class="col-md-10 col-sm-12">
                <form id="catalog-download-form" method="POST" action="{{ route('university.catalog.download') }}" novalidate>
                    @csrf

                    @if (Session::has('error_message'))
                        <div class="alert alert-danger" style="margin-bottom: 15px;">
                            <strong>Error!</strong> {{ Session::get('error_message') }}
                        </div>
                    @endif

                    @if (Session::has('success_message'))
                        <div class="alert alert-success" style="margin-bottom: 15px;">
                            <strong>Success!</strong> {{ Session::get('success_message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" style="margin-bottom: 15px;">
                            <strong>Error!</strong> Please review the highlighted fields and try again.
                        </div>
                    @endif

                    {{-- Title Radios --}}
                    <div class="form-group catalog-field">
                        <div class="catalog-radio-row">
                            <label class="catalog-radio-label">
                                <input type="radio" name="title" value="Mr" {{ old('title') === 'Mr' ? 'checked' : '' }}> Mr.
                            </label>
                            <label class="catalog-radio-label">
                                <input type="radio" name="title" value="Ms" {{ old('title') === 'Ms' ? 'checked' : '' }}> Ms.
                            </label>
                            <label class="catalog-radio-label">
                                <input type="radio" name="title" value="Mrs" {{ old('title') === 'Mrs' ? 'checked' : '' }}> Mrs.
                            </label>
                            <label class="catalog-radio-label">
                                <input type="radio" name="title" value="Dr" {{ old('title') === 'Dr' ? 'checked' : '' }}> Dr.
                            </label>
                            <label class="catalog-radio-label">
                                <input type="radio" name="title" value="Prof" {{ old('title') === 'Prof' ? 'checked' : '' }}> Prof.
                            </label>
                        </div>
                    </div>

                    {{-- First Name --}}
                    <div class="form-group catalog-field">
                        <input type="text" class="form-control catalog-input" id="cat_first_name"
                               name="first_name" placeholder="*First Name" value="{{ old('first_name') }}" required>
                        <span class="catalog-tooltip-error" id="err_first_name">This field is required</span>
                    </div>

                    {{-- Last Name --}}
                    <div class="form-group catalog-field">
                        <input type="text" class="form-control catalog-input" id="cat_last_name"
                               name="last_name" placeholder="*Last Name" value="{{ old('last_name') }}" required>
                        <span class="catalog-tooltip-error" id="err_last_name">This field is required</span>
                    </div>

                    {{-- Job Title --}}
                    <!--<div class="form-group catalog-field">-->
                    <!--    <input type="text" class="form-control catalog-input" id="cat_job_title"-->
                    <!--           name="job_title" placeholder="*Job Title" required>-->
                    <!--    <span class="catalog-tooltip-error" id="err_job_title">This field is required</span>-->
                    <!--</div>-->

                    {{-- Department --}}
                    <!--<div class="form-group catalog-field">-->
                    <!--    <input type="text" class="form-control catalog-input" id="cat_department"-->
                    <!--           name="department" placeholder="Department">-->
                    <!--</div>-->

                    {{-- Company / Organization --}}
                    <!--<div class="form-group catalog-field">-->
                    <!--    <input type="text" class="form-control catalog-input" id="cat_organization"-->
                    <!--           name="organization" placeholder="*Company/Organization" required>-->
                    <!--    <span class="catalog-tooltip-error" id="err_organization">This field is required</span>-->
                    <!--</div>-->

                    {{-- Mailing Address --}}
                    <div class="form-group catalog-field">
                        <input type="text" class="form-control catalog-input" id="cat_address"
                               name="address" placeholder="Address" value="{{ old('address') }}">
                    </div>

                    {{-- City --}}
                    <!--<div class="form-group catalog-field">-->
                    <!--    <input type="text" class="form-control catalog-input" id="cat_city"-->
                    <!--           name="city" placeholder="City">-->
                    <!--</div>-->

                    {{-- State / Province --}}
                    <!--<div class="form-group catalog-field">-->
                    <!--    <input type="text" class="form-control catalog-input" id="cat_state"-->
                    <!--           name="state" placeholder="State/Province">-->
                    <!--</div>-->

                    {{-- Zip / Postal Code --}}
                    <!--<div class="form-group catalog-field">-->
                    <!--    <input type="text" class="form-control catalog-input" id="cat_zip"-->
                    <!--           name="zip" placeholder="Zip/Postal Code">-->
                    <!--</div>-->

                    {{-- Country --}}
                    <!--<div class="form-group catalog-field">-->
                    <!--    <input type="text" class="form-control catalog-input" id="cat_country"-->
                    <!--           name="country" placeholder="Country">-->
                    <!--</div>-->

                    {{-- Phone --}}
                    <div class="form-group catalog-field">
                        <input type="tel" class="form-control catalog-input" id="cat_phone"
                               name="phone" placeholder="Phone" value="{{ old('phone') }}">
                    </div>

                    {{-- Ext --}}
                    <!--<div class="form-group catalog-field">-->
                    <!--    <input type="text" class="form-control catalog-input" id="cat_ext"-->
                    <!--           name="ext" placeholder="Ext">-->
                    <!--</div>-->

                    {{-- Email --}}
                    <div class="form-group catalog-field">
                        <input type="email" class="form-control catalog-input" id="cat_email"
                               name="email" placeholder="*Email" value="{{ old('email') }}" required>
                        <span class="catalog-tooltip-error" id="err_email">This field is required</span>
                    </div>

                    {{-- Communication Preference --}}
                    <div class="form-group catalog-field catalog-pref-group">
                        <p class="catalog-pref-label">
                            <strong>*I would like to receive future notices and communications from Biopharma Academy
                            relevant to my interests through the following:</strong>
                        </p>
                        <label class="catalog-option-label">
                            <input type="radio" name="communication" value="email" {{ old('communication') === 'email' ? 'checked' : '' }} required> Email
                        </label>
                        <label class="catalog-option-label">
                            <input type="radio" name="communication" value="none" {{ old('communication') === 'none' ? 'checked' : '' }}> None
                        </label>
                        <span class="catalog-tooltip-error catalog-tooltip-left" id="err_communication">This field is required</span>
                    </div>

                    {{-- Marketing Partner Consent --}}
                    <!--<div class="form-group catalog-field catalog-pref-group">-->
                    <!--    <p class="catalog-pref-label">-->
                    <!--        <strong>*We may occasionally send you, via email, industry relevant product &amp; service-->
                    <!--        information on behalf of our marketing partners.</strong>-->
                    <!--    </p>-->
                    <!--    <label class="catalog-option-label">-->
                    <!--        <input type="radio" name="marketing" value="yes" required> Yes, I want to receive this information.-->
                    <!--    </label>-->
                    <!--    <label class="catalog-option-label">-->
                    <!--        <input type="radio" name="marketing" value="no"> No, I do not want to receive this information.-->
                    <!--    </label>-->
                    <!--    <span class="catalog-tooltip-error catalog-tooltip-left" id="err_marketing">This field is required</span>-->
                    <!--</div>-->

                    {{-- Course Interest Checkboxes --}}
                    <!--<div class="form-group catalog-field catalog-pref-group">-->
                    <!--    <p class="catalog-pref-label">-->
                    <!--        <strong>Please send information on these Biopharma Academy Courses:</strong>-->
                    <!--    </p>-->
                    <!--    <label class="catalog-option-label">-->
                    <!--        <input type="checkbox" name="courses[]" value="CTL"> Clinical Trials [CTL]-->
                    <!--    </label>-->
                    <!--    <label class="catalog-option-label">-->
                    <!--        <input type="checkbox" name="courses[]" value="DSF"> Drug Safety &amp; Development [DSF]-->
                    <!--    </label>-->
                    <!--    <label class="catalog-option-label">-->
                    <!--        <input type="checkbox" name="courses[]" value="MDV"> Medical Devices [MDV]-->
                    <!--    </label>-->
                    <!--    <label class="catalog-option-label">-->
                    <!--        <input type="checkbox" name="courses[]" value="PMG"> Project Management [PMG]-->
                    <!--    </label>-->
                    <!--    <label class="catalog-option-label">-->
                    <!--        <input type="checkbox" name="courses[]" value="REG"> Regulatory Compliance [REG]-->
                    <!--    </label>-->
                    <!--    <label class="catalog-option-label">-->
                    <!--        <input type="checkbox" name="courses[]" value="STT"> Research &amp; Statistics [STT]-->
                    <!--    </label>-->
                    <!--</div>-->

                    <div id="catalog-form-message" style="margin-bottom:12px;"></div>

                    <button type="submit" class="button catalog-submit-btn">Download PDF</button>

                </form>
            </div>
        </div><!-- End row -->
    </div><!-- End container #catalog-download -->

    <hr class="more_margin">

    {{-- ============================================================
         QUICK LINKS / ACTION BUTTONS
    ============================================================ --}}
   {{-- <div class="container" id="catalog-quick-links" style="padding-bottom: 40px;">
        <div class="main_title">
            <h2>Explore More Resources</h2>
            <p>Everything you need to advance your clinical research career</p>
        </div>

        <div class="row text-center catalog-quick-btns">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ url('/course') }}" class="catalog-quick-card">
                    <i class="pe-7s-science"></i>
                    <h4>Training Courses</h4>
                    <p>Browse our full library of clinical research training programs.</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ url('/course') }}" class="catalog-quick-card">
                    <i class="pe-7s-note2"></i>
                    <h4>Enroll Now</h4>
                    <p>Ready to get started? Enroll in a program today.</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="#" class="catalog-quick-card">
                    <i class="pe-7s-display2"></i>
                    <h4>On-Demand eLearning</h4>
                    <p>Learn at your own pace with our online course library.</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ url('/course') }}" class="catalog-quick-card">
                    <i class="pe-7s-call"></i>
                    <h4>Contact Us</h4>
                    <p>Have questions? Our team is happy to help you choose the right path.</p>
                </a>
            </div>
        </div>
    </div> --}}
    <!-- End container quick links -->

    {{-- ============================================================
         COURSE CATEGORIES HIGHLIGHT
    ============================================================ --}}
    {{--<div class="container_gray_bg" id="catalog-categories">
        <div class="container margin_60">
            <div class="main_title">
                <h2>What's Inside the Catalog?</h2>
                <p>A comprehensive overview of our programs and publications</p>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="box_style_1 catalog-category-box">
                        <i class="pe-7s-diamond catalog-cat-icon"></i>
                        <h4>Clinical Research Fundamentals</h4>
                        <p>
                            Entry-level and foundational courses covering ICH-GCP guidelines,
                            protocol design, regulatory submissions, and research ethics.
                        </p>
                        <ul class="list_style_1">
                            <li>Introduction to Clinical Trials</li>
                            <li>GCP Certification Program</li>
                            <li>Ethics in Human Subject Research</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="box_style_1 catalog-category-box">
                        <i class="pe-7s-rocket catalog-cat-icon"></i>
                        <h4>Advanced CRA &amp; CRC Training</h4>
                        <p>
                            Intermediate to advanced programs designed for practicing CRAs,
                            CRCs, and site staff seeking career advancement.
                        </p>
                        <ul class="list_style_1">
                            <li>Site Management &amp; Monitoring</li>
                            <li>Risk-Based Monitoring Strategies</li>
                            <li>Investigator Site Management</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="box_style_1 catalog-category-box">
                        <i class="pe-7s-target catalog-cat-icon"></i>
                        <h4>Regulatory Affairs &amp; Compliance</h4>
                        <p>
                            Specialized courses addressing FDA regulations, IND/NDA submissions,
                            pharmacovigilance, and drug safety reporting.
                        </p>
                        <ul class="list_style_1">
                            <li>FDA Regulatory Submissions</li>
                            <li>Pharmacovigilance &amp; Drug Safety</li>
                            <li>21 CFR Part 11 Compliance</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="box_style_1 catalog-category-box">
                        <i class="pe-7s-graph1 catalog-cat-icon"></i>
                        <h4>Data Management &amp; Biostatistics</h4>
                        <p>
                            Courses focused on clinical data management systems, EDC platforms,
                            statistical analysis, and data integrity practices.
                        </p>
                        <ul class="list_style_1">
                            <li>Clinical Data Management Essentials</li>
                            <li>Statistical Intuition for Researchers</li>
                            <li>EDC &amp; CTMS Systems Training</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="box_style_1 catalog-category-box">
                        <i class="pe-7s-note2 catalog-cat-icon"></i>
                        <h4>Publications &amp; Reference Guides</h4>
                        <p>
                            Expert-authored publications including standard operating procedure
                            templates, reference manuals, and clinical research handbooks.
                        </p>
                        <ul class="list_style_1">
                            <li>Clinical Research SOP Templates</li>
                            <li>ICH-GCP Reference Guide</li>
                            <li>Protocol Development Handbook</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="box_style_1 catalog-category-box">
                        <i class="pe-7s-display2 catalog-cat-icon"></i>
                        <h4>On-Site &amp; Custom Training</h4>
                        <p>
                            Tailored on-site programs for pharmaceutical companies, CROs,
                            and research institutions delivered by our expert faculty.
                        </p>
                        <ul class="list_style_1">
                            <li>Corporate On-Site Training</li>
                            <li>Customized Curriculum Development</li>
                            <li>New Employee Onboarding Programs</li>
                        </ul>
                    </div>
                </div>
            </div><!-- End row -->

            <div class="text-center" style="margin-top: 20px;">
                <a href="{{ route('university_getenrolled') }}" class="button_intro">Get Enrolled Today</a>
            </div>
        </div><!-- End container -->
    </div> --}}
    
    <!-- End catalog-categories -->

    {{-- ============================================================
         NEWSLETTER
    ============================================================ --}}
    <div class="container_gray_bg" id="newsletter_container">
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3>Subscribe to our Newsletter for latest news.</h3>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter" id="newsletter"
                          class="form-inline">
                        <input name="email_newsletter" id="email_newsletter" type="email" value=""
                               placeholder="Your Email" class="form-control">
                        <button id="submit-newsletter" class="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End newsletter_container -->

@endsection



@push('scripts')
<script>
    (function () {
        var form = document.getElementById('catalog-download-form');
        var downloadWindowName = 'catalogDownloadTab';
        if (!form) return;

        var msgBox = document.getElementById('catalog-form-message');

        // ---------- Helpers ----------
        function showTooltip(errId) {
            var el = document.getElementById(errId);
            if (el) el.classList.add('show');
        }

        function hideTooltip(errId) {
            var el = document.getElementById(errId);
            if (el) el.classList.remove('show');
        }

        function markInvalid(inputId) {
            var el = document.getElementById(inputId);
            if (el) el.classList.add('catalog-invalid');
        }

        function clearInvalid(inputId) {
            var el = document.getElementById(inputId);
            if (el) el.classList.remove('catalog-invalid');
        }

        function clearAll() {
            ['err_first_name', 'err_last_name', 'err_email', 'err_communication'].forEach(hideTooltip);

            ['cat_first_name', 'cat_last_name', 'cat_email'].forEach(clearInvalid);

            msgBox.className = '';
            msgBox.textContent = '';
        }

        // Required text fields map: inputId -> errorId
        var requiredFields = [
            { input: 'cat_first_name', err: 'err_first_name' },
            { input: 'cat_last_name',  err: 'err_last_name'  },
            { input: 'cat_email',      err: 'err_email'      }
        ];

        // Hide tooltip as soon as user starts typing in a required field
        requiredFields.forEach(function (f) {
            var el = document.getElementById(f.input);
            if (el) {
                el.addEventListener('input', function () {
                    if (el.value.trim()) {
                        hideTooltip(f.err);
                        clearInvalid(f.input);
                    }
                });
            }
        });

        // Hide group tooltips when a radio gets selected
        document.querySelectorAll('input[name="communication"]').forEach(function (r) {
            r.addEventListener('change', function () { hideTooltip('err_communication'); });
        });
        // ---------- Submit handler ----------
        form.addEventListener('submit', function (e) {
            clearAll();

            var isValid = true;
            var submitButton = form.querySelector('button[type="submit"]');

            // 1. Required text fields
            requiredFields.forEach(function (f) {
                // Email is checked separately for format below
                if (f.input === 'cat_email') return;
                var val = document.getElementById(f.input).value.trim();
                if (!val) {
                    showTooltip(f.err);
                    markInvalid(f.input);
                    isValid = false;
                }
            });

            // 2. Email: required + format
            var emailEl = document.getElementById('cat_email');
            var email = emailEl.value.trim();
            var emailErrEl = document.getElementById('err_email');
            if (!email) {
                emailErrEl.textContent = 'This field is required';
                showTooltip('err_email');
                markInvalid('cat_email');
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                emailErrEl.textContent = 'Please enter a valid email address';
                showTooltip('err_email');
                markInvalid('cat_email');
                isValid = false;
            }

            // 3. Communication preference (required radio)
            if (!document.querySelector('input[name="communication"]:checked')) {
                showTooltip('err_communication');
                isValid = false;
            }

            // ---------- Result ----------
            if (!isValid) {
                e.preventDefault();
                msgBox.className = 'error';
                msgBox.textContent = 'Please correct the highlighted fields and try again.';

                // Scroll to first visible tooltip
                var firstVisible = document.querySelector('.catalog-tooltip-error.show');
                if (firstVisible) {
                    firstVisible.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return;
            }

            // Submit the form directly to a named tab so the backend response can open there.
            msgBox.className = 'success';
            msgBox.textContent = 'Thank you. Your catalog download is being prepared.';
            form.setAttribute('target', downloadWindowName);

            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Preparing Download...';
            }
        });
    })();
</script>
@endpush
