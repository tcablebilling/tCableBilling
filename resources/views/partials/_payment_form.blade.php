<span class="section">New Payment Details</span>

<div class="item form-group">
    {!! Form::label('client_id', 'Choose Client', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
       {!! Form::select('client_id', $clients, null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Select client...']);!!}
    </div>
</div>

<div class="item form-group">
    {!! Form::label('billing_id', 'Billing ID', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
       {!! Form::select('billing_id', $billings, null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Select a billing ID...']);!!}
    </div>
</div>

<div class="item form-group">
    {!! Form::label('paid_amount', 'Paid Amount', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
       {!! Form::text('paid_amount', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter paid amount (in Tk.) e.g. 350...']);!!}
    </div>
</div>
<div class="item form-group">
    {!! Form::label('date', 'Date', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
       {!! Form::text('date', null,['id'=>'reportrange', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'readonly'=>'readonly', 'placeholder'=>'Enter paid date...']);!!}
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <button id="send" type="submit" class="btn btn-success">Submit</button>
        <a href="/payments" class="btn btn-primary">Cancel</a>
    </div>
</div>
<!-- datepicker -->
<script type="text/javascript">
    $(document).ready(function ($) {
        $('#reportrange').datepicker();
    });
</script>
<!-- /datepicker -->
