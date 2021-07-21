<nav class="t-header">
    <div class="t-header-brand-wrapper">
      <a href="index.html">
        <img class="logo" src="{{ asset('img/logo-2.svg') }}" width="104px" alt="logo">
        <img class="logo-mini" src="{{ asset('img/logo_mini.svg') }}" alt="">
      </a>
    </div>
    <div class="t-header-content-wrapper">
      <div class="t-header-content">
        <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
          <i class="mdi mdi-menu" style="color: #fff"></i>
        </button>
        <form action="#" class="t-header-search-box">
            {{ csrf_field() }}
          <div class="input-group">
            <input type="text" class="form-control" name="q" id="inlineFormInputGroup" placeholder="Search" autocomplete="off">
            <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
          </div>
        </form>
        <ul class="nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('member.logout') }}">
              <i class="mdi mdi-power mdi-1x"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
