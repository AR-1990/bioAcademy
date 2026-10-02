@extends('university.main')

@section('title', 'Clinical Research Excellence Program — Feedback | Biopharma Academy')
@section('meta_description', 'Share your feedback about the Clinical Research Excellence Program. Your responses help us improve the program and your experience.')

@section('content')

    <style>
        /* ---------- Intro block ---------- */
        .feedback-intro {
            margin-bottom: 30px;
        }

        .feedback-intro h2 {
            margin-bottom: 12px;
        }

        .feedback-intro p {
            margin-bottom: 0;
            color: #555;
        }

        /* ---------- Option lists (radio / checkbox) ---------- */
        .option-list {
            margin-top: 5px;
        }

        .option-list .option-item {
            display: block;
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .option-list .option-item label {
            font-weight: 400;
            cursor: pointer;
            margin-bottom: 0;
            display: inline-flex;
            align-items: flex-start;
            gap: 8px;
        }

        .option-list .option-item input[type="radio"],
        .option-list .option-item input[type="checkbox"] {
            margin-top: 5px;
            flex: 0 0 auto;
        }

        /* ---------- Conditional (hidden by default) blocks ---------- */
        .conditional-block {
            display: none;
            margin-top: 15px;
            padding: 15px 18px;
            background: #f7f9fc;
            border-left: 3px solid #1c7fbe;
            border-radius: 4px;
        }

        .conditional-block .conditional-title {
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
        }

        /* ---------- Misc ---------- */
        .require {
            color: red;
            font-size: 25px;
        }

        .field-help {
            display: block;
            margin-top: 5px;
            font-size: 13px;
            color: #777;
        }

        .section-question {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        .thank-you-note {
            margin-top: 15px;
            padding: 15px 18px;
            background: #f4fbf7;
            border-left: 3px solid #26a269;
            border-radius: 4px;
        }
    </style>

    <div class="sub_header bg_1">
        <div id="intro_txt">
            <h1>Program <strong>Feedback</strong></h1>
        </div>
    </div>
    <!--End sub_header -->

    <div class="container_gray_bg">

        <div class="container margin_60">
            <div class="row">

                <div class="col-md-9">
                    <div class="box_style_1">

                        {{-- Intro text --}}
                        <div class="feedback-intro">
                            <h2>Clinical Research Excellence Program Feedback</h2>
                            <p>
                                Thank you for your interest in the Clinical Research Excellence Program.
                                Your feedback is important to us as we constantly strive to improve the
                                program and your experience.
                            </p>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success" style="margin-bottom:20px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" style="margin-bottom:20px;">
                                <strong>Please fix the highlighted errors below.</strong>
                            </div>
                        @endif

                        <form action="{{ route('feedback-form.store') }}" id="feedback_form" method="POST">
                            @csrf

                            <!-- ============================================================
                                 Respondent Information
                            ============================================================= -->
                            <div class="indent_title_in">
                                <i class="pe-7s-user"></i>
                                <h3>Respondent Information</h3>
                            </div>
                            <div class="wrapper_indent">
                                <div class="form-group">
                                    <label>Name <span class="require">*</span></label>
                                    <input type="text" class="form-control styled" id="respondent_name"
                                           name="respondent_name" placeholder="Your full name" value="{{ old('respondent_name') }}" required>
                                    @error('respondent_name')
                                        <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="styled_2">

                            <!-- ============================================================
                                 1. Did you decide to enroll?
                            ============================================================= -->
                            <div class="indent_title_in">
                                <i class="pe-7s-note2"></i>
                                <h3>Your decision</h3>
                            </div>
                            <div class="wrapper_indent">

                                <div class="form-group">
                                    <label class="section-question">
                                        1. Did you decide to enroll in the program?
                                        <span class="require">*</span>
                                    </label>
                                    <div class="option-list">
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="enrolled" value="Yes" required {{ old('enrolled') === 'Yes' ? 'checked' : '' }}>
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="enrolled" value="No" {{ old('enrolled') === 'No' ? 'checked' : '' }}>
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                    @error('enrolled')
                                        <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Shown only when "Yes" is selected -->
                                <div class="conditional-block" id="convinced_block">
                                    <span class="conditional-title">If yes, what convinced you about the program?</span>
                                    <div class="option-list">
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="convinced[]" value="Content" {{ in_array('Content', old('convinced', []), true) ? 'checked' : '' }}>
                                                <span>Content</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="convinced[]" value="Hands-on training" {{ in_array('Hands-on training', old('convinced', []), true) ? 'checked' : '' }}>
                                                <span>Hands-on training</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="convinced[]" value="Affordable fee" {{ in_array('Affordable fee', old('convinced', []), true) ? 'checked' : '' }}>
                                                <span>Affordable fee</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="convinced[]" value="Flexibility" {{ in_array('Flexibility', old('convinced', []), true) ? 'checked' : '' }}>
                                                <span>Flexibility — I can complete it while working at my current job</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="convinced[]" value="Other"
                                                       {{ in_array('Other', old('convinced', []), true) ? 'checked' : '' }}
                                                       id="convinced_other_check">
                                                <span>Other</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group conditional-block" id="convinced_other_wrap"
                                         style="background:transparent; border:0; padding:0; margin-top:8px;">
                                        <input type="text" class="form-control styled"
                                               name="convinced_other" placeholder="Please specify" value="{{ old('convinced_other') }}">
                                        @error('convinced_other')
                                            <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <hr class="styled_2">

                            <!-- ============================================================
                                 2. Main reason not enrolled
                            ============================================================= -->
                            <div class="indent_title_in">
                                <i class="pe-7s-info"></i>
                                <h3>Reasons for not enrolling</h3>
                            </div>
                            <div class="wrapper_indent" id="not_enrolled_block">

                                <div class="form-group">
                                    <label class="section-question">
                                        2. If not, what is the main reason you haven't enrolled in the program?
                                    </label>
                                    <div class="option-list">
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="not_enrolled_reason" value="Cost" {{ old('not_enrolled_reason') === 'Cost' ? 'checked' : '' }}>
                                                <span>Cost</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="not_enrolled_reason"
                                                       {{ old('not_enrolled_reason') === "Not sure if it's right for me" ? 'checked' : '' }}
                                                       value="Not sure if it's right for me">
                                                <span>Not sure if it's right for me</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="not_enrolled_reason"
                                                       {{ old('not_enrolled_reason') === 'Not ready to start yet' ? 'checked' : '' }}
                                                       value="Not ready to start yet">
                                                <span>Not ready to start yet</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="not_enrolled_reason"
                                                       {{ old('not_enrolled_reason') === 'Looking for other programs' ? 'checked' : '' }}
                                                       value="Looking for other programs">
                                                <span>Looking for other programs</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="not_enrolled_reason" value="Other"
                                                       {{ old('not_enrolled_reason') === 'Other' ? 'checked' : '' }}
                                                       id="not_enrolled_other_radio">
                                                <span>Other</span>
                                            </label>
                                        </div>
                                    </div>
                                    @error('not_enrolled_reason')
                                        <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group conditional-block" id="not_enrolled_other_wrap"
                                         style="background:transparent; border:0; padding:0; margin-top:8px;">
                                        <input type="text" class="form-control styled"
                                               name="not_enrolled_other" placeholder="Please specify" value="{{ old('not_enrolled_other') }}">
                                        @error('not_enrolled_other')
                                            <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <hr class="styled_2">

                            <!-- ============================================================
                                 3. What would make you more likely to enroll
                            ============================================================= -->
                            <div class="indent_title_in">
                                <i class="pe-7s-light"></i>
                                <h3>What would help you</h3>
                            </div>
                            <div class="wrapper_indent">

                                <div class="form-group">
                                    <label class="section-question">
                                        3. What would make you more likely to enroll?
                                    </label>
                                    <div class="option-list">
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="likely_to_enroll[]"
                                                       {{ in_array('More affordable pricing/payment options', old('likely_to_enroll', []), true) ? 'checked' : '' }}
                                                       value="More affordable pricing/payment options">
                                                <span>More affordable pricing / payment options</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="likely_to_enroll[]"
                                                       {{ in_array('More information about the program', old('likely_to_enroll', []), true) ? 'checked' : '' }}
                                                       value="More information about the program">
                                                <span>More information about the program</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="likely_to_enroll[]"
                                                       {{ in_array('Career/job placement support', old('likely_to_enroll', []), true) ? 'checked' : '' }}
                                                       value="Career/job placement support">
                                                <span>Career / job placement support</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="likely_to_enroll[]"
                                                       {{ in_array('More details about the hands-on training', old('likely_to_enroll', []), true) ? 'checked' : '' }}
                                                       value="More details about the hands-on training">
                                                <span>More details about the hands-on training</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="likely_to_enroll[]"
                                                       {{ in_array('Student/graduate success stories', old('likely_to_enroll', []), true) ? 'checked' : '' }}
                                                       value="Student/graduate success stories">
                                                <span>Student / graduate success stories</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="checkbox" name="likely_to_enroll[]" value="Other"
                                                       {{ in_array('Other', old('likely_to_enroll', []), true) ? 'checked' : '' }}
                                                       id="likely_other_check">
                                                <span>Other</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group conditional-block" id="likely_other_wrap"
                                         style="background:transparent; border:0; padding:0; margin-top:8px;">
                                        <input type="text" class="form-control styled"
                                               name="likely_to_enroll_other" placeholder="Please specify" value="{{ old('likely_to_enroll_other') }}">
                                        @error('likely_to_enroll_other')
                                            <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <hr class="styled_2">

                            <!-- ============================================================
                                 4. Program clarity
                            ============================================================= -->
                            <div class="indent_title_in">
                                <i class="pe-7s-study"></i>
                                <h3>Program understanding</h3>
                            </div>
                            <div class="wrapper_indent">

                                <div class="form-group">
                                    <label class="section-question">
                                        4. How clear is your understanding of what the program offers?
                                        <span class="require">*</span>
                                    </label>
                                    <div class="option-list">
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="program_clarity" value="Very clear" required {{ old('program_clarity') === 'Very clear' ? 'checked' : '' }}>
                                                <span>Very clear</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="program_clarity" value="Somewhat clear" {{ old('program_clarity') === 'Somewhat clear' ? 'checked' : '' }}>
                                                <span>Somewhat clear</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="program_clarity" value="Not clear" {{ old('program_clarity') === 'Not clear' ? 'checked' : '' }}>
                                                <span>Not clear</span>
                                            </label>
                                        </div>
                                    </div>
                                    @error('program_clarity')
                                        <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <hr class="styled_2">

                            <!-- ============================================================
                                 5. Shadow day + contact preference
                            ============================================================= -->
                            <div class="indent_title_in">
                                <i class="pe-7s-news-paper"></i>
                                <h3>Hands-on experience</h3>
                            </div>
                            <div class="wrapper_indent">

                                <div class="form-group">
                                    <label class="section-question">
                                        5. Would you be interested in spending a day with one of our clinical
                                        research coordinators to get a better understanding of the day-to-day
                                        work and hands-on experience in clinical research?
                                        <span class="require">*</span>
                                    </label>
                                    <div class="option-list">
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="shadow_day" value="Yes" required {{ old('shadow_day') === 'Yes' ? 'checked' : '' }}>
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="shadow_day" value="No" {{ old('shadow_day') === 'No' ? 'checked' : '' }}>
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                    @error('shadow_day')
                                        <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Shown only when "Yes" is selected -->
                                <div class="conditional-block" id="contact_preference_block">
                                    <span class="conditional-title">If yes, what is the best way to contact you?</span>
                                    <div class="option-list">
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="contact_method" value="Phone" {{ old('contact_method') === 'Phone' ? 'checked' : '' }}>
                                                <span>Phone</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="contact_method" value="Email" {{ old('contact_method') === 'Email' ? 'checked' : '' }}>
                                                <span>Email</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="contact_method" value="Text Message" {{ old('contact_method') === 'Text Message' ? 'checked' : '' }}>
                                                <span>Text Message</span>
                                            </label>
                                        </div>
                                    </div>
                                    @error('contact_method')
                                        <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group" style="margin-top:15px;">
                                        <label>Contact Information</label>
                                        <input type="text" class="form-control styled" name="contact_information"
                                               placeholder="Phone number or email address" value="{{ old('contact_information') }}">
                                        <span class="field-help">So our team can reach you about the shadow day.</span>
                                        @error('contact_information')
                                            <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <hr class="styled_2">

                            <!-- ============================================================
                                 6. Team follow-up + comments
                            ============================================================= -->
                            <div class="indent_title_in">
                                <i class="pe-7s-mail"></i>
                                <h3>Stay in touch</h3>
                            </div>
                            <div class="wrapper_indent">

                                <div class="form-group">
                                    <label class="section-question">
                                        6. Would you like someone from our team to contact you with more
                                        information about the program?
                                        <span class="require">*</span>
                                    </label>
                                    <div class="option-list">
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="team_contact" value="Yes" required {{ old('team_contact') === 'Yes' ? 'checked' : '' }}>
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                        <div class="option-item">
                                            <label>
                                                <input type="radio" name="team_contact" value="No" {{ old('team_contact') === 'No' ? 'checked' : '' }}>
                                                <span>No</span>
                                            </label>
                                        </div>
                                    </div>
                                    @error('team_contact')
                                        <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Additional Comments or Feedback</label>
                                    <textarea class="form-control styled" name="comments" rows="5"
                                              placeholder="Tell us anything else that would help us improve the program.">{{ old('comments') }}</textarea>
                                    @error('comments')
                                        <div class="text-danger" style="margin-top:6px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <p>
                                    <button type="submit" class="button">Submit Feedback</button>
                                </p>

                                <div class="thank-you-note">
                                    <strong>Thank you!</strong>
                                    We appreciate you taking the time to share your feedback.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="box_side">
                        <h5>Phone</h5> <i class="icon-phone"></i>
                        <p>(361) 219-6321<br>
                            <small>Monday to Friday 9.00am - 5.00pm</small>
                        </p>
                    </div>
                    <hr class="styled">

                    <div class="box_side">
                        <h5>Thank you</h5> <i class="icon_mail"></i>
                        <p>
                            Your feedback helps us shape a better program for future students.
                            Every response is read by our team.
                        </p>
                    </div>

                </div>
            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </div>
    <!--End container_gray_bg -->

    <!-- ============================================================
         Conditional form logic (front-end only)
    ============================================================= -->
    <script>
        $(document).ready(function () {

            /* ---------- Q1: Did you decide to enroll? ---------- */
            function toggleEnrolledBlocks() {
                var selected = $('input[name="enrolled"]:checked').val();

                if (selected === 'Yes') {
                    $('#convinced_block').slideDown();
                    $('#not_enrolled_block').slideUp();
                    $('#not_enrolled_block').find('input[type="radio"]').prop('checked', false);
                    $('#not_enrolled_block').find('input[type="text"]').val('');
                    $('#not_enrolled_other_wrap').hide();
                } else if (selected === 'No') {
                    $('#not_enrolled_block').slideDown();
                    $('#convinced_block').slideUp();
                    $('#convinced_block').find('input[type="checkbox"]').prop('checked', false);
                    $('#convinced_block').find('input[type="text"]').val('');
                    $('#convinced_other_wrap').hide();
                } else {
                    $('#convinced_block, #not_enrolled_block').slideUp();
                }
            }

            $('input[name="enrolled"]').on('change', toggleEnrolledBlocks);
            toggleEnrolledBlocks();

            /* ---------- "Other" text inputs ---------- */
            function toggleOther(triggerSelector, wrapSelector) {
                var $trigger = $(triggerSelector);
                var $wrap = $(wrapSelector);
                var $input = $wrap.find('input[type="text"]');

                function refresh() {
                    var show = $trigger.is(':checked');
                    show ? $wrap.slideDown(150) : $wrap.slideUp(150);
                    $input.prop('required', show);

                    if (!show) {
                        $input.val('');
                    }
                }

                $trigger.on('change', refresh);
                $('input[name="' + $trigger.attr('name') + '"]').on('change', refresh);
                refresh();
            }

            toggleOther('#convinced_other_check', '#convinced_other_wrap');
            toggleOther('#not_enrolled_other_radio', '#not_enrolled_other_wrap');
            toggleOther('#likely_other_check', '#likely_other_wrap');

            /* ---------- Q5: Shadow day / contact preference ---------- */
            function toggleContactPreference() {
                var selected = $('input[name="shadow_day"]:checked').val();
                var isVisible = selected === 'Yes';
                var $contactMethod = $('#contact_preference_block').find('input[name="contact_method"]');
                var $contactInfo = $('#contact_preference_block').find('input[name="contact_information"]');

                if (isVisible) {
                    $('#contact_preference_block').slideDown();
                } else {
                    $('#contact_preference_block').slideUp();
                    $('#contact_preference_block').find('input[type="radio"]').prop('checked', false);
                    $('#contact_preference_block').find('input[type="text"]').val('');
                }

                $contactMethod.prop('required', isVisible);
                $contactInfo.prop('required', isVisible);
            }

            $('input[name="shadow_day"]').on('change', toggleContactPreference);
            toggleContactPreference();

        });
    </script>

@endsection
