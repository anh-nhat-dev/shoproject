<!DOCTYPE html>
{{--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
--}}
<html lang="en">

<head>
    <base href="{{url('backend')}}/" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- Tell the browser to be responsive to screen width --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- Favicon icon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Admin - @yield('title')</title>
    {{-- Bootstrap Core CSS --}}
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Menu CSS --}}
    @yield('style')
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    {{-- Animation CSS --}}
    <link href="css/animate.css" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="css/style.css" rel="stylesheet">
   
    {{-- color CSS you can use different color css from css/colors folder --}}
    {{-- We have chosen the skin-blue (blue.css) for this starter
          page. However, you can choose any other skin from folder css / colors .
--}}
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    {{--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]--}}
</head>

<body class="fix-sidebar fix-header">
    {{-- Preloader --}}
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        {{-- Top Navigation --}}
        @include('layouts.backend.head')
        {{-- End Top Navigation --}}
        {{-- Left navbar-header --}}
        @include('layouts.backend.sidebar')
        {{-- Left navbar-header end --}}
        {{-- Page Content --}}
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    @yield('breadcrumb')
                    {{-- /.col-lg-12 --}}
                </div>
                <div class="row">
                    @yield('content')
                </div>
            </div>
            {{-- /.container-fluid --}}
            @include('layouts.backend.foot')
        </div>
        {{-- /#page-wrapper --}}
    </div>
    {{-- /#wrapper --}}
    {{-- jQuery --}}
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    {{-- Bootstrap Core JavaScript --}}
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    {{-- Menu Plugin JavaScript --}}
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    {{--slimscroll JavaScript --}}
    <script src="js/jquery.slimscroll.js"></script>
    {{--Wave Effects --}}
    <script src="js/waves.js"></script>
    {{-- Custom Theme JavaScript --}}
    <script src="js/custom.min.js"></script>
    @yield('script')
    {{--Style Switcher --}}
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>