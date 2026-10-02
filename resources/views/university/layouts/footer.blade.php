<footer>
        <div class="container">
            <div class="row ">
                <div class="col-md-4 col-sm-4">
                    <p id="logo_footer">
                        <img src="{{ asset('university/img/academy-logo-white.png') }}" width="100%" height="auto" alt="biopharma"
                            data-retina="true">
                    </p>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ url('/about') }}">About us</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/signup') }}">Register</a></li>
                        <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                        <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-2">
                    <h4>Academic</h4>
                    <ul>
                        <!-- <li><a href="#">Plans of study</a></li> -->
                        <li><a href="{{ route('university_getenrolled') }}">Course Details</a></li>
                        <li><a href="{{ route('university_getenrolled') }}">Get Enrolled</a></li>
                        <li><a href="{{ route('university.faqs') }}">FAQs</a></li>
                        <li><a href="{{ route('university.catalog') }}">Catalog</a></li>
                        
                        <!-- <li><a href="#">Staff</a></li> -->
                        <!--<li><a href="{{ url('alumni') }}">Our Alumni</a></li>-->
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h4>Contact</h4>
                    <ul>
                        <li><a href="{{ url('contact') }}">Contacts Us</a></li>
                        <li><a href="{{ url('plan_visit') }}">Plan a visit</a></li>
                    </ul>
                    <ul id="contacts_footer">
                        <li>Info line - <a href="tel:(361) 219-6321">(361) 219-6321</a></li>
                        <li>Email - <a href="mailto:rkoenning@biopharmainfo.net">rkoenning@biopharmainfo.net</a></li>
                    </ul>
                    <ul class="socialIconList">
                        <li>
                            <a href="https://www.instagram.com/biopharma.academy/" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://www.facebook.com/Biopharmaacademy" target="_blank">
                               <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/biopharma-academy-of-clinical-research/" target="_blank">
                               <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="https://www.youtube.com/@BiopharmaAOCR" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->
    <div id="copy">
        <div class="container">
            © Biopharma Academy Of Clinical Research 2026 - All rights reserved.
        </div>
    </div>
    <!-- End copy -->
<!-- Float Icon Start -->
<div class="float-sm socialIconFloatBox">
	<div class="fl-fl float-fb">
		<i class="fab fa-facebook"></i>
		<a href="https://www.facebook.com/Biopharmaacademy" target="_blank">Follow us!</a>
	</div> 
	<div class="fl-fl float-rs">
	     <i class="fab fa-instagram"></i>
		<!--<img src="https://tristarfinance.com/assets/img/icons/x-twitter-white.webp" style="width: 18px; filter: brightness(100); margin: 0px 9px;" />-->
		<a href="https://www.instagram.com/biopharma.academy/" target="_blank">Follow us!</a>
	</div> 
	 <div class="fl-fl float-gp">
		<i class="fab fa-linkedin"></i>
		<a href="https://www.linkedin.com/company/biopharma-academy-of-clinical-research/" target="_blank">Follow us!</a>
	</div> 
	 <div class="fl-fl float-tw">
		<i class="fab fa-youtube"></i>
		<a href="https://www.youtube.com/@BiopharmaAOCR" target="_blank">Subscribe us!</a>
	</div> 
	
	 
	<!--<div class="fl-fl float-gp">-->
	<!--	<i class="fab fa-whatsapp"></i>-->
	<!--	<a href="https://wa.me/3213477432" target="_blank">Chat with us!</a>-->
	<!--</div>-->
</div>
<!-- Float Icon End -->

<style>
    /* Float Icon Start */
.socialIconFloatBox .fl-fl {
  display: flex;
  flex-direction: row;
  align-items: center;
  border-radius: 10px 0px 0px 10px;
  background: linear-gradient(53deg, #1C3866 32%, #1c3866 63%, #0084af 82%, #1C3866 100%);
  text-transform: uppercase;
  letter-spacing: 3px;
  padding: 3px;
  width: 190px;
  position: fixed;
  right: -152px;
  z-index: 1000;
  font: normal normal 10px Arial;
  -webkit-transition: all .25s ease;
  -moz-transition: all .25s ease;
  -ms-transition: all .25s ease;
  -o-transition: all .25s ease;
  transition: all .25s ease;
}

.socialIconFloatBox .svg-inline--fa {
  font-size: 20px;
  margin: 0px 9px;
  color: #fff;
}

.fl-fl a {
  color: #fff !important;
  text-decoration: none;
  text-align: center;
  line-height: 43px !important;
  vertical-align: top !important;
}

.float-fb {
  top: 160px;
}

.float-tw {
  top: 215px;
}

.float-gp {
  top: 270px;
}

.float-rs {
  top: 325px;
}

.fl-fl:hover {
  right: 0;
}

.fl-fl .fab {
  font-size: 20px;
  color: #fff;
  padding: 10px 0;
  width: 40px;
  margin-left: 8px;
}

/* Float Icon End */
</style>

    <!-- Common scripts -->
    
    <script src="{{ asset('university/js/common_scripts_min.js') }}"></script>
    <script src="{{ asset('university/js/functions.js') }}"></script>
    <script src="{{ asset('university/assets/validate.js') }}"></script>

    <!-- Specific scripts -->
    <script src="{{ asset('university/layerslider/js/greensock.js') }}"></script>
    <script src="{{ asset('university/layerslider/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('university/layerslider/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    // Select all anchor links that point to an ID on the same page
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#' || targetId === '') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const headerHeight = document.querySelector('header')?.offsetHeight || 80;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                window.scrollTo({ top: targetPosition, behavior: 'smooth' });
            }
        });
    });
});
    </script>