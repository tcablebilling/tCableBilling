 @extends('layouts.master')
    @section('content')
        <div class="page-content">

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12 packages-buttons">
                                    <a href="{{ URL::route('clients.create') }}" title="" class="btn btn-success btn-sm pull-right package-btn">
                                        Add New Client
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="clientall" class="table table-striped responsive-utilities jambo_table">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" class="tableflat" disabled readonly>
                                        </th>
                                        <th>Client ID </th>
                                        <th>Name </th>
                                        <th>Area </th>
                                        <th>Chanel Package </th>
                                        <th>Status </th>
                                        {{-- <th>Amount </th> --}}
                                        <th class=" no-link last"><span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($clients as $client)
                                        @if ($client->id % 2 == 0)
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat" disabled readonly>
                                                </td>
                                                <td class=" ">{{$client->area_name->code}}-{{sprintf("%'.03d\n", $client->id)}}</td>
                                                <td class=" ">{{$client->name}} </td>
                                                <td class=" ">{{(!empty($client->area_name->name)) ? $client->area_name->name : 'No Area !!!' }}</td>
                                                <td class=" ">{{(!empty($client->package->name)) ? $client->package->name : 'No Package Data !!!'}}</td>
                                                <td class=" ">{{$client->client_status}}</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('clients.destroy', $client->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                    {!! Form::close() !!}
                                                    <a href="{{URL::to('billings')}}?client_id={{$client->id}}" class="btn btn-sm btn-success">View</a>
                                                    <a href="{{URL::to('clients')}}/{{$client->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                    <button class="btn btn-danger btn-sm delete">Delete</button>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="odd pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat" disabled readonly>
                                                </td>
                                                <td class=" ">{{$client->area_name->code}}-{{sprintf("%'.03d\n", $client->id)}}</td>
                                                <td class=" ">{{$client->name}} </td>
                                                <td class=" ">{{(!empty($client->area_name->name)) ? $client->area_name->name : 'No Area !!!' }}</td>
                                                <td class=" ">{{(!empty($client->package->name)) ? $client->package->name : 'No Package Data !!!'}}</td>
                                                <td class=" ">{{$client->client_status}}</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('clients.destroy', $client->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                    {!! Form::close() !!}
                                                    <a href="{{URL::to('billings')}}?client_id={{$client->id}}" class="btn btn-sm btn-success">View</a>
                                                    <a href="{{URL::to('clients')}}/{{$client->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                    <button class="btn btn-danger btn-sm delete">Delete</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $clients->render() !!}
                        </div>
                    </div>
                </div>

                <br />
                <br />
                <br />

            </div>
            <script type="text/javascript" charset="utf-8" async defer>
                jQuery(document).ready(function($) {
                    var oTable = $('#clientall').dataTable({
                        "oLanguage": {
                            "sSearch": "Search all columns:"
                        },
                        "aoColumnDefs": [
                            {
                                'bSortable': false,
                                'aTargets': [0]
                            }, //disables sorting for column one
                            {
                                'sWidth': '20%',
                                'aTargets': [6]
                            }
                        ],
                        "bPaginate": false,
                        // 'iDisplayLength': 12,
                        // "sPaginationType": "full_numbers"
                    });
                });
            </script>
        </div>
    @endsection
