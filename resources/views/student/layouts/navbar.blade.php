<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-black-dodger-blue sidebar-left" data-perfect-scrollbar>

            <a href="{{ url('/student_dashboard') }}" class="sidebar-brand ">

                <span class="avatar avatar-xl sidebar-brand-icon h-auto">

                    <span class="avatar-title rounded bg-primary"><img
                            src="{{ asset('student/images/illustration/student/128/white.svg') }}" class="img-fluid"
                            alt="logo" /></span>

                </span>

                <span>Student</span>
            </a>

            <div class="sidebar-heading">Menu</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ url('/student_dashboard') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">account_box</span>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ url('/student_module') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">search</span>
                        <span class="sidebar-menu-text">Modules</span>
                    </a>
                </li>
               @php
                    $userId = Auth::id();
                    $examStatus = DB::table('exam_schedule')
                        ->where('student_id', $userId)
                        ->value('exam_stautus');
                @endphp
                @if($examStatus == 1)
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('student-quiz-show') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dvr</span>
                        <span class="sidebar-menu-text">Exam</span>
                    </a>
                </li>
                @endif
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="{{ route('student-results') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">poll</span>
                        <span class="sidebar-menu-text">Result</span>
                    </a>
                </li>

            </ul>

            <!-- // END Sidebar Content -->

        </div>
    </div>
</div>
