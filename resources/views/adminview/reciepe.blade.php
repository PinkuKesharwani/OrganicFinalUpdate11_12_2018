@extends('adminlayout.adminmaster')
@section('title','Organic Dolchi | Recipe')
@section('content')
    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                        All Reciepe
                      </span>
                                    <?php $myrdata = \App\RecipeMaster::where(['is_active' => 1])->orderBy('id', 'desc')->get();?>
                                    <div id="recipe_table">
                                        <div class="row">
                                            <div class="col-md-3 pull-right">
                                                <input id="myInput" class="form-control search_icon"
                                                       placeholder="Search"
                                                       onkeyup="GlobalsearchTable('recipe_tablebody')" type="text">
                                            </div>
                                        </div>

                                        <table class="table table-striped table-bordered" id="recipelist_table">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th class="sorting"
                                                    onclick="w3.sortHTML('#recipelist_table','.item', 'td:nth-child(2)')">
                                                    User
                                                    Name
                                                    <i class="fa fa-sort"></i>
                                                </th>
                                                <th class="sorting"
                                                    onclick="w3.sortHTML('#recipelist_table','.item', 'td:nth-child(3)')">
                                                    Title
                                                    <i class="fa fa-sort"></i>
                                                </th>
                                                <th>Serving</th>
                                                <th class="sorting"
                                                    onclick="w3.sortHTML('#recipelist_table','.item', 'td:nth-child(5)')">
                                                    Difficulty Level
                                                    <i class="fa fa-sort"></i>
                                                </th>
                                                <th class="sorting"
                                                    onclick="w3.sortHTML('#recipelist_table','.item', 'td:nth-child(6)')">
                                                    Status
                                                    <i class="fa fa-sort"></i>
                                                </th>
                                                <th>option</th>
                                            </tr>
                                            </thead>
                                            <tbody id="recipe_tablebody">
                                            @foreach($myrdata as $obj)
                                                <tr class="item">
                                                    <td><img src="{{url('/').'/'.$obj->image}}" class="recipe_listimg">
                                                    </td>
                                                    <td>{{$obj->user->name}}</td>
                                                    <td>{{$obj->title}}</td>
                                                    <td>{{$obj->serve_count}}</td>
                                                    <td>{{$obj->difficulty_level}}</td>
                                                    {{--<td>{{$obj->desciption}}</td>--}}
                                                    <td>{{--{{$obj->is_approved}}--}}
                                                        @if($obj->is_approved == "pending")
                                                            <div class="status pending">Pending</div>
                                                        @elseif($obj->is_approved == "rejected")
                                                            <div class="status rejected">Rejected</div>
                                                        @else
                                                            <div class="status approved">Approved</div>
                                                        @endif
                                                    </td>
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
                                                                @if($obj->is_approved != "approved")
                                                                    <li>
                                                                        <a onclick="approvedr({{$obj->id}});">
                                                                            <i class="mdi mdi-check-circle optiondrop_icon"></i>
                                                                            Approved</a>
                                                                    </li>
                                                                @endif
                                                                @if($obj->is_approved != "rejected")
                                                                    <li>
                                                                        <a class="btnDelete"
                                                                           onclick="rejectr({{$obj->id}});">
                                                                            <i class="mdi mdi-close-box optiondrop_icon"></i>
                                                                            Rejected</a>
                                                                    </li>
                                                                @endif
                                                                <li><a class="border_none"
                                                                       onclick="viewmore(this,'{{$obj->id}}');"
                                                                       data-toggle="modal"
                                                                       data-target="#Modal_View_recipe">
                                                                        <i class="mdi mdi-more optiondrop_icon"></i>
                                                                        More</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        {{--@if($obj->is_approved=='approved'||$obj->is_approved=='rejected')--}}
                                                        {{--<a data-toggle="tooltip" title="Delete" href="#"--}}
                                                        {{--onclick="deleteR({{$obj->id}});" class="btn btn-primary">--}}
                                                        {{--<span class="glyphicon glyphicon-remove-sign"></span>--}}
                                                        {{--</a>--}}
                                                        {{--@else                                                        --}}
                                                        {{--<a data-toggle="tooltip" title="Approved" href="#"--}}
                                                        {{--onclick="approvedr({{$obj->id}});" class="btn btn-success ">--}}
                                                        {{--<span class="glyphicon glyphicon-ok"></span>--}}
                                                        {{--</a>--}}
                                                        {{--<a data-toggle="tooltip" title="Rejected" href="#"--}}
                                                        {{--onclick="rejectr({{$obj->id}});" class="btn btn-danger">--}}
                                                        {{--<span class="glyphicon glyphicon-remove"></span>--}}
                                                        {{--</a>--}}
                                                        {{--<button class="btn btn-success"--}}
                                                        {{--onclick="viewmore(this,'{{$obj->id}}');"><span--}}
                                                        {{--class="glyphicon glyphicon-info-sign"--}}
                                                        {{--data-toggle="modal"--}}
                                                        {{--data-target="#Modal_View_recipe"></span>--}}
                                                        {{--</button>--}}
                                                        {{--@endif--}}

                                                    </td>

                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div align="center">
                                         {{$all_items->links()}}
                                     </div>--}}

                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <section id="item_part2" class="hidealways">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       Add Testimonials
                                        {{--<button onclick="openAddform();" class="btn btn-default pull-right"><i
                                                    class="mdi mdi-plus"></i>Add</button>--}}
                      </span>
                                    <?php $userdata = \App\UserMaster::get();?>
                                    <select class="form-control" name="userid" id="userid">
                                        <option value="0">--select--</option>
                                        @foreach($userdata as $userobj)
                                            <option value="{{$userobj->id}}">{{$userobj->name}}</option>
                                        @endforeach
                                    </select>

                                    <textarea class="form-control" placeholder="Enter Review" name="review" id="review"
                                              cols="30" rows="10"></textarea>
                                    <input type="button" onclick="mytesti();" class="btn btn-primary btn-block"
                                           value="Add">
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </section>
    <div class="modal fade" id="myModalR" role="dialog">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div id="Rh" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Reason for Rejection</h4>
                </div>
                <div id="Rb" class="modal-body">
                    <textarea class="form-control resize_none" id="rejectdetails" placeholder="Reason for rejection"
                              rows="4"></textarea>
                </div>
                <div id="Rf" class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade-scale" id="Modal_View_recipe" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" style="display: none;">
        <div class="modal-dialog survey_model" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">View Details</h4>
                </div>
                <div class="modal-body" id="view_more">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        function approvedr(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure to change recipe status",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var myid = id;
                    $.get('{{url('approvereciepe')}}', {myid: myid}, function (data) {
                        if (data == 1) {
                            //location.reload();
                            $("#recipe_table").load(location.href + " #recipe_table");
                            myFunction();
                            $('#snackbar').html('');
                            $('#snackbar').addClass('show');
                            $('#snackbar').html('Status has been changed to Recipe');
                        } else {
                            swal("Recipe status not changed!");
                        }
                    });
                } else {
                    swal("Recipe status not changed!");
                }
            });
        }
        function rejectr(id) {
            $('#Rf').html('');
            $('#Rf').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="sendrejreq(' + id + ');" class="btn btn-danger">Reject</button>');
            $('#myModalR').modal();
        }

        function sendrejreq(id) {
            var myid = id;
            if ($('#rejectdetails').val() == "") {
                $('#rejectdetails').addClass('valmy');
                return false;
            } else {
                $('#rejectdetails').removeClass('valmy');
                var value = $('#rejectdetails').val();
                $.get('{{url('rejectRecip')}}', {myid: myid, value: value}, function (data) {
                    /* alert(data);*/
//                alert(data);
//                console.log(data);
//                location.reload();

                    if (data == 2) {
                        //location.reload();
                        $("#recipe_table").load(location.href + " #recipe_table");
                        myFunction();
                        $('#myModalR').modal('hide');
                        $('#rejectdetails').val('');
                        $('#snackbar').html('');
                        $('#snackbar').addClass('show');
                        $('#snackbar').html('Status has been changed to Recipe');
                    } else {
                        swal("Recipe status not changed!");
                    }
                });
            }
        }

        function deleteR(id) {
            myid = id;
            $.get('{{url('deleteRecip')}}', {myid: myid}, function (data) {
                console.log(data);
                location.reload();
            });
        }
        function openmyform() {
            $("#item_part1").addClass("hidealways");
            $("#item_part2").removeClass("hidealways");
        }
        function openlist() {
            $("#item_part1").removeClass("hidealways");
            $("#item_part2").addClass("hidealways");
        }
        function viewmore(dis, id) {
            $('#view_more').html('');
            $('#view_more').append('<div class="append_loadimg"><img class="loader_main" src="{{url('assets/images/1L.gif')}}"/></div>');
            $.get('{{url('viewmore_recipe')}}', {id: id}, function (data) {
                console.log(data);
                if (data == '') {
                    console.log(data)
                }
                else {
                    $('#view_more').html('');
                    $('#view_more').html(data);
                }
            });
//            var strVal = $('#recipe_ingradient').text();
//            alert(strVal);
//            var lastChar = strVal.slice(-1);
//            if (lastChar == ',') {
//                strVal = strVal.slice(0, -1);
//            }
//            alert(strVal);
//            $('#recipe_ingradient').text(strVal);

            //var text=$('#recipe_ingradient').text();
            //str = str.replace(/,\s*$/, "");
            // $('#recipe_ingradient').text($('#recipe_ingradient').replace(/,\s*$/,  ""));
        }
    </script>
@stop
{{--$("#myroll").load(location.href + " #myroll");--}}
{{--window.location.reload();--}}






