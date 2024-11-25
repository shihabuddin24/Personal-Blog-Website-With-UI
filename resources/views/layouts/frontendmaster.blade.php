
<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    {{-- <link rel="icon" sizes="16x16" href="{{asset('frontend')}}/assets/img/favicon.png"> --}}

    <!-- Title -->Stay Connected
    <title> TeamB - Personal Blog Website</title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/fontawesome.css">

    <!-- main style -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--loading -->
    <div class="loader">
        <div class="loader-element"></div>
    </div>

    <!-- Header-->
    <header class="header navbar-expand-lg fixed-top ">
        <div class="container-fluid ">
            <div class="header-area ">
                <!--logo-->
                <div class="logo">
                    <a href="{{route('frontend')}}">
                        <span><h2><u>TeamB</u></h2></span>
                    </a>
                </div>
                <div class="header-navbar">
                    <nav class="navbar">
                        <!--navbar-collapse-->
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ">
                                <li class="nav-item ">
                                    <a class="nav-link {{ Route::currentRouteName()=='frontend' ? 'active' : '' }}" href="{{route('frontend')}}"> Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::currentRouteName()=='front.blog' ? 'active' : '' }}" href="{{route('front.blog')}}"> Blogs </a>
                                </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{Route::currentRouteName()=='front.author' ? 'active' : ''}}" href="{{route('front.author')}}"> Authors </a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteName()=='front.about' ? 'active' : ''}}" href="{{route('front.about')}}"> About </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteName()=='front.contact' ? 'active' : ''}}" href="{{route('front.contact')}}"> Contact </a>
                                </li>
                            </ul>
                        </div>
                        <!--/-->
                    </nav>
                </div>

                <!--header-right-->
                <div class="header-right ">
                    <!--theme-switch-->
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <span class="slider round ">
                                <i class="lar la-sun icon-light"></i>
                                <i class="lar la-moon icon-dark"></i>
                            </span>
                        </label>
                    </div>

                    <!--search-icon-->
                    <div class="search-icon">
                        <i class="las la-search"></i>
                    </div>
                    <!--button-subscribe-->
                    @if (Route::has('guest.login'))
                        <div class="botton-sub">
                            @auth
                                <a href="{{route('home')}}" class="btn-subscribe">Dashboard</a>
                                @else
                                    <a href="{{route('guest.login')}}" class="btn-subscribe">Log In</a>
                                {{-- @if (Route::has('guest.register'))
                                <a href="{{route('guest.register')}}" class="btn-subscribe">Sign Up</a>
                                @endif --}}
                            @endauth
                        </div>
                    @endif
                    <!--navbar-toggler-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- blog-slider-->


    @yield('frontendcontent')


    <!--footer-->
    <div class="footer">
        <div class="footer-area">
            <div class="footer-area-content">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="menu">
                                <h6>Menu</h6>
                                <ul>
                                    <li><a href="{{route('frontend')}}">Homepage</a></li>
                                    <li><a href="{{route('front.about')}}">about us</a></li>
                                    <li><a href="{{route('front.contact')}}">contact us</a></li>
                                    <li><a href="{{route('myerror')}}">privarcy</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--newslatter-->
                        <div class="col-md-6">
                            <div class="newslettre">
                                <div class="newslettre-info">
                                    <h3>Subscribe To OurNewsletter</h3>
                                    <p>Sign up for free and be the first to get notified about new posts.</p>
                                </div>

                                @if (session('newsletter'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-check-all me-2"></i>
                                        {{ (session('newsletter')) }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                    <form action="{{route('newsletter.subscribe')}}" class="newslettre-form" method="POST">
                                        @csrf
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" placeholder="Your Email Adress">
                                            @error('email')
                                                <p class="text-danger">{{$message}} </p>
                                            @enderror
                                        </div>

                                        @auth
                                            <button class="submit-btn" type="submit">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        @endauth

                                    </div>
                                </form>

                            </div>
                        </div>
                        <!--/-->
                        <div class="col-md-3">
                            <div class="menu">
                                <h6>Follow us</h6>
                                <ul>
                                    <li><a href="{{env('SOCIAL_FACEBOOK')}}" target="_blank" rel="noopener noreferrer">facebook</a></li>
                                    <li><a href="{{env('SOCIAL_INSTAGRAM')}}" target="_blank" rel="noopener noreferrer">instagram</a></li>
                                    <li><a href="{{env('SOCIAL_YOUTUBE')}}" target="_blank" rel="noopener noreferrer">youtube</a></li>
                                    <li><a href="{{env('SOCIAL_TWITTER')}}" target="_blank" rel="noopener noreferrer">twitter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-copyright-->
            <div class="footer-area-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <p>© {{now()->format('Y')}}, Shihab Uddin, All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div>

    <!--Back-to-top-->
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>

    <!--Search-form-->
    <div class="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 m-auto">
                    <div class="search-width">
                        <button type="button" class="close">
                            <i class="far fa-times"></i>
                        </button>
                        <form class="search-form" action="{{route('blog.search')}}" method="GET">
                            <input type="text" name="search" placeholder="What are you looking for?" required>
                            <button type="submit" class="search-btn"> search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('frontend')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>


    <!-- JS Plugins  -->
    <script src="{{asset('frontend')}}/assets/js/theia-sticky-sidebar.js"></script>
    <script src="{{asset('frontend')}}/assets/js/ajax-contact.js"></script>
    <script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/switch.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.marquee.js"></script>


    <!-- JS main  -->
    <script src="{{asset('frontend')}}/assets/js/main.js"></script>


</body>
</html>
