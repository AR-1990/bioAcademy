<aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand demo">
        <a href="{{ route('user.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    <img src="{{ asset('user-assets/assets/img/customizer/logo.png') }}" alt="">
                </span>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- Dashboard --}}
        <li class="menu-item {{ request()->routeIs('user.dashboard') ? 'active open' : '' }}">
            <a href="{{ route('user.dashboard') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        {{-- Blog --}}
        <li class="menu-item {{ request()->routeIs('user.blog.*') ? 'active open' : '' }}">
            <a href="{{ route('user.blog.index') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-file"></i>
                <div>Blog</div>
            </a>
        </li>

        {{-- Lead --}}
        <li class="menu-item {{ request()->routeIs('user.lead.*') ? 'active open' : '' }}">
            <a href="{{ route('user.lead.index') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-layout-navbar"></i>
                <div>Lead</div>
            </a>
        </li>

        {{-- Profile --}}
        {{--  
        <li class="menu-item {{ request()->routeIs('user.profile') ? 'active open' : '' }}">
            <a href="{{ route('user.profile') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-user"></i>
                <div>Profile</div>
            </a>
        </li>
        --}}

        {{-- Account Settings --}}
        {{--  
        <li class="menu-item {{ request()->routeIs('user.account.settings') ? 'active open' : '' }}">
            <a href="{{ route('user.account.settings') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-settings"></i>
                <div>Settings</div>
            </a>
        </li>
        --}}

        {{-- Logout --}}
        <li class="menu-item">
            <a href="{{ route('user.logout') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-logout"></i>
                <div>Logout</div>
            </a>
        </li>
    </ul>
</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
    </a>
</div>