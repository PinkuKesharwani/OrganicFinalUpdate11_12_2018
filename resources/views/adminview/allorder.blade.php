@extends('adminlayout.adminmaster')

@section('title','Organic Dolchi | OrderList')

@section('content')

    <style type="text/css">

        .rejected
        {
            max-width: 140px;
        }
    </style>

    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="menu2">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="dash_boxcontainner white_boxlist">
                            <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       All Orders
                                    {{-- <button id="open_modal" class="btn btn-default pull-right"><i--}}
                                    {{--class="mdi mdi-plus"></i>Add</button>--}}
                    </span>

                                <div id="snackbar">New Order added Successfully</div>
                                <div class="row">
                                    <div class="col-md-3 pull-right">
                                        <input id="myInput" class="form-control admin_searchicon" placeholder="Search"
                                               onkeyup="GlobalsearchTable('allorder_tablebody')" type="text">
                                    </div>
                                </div>
                                {{--<input id='myInput' class="form-control" placeholder="search"--}}
                                {{--onkeyup='searchTable()' type='text'>--}}
                                <section id="user_table">
                                    <table class="table table-striped table-bordered" id='myTable'>
                                        <thead>
                                        <tr>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(1)')">Order No
                                                <i class="fa fa-sort"></i>
                                            </th>
                                            <th>Date</th>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(3)')">User
                                                <i class="fa fa-sort"></i>
                                            </th>
                                            <th class="text-center">Total Items</th>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(5)')">Status
                                                <i class="fa fa-sort"></i>
                                            </th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="allorder_tablebody">
                                        @foreach($orderdata as $order_object)
                                            <tr class="item">
                                                <td>{{$order_object->order_no}}</td>
                                                <td>{{$order_object->order_date}}</td>
                                                <td>{{$order_object->user->name}}</td>
                                                <td class="text-center">{{DB::table('order_description')->where('order_master_id',$order_object->id)->get()->count()}}
                                                    {{--@if($order_object->is_active=='1')--}}
                                                    {{--<div class="status pending">Active</div>--}}
                                                    {{--@else--}}
                                                    {{--<div class="status approved">Inactive</div>--}}
                                                    {{--@endif--}}
                                                </td>

                                                <td>@if($order_object->is_cancelled==0)

                                                    @if($order_object->status == "Ordered")
                                                        <div class="btn-group grid_btn_box">
                                                            <button type="button"
                                                                    class="btn btn-warning btn-sm action-btn"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">Ordered
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-warning btn-sm action-btn"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="true"><span
                                                                        class="caret"></span><span
                                                                        class="sr-only"></span></button>
                                                            <ul class="dropdown-menu dropdown-menu-right grid-dropdown">
                                                                <li><a onclick="packed({{$order_object->id}});">
                                                                        <i class="mdi mdi-package-variant optiondrop_icon"></i>Packed</a>
                                                                </li>
                                                                <li><a onclick="shipped({{$order_object->id}});">
                                                                        <i class="mdi mdi-truck optiondrop_icon"></i>
                                                                        Shipped</a>
                                                                </li>
                                                                <li><a onclick="delivered({{$order_object->id}});"
                                                                       class="border_none">
                                                                        <i class="mdi mdi-truck-delivery optiondrop_icon"></i>
                                                                        Delivered</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @elseif($order_object->status == "Packed")
                                                        <div class="btn-group grid_btn_box">
                                                            <button type="button"
                                                                    class="btn btn-danger btn-sm action-btn"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">Packed
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-danger btn-sm action-btn"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="true"><span
                                                                        class="caret"></span><span
                                                                        class="sr-only"></span></button>
                                                            <ul class="dropdown-menu dropdown-menu-right grid-dropdown">

                                                                <li><a onclick="shipped({{$order_object->id}});">
                                                                        <i class="mdi mdi-truck optiondrop_icon"></i>
                                                                        Shipped</a>
                                                                </li>
                                                                <li><a onclick="delivered({{$order_object->id}});"
                                                                       class="border_none">
                                                                        <i class="mdi mdi-truck-delivery optiondrop_icon"></i>
                                                                        Delivered</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @elseif($order_object->status == "Shipped")
                                                        <div class="btn-group grid_btn_box">
                                                            <button type="button"
                                                                    class="btn btn-success btn-sm action-btn"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">Shipped
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-success btn-sm action-btn"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="true"><span
                                                                        class="caret"></span><span
                                                                        class="sr-only"></span></button>
                                                            <ul class="dropdown-menu dropdown-menu-right grid-dropdown">
                                                                <li><a onclick="delivered({{$order_object->id}});"
                                                                       class="border_none">
                                                                        <i class="mdi mdi-truck-delivery optiondrop_icon"></i>
                                                                        Delivered</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @elseif($order_object->status == "Delivered")
                                                        <div class="status approved">Delivered</div>
                                                    @endif
                                                    @else
                                                        <div class="status rejected">Cancelled by {{$order_object->cencalled_by}}</div>
                                                    @endif
                                                </td>
                                                <td class="text-right">{{$order_object->bill_amount}}</td>
                                                <td>
                                                    <div class="btn-group grid_btn_box">
                                                        <button type="button" class="btn btn-primary btn-sm action-btn"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Options
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-sm action-btn"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="true"><span class="caret"></span><span
                                                                    class="sr-only"></span></button>
                                                        <ul class="dropdown-menu dropdown-menu-right grid-dropdown">

                                                            <li>
                                                                <a href='{{url("/bill_order/{$order_object->id}")}}'
                                                                   target="_blank">
                                                                    <i class="mdi mdi-clipboard-text optiondrop_icon">

                                                                    </i>
                                                                    Bill</a>
                                                            </li>
                                                            <li>
                                                                @if($order_object->is_cancelled=='0')
                                                                    @if($order_object->status != "Delivered")
                                                                        <a class="btnDelete" data-toggle="modal"
                                                                           data-target="#reason_Modal"
                                                                           onclick="ReasonforCancle({{$order_object->id}});">
                                                                            <i class="mdi mdi-close-box optiondrop_icon"></i>
                                                                            Cancle</a>
                                                                    @endif
                                                                @else
                                                                    {{--<a class="btnDelete">--}}
                                                                    {{--<i class="mdi mdi-briefcase-check optiondrop_icon"></i>--}}
                                                                    {{--Active</a>--}}
                                                                @endif
                                                            </li>
                                                            <li><a class="border_none"
                                                                   onclick="more_full({{$order_object->id}});"
                                                                   data-toggle="modal" data-target="#myModal">
                                                                    <i class="mdi mdi-more optiondrop_icon"></i>
                                                                    More</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                {{--<td>--}}
                                                {{--<div class="dropdown">--}}
                                                {{--<button class="btn btn-success btn-sm">Status Change</button>--}}
                                                {{--<div class="dropdown-content">--}}
                                                {{--<a onclick="ordered({{$order_object->id}});" href="#">Ordered</a>--}}
                                                {{--<a onclick="packed({{$order_object->id}});"--}}
                                                {{--href="#">Packed</a>--}}
                                                {{--<a onclick="shipped({{$order_object->id}});" href="#">Shipped</a>--}}
                                                {{--<a onclick="delivered({{$order_object->id}});" href="#">Delivered</a>--}}
                                                {{--</div>--}}
                                                {{--</div>      --}}
                                                {{--<div class="dropdown">--}}
                                                {{--<button class="btn btn-success btn-sm">ON/OFF</button>--}}
                                                {{--<div class="dropdown-content">--}}
                                                {{--<a onclick="active({{$order_object->id}});"--}}
                                                {{--href="#">Active</a>--}}
                                                {{--<a onclick="inactive({{$order_object->id}});" href="#">InActive</a>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<a href='{{url("/bill_order/{$order_object->id}")}}'--}}
                                                {{--target="_blank">--}}
                                                {{--<button class="btn btn-primary btn-sm">Bill &nbsp;<i--}}
                                                {{--class="mdi mdi-clipboard-text"></i></button>--}}
                                                {{--</a>&nbsp;&nbsp;--}}
                                                {{--<button onclick="more_full({{$order_object->id}});"--}}
                                                {{--data-toggle="modal" data-target="#myModal"--}}
                                                {{--class="btn btn-primary btn-sm">More &nbsp;<i--}}
                                                {{--class="mdi mdi-eye"></i></button>--}}
                                                {{--</td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <div class="modal fade" id="reason_Modal" role="dialog">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reason For Order Cancelation</h4>
                </div>
                <div class="modal-body edit_item_container">
                      <textarea class="form-control resize_none" placeholder="Enter Order Cancelation Reason"
                                name="reason_cancelation"
                                id="reason_cancelation"
                                cols="30" rows="4"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"  data-dismiss="modal" >Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitreason();">Submit</button>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        var get_orderid = "";
        function ReasonforCancle(id) {
            get_orderid = id;
        }
        function submitreason() {
            if ($('#reason_cancelation').val() == "") {
                $('#reason_cancelation').addClass('valmy');
                return false;
            } else {
                $('#reason_cancelation').removeClass('valmy');
                //inactive(get_orderid);
                $.ajax({
                    type: "get",
                    url: "{{url('/cancle_order')}}",
                    data: {IDD: get_orderid,reson:$('#reason_cancelation').val(),can_by:"admin"},
                    success: function (data) {
                        if(data.success==true) {
                            $("#user_table").load(location.href + " #user_table");
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('order is Cancelled.');
                            $('#reason_Modal').modal('hide');
                        }else{
                            console.log('%c Error','color:red');
                            console.log(data);
                        }
                    },
                    error: function (data) {
                    }
                });
            }
        }
        function more_full(id) {
            // $('#myModal').modal();
            // $('#myfooter').html('');
            $('#myheader').html('Order Detail');
            // $('#myfooter').html('<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>');
            /*alert(id);*/
            /*var IDD= id;*/
            $('#mybody').html('<img height="50px" class="center-block" src="{{url('images/loading.gif')}}"/>');
            var editurl1 = '{{ url('more_order') }}' + '/' + id;
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl1,
                data: '{"data":"' + id + '"}',
                success: function (data) {

                    $('#mybody').html(data);

                },
                error: function (xhr, status, error) {
                    $('#mybody').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        }
        function active(id) {
            $.ajax({
                type: "get",
                url: "{{url('/active_order')}}",
                data: {IDD: id},
                success: function (data) {
                    $("#user_table").load(location.href + " #user_table");
                    myFunction();
                    $('#snackbar').html('');
                    $('#snackbar').addClass('show');
                    $('#snackbar').html('order is active');
                },
                error: function (data) {
                }
            });
        }

        function inactive(id) {
            $.ajax({
                type: "get",
                url: "{{url('/inactive_order')}}",
                data: {IDD: id},
                success: function (data) {
                    $("#user_table").load(location.href + " #user_table");
                    myFunction();
                    $('#snackbar').html('');
                    $('#snackbar').addClass('show');
                    $('#snackbar').html('order is Cancelled.');
                },
                error: function (data) {
                }
            });
        }
        function ordered(id) {
            $.ajax({
                type: "get",
                url: "{{url('/ordered')}}",
                data: {IDD: id},
                success: function (data) {
                    $("#user_table").load(location.href + " #user_table");
                    myFunction();
                    $('#snackbar').html('');
                    $('#snackbar').addClass('show');
                    $('#snackbar').html('Status has been changed to Ordered');
                },
                error: function (data) {
                }
            });

        }
        function packed(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure to change order status",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "get",
                        url: "{{url('/packed')}}",
                        data: {IDD: id},
                        success: function (data) {
                            $("#user_table").load(location.href + " #user_table");
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('Status has been changed to Packed');

                        },
                        error: function (data) {

                        }
                    });
                } else {
                    swal("Order status not changed!");
                }
            });
        }
        function shipped(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure to change order status",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "get",
                        url: "{{url('/shipped')}}",
                        data: {IDD: id},
                        success: function (data) {
                            $("#user_table").load(location.href + " #user_table");
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('Status has been changed to Shipped');
                        },
                        error: function (data) {
                        }
                    });
                } else {
                    swal("Order status not changed!");
                }
            });
        }
        function delivered(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure to change order status",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "get",
                        url: "{{url('/delivered')}}",
                        data: {IDD: id},
                        success: function (data) {
                            $("#user_table").load(location.href + " #user_table");
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('Status has been changed to Delivered');
                        },
                        error: function (data) {

                        }
                    });
                } else {
                    swal("Order status not changed!");
                }
            });
        }
    </script>
@stop


