<div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
                </div>
                <div class="clearfix"></div>

                @include('partials.menu_prile_quick_info')

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    @include('partials.side_menu_section')
                    @include('partials.top_menu_section')

                </div>
                <!-- /sidebar menu -->

                @include('partials.menu_footer_buttons')
            </div>
        </div>

        @include('partials.top_navigation')
        @yield('content')

    </div>

</div>
