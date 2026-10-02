<!DOCTYPE html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
    data-assets-path="{{ asset('user/assets/') }}/" data-template="vertical-menu-template-no-customizer"
    data-bs-theme="light">

<head>
    @include('user.partials.head')
    @include('user.partials.css')
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            {{-- Sidebar --}}
            @include('user.partials.sidebar')
            {{-- Main Content --}}
            <div class="layout-page">
                {{-- Navbar --}}
                @include('user.partials.navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                </div>
                {{-- Footer --}}
                @include('user.partials.footer')
                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>
                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    @include('user.partials.js')
    @stack('scripts')
</body>

</html>