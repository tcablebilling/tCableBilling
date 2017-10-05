 @extends('layouts.master')
    @section('content')
        <div class="page-content">
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            {!! Form::open(['url'=>'/clients','class'=>'form-horizontal form-label-left']) !!}
                                @include('partials._client_form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <br />
                <br />
                <br />

            </div>
            <script type="text/javascript">
                (function($) {
                	var area_codes = {!! $area_codes !!};
                    $('#area_id').change(function() {
                        var area = $('#area_id').val();
                        $('#client_id').val( area_codes[area] );
                    });
                })(jQuery);
            </script>
        </div>
    @endsection
