<div class="navbar nav_title" style="border: 0;">
    <a href="{{ URL::route('home') }}" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
</div>
<div class="clearfix"></div>

<!-- menu prile quick info -->
<div class="profile">
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>Anthony Fernando</h2>
    </div>
</div>
<!-- /menu profile quick info -->

<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ URL::route('home') }}">Home</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-flag"></i> Billing <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="genral_report.html">General Billing</a>
                    </li>
                    <li><a href="per_client_report.html">Per Client Billing</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-male"></i> Clients <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="all_clients.html">All Clients</a>
                    </li>
                    <li><a href="add_new_client.html">Add New Client</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-file-text"></i> Invoice <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="monthly_invoice.html">Monthly(Regular)</a>
                    </li>
                    <li><a href="per_client_invoice.html">Per Client</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="tables.html">All Users</a>
                    </li>
                    <li><a href="tables_dynamic.html">Add New User</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Others</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-area-chart"></i> Areas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="all_areas.html">All Areas</a>
                    </li>
                    <li><a href="add_area.html">Add New Area</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-users"></i> Client Types <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="all_client_types.html">All Client Types</a>
                    </li>
                    <li><a href="add_new_client_type.html">Add New Client Type</a>
                    </li>
                </ul>
            </li>
            <!-- <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="page_404.html">404 Error</a>
                    </li>
                    <li><a href="page_500.html">500 Error</a>
                    </li>
                    <li><a href="plain_page.html">Plain Page</a>
                    </li>
                    <li><a href="login.html">Login Page</a>
                    </li>
                    <li><a href="pricing_tables.html">Pricing Tables</a>
                    </li>

                </ul>
            </li>
            <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
            </li> -->
        </ul>
    </div>

</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->