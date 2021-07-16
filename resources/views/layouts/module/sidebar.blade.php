<div class="sidebar">
    <div class="user-profile">
      <div class="display-avatar animated-avatar">
        @if (auth()->guard('member')->user()->type != null)
        <img class="profile-img img-lg rounded-circle" src="{{ url('/storage/anggota/'.auth()->guard('member')->user()->image) }}" alt="profile image">
        @else
        <img class="profile-img img-lg rounded-circle" src="{{ asset('img/logo-ls.png') }}" alt="profile image">
        @endif
      </div>
      <div class="info-wrapper">
        <p class="user-name">{{ ucfirst(auth()->guard('member')->user()->name) }}</p>
        <h6 class="display-income">{{ auth()->guard('member')->user()->type }}</h6>
      </div>
    </div>
    <ul class="navigation-menu">
      <li class="nav-category-divider">MAIN</li>
      <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
        <a href="{{ route('member.index') }}">
          <span class="link-title">Dashboard</span>
          <i class="mdi mdi-gauge link-icon"></i>
        </a>
      </li>
      <li class="{{ (request()->is('produk')) ? 'active' : '' }}">
        <a href="#sample-pages" data-toggle="collapse" aria-expanded="false">
          <span class="link-title">Tambah Stok</span>
          <i class="mdi mdi-archive link-icon"></i>
        </a>
        <ul class="collapse navigation-submenu" id="sample-pages">
          <li class="{{ (request()->is('produk')) ? 'active' : '' }}">
            <a href="{{ route('member.produk') }}">Produk</a>
          </li>
          <li class="{{ (request()->is('stock')) ? 'active' : '' }}">
            <a href="{{ route('member.stok') }}">Stok</a>
          </li>
        </ul>
      </li>
      <li class="{{ (request()->is('user/*')) ? 'active' : '' }}">
        <a href="{{ route('member.setting') }}">
          <span class="link-title">User Setting</span>
          <i class="mdi mdi-account-settings link-icon"></i>
        </a>
      </li>
  </div>
