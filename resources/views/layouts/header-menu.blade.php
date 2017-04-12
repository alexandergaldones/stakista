@section('header-menu')
<div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
        <li class="dropdown dropdown-fw  active open selected">
            <a href="javascript:;" class="text-uppercase">
                <i class="icon-home"></i> Home </a>
            <ul class="dropdown-menu dropdown-menu-fw">
                <li class="active">
                    <a href="/">
                        <i class="icon-bar-chart"></i> Default </a>
                </li>
                <li>
                    <a href="/actives">
                        <i class="icon-bulb"></i> Top Actives </a>
                </li>
                <li>
                    <a href="/gainers">
                        <i class="icon-graph"></i> Gainers </a>
                </li>
                <li>
                    <a href="/losers">
                        <i class="icon-graph"></i> Decliners </a>
                </li>
            </ul>
        </li>
        <li class="dropdown dropdown-fw  ">
            <a href="javascript:;" class="text-uppercase">
                <i class="icon-puzzle"></i> News </a>
            <ul class="dropdown-menu dropdown-menu-fw">
                <li class="dropdown more-dropdown-sub">
                    <a href="javascript:;">
                        <i class="icon-diamond"></i> UI Features </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="ui_colors.html"> Color Library </a>
                        </li>
                        <li>
                            <a href="ui_general.html"> General Components </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown more-dropdown-sub">
                    <a href="javascript:;">
                        <i class="icon-puzzle"></i> Components </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="components_date_time_pickers.html"> Date & Time Pickers </a>
                        </li>
                        <li>
                            <a href="components_color_pickers.html"> Color Pickers </a>
                        </li>
                        <li>
                            <a href="components_select2.html"> Select2 Dropdowns </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown dropdown-fw  ">
            <a href="javascript:;" class="text-uppercase">
                <i class="icon-briefcase"></i> Stocks </a>
            <ul class="dropdown-menu dropdown-menu-fw">
                <li class="dropdown more-dropdown-sub">
                    <a href="javascript:;"> Static Tables </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="table_static_basic.html"> Basic Tables </a>
                        </li>
                        <li>
                            <a href="table_static_responsive.html"> Responsive Tables </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown more-dropdown-sub">
                    <a href="javascript:;"> Datatables </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="table_datatables_managed.html"> Managed Datatables </a>
                        </li>
                        <li>
                            <a href="table_datatables_buttons.html"> Buttons Extension </a>
                        </li>
                        <li>
                            <a href="table_datatables_colreorder.html"> Colreorder Extension </a>
                        </li>
                        <li>
                            <a href="table_datatables_rowreorder.html"> Rowreorder Extension </a>
                        </li>
                        <li>
                            <a href="table_datatables_scroller.html"> Scroller Extension </a>
                        </li>
                        <li>
                            <a href="table_datatables_fixedheader.html"> FixedHeader Extension </a>
                        </li>
                        <li>
                            <a href="table_datatables_responsive.html"> Responsive Extension </a>
                        </li>
                        <li>
                            <a href="table_datatables_editable.html"> Editable Datatables </a>
                        </li>
                        <li>
                            <a href="table_datatables_ajax.html"> Ajax Datatables </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown dropdown-fw  ">
            <a href="javascript:;" class="text-uppercase">
                <i class="icon-layers"></i> Pages </a>
            <ul class="dropdown-menu dropdown-menu-fw">
                <li class="dropdown more-dropdown-sub">
                    <a href="javascript:;">
                        <i class="icon-basket"></i> eCommerce </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="ecommerce_index.html">
                                <i class="icon-home"></i> Dashboard </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown more-dropdown">
            <a href="javascript:;" class="text-uppercase"> More </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">Link 1</a>
                </li>
                <li>
                    <a href="#">Link 2</a>
                </li>
                <li>
                    <a href="#">Link 3</a>
                </li>
                <li>
                    <a href="#">Link 4</a>
                </li>
                <li>
                    <a href="#">Link 5</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@show