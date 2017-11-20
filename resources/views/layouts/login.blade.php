<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="{{ app()->getLocale() }}"> <!--<![endif]-->
@include('layouts.partials.head')
<body class="login">
    @yield('content')
    @include('layouts.partials.javascript')
    @yield('inline_scripts')
</body>
</html>
