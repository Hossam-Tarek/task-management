<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
{{--        <img src="{{ asset(getSetting('logo')) }}" alt="Logo" class="brand-image elevation-3" style="opacity: .8; border-radius: 5px">--}}
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

{{--                <li class="nav-item {{ currentRouteIn(['admin.admins.index', 'admin.admins.create']) ? 'menu-open' : '' }}">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="fas fa-user-shield mx-1"></i>--}}
{{--                        <p class="mx-2">--}}
{{--                            {{ __('admin.admins') }}--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('admin.admins.index') }}" class="nav-link {{ request()->routeIs('admin.admins.index') ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>{{ __('admin.admins') }}</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('admin.admins.create') }}" class="nav-link {{ request()->routeIs('admin.admins.create') ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>{{ __('admin.add') .' '. __('admin.admin') }}</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">--}}
{{--                        <i class="fas fa-users mx-1"></i>--}}
{{--                        <p class="mx-2">{{ __('admin.users') }}</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="nav-item">
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
