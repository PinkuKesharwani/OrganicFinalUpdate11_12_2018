@extends('adminlayout.adminmaster')

@section('title','Organic Dolchi / Testomonials')

@section('content')

    <script src="{{url('js/my_validation.js')}}"></script>
    <style>
        .hidealways {
            display: none;
        }
        .status
        {
            min-width: 100px;
            border-radius: 3px;
        }

    </style>

    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         Testimonials
                         <button onclick="openmyform();" class="btn btn-default pull-right"><i
                                     class="mdi mdi-plus"></i>Add</button>
                      </span>
                                    <?php $mydata = \App\Testimonial::orderBy('id', 'desc')->get();?>
                                    <div class="row">
                                        <div class="col-md-3 pull-right">
                                            <input id="myInput" class="form-control search_icon" placeholder="Search"
                                                   onkeyup="GlobalsearchTable('testomonial_tablebody')" type="text">
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered" id="TestomonialTable">
                                        <thead>
                                        <tr>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#TestomonialTable','.item', 'td:nth-child(1)')">
                                                User Name
                                                <i class="fa fa-sort"></i>
                                            </th>
                                            <th>review</th>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#TestomonialTable','.item', 'td:nth-child(3)')">
                                                Status
                                                <i class="fa fa-sort"></i>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="testomonial_tablebody">
                                        @foreach($mydata as $obj)
                                            <tr class="item">
                                                <td>{{isset($obj->user->name)?$obj->user->name:'-'}}
                                                    <input type="hidden" name="myuid" id="myuid{{$obj->user_id}}">
                                                </td>
                                                <td>{{isset($obj->review)?$obj->review:'-'}}</td>
                                                <td>
                                                    @if($obj->is_active == 1)
                                                        <span class="status approved">Showing</span>
                                                    @else
                                                        <span class="status rejected">Not Showing</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- <button onclick="edittest({{$obj->id}});" class="btn btn-primary btn-sm">Update</button>--}}
                                                    <button onclick="deletetest({{$obj->id}});"
                                                            class="btn btn-danger btn-xs">Delete
                                                    </button>
                                                    @if($obj->is_active == 1)
                                                        <button onclick="inactiveTest({{$obj->id}});"
                                                                class="btn btn-default btn-xs">inactive
                                                        </button>
                                                    @else
                                                        <button onclick="activeTest({{$obj->id}});"
                                                                class="btn btn-warning btn-xs">Active
                                                        </button>
                                                    @endif

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
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       Add Testimonials
                                        <button onclick="openlist();" class="btn btn-default pull-right">
                                            <i class="mdi mdi-content-duplicate"></i>List</button>
                      </span>
                                    <?php $userdata = \App\UserMaster::get();?>
                                    <div class="main_form_testomonial">
                                        <select class="form-control" name="userid" id="userid">
                                            <option value="0">Select User</option>
                                            @foreach($userdata as $userobj)
                                                <option value="{{$userobj->id}}">{{$userobj->name}}</option>
                                            @endforeach
                                        </select>
                                        <textarea class="form-control" placeholder="Enter Review" name="review"
                                                  id="review"
                                                  cols="30" rows="10"></textarea>

                                        <div class="col-sm-12 text-center form-group">
                                            <button type="button" class="btn btn-success" onclick="mytesti();"><i
                                                        class="mdi mdi-send submit_icon_margin"></i>Add Testimonial
                                            </button>
                                        </div>
                                        {{--<input type="button" onclick="mytesti();" class="btn btn-primary btn-block"--}}
                                        {{--value="Add">--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function inactiveTest(id) {
            var myid = id;
            $.get('{{url('inactivetest')}}', {myid: myid}, function (data) {
                /* alert(data);*/
                /*  alert(data);
                 console.log(data);*/

                location.reload();
            });
        }
        function activeTest(id) {
            var myid = id;
            $.get('{{url('activetest')}}', {myid: myid}, function (data) {
                /* alert(data);*/
                /*  alert(data);
                 console.log(data);*/

                location.reload();
            });
        }
        function deletetest(id) {
            var myy = id;
            $.get('{{url('deletetest')}}', {myy: myy}, function (data) {
                /* alert(data);*/
                /*   alert(data);
                 console.log(data);
                 */
                location.reload();
            });
        }

        function mytesti() {
            var user = $('#userid').val();
            var review = $('#review').val();
            $('#userid').removeClass("valmy");
            $('#review').removeClass("valmy");
            if (user == "0") {
                $('#userid').addClass("valmy");
                return false;
            }
            else if (review == "") {
                $('#review').addClass("valmy");
                return false;
            }
            else {
                $.get('{{url('addtstimonials')}}', {user: user, review: review}, function (data) {
                    location.reload();
                });
            }
        }

        function openmyform() {
            $("#item_part1").addClass("hidealways");
            $("#item_part2").removeClass("hidealways");
        }
        function openlist() {
            $("#item_part1").removeClass("hidealways");
            $("#item_part2").addClass("hidealways");
        }

    </script>
@stop
{{--$("#myroll").load(location.href + " #myroll");--}}
{{--window.location.reload();--}}






