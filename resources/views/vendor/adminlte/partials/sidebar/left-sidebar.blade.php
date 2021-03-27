<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            {{-- <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul> --}}
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (Auth::user()->roles == 'cs')
                <li class="nav-item">
                    <a href="{{ route('anggota.index') }}" class="nav-link {{ (request()->is('admin/anggota*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Anggota</p>
                    </a>
                </li>
                @elseif (Auth::user()->roles == 'admin')
                <li class="nav-item">
                    <a href="{{ route('anggota.index') }}" class="nav-link {{ (request()->is('admin/anggota*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Anggota</p>
                    </a>
                </li>
                @endif
                @if (Auth::user()->roles == 'admin')
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/kategori*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Category</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('video.index') }}" class="nav-link {{ (request()->is('admin/video*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-video"></i>
                        <p>Video</p>
                    </a>
                </li>
                @if (Auth::user()->roles == 'admin')
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>User</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>

</aside>
