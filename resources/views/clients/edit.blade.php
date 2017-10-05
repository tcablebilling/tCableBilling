 @extends('layouts.master')
    @section('content')
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
    @endsection
