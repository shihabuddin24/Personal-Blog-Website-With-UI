
<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title> @yield('slug') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/images/favicon.ico"> --}}

    <link href="{{ asset('dashboard') }}/assets/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('dashboard') }}/assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('dashboard') }}/assets/js/config.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.tiny.cloud/1/fonka8bzu4mdpyccj8qyfrvvm97edfnwojmzfxiegmomjk3e/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">

                    <li class="menu-title"><h5>Main Menu</h5></li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{ route('frontend') }}'>
                            <span class="menu-icon"><i class="fa-solid fa-house-chimney"></i></span>
                            <span class="menu-text"> Home Page </span>
                            {{-- <span class="badge bg-primary rounded ms-auto">01</span> --}}
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='{{ route('home') }}'>
                            <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                            <span class="menu-text"> Dashboard </span>
                            {{-- <span class="badge bg-primary rounded ms-auto">01</span> --}}
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href="{{ route('profile.index') }}">
                            <span class="menu-icon"><i class="fa-solid fa-user"></i></span>
                            <span class="menu-text"> Profile </span>
                        </a>
                    </li>


                    @if (auth()->user()->role != 'user')

                    @if (auth()->user()->role != 'blogger')

                    <li class="menu-item">
                        <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="fa-regular fa-rectangle-list"></i></span>
                            <span class="menu-text"> Management </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{route('management.index')}}'>
                                        <span class="menu-icon"><i class="fa-regular fa-star"></i></span>
                                        <span class="menu-text">User Authenticate</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('management.role.assign') }}'>
                                        <span class="menu-icon"><i class="fa-regular fa-star"></i></i></span>
                                        <span class="menu-text">Role Assign</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="menu-item">
                        <a href="#menuExpages3" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="fa-solid fa-list-ul"></i></span>
                            <span class="menu-text"> User Requests </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages3">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{route('user.message')}}'>
                                        <span class="menu-icon"><i class="fa-regular fa-star"></i></span>
                                        <span class="menu-text">User Messages</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{route('blogger.request')}}'>
                                        <span class="menu-icon"><i class="fa-solid fa-question"></i></span>
                                        <span class="menu-text">Blogger Request</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    @endif


                    <li class="menu-item">
                        <a href="#menuExpages1" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="fa-solid fa-list-ol"></i></span>
                            <span class="menu-text"> Categories </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages1">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('category.index1') }}'>
                                        <span class="menu-icon"><i class="fa-solid fa-eye"></i></span>
                                        <span class="menu-text">Show Category</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('category.index2') }}'>
                                        <span class="menu-icon"><i class="fa-solid fa-plus"></i></span>
                                        <span class="menu-text">Create Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="menu-item">
                        <a href="#menuExpages2" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="fa-solid fa-list-check"></i></span>
                            <span class="menu-text"> Blog's </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages2">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{route('blog.index')}}'>
                                        <span class="menu-icon"><i class="fa-solid fa-bullseye"></i></span>
                                        <span class="menu-text">Show Blogs</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class='menu-link' href="{{route('blog.create')}}">
                                        <span class="menu-icon"><i class="fa-regular fa-square-plus"></i></span>
                                        <span class="menu-text">Create Blogs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    @endif

                </ul>
            </div>
        </div>



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a class='logo-light' href='index.html'>
                                <img src="{{ asset('dashboard') }}/assets/images/logo-light.png" alt="logo" class="logo-lg" height="22">
                                <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a class='logo-dark' href='index.html'>
                                <img src="{{ asset('dashboard') }}/assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="22">
                                <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-4">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link" href="#" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </a>
                        </li>

                        {{-- <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-magnify font-size-24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li> --}}

                        <li class="nav-link" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                @if (auth()->user()->image == 'default.jpg')
                                <img src="{{ asset('uploads/default') }}/{{ auth()->user()->image }}" alt="user-image" class="rounded-circle">

                                @else
                                <img src="{{ asset('uploads/profile') }}/{{ auth()->user()->image }}" alt="user-image" class="rounded-circle">

                                @endif
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">

                                <!-- item-->
                                <a href="{{ route('home') }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('profile.index') }}" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a class='dropdown-item notify-item' href=''>
                                        <i class="fe-log-out"></i>
                                        <button style="width: 100%; text-align:left" class="bg-transparent border-0 text-danger" type="submit">Logout</button>
                                    </a>
                                </form>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->

                    <!-- end page title -->






                    @yield('content')





                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div><script>document.write(new Date().getFullYear())</script> © Shihab-Uddin</div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Design & Develop by <a href="https://www.facebook.com/ShihabUddin005?mibextid=ZbWKwL" target="_blank">Shihab Uddin & Team</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ asset('dashboard') }}/assets/js/vendor.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/app.js"></script>

    <!-- Knob charts js -->
    <script src="{{ asset('dashboard') }}/assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!-- Sparkline Js-->
    <script src="{{ asset('dashboard') }}/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <script src="{{ asset('dashboard') }}/assets/libs/morris.js/morris.min.js"></script>

    <script src="{{ asset('dashboard') }}/assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init-->
    <script src="{{ asset('dashboard') }}/assets/js/pages/dashboard.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @yield('script')

</body>

</html>
