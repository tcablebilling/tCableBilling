
    <span class="section">Employee Basic Information</span>
    <div class="item form-group">
        {!! Form::label('name', 'Name *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('name', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Employee Name...']);!!}
        </div>
    </div>
    <div class="item form-group">
        {!! Form::label('father_name', 'Father Name', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('father_name', null,['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Employee Father Name...']);!!}
        </div>
    </div>    
    <div class="item form-group">
        {!! Form::label('mother_name', 'Mother Name', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('father_name', null,['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Employee Mother Name...']);!!}
        </div>
    </div>
    <div class="item form-group">
        {!! Form::label('spouse_name', 'Spouse Name', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('spouse_name', null,['class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Employee Spouse Name...']);!!}
        </div>
    </div>
    <div class="item form-group">
        {!! Form::label('present_address', 'Present Address *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::textarea('present_address', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'data-validate-minmax'=>'10,100', 'rows'=>'5', 'placeholder'=>'Enter Present Address Here...']);!!}
        </div>
    </div>
    <div class="item form-group">
        {!! Form::label('permanent_address', 'Permanent Address *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::textarea('permanent_address', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'data-validate-minmax'=>'10,100', 'rows'=>'5', 'placeholder'=>'Enter Permamnent Address Here...']);!!}
        </div>
    </div>
    <div class="item form-group">
        {!! Form::label('phone_personal', 'Phone No. (Personal) *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('phone_personal', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter Personal Phone Number Here...']);!!}
        </div>
    </div>

    <div class="item form-group">
        {!! Form::label('phone_home', 'Phone No. (Home) *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('phone_home', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter Home Phone Number Here...']);!!}
        </div>
    </div>
    <div class="item form-group">
        {!! Form::label('voter_id', 'Voter ID Card No. *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('voter_id', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter Voter ID Card Number Here.... ']);!!}
        </div>
    </div>
    <div class="item form-group">
        {!! Form::label('post', 'Post *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::text('post', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter Post... e.g. Lineman']);!!}
        </div>
    </div>
    <div class="item form-group">
        {!! Form::label('salary', 'Salary *', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
        <div class="col-md-6 col-sm-6 col-xs-12">
           {!! Form::number('salary', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter Salary Here...']);!!}
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button id="send" type="submit" class="btn btn-success">Submit</button>
            <a href="/employees" class="btn btn-primary">Cancel</a>
        </div>
    </div>
