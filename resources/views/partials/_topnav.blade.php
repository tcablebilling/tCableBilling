@inject('auth', 'Auth')
<!-- top navigation -->
<div class="top_nav navbar-fixed-top">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        @if(Auth::user()->role == 'Admin')
                            <li><a href="{{URL::to('users')}}"><i class="fa fa-users pull-right"></i> Users</a></li>
                            <li><a href="{{URL::to('db-backup')}}"><i class="fa fa-database pull-right"></i> Database Backup</a></li>
                        @endif
                        <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>
<!-- /top navigation -->
