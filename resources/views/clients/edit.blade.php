 @extends('layouts.master')
    @section('content')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-content">
                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">
                                {!! Form::model($client, ['route'=>['clients.update', $client->id], 'method'=>'patch','class'=>'form-horizontal form-label-left']) !!}
                                    @include('partials._client_form')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <br />
                    <br />
                    <br />

                </div>
            </div>
            <!-- footer content -->
            <footer>
                <div class="">
                    <p class="pull-right">Gentelella Alela! a Bootstrap 3 template by <a>Kimlabs</a>. |
                        <span class="lead"> <i class="fa fa-paw"></i> Gentelella Alela!</span>
                    </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->

        </div>
        <!-- /page content -->
    @endsection
