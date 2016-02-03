<span class="section">Channel Packages Details</span>

<div class="item form-group">
    {!! Form::label('name', 'Channel Package Name', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
       {!! Form::text('name', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Package name...']);!!}
    </div>
</div>

<div class="item form-group">
    {!! Form::label('fee', 'Fee (Tk.)', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));!!}
    <div class="col-md-6 col-sm-6 col-xs-12">
       {!! Form::text('fee', null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Enter fee amount (in Tk.) e.g. 350...']);!!}
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <button id="send" type="submit" class="btn btn-success">Submit</button>
        <a href="/packages" class="btn btn-primary">Cancel</a>
    </div>
</div>
