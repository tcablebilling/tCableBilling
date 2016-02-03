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
                                <table id="clientall" class="table table-striped responsive-utilities jambo_table">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" class="tableflat">
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
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">{{$client->client_id}}</td>
                                                <td class=" ">{{$client->name}} </td>
                                                <td class=" ">{{(!empty($client->area_name->name)) ? $client->area_name->name : 'No Area !!!' }}</td>
                                                <td class=" ">{{(!empty($client->package->name)) ? $client->package->name : 'No Package Data !!!'}}</td>
                                                <td class=" ">{{$client->client_status}}</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('clients.destroy', $client->id), 'method' => 'delete')) !!}
                                                        <a href="#" class="btn btn-sm btn-success">View</a>
                                                        <a href="/clients/{{$client->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete the client?')" class="btn btn-danger btn-sm">Delete</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="odd pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">{{$client->client_id}}</td>
                                                <td class=" ">{{$client->name}} </td>
                                                <td class=" ">{{(!empty($client->area_name->name)) ? $client->area_name->name : 'No Area !!!' }}</td>
                                                <td class=" ">{{(!empty($client->package->name)) ? $client->package->name : 'No Package Data !!!'}}</td>
                                                <td class=" ">{{$client->client_status}}</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('clients.destroy', $client->id), 'method' => 'delete')) !!}
                                                        <a href="#" class="btn btn-sm btn-success">View</a>
                                                        <a href="/clients/{{$client->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete the client?')" class="btn btn-danger btn-sm">Delete</button>
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
