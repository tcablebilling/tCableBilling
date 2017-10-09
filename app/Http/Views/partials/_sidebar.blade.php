
@inject('auth', 'Auth')

<div class="navbar nav_title" style="border: 0;">
    <a href="{{ URL::route('home') }}" class="site_title"><i class="fa fa-globe"></i> <span>tCableBilling</span></a>
</div>
<div class="clearfix"></div>

<!-- menu prile quick info -->
<div class="profile">
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{Auth::user()->name}}</h2>
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
                    <li><a href="{{ URL::route('billings.index') }}">Billings</a></li>
                    <li><a href="{{ URL::route('payments.index') }}">Payments</a></li>
                    <li><a href="{{ URL::route('individual') }}">Individual History</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-male"></i> Clients <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ URL::route('clients.index') }}">All Clients</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Others</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-area-chart"></i> Options <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ URL::route('packages.index') }}">Channel Packages</a>
                    </li>
                    <li><a href="{{ URL::route('areas.index') }}">Areas</a>
                    </li>
                    <li><a href="{{ URL::route('employees.index') }}">Employees</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<!-- <div class="sidebar-footer hidden-small">
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
</div> -->
<!-- /menu footer buttons -->
