 @extends('layouts.master')
    @section('content')
        <!-- top tiles -->
        <div class="row tile_count">
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                <div class="left"></div>
                <div class="right">
                    <span class="count_top"><i class="fa fa-user"></i> Total Clients</span>
                    <div class="count">{{sprintf("%'.04d\n", $client_count)}}</div>
                    <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
                </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                <div class="left"></div>
                <div class="right">
                    <span class="count_top"><i class="fa fa-user"></i> This Month Bill</span>
                    <div class="count green">{{$this_mon_bill}}</div>
                    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
                </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                <div class="left"></div>
                <div class="right">
                    <span class="count_top"><i class="fa fa-user"></i> This Month Collection</span>
                    <div class="count">{{$this_mon_payment}}</div>
                    <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
                </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                <div class="left"></div>
                <div class="right">
                    <span class="count_top"><i class="fa fa-user"></i> This Month Due</span>
                    <div class="count">{{$this_mon_bill - $this_mon_payment}}</div>
                    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
                </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                <div class="left"></div>
                <div class="right">
                    <span class="count_top"><i class="fa fa-clock-o"></i> Next Month Bill</span>
                    <div class="count">{{$next_mon_bill}}</div>
                    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
                </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                <div class="left"></div>
                <div class="right">
                    <span class="count_top"><i class="fa fa-user"></i> Employee Salaries</span>
                    <div class="count">{{$employee_salary}}</div>
                    <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 content">
                <div class="x_panel">
                    <div class="x_content">
                        <span class="section">Client Based Custom Range Bill Generation And Print</span>
                        <div class="row">
                        {!! Form::open(['method'=>'GET', 'url'=>'print-custom','class'=>'form-horizontal']) !!}
                            <div class="col-md-11 item form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::select('client_id', $clients, null,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Select client...']);!!}
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    {!! Form::text('month_range', null, [ 'id'=>'month_range', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'readonly'=>'readonly', 'placeholder'=>'From...']);!!}
                                </div>
                            </div>
                            <div class="col-md-1 packages-buttons">
                                <button id="send" type="submit" class="btn btn-success btn-sm package-btn pull-right">Print</button>
                            </div>
                        {!! Form::close()!!}
                        </div>
                    </div>
                    <div class="x_content">
                        <span class="section">Monthly Bill Generation And Print</span>
                        <div class="row">
                            <div class="col-md-8">
                                {!! Form::open(['method'=>'GET', 'url'=>'print-m','class'=>'form-horizontal form-label-left package-frm']) !!}
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        {!! Form::text('range', date('F Y', strtotime('+1 month', strtotime(date('F Y')))), [ 'id'=>'range', 'class'=>'form-control col-md-7 col-xs-12', 'readonly'=>'readonly', 'required'=>'required', 'placeholder'=>'From...']);!!}
                                    </div>
                                    <button id="send" type="submit" class="btn btn-success btn-sm package-btn">Print All</button>
                                {!! Form::close()!!}
                            </div>
                            <div class="col-md-4 packages-buttons">
                                @if( $b != date('Ym') )
                                    {!! Form::open(['url'=>'/billings','class'=>'form-horizontal form-label-left pull-right']) !!}
                                        <button id="send" type="submit" class="btn btn-success btn-sm package-btn">Generate Next Month Bills</button>
                                    {!! Form::close()!!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /top tiles -->
        <br/>
        <script type="text/javascript" charset="utf-8" async defer>
            jQuery(document).ready(function($) {
                $('#range').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'MM yy'
                }).focus(function() {
                    var thisCalendar = $(this);
                    $('.ui-datepicker-calendar').detach();
                    $('.ui-datepicker-close').click(function() {
                        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        thisCalendar.datepicker('setDate', new Date(year, month, 1));
                    });
                });
                $('#month_range').daterangepicker({
                    opens:'left',
                    format:'MMMM D, YY'
                });
            });
        </script>
    @endsection
