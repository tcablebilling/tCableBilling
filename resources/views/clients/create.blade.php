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
                jQuery(document).ready(function($) {
                	var pad = function (str, max) {
						str = str.toString();
						return str.length < max ? pad('0' + str, max) : str;
					}
                	var area_codes = {!! json_encode( $area_codes ) !!};
                	var max_id = {!! $max_id !!};
                    $('#area').change(function() {
                        var area = $('#area').val();
                        $('#client_id').val( area_codes[area] + '-' + pad( max_id, '3' ) );
                    });
                });
            </script>
        </div>
    @endsection
