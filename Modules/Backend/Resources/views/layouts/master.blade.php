<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/4.5.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.custom.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.googleapis.com.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ace.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-confirm.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/main.css') }}">
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ace-skins.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ace-rtl.min.css') }}">
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('css/ace-ie.min.css')}}" />
    <![endif]-->

    <script src="{{ asset('js/ace-extra.min.js') }}"></script>
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>

    <!--[if IE]>
    <![endif]-->

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    {{--@yield('style')--}}
    <![endif]-->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
    </script>
    <script src="{{ asset('js/ace.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sparkline.index.min.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('js/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/spinbox.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('js/autosize.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputlimiter.min.js') }}"></script>
    <script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tag.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/common/main.js') }}"></script>
    <script src="{{ asset('/js/jquery-confirm.js') }}"></script>

</head>

<body class="no-skin">
@include('backend::layouts.header')
<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>
        @include('backend::layouts.navbar')
    </div>
    @yield('content')
    @include('backend::layouts.footer')

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->
<div id="spiner-load-ajax" class="modal">
    <div class="widget-spin">
        <i class="ace-icon fa fa-spinner fa-spin orange bigger-500"></i>
    </div>

</div>


@yield('scripts')

</body>
</html>
