<div class="page-sidebar-wrapper">
    <div class="{{ isset($sidebarClass) ? $sidebarClass : 'page-sidebar navbar-collapse collapse' }}">
        <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 40px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>

            <li class="nav-item start @yield('home_menu')">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('common.homepage') }}</span>
                    @if (\View::hasSection('home_menu'))
                    <span class="selected"></span>
                    @endif
                </a>
            </li>

            @if (\Auth::check())
            <li class="nav-item  @yield('user_menu')">
                <a href="{{ route('users.index') }}" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">{{ trans('common.user.user_menu') }}</span>
                    @if (\View::hasSection('user_menu'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
