<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
      <i class="icon-base ti tabler-menu-2 icon-md"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item navbar-search-wrapper px-md-0 px-2 mb-0">
        <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
          <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span>
        </a>
      </div>
    </div>

    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
      <!-- Language Dropdown -->
      <li class="nav-item dropdown-language dropdown">
        <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill" href="#" data-bs-toggle="dropdown">
          <i class="icon-base ti tabler-language icon-22px text-heading"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#" data-language="en">English</a></li>
          <li><a class="dropdown-item" href="#" data-language="fr">French</a></li>
          <li><a class="dropdown-item" href="#" data-language="ar">Arabic</a></li>
          <li><a class="dropdown-item" href="#" data-language="de">German</a></li>
        </ul>
      </li>

      <!-- Shortcuts -->
      <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown">
        <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill" href="#" data-bs-toggle="dropdown">
          <i class="icon-base ti tabler-layout-grid-add icon-22px text-heading"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end p-0">
          <div class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
              <h6 class="mb-0 me-auto">Shortcuts</h6>
              <a href="#" class="dropdown-shortcuts-add py-2 btn btn-icon btn-text-secondary rounded-pill" data-bs-toggle="tooltip" title="Add shortcuts">
                <i class="icon-base ti tabler-plus icon-20px text-heading"></i>
              </a>
            </div>
          </div>
          <div class="dropdown-shortcuts-list scrollable-container">
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="icon-base ti tabler-device-desktop-analytics icon-26px text-heading"></i>
                </span>
                <a href="{{ route('user.dashboard') }}" class="stretched-link">Dashboard</a>
                <small>User Dashboard</small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                  <i class="icon-base ti tabler-settings icon-26px text-heading"></i>
                </span>
                <a href="{{ route('user.account.settings') }}" class="stretched-link">Settings</a>
                <small>Account Settings</small>
              </div>
            </div>
          </div>
        </div>
      </li>

      <!-- Notifications -->
      @include('user.partials.notifications')

      <!-- User Menu -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow p-0" href="#" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="{{ asset('user-assets/assets/img/avatars/1.png') }}" alt class="rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item mt-0" href="{{ route('user.account.settings') }}">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('user-assets/assets/img/avatars/1.png') }}" alt class="rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-0">{{ Auth::user()->name ?? 'John Doe' }}</h6>
                  <small class="text-body-secondary">Admin</small>
                </div>
              </div>
            </a>
          </li>
          <li><div class="dropdown-divider my-1 mx-n2"></div></li>
          <li>
            <a class="dropdown-item" href="{{ route('user.profile') }}">
              <i class="icon-base ti tabler-user me-3 icon-md"></i><span class="align-middle">My Profile</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('user.account.settings') }}">
              <i class="icon-base ti tabler-settings me-3 icon-md"></i><span class="align-middle">Settings</span>
            </a>
          </li>
          <li>
            <div class="d-grid px-2 pt-2 pb-1">
              <form action="{{ route('user.logout') }}">
                @csrf
                <button class="btn btn-sm btn-danger d-flex w-100" type="submit">
                  <small class="align-middle">Logout</small>
                  <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                </button>
              </form>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>