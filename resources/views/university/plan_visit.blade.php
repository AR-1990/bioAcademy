@extends('university.main')
@section('title', 'Visit Biopharma Academy | Explore Our Clinical Research Facilities')
@section('meta_description', 'Schedule a visit to Biopharma Academy and experience our state-of-the-art facilities, meet expert instructors, and learn how we prepare students for successful careers in clinical research.')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

    {{-- id="contact-header" --}}
    <div class="sub_header bg_1">
        <div id="intro_txt">
            <h1>Plan <strong>A</strong> Visit</h1>
            <!--<p>This is Dummy Text, This is Dummy Text </p>-->
        </div>
    </div>
    <div class="container_gray_bg">
        <div class="container add_top_150">
            <div class="row">

                @if (Session::has('error_message'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <strong>Error!</strong>{{ Session::get('error_message') }}.
                    </div>
                @endif

                @if (Session::has('success_message'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <strong>Success!</strong> {{ Session::get('success_message') }}.
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="col-md-9">
                    <div class="box_style_1">


                        <div class="indent_title_in">
                            <i class="pe-7s-look"></i>
                            <h3>Plan a visit</h3>
                        </div>
                        <div class="wrapper_indent">
                            <div id="message-visit"></div>
                            <form method="post" action="{{ route('create_plan_visit') }}" id="visit">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input type="text" class="form-control styled" id="first_name"
                                                name="first_name" placeholder="First name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input type="text" class="form-control styled" id="last_name"
                                                name="last_name" placeholder="Last name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" class="form-control styled"
                                                placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" id="phone_number" name="phone_number" 
                                                class="form-control styled" required>

                                            <span id="mobile_output"></span>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Preferred visit date</label>
                                            <input class="form-control styled" data-date-format="M d, D" type="date"
                                                name="visit_date" id="visit_date" placeholder="Select date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Preferred visit time</label>
                                            <input class="time-pick form-control styled" type="time" name="visit_time"
                                                id="visit_time" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{-- <input type="submit" value="Submit" class="button add_bottom_30"
                                                id="submit-visit"> --}}

                                            <button type="submit" class="button">Submit</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- End wrapper_indent -->
                    </div><!-- End box style 1-->
                </div><!-- End col-md-9 -->

                <aside class="col-md-3">
                    <h3>Contacts info</h3>
                    <hr class="styled">
                    <h4>Address</h4>
                    <p>
                        19255 PARK ROW #205 <br>
                        HOUSTON, TX 77084
                    </p>
                    <h4>Contact Number</h4>
                    <p>
                        (361) 219-6321
                    </p>
                    <h4>Email Address</h4>
                    <p>
                        <a href="mailto:rkoenning@biopharmainfo.net">rkoenning@biopharmainfo.net</a>
                    </p>

                </aside>

            </div><!--End row -->
        </div><!--End container -->
    </div><!--End container_gray_bg -->

    <div class=" container_gray_line" id="newsletter_container">
        <div class="container margin_60">
            <div class="row">

                

                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3>Subscribe to our Newsletter for latest news.</h3>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter" id="newsletter"
                        class="form-inline">
                        <input name="email_newsletter" id="email_newsletter" type="email" value=""
                            placeholder="Your Email" class="form-control">
                        <button id="submit-newsletter" class="button"> Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End newsletter_container -->
    <div id="in-google-map">
        <iframe class="map"
            src="https://www.google.com/maps?q=19255+Park+Row+205,+Houston,+TX+77084&hl=en&z=16&t=m&output=embed"
            height="590" width="100%"></iframe>
    </div><!-- end map-->




    <!-- GOOGLE map -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js??key=&callback=initMap"></script>
    <script type="text/javascript" src="{{ asset('university/js/mapmarker.jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('university/js/mapmarker_func.jquery.js') }}"></script>

    <!-- Date and time pickers -->
    <script src="{{ asset('university/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('university/js/bootstrap-timepicker.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


    <script src="{{ asset('university/js/jquery.validate.js') }}"></script>

    <script>
        $(document).ready(function() {
            // $('#submit-visit').click(function(e) {
            //     e.preventDefault();
            //     var formData = $('#visit').serialize();
            //     $.ajax({
            //         type: 'POST',
            //         url: "{{ route('create_plan_visit') }}",
            //         data: formData,
            //         success: function(data) {
            //             // Handle success response (if needed)
            //             window.location.href = "/";
            //         },
            //         error: function(xhr, status, error) {
            //             // Handle error response
            //             if (xhr.status == 422) {
            //                 var errors = xhr.responseJSON.errors;
            //                 // Remove any existing error messages
            //                 $('.text-danger').remove();
            //                 // Display validation errors for each field
            //                 $.each(errors, function(key, value) {
            //                     $('#' + key).siblings('.text-danger')
            //                 .remove(); // Remove existing error message
            //                     $('#' + key).after('<span class="text-danger">' +
            //                         value + '</span>'); // Display error message
            //                 });
            //             } else {
            //                 // Handle other types of errors (if needed)
            //             }
            //         }
            //     });
            // });


            /******************* visit **************************/
            $("#visit").validate({

                rules: {


                    email: {
                        required: true,
                        email: true,
                        // remote: "{{ Route('CheckEmailExist') }}"

                    },
                    visit_date: {
                        required: true,
                        // date: true
                        customDate: true // Custom validation method for date format


                    }

                },
                messages: {

                    // email: {
                    //     remote: "Email already exist"
                    // },
                    visit_date: {
                        required: "Please select a date.",
                        // date: "Please enter a valid date."
                        customDate: "Please enter a valid date in the format yyyy-mm-dd."

                    }

                },

                submitHandler: function(form) {

                    $("#visit button[type='submit']").attr("disabled", true);
                    $("#visit button[type='submit']").html(
                        "<i class='fa fa-refresh fa-spin'></i>&nbsp;Process");

                    form.submit();

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }

            });

            // Custom validation method for date format
            $.validator.addMethod("customDate", function(value, element) {
                // Regular expression to match the format yyyy-mm-dd
                var regex = /^\d{4}-\d{2}-\d{2}$/;
                return value.match(regex);
            }, "Please enter a valid date in the format dd-mm-yyyy.");

        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

    <script>

        // $('#phone_number').mask('(000) 000-0000');

        const input = document.querySelector("#phone_number");
        const output = document.querySelector("#mobile_output");


        const iti = window.intlTelInput(input, {
            // initialCountry: "auto",
            // separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
            // nationalMode: true,
            // onlyCountries: ["us"] 
            // Limit to United States, Canada, and United Kingdom
            // separateDialCode: true
            // formatOnDisplay: true,
            // hiddenInput: "full_number",
            // preferredCountries: ['usa'],

        });


        // Add an event listener for the 'countrychange' event
        const handleChange = () => {
            let text;
            // intlTelInputUtils.formatNumber(my_number_var, null, intlTelInputUtils.numberFormat.INTERNATIONAL);

            if (input.value) {

                // console.log("input.value " + input.value);
                // console.log("iti.isValidNumber " + iti.isValidNumber);

                text = iti.isValidNumber() ? "Valid number! Full international format: " + iti.getNumber() :
                    "Invalid number - please try again";


                iti.isValidNumber() ? $('#phone_number').focus() : "";

                iti.isValidNumber() ? $("#visit button[type='submit']").attr("disabled", false) : $(
                    "#visit button[type='submit']").attr("disabled", true);



            } else {
                text = "Please enter a valid number below";
            }

            const textNode = document.createTextNode(text);
            output.innerHTML = "";
            output.appendChild(textNode);


        };



        // const iti2 = window.intlTelInput("getSelectedCountryData");
        // console.log(iti2.dialCode); // Country dial code
        // console.log(iti2.minLength); // Minimum length of the phone number for the selected country
        // console.log(iti2.maxLength); // Maximum length of the phone number for the selected country


        input.addEventListener('countrychange', function() {


            console.log("countrychange called");


            var getNumber = iti.getNumber()
            console.log("getNumber " + getNumber);

            // // Get the selected country data
            const selectedCountryData = iti.getSelectedCountryData();

            console.log("selectedCountryData " + selectedCountryData);
            console.dir(selectedCountryData);
            console.dir("countryData.maxLen " + selectedCountryData.maxLen);
            console.log(selectedCountryData.dialCode); // Country dial code
            console.log(selectedCountryData
                .minLength); // Minimum length of the phone number for the selected country
            console.log(selectedCountryData
                .maxLength); //  Maximum length of the phone number for the selected country


            const countryCode = selectedCountryData.iso2;
            console.log("countryCode " + countryCode);

            const numberType = iti.getNumberType();
            console.log("numberType " + numberType);

            var numberTypeLimits = iti.getNumberType(countryCode);

            console.log("numberTypeLimits " + numberTypeLimits);

            console.log("Minimum Length:", numberTypeLimits.minLength);
            console.log("Maximum Length:", numberTypeLimits.maxLength);

            // // Get the selected phone code
            const selectedPhoneCode = selectedCountryData.dialCode;
            console.log("selectedPhoneCode " + selectedPhoneCode);

            // // Log the selected phone code
            // if (selectedPhoneCode) {
            //     input.value = "+" + selectedPhoneCode;
            // }

            const dialCodeLength = selectedCountryData.dialCode.length;
            console.log("dialCodeLength " + dialCodeLength);

        });

        input.addEventListener('change', handleChange);
        input.addEventListener('keyup', handleChange);
    </script>
@endsection
