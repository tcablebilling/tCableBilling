
    <span class="section">Client Basic Information</span>

    <div class="item form-group">
        {!! Form::label('client_id', 'Client ID', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            @if(isset($client))
                {!! Form::text('client_id', $client->area_name->code . '-' . sprintf("%'.03d\n", $client->id),['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'readonly'=>'readonly']) !!}
            @else
                {!! Form::text('client_id', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'readonly'=>'readonly']) !!}
            @endif
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('area_id', 'Area', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('area_id', $area_names, null, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Select Area...']) !!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('name', 'Name', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('name', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'both name(s) e.g Jon Doe']) !!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('phone_no_1', 'Phone No. (Primary)', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('phone_no_1', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter primary phone number...']) !!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('phone_no_2', 'Phone No. (Alternative)', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('phone_no_2', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter alternative phone number...']) !!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('address', 'Address *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::textarea('address', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'data-validate-minmax'=>'10,100', 'rows'=>'5', 'placeholder'=>'Enter address here...']) !!}
        </div>
    </div>


    <span class="section">Client Subscription Information</span>

    <div class="item form-group">
        {!! Form::label('connection_type', 'Connection Type *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('connection_type',
                [
                    'home'      =>'Home',
                    'office'    =>'Office',
                    'business'  =>'Business',
                    'govt'      =>'Govt. Officials'
                ], null, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Select Connection Type...'])
            !!}
        </div>
    </div>

    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_id">Channel Package <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('package_id', $package_names, null, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Select Channel Package...'])
            !!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('address_proof', 'Address Proof Type', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('address_proof',
                [
                    'passport'          =>'Passport',
                    'voter_id'          =>'Voter ID',
                    'driving_licence'   =>'Driving Licence',
                    'gas_bill'          =>'Gas Bill',
                    'electricity_bill'  =>'Electricity Bill'
                ], null, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Select Address Proof Type...'])
            !!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('client_status', 'Client Status', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::select('client_status',
                [
                    'Active'    =>'Active',
                    'Deactive'  =>'Deactive'
                ], null, ['class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Select Client Status...'])
            !!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('address_proof_no', 'Address Proof No. *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('address_proof_no', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter address proof number...']) !!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('device_box_no', 'Device Box No. *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('device_box_no', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter device box number...']) !!}
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button id="send" type="submit" class="btn btn-success">Submit</button>
            <a href="/clients" class="btn btn-primary">Cancel</a>
        </div>
    </div>
