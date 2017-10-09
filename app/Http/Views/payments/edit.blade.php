 @extends('layouts.master')
    @section('content')
        <div class="page-content">
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            {!! Form::model($payment, ['route'=>['payments.update', $payment->id], 'method'=>'patch','class'=>'form-horizontal form-label-left']) !!}
                                @include('partials._payment_form')
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
