<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      {{-- <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('member.index') }}" class="logo me-auto"><img src="{{ asset('img/logo-index.png') }}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          @if ( request()->is('/') )
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            @if (Auth::guard('member')->check())
            <li><a class="nav-link " href="{{ route('member.video') }}">List Video</a></li>
            <li><a class="getstarted scrollto" href="{{ route('member.logout') }}">Logout</a></li>
            @else
            <li><a class="getstarted scrollto" href="{{ route('login.form') }}">Login</a></li>
            @endif
          @else
            <li><a class="nav-link scrollto" href="{{ route('member.index') }}">Home</a></li>
            <li><a class="nav-link scrollto" href="#faq">List Video</a></li>
            @if (Auth::guard('member')->check())
                <li><a class="getstarted scrollto" href="{{ route('member.logout') }}">Logout</a></li>
            @endif
          @endif
          {{-- <li class="dropdown"><a href="#"><span>List Video</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
