{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-layout-style="default" data-layout-position="fixed" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-width="fluid">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('public/backend')}}/images/favicon.ico">
        <!-- Bootstrap Css -->
        <link href="{{asset('public/backend')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('public/backend')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    
        @stack('style')
    </head>
    <body>
        
        {{ $slot }}

        <!-- JAVASCRIPT -->
        <script src="{{asset('public/backend')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('public/backend')}}/libs/jQuery/jquery-3.6.0.min.js"></script>
        
        @stack('scripts')
    </body>
</html>
 --}}


 <!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/saas/apps-invoices-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Nov 2023 05:04:36 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Invoice Details | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/backend')}}/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="{{asset('public/backend')}}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('public/backend')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('public/backend')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('public/backend')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('public/backend')}}/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>
<body>
    
    {{ $slot }}


    <!-- JAVASCRIPT -->
    <script src="{{asset('public/backend')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('public/backend')}}/libs/feather-icons/feather.min.js"></script>
    <script src="{{asset('public/backend')}}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{asset('public/backend')}}/js/plugins.js"></script>

    <script src="{{asset('public/backend')}}/js/pages/invoicedetails.js"></script>

    <!-- App js -->
    <script src="{{asset('public/backend')}}/js/app.js"></script>
</body>
</html>


