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
                                    <a href="{{ URL::route('employees.create') }}" title="" class="btn btn-success btn-sm pull-right package-btn">
                                        Add New Employee
                                    </a>
                                </div>
                            </div>
                            <table id="clientall" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" class="tableflat" disabled readonly>
                                    </th>
                                    <th>ID </th>
                                    <th>Name </th>
                                    <th>Mobile </th>
                                    <th>Phone(Home)</th>
                                    <th>Post </th>
                                    <th>Salary </th>
                                    {{-- <th>Amount </th> --}}
                                    <th class=" no-link last"><span class="nobr">Action</span>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($employees as $employee)
                                    @if ($employee->id % 2 == 0)
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="tableflat" disabled readonly>
                                            </td>
                                            <td class=" ">{{sprintf("%'.03d\n", $employee->id)}}</td>
                                            <td class=" ">{{$employee->name}} </td>
                                            <td class=" ">{{$employee->phone_personal}}</td>
                                            <td class=" ">{{$employee->phone_home}}</td>
                                            <td class=" ">{{$employee->post}}</td>
                                            <td class=" ">{{$employee->salary}}</td>
                                            <td class=" last">
                                                {!! Form::open(array('route' => array('employees.destroy', $employee->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                {!! Form::close() !!}
                                                <a href="/employees/{{$employee->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                <button class="btn btn-danger btn-sm delete">Delete</button>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="odd pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="tableflat" disabled readonly>
                                            </td>
                                            <td class=" ">{{sprintf("%'.03d\n", $employee->id)}}</td>
                                            <td class=" ">{{$employee->name}} </td>
                                            <td class=" ">{{$employee->phone_personal}}</td>
                                            <td class=" ">{{$employee->phone_home}}</td>
                                            <td class=" ">{{$employee->post}}</td>
                                            <td class=" ">{{$employee->salary}}</td>
                                            <td class=" last">
                                                {!! Form::open(array('route' => array('employees.destroy', $employee->id), 'method' => 'delete', 'id'=>'delete')) !!}
                                                {!! Form::close() !!}
                                                <a href="/employees/{{$employee->id}}/edit" class="btn btn-sm btn-success">Edit</a>
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
                                'sWidth': '10%',
                                'aTargets': [6]
                            },
                            {
                                'sWidth': '15%',
                                'aTargets': [7]
                            }
                        ],
                        "bPaginate": true,
                        'iDisplayLength': 12,
                        "sPaginationType": "full_numbers"
                    });
                });
            </script>
        </div>
    @endsection
