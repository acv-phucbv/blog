<head>
<meta charset="utf-8"/>
<title>{{ env('APP_NAME') }} | @yield('title', trans('Page'))</title>
<link rel="shortcut icon" href="{{ asset('blog.ico') }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
{{-- BEGIN GLOBAL MANDATORY STYLES --}}
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
{{-- END GLOBAL MANDATORY STYLES --}}
{{-- BEGIN PAGE LEVEL PLUGIN STYLES --}}
@yield('plugin_styles')
{{-- END PAGE LEVEL PLUGIN STYLES --}}
{{-- BEGIN THEME GLOBAL STYLES --}}
<link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{ asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
{{-- END THEME GLOBAL STYLES --}}
{{-- BEGIN THEME LAYOUT STYLES --}}
<link href="{{ asset('assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{ asset('assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
{{-- END THEME LAYOUT STYLES --}}

{{-- BEGIN PAGE LEVEL STYLES --}}
@yield('page_styles')
{{-- END PAGE LEVEL STYLES --}}
@yield('inline_styles')
</head>
