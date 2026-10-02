@extends('university.main')
@section('content')
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

                <div class="col-md-9">
                    <div class="box_style_1">
                        <form action="{{route('university_get_enrolled')}}" id="apply_online" method="POST">
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
                                            <input type="text" class="form-control styled required" id="first_name"
                                                name="first_name" placeholder="First name" value="{{ old('first_name') }}">
                                        </div>
                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                     
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input type="text" class="form-control styled required" id="last_name"
                                                name="last_name" placeholder="Last name" value="{{ old('last_name') }}">
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
                                                name="email" placeholder="youremail@domain.com" value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" class="form-control styled required" id="phone_number"
                                                name="phone_number" placeholder="XXX XXX XXXX" value="{{ old('phone_number') }}">
                                        </div>
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
                                            <!-- <div class="radio_inline">
                                                <input type="radio" name="gender" id="gender_male"
                                                    class="required" value="Male"><label
                                                    style="margin-right:20px;">Male</label>
                                                <input type="radio" name="gender" id="gender_female"
                                                    class="required" value="Female"><label>Female</label>
                                            </div> -->
                                            <select name="gender" id="gender" class="form-control" value="{{ old('gender') }}">
                                                <option ></option>
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
                                                name="address_line" placeholder="Your full address" value="{{ old('address_line') }}">
                                        </div>
                                        @error('address_line')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control styled required" id="city"
                                                name="city" placeholder="Town" value="{{ old('city') }}">
                                        </div>
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- End row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <div class="styled-select">
                                            <select class="form-control required" name="country" id="country" value="{{ old('country') }}">
                                                <option value="" selected>Select your country</option>
                                                <option value="USA">USA</option>
                                                <option value="Europe">Europe</option>
                                                <option value="Asia">Asia</option>
                                                <option value="North America">North America</option>
                                                <option value="South America">South America</option>
                                            </select>
                                        </div>
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="number" class="form-control styled required"
                                                id="postal_code" name="postal_code" placeholder="001238" value="{{ old('postal_code') }}">
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
                                <p><button type="submit" class="button">Submit</button></p>
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
                        <p>(281) 944-3610<br><small>Monday to Friday 9.00am - 5.00pm</small></p>
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
@endsection
