<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('context')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('csrf-token')

    <title>@yield('page-title')</title>
    <link rel = "icon" href ="http://www.uutbeef.com/assets/img/logo/logo.png" type = "image/x-icon">

    @include('layouts.template.header')

    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        @include('layouts.template.partial.navbar')
        @include('layouts.template.partial.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->
            @yield('content')
        </div>
        <!-- /.content-wrapper -->


        @include('layouts.template.partial.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('layouts.template.script')

    @livewireScripts
</body>

</html>
