{{-- @inject('carbon', 'Carbon') --}}
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
                                <div class="row">
                                    <div class="col-md-8 item form-group">
                                        {!! Form::open(['method'=>'GET', 'url'=>'payments','class'=>'form-horizontal form-label-left']) !!}
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::select('client_id', $clients, $client_id,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Select client...']);!!}
                                        </div>
                                        <button id="send" type="submit" class="btn btn-success btn-sm package-btn">Filter</button>
                                        {!! Form::close()!!}
                                    </div>
                                    <div class="col-md-4 packages-buttons">
                                        <a href="/payments/create" title="" class="btn btn-success btn-sm package-btn pull-right">
                                            Add New Payment
                                        </a>
                                    </div>
                                </div>
                                <div class="packages-buttons pull-right">

                                </div>
                                <table id="packagesall" class="table table-striped responsive-utilities jambo_table">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" class="tableflat">
                                        </th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Billing ID</th>
                                        <th>Paid Amount</th>
                                        <th>Cumulative</th>
                                        <th class=" no-link last"><span class="nobr" width="20%">Action</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($payments as $payment)
                                        @if ($payment->id % 2 == 0)
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">{{sprintf("%'.05d\n", $payment->id)}} </td>
                                                <td class=" ">
                                                    {{$payment->clientDetails->name}}
                                                    <span class="client-details">Client ID: {{$payment->clientDetails->client_id}}</span>
                                                </td>
                                                <td class=" ">{{date('F d, Y', strtotime($payment->date))}}</td>
                                                <td class=" ">{{sprintf("%'.05d\n", $payment->billing_id)}}</td>
                                                <td class=" ">{{$payment->paid_amount}} &#2547;</td>
                                                <td class=" ">
                                                    {{
                                                        DB::table('payments')
                                                        ->where('client_id', '=', $payment->client_id)
                                                        ->where('id', '<=', $payment->id)
                                                        ->sum('paid_amount')
                                                    }}
                                                    &#2547;
                                                </td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('payments.destroy', $payment->id), 'method' => 'delete')) !!}
                                                        <a href="/payments/{{$payment->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete the payment?')" class="btn btn-danger btn-sm">Delete</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="odd pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">{{sprintf("%'.05d\n", $payment->id)}}  </td>
                                                <td class=" ">
                                                    {{$payment->clientDetails->name}}
                                                    <span class="client-details">Client ID: {{$payment->clientDetails->client_id}}</span>
                                                </td>
                                                <td class=" ">{{date('F d, Y', strtotime($payment->date))}}</td>
                                                <td class=" ">{{sprintf("%'.05d\n", $payment->billing_id)}}</td>
                                                <td class=" ">{{$payment->paid_amount}} &#2547;</td>
                                                <td class=" ">
                                                    {{
                                                        DB::table('payments')
                                                        ->where('client_id', '=', $payment->client_id)
                                                        ->where('id', '<=', $payment->id)
                                                        ->sum('paid_amount')
                                                    }}
                                                    &#2547;
                                                </td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('payments.destroy', $payment->id), 'method' => 'delete')) !!}
                                                        <a href="/payments/{{$payment->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete the payment?')" class="btn btn-danger btn-sm">Delete</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $payments->render() !!}
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
                <script type="text/javascript" charset="utf-8" async defer>
                    jQuery(document).ready(function($) {
                        var oTable = $('#packagesall').dataTable({
                            "oLanguage": {
                                "sSearch": "Search all columns:"
                            },
                            "aoColumnDefs": [
                                {
                                    'bSortable': false,
                                    'aTargets': [0]
                                },
                                {
                                    'bSortable': false,
                                    'sWidth': '15%',
                                    'aTargets': [3, 4, 5, 6, 7]
                                },
                                {
                                    'bSortable': false,
                                    'sWidth': '5%',
                                    'aTargets': [0, 1]
                                },
                                {
                                    'bSortable': false,
                                    'aTargets': [2]
                                }
                            ],
                            "bPaginate": false,
                            'iDisplayLength': 12,
                            "sPaginationType": "full_numbers"
                        });
                    });
                </script>
            </footer>
            <!-- /footer content -->

        </div>
        <!-- /page content -->
    @endsection
