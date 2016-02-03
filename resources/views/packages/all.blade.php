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
                                    <a href="/packages/create" title="" class="btn btn-success btn-sm package-btn">
                                        Add New Package
                                    </a>
                                </div>
                                <table id="packagesall" class="table table-striped responsive-utilities jambo_table">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" class="tableflat">
                                        </th>
                                        <th>Package Name</th>
                                        <th>Fee</th>
                                        <th class=" no-link last"><span class="nobr" width="20%">Action</span>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($packages as $package)
                                        @if ($package->id % 2 == 0)
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">{{$package->name}} </td>
                                                <td class=" ">{{$package->fee}} Tk.</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('packages.destroy', $package->id), 'method' => 'delete')) !!}
                                                        <a href="/packages/{{$package->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete the package?')" class="btn btn-danger btn-sm">Delete</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="odd pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td>
                                                <td class=" ">{{$package->name}} </td>
                                                <td class=" ">{{$package->fee}} Tk.</td>
                                                <td class=" last">
                                                    {!! Form::open(array('route' => array('packages.destroy', $package->id), 'method' => 'delete')) !!}
                                                        <a href="/packages/{{$package->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete the package?')" class="btn btn-danger btn-sm">Delete</button>
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
                        var oTable = $('#packagesall').dataTable({
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
