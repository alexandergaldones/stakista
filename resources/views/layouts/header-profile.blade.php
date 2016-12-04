<header class="page-header">
    <nav class="navbar mega-menu" role="navigation">
        <div class="container-fluid">
            <div class="clearfix navbar-fixed-top">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                </button>
                <!-- End Toggle Button -->
                <!-- BEGIN LOGO -->
                <a id="index" class="page-logo" href="index.html">
                    <img src="/met5/assets/layouts/layout5/img/logo.png" alt="Logo"> </a>
                <!-- END LOGO -->
                <!-- BEGIN SEARCH -->
                <form class="search" action="extra_search.html" method="GET">
                    <input type="name" class="form-control" name="query" placeholder="Search...">
                    <a href="javascript:;" class="btn submit">
                        <i class="fa fa-search"></i>
                    </a>
                </form>
                <!-- END SEARCH -->
            @include('layouts.topbar-actions')
            <!-- END TOPBAR ACTIONS -->
            </div>
            <!-- BEGIN HEADER MENU -->
        @include('layouts.header-menu')
        <!-- END HEADER MENU -->
        </div>
        <!--/container-->
    </nav>
</header>