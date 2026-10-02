@extends('user.partials.app')

@section('title', 'Dashboard | Biopharma Academy Of Clinical Research')

@section('content')
<!-- Header -->
<div class="row">
  <div class="col-12">
    <div class="card mb-6">
      <div class="user-profile-header-banner">
        <img src="{{ asset('user-assets/assets/img/pages/profile-banner.png') }}" alt="Banner image"
          class="rounded-top" />
      </div>
      <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
          <img src="{{ asset('user-assets/assets/img/avatars/1.png') }}" alt="user image"
            class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" />
        </div>
        <div class="flex-grow-1 mt-3 mt-lg-5">
          <div
            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4 class="mb-2 mt-lg-6">John Doe</h4>
              <ul
                class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                <li class="list-inline-item d-flex gap-2 align-items-center">
                  <i class="icon-base ti tabler-map-pin icon-lg"></i><span class="fw-medium">Vatican City</span>
                </li>
                <li class="list-inline-item d-flex gap-2 align-items-center">
                  <i class="icon-base ti tabler-calendar icon-lg"></i><span class="fw-medium">Joined April 2021</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Header -->
<!-- User Profile Content -->
<div class="row">
  <div class="col-xl-12">
    <!-- About User -->
    <div class="card mb-6">
      <div class="card-body">
        <p class="card-text text-uppercase text-body-secondary small mb-0">About</p>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-4">
            <i class="icon-base ti tabler-user icon-lg"></i><span class="fw-medium mx-2">Full Name:</span> <span>John
              Doe</span>
          </li>
          <li class="d-flex align-items-center mb-4">
            <i class="icon-base ti tabler-check icon-lg"></i><span class="fw-medium mx-2">Status:</span>
            <span>Active</span>
          </li>
          <li class="d-flex align-items-center mb-4">
            <i class="icon-base ti tabler-crown icon-lg"></i><span class="fw-medium mx-2">Role:</span>
            <span>Developer</span>
          </li>
          <li class="d-flex align-items-center mb-4">
            <i class="icon-base ti tabler-flag icon-lg"></i><span class="fw-medium mx-2">Country:</span>
            <span>USA</span>
          </li>
          <li class="d-flex align-items-center mb-2">
            <i class="icon-base ti tabler-language icon-lg"></i><span class="fw-medium mx-2">Languages:</span>
            <span>English</span>
          </li>
        </ul>
        <p class="card-text text-uppercase text-body-secondary small mb-0">Contacts</p>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-4">
            <i class="icon-base ti tabler-phone-call icon-lg"></i><span class="fw-medium mx-2">Contact:</span>
            <span>(123) 456-7890</span>
          </li>
          <li class="d-flex align-items-center mb-4">
            <i class="icon-base ti tabler-messages icon-lg"></i><span class="fw-medium mx-2">Skype:</span>
            <span>john.doe</span>
          </li>
          <li class="d-flex align-items-center mb-4">
            <i class="icon-base ti tabler-mail icon-lg"></i><span class="fw-medium mx-2">Email:</span>
            <span>john.doe@example.com</span>
          </li>
        </ul>
        <p class="card-text text-uppercase text-body-secondary small mb-0">Teams</p>
        <ul class="list-unstyled mb-0 mt-3 pt-1">
          <li class="d-flex flex-wrap mb-4">
            <span class="fw-medium me-2">Backend Developer</span><span>(126 Members)</span>
          </li>
          <li class="d-flex flex-wrap">
            <span class="fw-medium me-2">React Developer</span><span>(98 Members)</span>
          </li>
        </ul>
      </div>
    </div>
    <!--/ About User -->
  </div>
</div>
<!--/ User Profile Content -->
@endsection