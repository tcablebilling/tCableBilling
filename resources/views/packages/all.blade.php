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
                                    <a href="{{ URL::route('packages.create') }}" title="" class="btn btn-success btn-sm package-btn pull-right">
                                        Add New Package
                                    </a>
                                </div>
                            </div>
                            <table id="packagesall" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" class="tableflat" disabled readonly>
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
                                                <input type="checkbox" class="tableflat" disabled readonly>
                                            </td>
                                            <td class=" ">{{$package->name}} </td>
                                            <td class=" ">{{$package->fee}} Tk.</td>
                                            <td class=" last">
                                                {!! Form::open(array('route' => array('packages.destroy', $package->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                {!! Form::close() !!}
                                                <a href="/packages/{{$package->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                <button class="btn btn-danger btn-sm delete">Delete</button>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="tableflat" disabled readonly>
                                            </td>
                                            <td class=" ">{{$package->name}} </td>
                                            <td class=" ">{{$package->fee}} Tk.</td>
                                            <td class=" last">
                                                {!! Form::open(array('route' => array('packages.destroy', $package->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                {!! Form::close() !!}
                                                <a href="/packages/{{$package->id}}/edit" class="btn btn-sm btn-success">Edit</a>
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
        </div>
    @endsection
