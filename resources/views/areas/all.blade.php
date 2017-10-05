 @extends('layouts.master')
    @section('content')
        <div class="page-content">

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12 areas-buttons">
                                    <a href="{{ URL::route('areas.create') }}" title="" class="btn btn-success btn-sm area-btn pull-right">
                                        Add New Area
                                    </a>
                                </div>
                            </div>
                            <table id="areasall" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" class="tableflat" disabled readonly>
                                    </th>
                                    <th>Area Name</th>
                                    <th>Code</th>
                                    <th class=" no-link last"><span class="nobr" width="20%">Action</span>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($areas as $area)
                                    @if ($area->id % 2 == 0)
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="tableflat" disabled readonly>
                                            </td>
                                            <td class=" ">{{$area->name}} </td>
                                            <td class=" ">{{$area->code}}</td>
                                            <td class=" last">
                                                {!! Form::open(array('route' => array('areas.destroy', $area->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                {!! Form::close() !!}
                                                <a href="/areas/{{$area->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                <button class="btn btn-danger btn-sm delete">Delete</button>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="tableflat" disabled readonly>
                                            </td>
                                            <td class=" ">{{$area->name}} </td>
                                            <td class=" ">{{$area->code}}</td>
                                            <td class=" last">
                                                {!! Form::open(array('route' => array('areas.destroy', $area->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                {!! Form::close() !!}
                                                <a href="/areas/{{$area->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                <button class="btn btn-danger btn-sm delete">Delete</button>
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
            <script type="text/javascript" charset="utf-8" async defer>
                jQuery(document).ready(function($) {
                    var oTable = $('#areasall').dataTable({
                        "oLanguage": {
                            "sSearch": "Search all columns:"
                        },
                        "aoColumnDefs": [
                            {
                                'bSortable': false,
                                'aTargets': [0]
                            }, //disables sorting for column one
                            {
                                'sWidth': '15%',
                                'aTargets': [3]
                            }, //disables sorting for column one
                            {
                                'sWidth': '5%',
                                'aTargets': [0]
                            }
                        ],
                        // "bPaginate": false,
                        'iDisplayLength': 12,
                        "sPaginationType": "full_numbers"
                    });
                });
            </script>
        </div>
    @endsection
