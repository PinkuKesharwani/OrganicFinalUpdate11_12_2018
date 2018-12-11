@extends('adminlayout.adminmaster')

@section('title','Organic Dolchi | Review')

@section('content')
    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="menu2">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="dash_boxcontainner white_boxlist">
                            <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       All Reviews
                                    {{-- <button id="open_modal" class="btn btn-default pull-right"><i
                                                 class="mdi mdi-plus"></i>Add</button>--}}
                    </span>
                                <div class="row">
                                    <div class="col-md-3 pull-right">
                                        <input id='myInput' class="form-control search_icon" placeholder="search"
                                               onkeyup='GlobalsearchTable("mytable_body")' type='text'/>
                                    </div>
                                </div>

                                <section id="user_table">
                                    <table class="table table-striped table-bordered" id='myTable'>
                                        <thead>
                                        <tr>
                                            <th class="sorting name"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(1)')">Name
                                                <i class="fa fa-sort"></i>
                                            </th>
                                            <th class="name">Email</th>
                                            <th>Review</th>
                                            <th class="sorting name"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(4)')">Star
                                                <i class="fa fa-sort"></i></th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="mytable_body">
                                        <section id="allrow">
                                            <p id="norecord"></p>
                                            @foreach($review_data as $review_obj)
                                                <tr class="item">
                                                    <td class="name">{{$review_obj->name}}</td>
                                                    <td class="name">{{$review_obj->email}}</td>
                                                    <td>{{$review_obj->review}}</td>
                                                    {{-- <td>{{str_limit($review_obj->review,25)}}</td>--}}
                                                    <td>{{$review_obj->star_rating}}<i class="mdi mdi-star"></i></td>
                                                    @if($review_obj->is_approved=='0')
                                                        <td><label class="switch">
                                                                <input onchange="CheckStatus(this, {{$review_obj->id}});"
                                                                       type="checkbox"/>
                                                                <span class="slider round"></span>
                                                            </label></td>
                                                    @else
                                                        <td><label class="switch">
                                                                <input onchange="CheckStatus(this, {{$review_obj->id}});"
                                                                       type="checkbox" checked/>
                                                                <span class="slider round"></span>
                                                            </label></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </section>
                                        </tbody>
                                    </table>

                                </section>
                                <div id="snackbar">New Categories added Successfully</div>
                            </div>


                        </div>
                    </div>
                </section>


            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('#norecord').hide();
        });
        function CheckStatus(dis, get_id) {
            var chkstatus = $(dis).prop("checked");
            var IDD = get_id;
            if (chkstatus == false) {
                $.ajax({
                    type: "get",
                    url: "{{url('/un_activate_review')}}",
                    data: "IDD= " + IDD,
                    success: function (data) {
                        myFunction();
                        $('#snackbar').html('');
                        $('#snackbar').addClass('show');
                        $('#snackbar').html('Review Successfully Hide.');
                        $("#allrow").load(location.href + " #allrow");
                    },
                    error: function (data) {

                    }
                });
            } else {
                $.ajax({
                    type: "get",
                    url: "{{url('/activate_review')}}",
                    data: "IDD= " + IDD,
                    success: function (data) {
                        myFunction();
                        $('#snackbar').html('');
                        $('#snackbar').addClass('show');
                        $('#snackbar').html('Review Successfully Show.');
                        $("#user_table").load(location.href + " #user_table");
                    },
                    error: function (data) {

                    }
                });
            }
        }
        function aprove(id) {
            var IDD = id;
            $.ajax({
                type: "get",
                url: "{{url('/activate_review')}}",
                data: "IDD= " + IDD,
                success: function (data) {
                    myFunction();
                    $('#snackbar').html('');
                    $('#snackbar').addClass('show');
                    $('#snackbar').html('Review Successfully Approved');
                    $("#user_table").load(location.href + " #user_table");
                },
                error: function (data) {

                }
            });

        }

        function unaprove(id) {
            var IDD = id;
            $.ajax({
                type: "get",
                url: "{{url('/un_activate_review')}}",
                data: "IDD= " + IDD,
                success: function (data) {
                    myFunction();
                    $('#snackbar').html('');
                    alert(data);
                    //if(data == 1)
                    $('#snackbar').addClass('show');
                    $('#snackbar').html('Review Successfully Denied');
                    $("#allrow").load(location.href + " #allrow");
                },
                error: function (data) {

                }
            });

        }


    </script>





    {{--////////////////////////////////////////////////*****Start Menu 3******//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}



    {{--///////////////////////////////////////////////////////////////////*****end Menu2*****//////////////////////////////////////////////////////////////////////////////////////////////////--}}
@stop
{{--$("#item_form").load(location.href + " #item_form");--}}
{{--window.location.reload();--}}


