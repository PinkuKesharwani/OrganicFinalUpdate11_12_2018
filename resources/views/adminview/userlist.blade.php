@extends('adminlayout.adminmaster')

@section('title','Organic Dolchi | User List')
{{--<script src="https://www.w3schools.com/lib/w3.js"></script>--}}
@section('content')
    <section class="box_containner">
        <div class="container-fluid">
            <div class="row">
                <section id="menu2">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="dash_boxcontainner white_boxlist">
                            <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       All Users
                                    {{-- <button id="open_modal" class="btn btn-default pull-right"><i
                                                 class="mdi mdi-plus"></i>Add</button>--}}
                    </span>
                                <div id="snackbar">New Categories added Successfully</div>
                                {{--    <input id='myInput' class="form-control" placeholder="search" onkeyup='searchTable()' type='text'>--}}
                                <div class="row">
                                    <div class="col-md-3 pull-right">
                                        <input id='myInput' class="form-control search_icon" placeholder="search"
                                               onkeyup='GlobalsearchTable("userlist_body")' type='text'/>
                                    </div>
                                </div>
                                <section id="user_table">
                                    <table class="table table-striped table-bordered" id='myTable'>
                                        <thead>
                                        <tr>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(1)')">UserID
                                                <i class="fa fa-sort"></i>
                                            </th>
                                            <th class="sorting name"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(2)')">Name
                                                <i class="fa fa-sort"></i></th>
                                            <th>Email</th>
                                            {{--<th>Gender</th>--}}
                                            <th>Contact</th>
                                            <th class="sorting name status_td"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(5)')">Status
                                                <i class="fa fa-sort"></i></th>
                                            <th class="sorting" onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(6)')">COD
                                                <i class="fa fa-sort"></i>
                                                </th>
                                            <th class="text-center">Rewards</th>
                                            <th>Action</th>
                                            {{-- <th>Action</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody id="userlist_body">
                                        @foreach($user_data as $userobject)
                                            <tr class="item">
                                                <td>{{$userobject->id}}</td>
                                                <td class="name">{{$userobject->name}}</td>
                                                <td>{{$userobject->email}}</td>
                                                {{--<td>--}}
                                                {{--@if($userobject->gender=='male')--}}
                                                {{--<i class="fa fa-male fa-lg"></i>&nbsp;&nbsp;Male--}}
                                                {{--@else--}}
                                                {{--<i class="fa fa-female"></i>&nbsp;&nbsp;Female--}}
                                                {{--@endif--}}
                                                {{--</td>--}}
                                                <td>{{$userobject->contact}}</td>
                                                <td class="status_td">
                                                    @if($userobject->is_active=='1')
                                                        <div class="status approved">Active</div>
                                                    @else
                                                        <div class="status rejected">Inactive</div>
                                                    @endif
                                                </td>
                                                <td >
                                                    @if($userobject->is_cod_allow == 1)
                                                        <div class="status pending">Allow</div>
                                                    @else
                                                        <div class="status rejected">Dis-Allow</div>
                                                    @endif
                                                </td>

                                                <td class="text-center">{{$userobject->gain_amount}}</td>
                                                <td>
                                                    <div class="btn-group grid_btn_box">
                                                        <button type="button"
                                                                class="btn btn-primary btn-sm action-btn"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Options
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-primary btn-sm action-btn"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="true"><span
                                                                    class="caret"></span><span
                                                                    class="sr-only"></span></button>
                                                        <ul class="dropdown-menu dropdown-menu-right grid-dropdown">
                                                            @if($userobject->is_cod_allow != 1)
                                                                <li>
                                                                    <a onclick="activatecod({{$userobject->id}});">
                                                                        <i class="mdi mdi-check-circle optiondrop_icon"></i>
                                                                        Cod Allow</a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a class="btnDelete"
                                                                       onclick="deactivatecod({{$userobject->id}});">
                                                                        <i class="mdi mdi-close-box optiondrop_icon"></i>
                                                                        Cod Dis-Allow</a>
                                                                </li>
                                                            @endif
                                                            @if($userobject->is_active=='1')
                                                                <li>
                                                                    <a onclick="deactivate({{$userobject->id}});">
                                                                        <i class="mdi mdi-account-remove optiondrop_icon"></i>
                                                                        Inactive</a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a class="btnDelete"
                                                                       onclick="activate({{$userobject->id}});">
                                                                        <i class="mdi mdi-account-check optiondrop_icon"></i>
                                                                        Active</a>
                                                                </li>
                                                            @endif
                                                            <li><a class="border_none"
                                                                   onclick="UserMoreDetails({{$userobject->id}});"
                                                                   data-toggle="modal"
                                                                   data-target="#user_view_details">
                                                                    <i class="mdi mdi-more optiondrop_icon"></i>
                                                                    More</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                {{--<td>--}}
                                                {{--@if($userobject->is_cod_allow != 1)--}}
                                                {{--<button class="btn btn-primary btn-xs"--}}
                                                {{--onclick="activatecod({{$userobject->id}});">Cod Allow--}}
                                                {{--</button>--}}
                                                {{--@else--}}
                                                {{--<button class="btn btn-info btn-xs"--}}
                                                {{--onclick="deactivatecod({{$userobject->id}});">Cod--}}
                                                {{--Dis-Allow--}}
                                                {{--</button>--}}
                                                {{--@endif--}}
                                                {{--</td>--}}
                                                {{-- <td>       <div class="btn-group">
                                                         <button type="button" class="btn btn-primary btn-sm action-btn"
                                                                 data-toggle="dropdown" aria-haspopup="true"
                                                                 aria-expanded="false">Options
                                                         </button>
                                                         <button type="button" class="btn btn-primary btn-sm action-btn"
                                                                 data-toggle="dropdown" aria-haspopup="true"
                                                                 aria-expanded="true"><span class="caret"></span><span
                                                                     class="sr-only">Toggle Dropdown</span></button>
                                                         <ul class="dropdown-menu dropdown-menu-right grid-dropdown">
                                                          --}}{{--   <li><a href="#" onclick="" data-toggle="modal"
                                                                    data-target="#"><i
                                                                             class="mdi mdi-lead-pencil optiondrop_icon"></i>Edit</a>
                                                             </li>
                                                             <li><a href="#" onclick=""><i
                                                                             class="mdi mdi-delete optiondrop_icon"></i>Delete</a>
                                                             </li>--}}{{--
                                                             <li><a href="#"
                                                                    onclick="inactiveuser({{$userobject->id}});"
                                                                    class="border_none" data-toggle="modal"
                                                                    data-target=""><i
                                                                             class="mdi mdi-star optiondrop_icon"></i>Inactive User</a>
                                                             </li>
                                                             <li><a href="#"
                                                                    onclick="show_full({{$userobject->id}});"
                                                                    class="border_none" data-toggle="modal"
                                                                    data-target=""><i
                                                                             class="mdi mdi-more optiondrop_icon"></i>More</a>
                                                             </li>
                                                         </ul>
                                                     </div>

                                                 </td>--}}
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                    <div align="center">
                                        {{$user_data->links()}}
                                    </div>
                                </section>
                            </div>


                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="modal fade-scale" id="user_view_details" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog survey_model" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">User Details</h4>
                </div>
                <div class="modal-body" id="view_usermore">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        function UserMoreDetails(id) {
            $('#view_usermore').html('');
            $('#view_usermore').append('<div class="append_loadimg"><img class="loader_main" src="{{url('assets/images/1L.gif')}}"/></div>');
            var moreurl = '{{ url('user_details') }}' + '/' + id;
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: moreurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('#view_usermore').html('');
                    $('#view_usermore').html(data);
                },
                error: function (xhr, status, error) {
                    $('#view_usermore').html(xhr.responseText);
                }
            });
        }
        function show_full(id) {
            $('#myheader').html('');
            $('#mybody').html('');
            $('#myfooter').html('');
            $('#myheader').html('User Info  <button type="button" class="close"  data-dismiss="modal">&times;</button>');
            $('#myfooter').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
            $('#myModalsmall').modal();
            var editurl = '{{ url('usershow') }}' + '/' + id;
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('.modal-body').html(data);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                }
            });
        }
        function activate(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure to Active this user",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var IDD = id;
                    $.ajax({
                        type: "get",
                        url: "{{url('/activate_user')}}",
                        data: "IDD= " + IDD,
                        success: function (data) {
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('User Is Active');
                            $("#user_table").load(location.href + " #user_table");
                        },
                        error: function (data) {

                        }
                    });
                } else {
                    swal("User status not changed!");
                }
            });
        }
        function deactivate(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure to Inactive this user",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var IDD = id;
                    $.ajax({
                        type: "get",
                        url: "{{url('/deactivate_user')}}",
                        data: "IDD= " + IDD,
                        success: function (data) {
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('User Is Inactive');
                            $("#user_table").load(location.href + " #user_table");
                        },
                        error: function (data) {

                        }
                    });
                } else {
                    swal("User status not changed!");
                }
            });
        }
        function activatecod(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure to Cod allow for this user",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var IDD = id;
                    $.ajax({
                        type: "get",
                        url: "{{url('/activate_user_cod')}}",
                        data: "IDD= " + IDD,
                        success: function (data) {
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('Cod allow for this user');
                            $("#user_table").load(location.href + " #user_table");
                        },
                        error: function (data) {

                        }
                    });
                } else {
                    swal("User Cod not changed!");
                }
            });
        }
        function deactivatecod(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure to Cod not allow for this user",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var IDD = id;
                    $.ajax({
                        type: "get",
                        url: "{{url('/deactivate_user_cod')}}",
                        data: "IDD= " + IDD,
                        success: function (data) {
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('User Cod Is Inactive');
                            $("#user_table").load(location.href + " #user_table");
                        },
                        error: function (data) {

                        }
                    });
                } else {
                    swal("User Cod not changed!");
                }
            });
        }
        function myFunction() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>
@stop