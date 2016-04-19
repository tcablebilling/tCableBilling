{{-- @inject('carbon', 'Carbon') --}}
@extends('layouts.master')
    @section('content')
        <div class="page-content">

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12 item form-group">
                                    {!! Form::open(['method'=>'GET', 'url'=>'payments','class'=>'form-horizontal form-label-left']) !!}
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::select('client_id', $clients, $client_id,['class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'placeholder'=>'Select client...']);!!}
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button id="send" type="submit" class="btn btn-success btn-sm package-btn">Filter</button>
                                        </div>
                                    </div>
                                    {!! Form::close()!!}
                                </div>
                                <div class="col-md-4 packages-buttons">
                                    <a href="{{ URL::route('payments.create') }}" title="" class="btn btn-success btn-sm package-btn pull-right">
                                        Add New Payment
                                    </a>
                                </div>
                            </div>
                            <div class="packages-buttons pull-right">

                            </div>
                            <div class="table-responsive">
                                <table id="packagesall" class="table table-striped responsive-utilities jambo_table">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" class="tableflat" disabled readonly>
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
                                                    <input type="checkbox" class="tableflat" disabled readonly>
                                                </td>
                                                <td class=" ">{{sprintf("%'.05d\n", $payment->id)}} </td>
                                                <td class=" ">
                                                    {{$payment->clientDetails->name}}
                                                    <span class="client-details">Client ID: {{ $payment->clientDetails->area_name->code . '-' . sprintf("%'.03d\n", $payment->clientDetails->id) }}</span>
                                                </td>
                                                <td class=" ">{{ date('F d, Y', strtotime($payment->date)) }}</td>
                                                <td class=" ">{{ sprintf("%'.05d\n", $payment->billing_id) }}</td>
                                                <td class=" ">{{ $payment->paid_amount }} TK</td>
                                                <td class=" ">{{$payment->paymentPaidCumulative()}} TK</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('payments.destroy', $payment->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                    {!! Form::close() !!}
                                                    <a href="/payments/{{$payment->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                    <button class="btn btn-danger btn-sm delete">Delete</button>
                                                </td>

                                            </tr>
                                        @else
                                            <tr class="odd pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat" disabled readonly>
                                                </td>
                                                <td class=" ">{{sprintf("%'.05d\n", $payment->id)}}  </td>
                                                <td class=" ">
                                                    {{$payment->clientDetails->name}}
                                                    <span class="client-details">Client ID: {{ $payment->clientDetails->area_name->code . '-' . sprintf("%'.03d\n", $payment->clientDetails->id) }}</span>
                                                </td>
                                                <td class=" ">{{date('F d, Y', strtotime($payment->date))}}</td>
                                                <td class=" ">{{sprintf("%'.05d\n", $payment->billing_id)}}</td>
                                                <td class=" ">{{$payment->paid_amount}} TK</td>
                                                <td class=" ">{{$payment->paymentPaidCumulative()}} TK</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('payments.destroy', $payment->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                    {!! Form::close() !!}
                                                    <a href="/payments/{{$payment->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                    <button class="btn btn-danger btn-sm delete">Delete</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $payments->render() !!}
                        </div>
                    </div>
                </div>

                <br />
                <br />
                <br />

            </div>
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
        </div>
    @endsection
