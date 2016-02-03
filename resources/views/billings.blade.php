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
                                <div class="packages-buttons pull-right">
                                    {!! Form::open(['url'=>'/billings','class'=>'form-horizontal form-label-left']) !!}
                                        <button id="send" type="submit" class="btn btn-success btn-sm package-btn">Generate Next Month Bills</button>
                                    {!! Form::close()!!}
                                </div>
                                <table id="billingall" class="table table-striped responsive-utilities jambo_table">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" class="tableflat">
                                        </th>
                                        <th>ID </th>
                                        <th>Client Details </th>
                                        <th>Month </th>
                                        <th>Amount </th>
                                        <th>Cumulative </th>
                                        <th class=" no-link last"><span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($billings as $billing)
                                            @if ($billing->id % 2 == 0)
                                                <tr class="even pointer">
                                                    <td class="a-center ">
                                                        <input type="checkbox" class="tableflat">
                                                    </td>
                                                    <td class=" ">{{sprintf("%'.05d\n", $billing->id)}}</td>
                                                    <td class=" ">{{$billing->client_id}} </td>
                                                    <td class=" ">{{$billing->month}}</td>
                                                    <td class=" ">{{$billing->bill_amount}}</td>
                                                    <td class=" ">
                                                    {{
                                                        DB::table('billings')
                                                        ->where('client_id', '=', $billing->client_id)
                                                        ->where('id', '<=', $billing->id)
                                                        ->sum('bill_amount')
                                                    }}
                                                    </td>
                                                    <td class=" last">
                                                        {!! Form::open(array('route' => array('billings.destroy', $billing->id), 'method' => 'delete')) !!}
                                                            <button type="submit" onclick="return confirm('Are you sure you want to delete the billing?')" class="btn btn-danger btn-sm">Delete</button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="odd pointer">
                                                    <td class="a-center ">
                                                        <input type="checkbox" class="tableflat">
                                                    </td>
                                                    <td class=" ">{{sprintf("%'.05d\n", $billing->id)}}</td>
                                                    <td class=" ">{{$billing->client_id}} </td>
                                                    <td class=" ">{{$billing->month}}</td>
                                                    <td class=" ">{{$billing->bill_amount}}</td>
                                                    <td class=" ">
                                                    {{
                                                        DB::table('billings')
                                                        ->where('client_id', '=', $billing->client_id)
                                                        ->where('id', '<=', $billing->id)
                                                        ->sum('bill_amount')
                                                    }}
                                                    </td>
                                                    <td class=" last">
                                                        {!! Form::open(array('route' => array('billings.destroy', $billing->id), 'method' => 'delete')) !!}
                                                            <button type="submit" onclick="return confirm('Are you sure you want to delete the billing?')" class="btn btn-danger btn-sm">Delete</button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
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
                        var oTable = $('#billingall').dataTable({
                            "oLanguage": {
                                "sSearch": "Search all columns:"
                            },
                            "aoColumnDefs": [
                                {
                                    'bSortable': false,
                                    'aTargets': [0]
                                }, //disables sorting for column one
                                {
                                    'sWidth': '10%',
                                    'aTargets': [6]
                                }
                            ],
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
