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
                                <div class="areas-buttons pull-right">
                                    <a href="/areas/create" title="" class="btn btn-success btn-sm area-btn">
                                        Add New Area
                                    </a>
                                </div>
                                <table id="areasall" class="table table-striped responsive-utilities jambo_table">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" class="tableflat">
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
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">{{$area->name}} </td>
                                                <td class=" ">{{$area->code}}</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('areas.destroy', $area->id), 'method' => 'delete')) !!}
                                                        <a href="/areas/{{$area->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete the area?')" class="btn btn-danger btn-sm">Delete</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="odd pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">{{$area->name}} </td>
                                                <td class=" ">{{$area->code}}</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('areas.destroy', $area->id), 'method' => 'delete')) !!}
                                                        <a href="/areas/{{$area->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete the area?')" class="btn btn-danger btn-sm">Delete</button>
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
