<div class="{{ isset($headerClass) ? $headerClass : 'page-header navbar navbar-fixed-top' }}">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="logo" class="logo-default">
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                @if (Auth::check())
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile">
                            <span class="font-red-mint">[{{ Auth::user()->role_name }}]</span>
                            {{ Auth::user()->username }}
                        </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ route('users.show', \Auth::user()) }}">
                                <i class="icon-user"></i> {{ trans('common.user.profile') }}
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i> {{ trans('common.logout') }}
                            </a>
                            {{ Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logout-form', 'style' => 'display:none;']) }}
                            {{ Form::close() }}
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
