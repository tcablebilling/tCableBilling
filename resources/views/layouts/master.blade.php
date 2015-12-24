<!DOCTYPE html>
<html lang="en">

@include('partials.head')


<body class="nav-md">

    @include('partials.container_body')

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    @include('partials.footer_js')

</body>

</html>
