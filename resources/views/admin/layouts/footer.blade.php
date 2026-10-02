<!-- Bootstrap -->
<script src="{{ asset('admin/vendor/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap.min.js') }}"></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('admin/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ asset('admin/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ asset('admin/vendor/material-design-kit.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('admin/js/app.js') }}"></script>

<!-- Preloader -->
<script src="{{ asset('admin/js/preloader.js') }}"></script>

<!-- Global Settings -->
<script src="{{ asset('admin/js/settings.js') }}"></script>

<!-- Flatpickr -->
<script src="{{ asset('admin/vendor/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('admin/js/flatpickr.js') }}"></script>

<!-- Moment.js -->
<script src="{{ asset('admin/vendor/moment.min.js') }}"></script>
<script src="{{ asset('admin/vendor/moment-range.js') }}"></script>

{{-- <!-- Chart.js -->
<script src="{{ asset('admin/vendor/Chart.min.js') }}"></script>
<script src="{{ asset('admin/js/chartjs.js') }}"></script> --}}

<!-- Chart.js Samples -->
{{-- <script src="{{ asset('admin/js/page.hr-dashboard.js') }}"></script> --}}

<!-- List.js -->
<script src="{{ asset('admin/vendor/list.min.js') }}"></script>
<script src="{{ asset('admin/js/list.js') }}"></script>

<!-- Tables -->
<script src="{{ asset('admin/js/toggle-check-all.js') }}"></script>
<script src="{{ asset('admin/js/check-selected-row.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const sidebarDropDown = document.querySelector('#sidebar-dropdown-menu');
    const menuButton = sidebarDropDown.querySelector('.sidebar-menu-button');
    const submenu = sidebarDropDown.querySelector('.drop-down-submenu');

    menuButton.addEventListener('click', function (e) {
      e.preventDefault();
      submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    });
  });

</script>

@yield('script')