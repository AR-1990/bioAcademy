@extends('university.main')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

    <style>
        #mobile_output {
            display: block;
            margin-top: 5px;
            font-size: 13px;
        }
    </style>
    <div class="sub_header bg_1">
        <div id="intro_txt">
            <h1>Online <strong>Apply</strong> Course</h1>
            <p>This is Dummy Text, This is Dummy Text </p>
        </div>
    </div>
    <!--End sub_header -->

    <div class="container_gray_bg">


        <div class="container margin_60">
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
                        <form action="{{ route('university_get_enrolled') }}" id="apply_online" method="POST">
                            @csrf
                            <div class="indent_title_in">
                                <i class="pe-7s-user"></i>
                                <h3>Personal details</h3>
                                <p>This is Dummy Text This is Dummy Text.</p>
                            </div>
                            <div class="wrapper_indent">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input type="text" class="form-control styled" id="first_name"
                                                   name="first_name" placeholder="First name"
                                                   value="{{ old('first_name') }}"
                                                   required>
                                        </div>
                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input type="text" class="form-control styled required" id="last_name"
                                                   name="last_name" placeholder="Last name"
                                                   value="{{ old('last_name') }}">
                                        </div>
                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- End row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control styled required" id="email"
                                                   name="email" placeholder="youremail@domain.com"
                                                   value="{{ old('email') }}" required>
                                        </div>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" class="form-control styled required" id="phone_number"
                                                   name="phone_number" placeholder="" value="{{ old('phone_number') }}">
                                        </div>
                                        <span id="mobile_output"></span>
                                        @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- End row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of birth</label>
                                            <input type="date" class="form-control styled required" id="dob"
                                                   name="dob" placeholder="year/mm/dd" value="{{ old('dob') }}">



                                        </div>
                                        @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label><br>

                                            <select name="gender" id="gender" class="form-control"
                                                    value="{{ old('gender') }}" required>
                                                <option value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        @error('gender')
                                        <span class="text-danger ">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div><!-- End row -->
                            </div>
                            <hr class="styled_2">
                            <div class="indent_title_in">
                                <i class="pe-7s-map-marker"></i>
                                <h3>Address</h3>
                                <p>This is Dummy Text This is Dummy Text.</p>
                            </div>
                            <div class="wrapper_indent">


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address line</label>
                                            <input type="text" class="form-control styled required" id="address_line"
                                                   name="address_line" placeholder="Your full address"
                                                   value="{{ old('address_line') }}">
                                        </div>
                                        @error('address_line')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <div class="styled-select">
                                            <select class="form-control " name="country" id="country"
                                                    required>
                                                <option value="">Select your country</option>
                                                @if (!empty($countries))
                                                    @foreach ($countries as $countriesKey => $countriesValue)
                                                        <option value="{{ $countriesValue['name'] }}">
                                                            {{ $countriesValue['name'] }}</option>
                                                    @endforeach
                                                @endif
                                                {{-- <option value="USA">USA</option>
                                                        <option value="Europe">Europe</option>
                                                        <option value="Asia">Asia</option>
                                                        <option value="North America">North America</option>
                                                        <option value="South America">South America</option> --}}
                                            </select>
                                        </div>
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </div><!-- End row -->

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            {{-- <input type="text" class="form-control styled required" id="city"
                                                        name="city" placeholder="Town" value="{{ old('city') }}"> --}}

                                            <select class="form-control " name="city" id="city"
                                                    required>
                                                <option value="">Select your city</option>

                                            </select>
                                        </div>
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="number" class="form-control styled required" id="postal_code"
                                                   name="postal_code" placeholder="001238" value="{{ old('postal_code') }}">
                                        </div>
                                        @error('postal_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>


                            </div>

                            <hr class="styled_2">

                            <div class="wrapper_indent">
                                <!-- <div class="form-group">
                                                                <input type="checkbox" name="policy_terms" id="policy_terms" class="required"
                                                                    value="Yes"><label>I accept <a href="#0">terms and conditions</a> and
                                                                    general
                                                                    policy.</label>
                                                            </div> -->
                                <p>
                                    <button type="submit" class="button">Submit</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">

                    <h4><strong>How to apply</strong></h4>
                    <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text</p>

                    <div class="box_side">
                        <h5>Phone</h5> <i class="icon-phone"></i>
                        <p>(281) 944-3610<br>
                            <small>Monday to Friday 9.00am - 5.00pm</small>
                        </p>
                    </div>
                    <hr class="styled">
                    <div class="box_side">
                        <h4>Plan a visit</h4> <i class="icon_pencil-edit"></i>
                        <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text.</p>
                        <a href="{{ url('/plan_visit') }}" class="button small">Plan a visit</a>
                    </div>

                </div>
            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </div>
    <!--End container_gray_bg -->

    <div class="container margin_60">
        <div class="main_title">
            <h2>Frequently Asked Questions</h2>
            <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text.</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>This is Dummy Question?</h4>
                    <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>This is Dummy Question?</h4>
                    <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>This is Dummy Question?</h4>
                    <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text.</p>
                </div>
            </div>
        </div>
        <!--End row -->
        <div class="row">
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>This is Dummy Question?</h4>
                    <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>This is Dummy Question?</h4>
                    <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4>This is Dummy Question?</h4>
                    <p>This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text This is Dummy Text
                        This is Dummy Text This is Dummy Text.</p>
                </div>
            </div>
        </div>
        <!--End row -->
    </div>
    <!--End container -->

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

    <!-- Specific scripts -->
    <script src="{{ asset('university/js/icheck.js') }}"></script>
    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue'
        });
    </script>
    <script src="{{ asset('university/js/jquery.validate.js') }}"></script>
    <script>
        // $("#apply_online").validate();
    </script>


    <script>
        /******************* apply_online **************************/
        $("#apply_online").validate({

            rules: {


                email: {
                    required: true,
                    email: true,
                    remote: "{{ Route('CheckEmailExist') }}"

                }

            },
            messages: {

                email: {
                    remote: "Email already exist"
                }

            },

            submitHandler: function (form) {

                $("#apply_online button[type='submit']").attr("disabled", true);
                $("#apply_online button[type='submit']").html(
                    "<i class='fa fa-refresh fa-spin'></i>&nbsp;Process");

                form.submit();

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }

        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

    <script>
        const input = document.querySelector("#phone_number");
        const output = document.querySelector("#mobile_output");

        const iti = window.intlTelInput(input, {
            // initialCountry: "auto",
            // separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        });


        // Add an event listener for the 'countrychange' event
        const handleChange = () => {
            let text;
            // intlTelInputUtils.formatNumber(my_number_var, null, intlTelInputUtils.numberFormat.INTERNATIONAL);

            if (input.value) {

                // console.log("input.value " + input.value);
                // console.log("iti.isValidNumber " + iti.isValidNumber);

                text = iti.isValidNumber() ?
                    "Valid number! Full international format: " + iti.getNumber() :
                    "Invalid number - please try again";


                iti.isValidNumber() ? $('#phone_number').focus() : "";

                iti.isValidNumber() ? $("#apply_online button[type='submit']").attr("disabled", false) : $(
                    "#apply_online button[type='submit']").attr("disabled", true);

            } else {
                text = "Please enter a valid number below";
            }
            const textNode = document.createTextNode(text);
            output.innerHTML = "";
            output.appendChild(textNode);


        };

        input.addEventListener('countrychange', function () {
            console.log("countrychange called");
            // // Get the selected country data
            const selectedCountryData = iti.getSelectedCountryData();
            //
            // // Get the selected phone code
            const selectedPhoneCode = selectedCountryData.dialCode;
            //
            // // Log the selected phone code
            // if (selectedPhoneCode) {
            //     input.value = "+" + selectedPhoneCode;
            // }


        });

        input.addEventListener('change', handleChange);
        input.addEventListener('keyup', handleChange);

        /* country */
        $('#country').change(function () {

            var selectedCountry = $(this).val();
            // console.log("selectedCountry " + selectedCountry);

            var base_url = '{!! Route('cities') !!}';
            // console.log("base_url " + base_url);

            $.ajax({
                url: base_url,
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: selectedCountry
                },

                dataType: 'json',
                beforeSend: function () {

                    $('select[name="city"]').html('<option value="">Loading....</option>');
                },

                success: function (resp) {
                    // console.log("resp id " + resp.id);
                    // console.log("resp status " + resp['status']);
                    // console.log("resp " + resp);
                    // console.log("resp length " + resp.length);
                    // console.log("resp " + JSON.stringify(resp));


                    if (resp['status'] === true) {


                        var Html = "";
                        // if (resp.length > 0) {

                        $.each(resp['cities'], function (key, value) {

                            // console.log("key " + key);
                            // console.log("value " + value);
                            // console.log("id " + resp['cities'][key].id);
                            // console.log("name " + resp['cities'][key].name);

                            Html += '<option value="' + resp['cities'][key].name + '">' + resp[
                                'cities'][key]
                                .name + '</option>';

                        });

                        $('select[name="city"]').html(Html);

                        // } else {
                        //     $('select[name="city"]').html(
                        //     '<option>Data not available....</option>');

                        // }


                    } else {

                        $('select[name="city"]').html(
                            '<option value="">Data not available....</option>');
                    }


                }
            });


        });
    </script>

@endsection
