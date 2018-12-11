@extends('adminlayout.adminmaster')

@section('title','Organic Dolchi | Staff')

@section('content')

    <script src="{{url('js/my_validation.js')}}"></script>
    <style>

    </style>

    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       Staff List
                                        <button onclick="GlobalHideShow('item_part2','item_part1');"
                                                class="btn btn-default btn-sm pull-right"><i
                                                    class="mdi mdi-plus"></i>Add</button>
                      </span>
                                    <?php $myrdata = \App\LoginModel::where(['is_active' => 1])->orderBy('id', 'desc')->get();?>
                                    <div class="row">
                                        <div class="col-md-3 pull-right">
                                            <input id="myInput" class="form-control search_icon" placeholder="Search"
                                                   onkeyup="GlobalsearchTable('roll_tablebody')" type="text">
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(1)')">Name
                                                <i class="fa fa-sort"></i>
                                            </th>
                                            <th>Select Menu</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="roll_tablebody">
                                        @foreach($myrdata as $obj)
                                            <tr class="item">
                                                {{--@if($obj->image==''||$obj->image==null)--}}
                                                {{--<td><img style="height: 90px;" src="{{url('du.png')}}"></td>--}}
                                                {{--@else--}}
                                                {{--<td><img style="height: 90px;" src="{{url('/admin_pic').'/'.$obj->id.'/'.$obj->image}}"></td>--}}
                                                {{--@endif--}}
                                                <td>{{$obj->username}}</td>
                                                {{--<td>{{$obj->rm->roll}}</td>--}}
                                                <td>
                                                    <?php $myalldata = \App\Menurolemodel::where(['user_id' => $obj->id])->get();?>
                                                    @foreach($myalldata as $myobj)
                                                        <div class="menus_box"><i
                                                                    class="mdi mdi-account-check"></i>{{ucwords($myobj->mnmy->menu)}}
                                                        </div>
                                                    @endforeach

                                                </td>
                                                <td><a href="{{url('/getfullrole').'/'.$obj->id}}"><input type="button"
                                                                                                          class="btn btn-primary btn-xs"
                                                                                                          value="Update"></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
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
                        <div class="col-sm-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       Add Staff Member
                                        <button onclick="GlobalHideShow('item_part1','item_part2');"
                                                class="btn btn-default pull-right"><i
                                                    class="mdi mdi-content-duplicate"></i>List</button>
                      </span>
                                    <form action="{{url('/postrollmaster')}}" method="get" id="rollinsert"
                                          enctype="multipart/form-data" onsubmit="Checkvalidation();">
                                        <div class="main_form_insert">
                                            <input type="text" onkeyup="checkusername();" name="username"
                                                   class="form-control" placeholder="Enter User Name" id="username">
                                            <input type="password" name="password1" class="form-control"
                                                   placeholder="Enter User Password" id="password">
                                            {{--<input type="password" name="password2" class="form-control" placeholder="Enter Confirm Password">--}}
                                            <div class="title_box">
                                                <label>Select Menu :</label>
                                            </div>
                                            <?php $munudata = \App\Menumodel::where(['is_active' => 1])->get();?>
                                            @foreach($munudata as $munudata1)
                                                <div class="pretty p-icon p-rotate col-sm-2">
                                                    <input value="{{$munudata1->id}}" type="checkbox" name="menuid[]"/>
                                                    <div class="state p-success">
                                                        <i class="icon mdi mdi-check"></i>
                                                        <label>{{ucwords($munudata1->menu)}}</label>

                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="row col-sm-12 text-center form-group">
                                                <hr/>
                                                <button type="submit" name="submit" class="btn btn-success"><i
                                                            class="mdi mdi-send submit_icon_margin"></i>Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>

        <div class="modal fade" id="myModalR" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="Rh" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Reject Information</h4>
                    </div>
                    <div id="Rb" class="modal-body">
                        <textarea class="form-control" id="rejectdetails" placeholder="Enter Some Details"></textarea>
                    </div>
                    <div id="Rf" class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script type="text/javascript">
        function openmyform() {
            $("#item_part1").addClass("hidealways");
            $("#item_part2").removeClass("hidealways");
        }
        function openlist() {
            $("#item_part1").removeClass("hidealways");
            $("#item_part2").addClass("hidealways");
        }
        function Checkvalidation() {
            debugger;
            var is_valid = true;
            if ($('#username').val() == '') {
                alert('username is requird');
                is_valid = false;
                return;
            }
            if ($('#password').val() == '') {
                alert('username is requird');
                is_valid = false;
                return;
            }
            if (is_valid == false) {
                return false;
                return;
            } else {

            }
        }
        //        $(document).ready(function () {
        //         $('#rollinsert').submit(function () {
        //             debugger;
        //             var is_valid=true;
        //             if ($('#username').val() == '') {
        //                 alert('username is requird');
        //                 is_valid=false
        //             }
        //             if ($('#password').val() == '') {
        //                 alert('username is requird');
        //                 is_valid=false
        //             }
        //             if (is_valid==false){
        //                 return false;
        //             }
        //            });
        //        });
    </script>
@stop
{{--$("#myroll").load(location.href + " #myroll");--}}
{{--window.location.reload();--}}






