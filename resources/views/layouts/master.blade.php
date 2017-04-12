<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

@include('layouts.head')
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN CONTAINER -->
<div class="wrapper">
    <!-- BEGIN HEADER -->
    @include('layouts.header-profile')
    <!-- END HEADER -->
    <div class="container-fluid">
        <div class="page-content">
            <!-- BEGIN BREADCRUMBS -->
            @include('layouts.breadcrumbs')
            <!-- END BREADCRUMBS -->
            <!-- BEGIN PAGE BASE CONTENT -->
            @yield('content')
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- BEGIN FOOTER -->
        @include('layouts.footer')
        <!-- END FOOTER -->
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN QUICK SIDEBAR -->
@include('layouts.quick-sidebar')
<!-- END QUICK SIDEBAR -->
@include('layouts.page-assets')
</body>

</html>