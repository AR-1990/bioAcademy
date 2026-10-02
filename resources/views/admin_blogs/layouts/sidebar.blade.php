<div class="main-sidebar sidebar-style-2 bg-dark">

    <aside id="sidebar-wrapper bg-dark">

        <div class="sidebar-brand">

            <a href="{{ url('/admin') }}"> <img alt="image" src={{ asset('admin-assets/images/logo/az-logo.png') }} class="header-logo" />

                {{-- <span class="logo-name text-light">Flex Rental</span> --}}

            </a>

        </div>

        <ul class="sidebar-menu">

            <li class="menu-header text-light">Admin Panel</li>

            <!-- <li class="dropdown">

                <a href="{{ url('/admin') }}" class="nav-link text-light"><i

                        data-feather="monitor"></i><span>Dashboard</span></a>

            </li> -->

 

            <li class="dropdown">

                <a href="{{ route('/admin/blogs')}}" class="nav-link text-light"><i

                        data-feather="list"></i><span>Blogs</span></a>

            </li> 

            <li class="dropdown">

                <a href="{{ route('/admin/add-blogs')}}" class="nav-link text-light"><i

                        data-feather="plus"></i><span>Add Blog</span></a>

            </li> 

            <li class="dropdown">

                <a href="{{ route('admin.blog-categories.index') }}" class="nav-link text-light"><i

                        data-feather="tag"></i><span>Blog Categories</span></a>

            </li>

            

      

        </ul>

    </aside>

</div>
