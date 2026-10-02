<!doctype html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
  data-assets-path="{{ asset('user-assets/assets/') }}/" data-template="vertical-menu-template-no-customizer"
  data-bs-theme="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard | Biopharma Academy Of Clinical Research</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('user-assets/assets/img/favicon/favicon.ico') }}" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('user-assets/assets/vendor/fonts/iconify-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('user-assets/assets/vendor/libs/node-waves/node-waves.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('user-assets/assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('user-assets/assets/css/demo.css') }}" />

  <!-- Vendor Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('user-assets/assets/vendor/fonts/flag-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('user-assets/assets/vendor/libs/@form-validation/form-validation.css') }}" />

  <!-- Page Specific CSS -->
  <link rel="stylesheet" href="{{ asset('user-assets/assets/vendor/css/pages/page-auth.css') }}" />

  <!-- Helpers JS -->
  <script src="{{ asset('user-assets/assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('user-assets/assets/js/config.js') }}"></script>
</head>

<body>
  <!-- Content -->
  <div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="app-brand auth-cover-brand">
      <span class="app-brand-logo demo">
        <span class="text-primary">
          <img src="{{ asset('user-assets/assets/img/customizer/logo.png') }}" alt="">
        </span>
      </span>
    </a>
    <!-- /Logo -->

    <div class="authentication-inner row m-0">
      <!-- Left Illustration -->
      <div class="d-none d-xl-flex col-xl-8 p-0">
        <div class="auth-cover-bg d-flex justify-content-center align-items-center">
          <img src="{{ asset('user-assets/assets/img/illustrations/auth-register-illustration-light.png') }}"
            alt="auth-register-cover" class="my-5 auth-illustration"
            data-app-light-img="illustrations/auth-register-illustration-light.png"
            data-app-dark-img="illustrations/auth-register-illustration-dark.png" />
          <img src="{{ asset('user-assets/assets/img/illustrations/bg-shape-image-light.png') }}"
            alt="auth-register-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
            data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
      </div>
      <!-- /Left Illustration -->

      <!-- Register -->
      <div class="d-flex col-12 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto mt-12 pt-5">
          <h4 class="mb-1">Adventure starts here 🚀</h4>
          <p class="mb-6">Make your app management easy and fun!</p>

          <form id="formAuthentication" class="mb-6" action="{{ route('user.login') }}">
            @csrf

            <div class="mb-6 form-control-validation">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="name" placeholder="Enter your username"
                value="{{ old('name') }}" autofocus />
              @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-6 form-control-validation">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                value="{{ old('email') }}" />
              @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-6 form-password-toggle form-control-validation">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="************"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
              </div>
              @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-6 form-control-validation">
              <label class="form-label" for="password_confirmation">Confirm Password</label>
              <input type="password" class="form-control" name="password_confirmation" placeholder="************" />
            </div>

            <div class="mb-6 mt-8">
              <div class="form-check mb-8 ms-2">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div>

            <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{ route('user.login') }}">
              <span>Sign in instead</span>
            </a>
          </p>

          <div class="divider my-6">
            <div class="divider-text">or</div>
          </div>

          <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-facebook me-1_5">
              <i class="icon-base ti tabler-brand-facebook-filled icon-20px"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-twitter me-1_5">
              <i class="icon-base ti tabler-brand-twitter-filled icon-20px"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-github me-1_5">
              <i class="icon-base ti tabler-brand-github-filled icon-20px"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-google-plus">
              <i class="icon-base ti tabler-brand-google-filled icon-20px"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
  <!-- / Content -->

  <!-- Core JS -->
  <script src="{{ asset('user-assets/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/js/menu.js') }}"></script>

  <!-- Vendors JS -->
  <script src="{{ asset('user-assets/assets/vendor/libs/@form-validation/popular.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
  <script src="{{ asset('user-assets/assets/vendor/libs/cleave-zen/cleave-zen.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('user-assets/assets/js/main.js') }}"></script>

  <!-- Page JS -->
  <script src="{{ asset('user-assets/assets/js/pages-auth.js') }}"></script>
  <script src="{{ asset('user-assets/assets/js/pages-auth-two-steps.js') }}"></script>
</body>

</html>