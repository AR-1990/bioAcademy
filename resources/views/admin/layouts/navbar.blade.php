<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-black-dodger-blue sidebar-left" data-perfect-scrollbar>

            

            <a href="{{ url('/admin_dashboard') }}" class="sidebar-brand ">

                <span class="avatar avatar-xl sidebar-brand-icon h-auto">

                    <span class="avatar-title rounded bg-primary"><img
                            src="{{ asset('admin/images/illustration/teacher/128/white.svg') }}" class="img-fluid"
                            alt="logo" /></span>

                </span>

                <span>Admin</span>
            </a>

            <div class="sidebar-heading">Menu</div>
            
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ Request::is('admin_dashboard') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ url('/admin_dashboard') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">account_box</span>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>
            
                <li class="sidebar-menu-item {{ Route::is('get_student') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('get_student') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">receipt</span>
                        <span class="sidebar-menu-text">Inquiries</span>
                    </a>
                </li>
            
                <li class="sidebar-menu-item {{ Request::is('Enrolled_student') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ url('/Enrolled_student') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">face</span>
                        <span class="sidebar-menu-text">Students</span>
                    </a>
                </li>
            
                <li class="sidebar-menu-item {{ Route::is('module') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('module') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">search</span>
                        <span class="sidebar-menu-text">Modules</span>
                    </a>
                </li>
            
                <li class="sidebar-menu-item {{ Route::is('results') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('results') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">poll</span>
                        <span class="sidebar-menu-text">Results</span>
                    </a>
                </li>
            
                <li class="sidebar-menu-item {{ Request::is('visits') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ url('/visits') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">import_contacts</span>
                        <span class="sidebar-menu-text">Visits</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ Route::is('admin.feedbacks') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('admin.feedbacks') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">rate_review</span>
                        <span class="sidebar-menu-text">Feedback Form</span>
                    </a>
                </li>
                
                <li class="sidebar-menu-item {{ Route::is('admin.mass-text') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('admin.mass-text') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">sms</span>
                        <span class="sidebar-menu-text">Mass Text</span>
                    </a>
                </li>
                <li class="sidebar-menu-item {{ Route::is('admin.sms-logs') ? 'active' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('admin.sms-logs') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">inbox</span>
                        <span class="sidebar-menu-text">SMS Logs</span>
                    </a>
                </li>
                <!--<li class="sidebar-menu-item {{ Route::is('admin.sms-inbox') ? 'active' : '' }}">-->
                <!--    <a class="sidebar-menu-button" href="{{ route('admin.sms-inbox') }}">-->
                <!--        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">mail</span>-->
                <!--        <span class="sidebar-menu-text">SMS Inbox</span>-->
                <!--    </a>-->
                <!--</li>-->
            
                <div class="sidebar-drop-down" id="sidebar-dropdown-menu">
                    <div class="sidebar-menu-button">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">settings</span>
                        <span class="sidebar-menu-text">Setting</span>
                    </div>
                    <ul class="drop-down-submenu" style="display: none;">
                        <li class="sidebar-menu-item {{ Route::is('exam_schedule') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('exam_schedule') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">settings</span>
                                <span class="sidebar-menu-text">Assign Exam</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Route::is('module_schedule') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('module_schedule') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">settings</span>
                                <span class="sidebar-menu-text">Module Progress</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </ul>

        </div>
    </div>
</div>
