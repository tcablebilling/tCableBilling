@extends('layouts.master')
    @section('content')
        <div class="page-content">
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 item form-group pull-right">
                                    {!! Form::open(['method'=>'GET', 'url'=>'billings','class'=>'form-horizontal form-label-left']) !!}
									<div class="row">
	                                    <div class="col-md-6 col-sm-6 col-xs-12">
	                                        {!! Form::select('client_id', $clients, $client_id,['class'=>'form-control col-md-7 col-xs-12 pull-right', 'required'=>'required', 'placeholder'=>'Select client...']);!!}
	                                    </div>
	                                    <div class="col-md-6 col-sm-6 col-xs-12">
		                                    <button id="send" type="submit" class="btn btn-success btn-sm package-btn pull-right">Filter</button>
                                    	</div>
                                	</div>
                                    {!! Form::close()!!}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="billingall" class="table table-striped responsive-utilities jambo_table">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" class="tableflat" disabled readonly>
                                        </th>
                                        <th>ID </th>
                                        <th>Client Details </th>
                                        <th>Month </th>
                                        <th>Amount </th>
                                        <th>Cumulative </th>
                                        <th>Paid</th>
                                        <th>Total</th>
                                        <th>Due </th>
                                        <th class=" no-link last"><span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($billings as $billing)
                                            @if ($billing->id % 2 == 0)
                                                <tr class="even pointer">
                                                    <td class="a-center ">
                                                        <input type="checkbox" class="tableflat" disabled readonly>
                                                    </td>
                                                    <td class=" ">{{sprintf("%'.05d\n", $billing->id)}}</td>
                                                    <td class=" ">
                                                        {{ $billing->clientDetails->name }}
                                                        <span class="client-details">Client ID: {{ $billing->clientDetails->area_name->code . '-' . sprintf("%'.03d\n", $billing->clientDetails->id) }}</span>
                                                    </td>
                                                    <td class=" ">{{ date('F Y', strtotime($billing->month)) }}</td>
                                                    <td class=" ">{{ $billing->bill_amount }} TK</td>
                                                    <td class=" ">{{ $bill_cum = $billing->getBillCumulativeSum() }} TK </td>
                                                    <td class=" ">{{ $billing->clientPayments->sum('paid_amount') }} TK</td>
                                                    <td class=" ">{{ $paid_cum = $billing->getPaidCumulativeSum() }} TK </td>
                                                    <td class=" ">{{ $bill_cum - $paid_cum }} TK </td>
                                                    <td class=" last">
                                                        {!! Form::open(array('route' => array('billings.destroy', $billing->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                        {!! Form::close() !!}
                                                        <button class="btn btn-danger btn-sm delete">Delete</button>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="odd pointer">
                                                    <td class="a-center ">
                                                        <input type="checkbox" class="tableflat" disabled readonly>
                                                    </td>
                                                    <td class=" ">{{ sprintf("%'.05d\n", $billing->id) }}</td>
                                                    <td class=" ">
                                                        {{ $billing->clientDetails->name }}
                                                        <span class="client-details">Client ID: {{ $billing->clientDetails->area_name->code . '-' . sprintf("%'.03d\n", $billing->clientDetails->id) }}</span>
                                                    </td>
                                                    <td class=" ">{{ date('F Y', strtotime($billing->month))}}</td>
                                                    <td class=" ">{{ $billing->bill_amount}} TK</td>
                                                    <td class=" ">{{ $bill_cum = $billing->getBillCumulativeSum() }} TK </td>
                                                    <td class=" ">{{ $billing->clientPayments->sum('paid_amount') }} TK</td>
                                                    <td class=" ">{{ $paid_cum = $billing->getPaidCumulativeSum() }} TK </td>
                                                    <td class=" ">{{ $bill_cum - $paid_cum }} TK </td>
                                                    <td class=" last">
                                                        {!! Form::open(array('route' => array('billings.destroy', $billing->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                        {!! Form::close() !!}
                                                        <button class="btn btn-danger btn-sm delete">Delete</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $billings->render() !!}
                        </div>
                    </div>
                </div>
                <br />
                <br />
                <br />
            </div>
            <script type="text/javascript" charset="utf-8" async defer>
                jQuery(document).ready(function($) {
                    var oTable = $('#billingall').DataTable({
                        "oLanguage": {
                            "sSearch": "Search all columns:"
                        },
                        "aoColumnDefs": [
                            {
                                'bSortable': false,
                                'aTargets': [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                            }, //disables sorting for column one
                            {
                                'sWidth': '10%',
                                'aTargets': [7]
                            },

                        ],
                        "bPaginate": false,
                        // 'iDisplayLength': 12,
                        // "sPaginationType": "full_numbers"
                    });
                });
            </script>
        </div>
    @endsection
