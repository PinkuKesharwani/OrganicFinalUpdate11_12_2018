@extends('adminlayout.adminmaster')
@section('title','Organic Dolchi | State')
@section('content')
    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist" id="user_table">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         All State
                         <button onclick="openAddform();" class="btn btn-default pull-right"><i
                                     class="mdi mdi-plus"></i>Add</button>
                      </span>
                                    <div class="row">
                                        <div class="col-md-3 pull-right">
                                            <input id="myInput" class="form-control search_icon" placeholder="Search" onkeyup="GlobalsearchTable('state_tablebody')" type="text" />
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered" id="myTable">
                                        <thead>
                                        <th class="sorting"
                                            onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(1)')">State Name
                                            <i class="fa fa-sort"></i>
                                        </th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody id="state_tablebody">
                                        @foreach($statedata as $object)
                                            @if($object->is_deleted=='0')
                                                <tr class="item">
                                                    <td>{{$object->state_name}}</td>
                                                    <input type="hidden" name="no" id="{{$object->id}}"
                                                           value="'{{$object->state_name}}'">
                                                    <td>
                                                        <button type="button" onclick="updatestate({{$object->id}});"
                                                                class="btn btn-success btn-xs">Update
                                                        </button>
                                                        <button type="button" onclick="deletestate({{$object->id}});"
                                                                class="btn btn-info btn-xs">Delete
                                                        </button>
                                                    </td>
                                                </tr>@else
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>


            </div>
        </div>
    </section>
    <script type="text/javascript">
        function updatestate(id) {
            var idd = id;

            var mydata = $('#' + id).val();
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Update State</h4></div>');
            $('#smallbody').append('<input type="text" name="state" id="state" class="form-control" placeholder="Enter State Name" value=' + mydata + '>');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="validateupdte(' + idd + ');" class="btn btn-primary">Update</button>');
            $('#myModalsmall').modal();


        }
        function deletestate(id) {
            var mydid = id;
            $.get('{{url('delete_state')}}', {mydid: mydid}, function (data) {
                $('#myModalsmall').modal('hide');
                $("#item_list").load(location.href + " #item_list");
                myFunction();
                $('#snackbar').html('');
                $('#snackbar').addClass('show');
                $('#snackbar').html('Deleted Successfully');

            });
        }
        function validateupdte(id) {
            var state = $('#state').val();
            var up_id = id;
            if (state == "") {
                $('#state').addClass("valmy");
                return false;
            }
            else {

                $.get('{{url('update_state')}}', {
                    up_id: up_id,
                    state: state
                }, function (data) {
                    $('#myModalsmall').modal('hide');
                    $("#item_list").load(location.href + " #item_list");
                    myFunction();
                    $('#snackbar').html('');
                    $('#snackbar').addClass('show');
                    $('#snackbar').html('Updated Successfully');

                });
            }

        }
        function openAddform() {
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add State</h4></div>');
            $('#smallbody').append('<input type="text" name="state" id="state" class="form-control" placeholder="Enter State Name">');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="validate();" class="btn btn-primary">Add</button>');
            $('#myModalsmall').modal();
        }
        function validate() {

            var state = $('#state').val();
            if (state == "") {
                $('#state').addClass("valmy");
                return false;
            }
            else {
                $.ajax({
                    type: "get",
                    url: "{{url('add_state')}}",
                    data: "state= " + state,
                    success: function (data) {
                        $('#myModalsmall').modal('hide');
                        $("#item_list").load(location.href + " #item_list");
                        myFunction();
                        $('#snackbar').html('');
                        $('#snackbar').addClass('show');
                        $('#snackbar').html('Added Successfully');

                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            }
        }
    </script>
@stop
{{--$("#item_form").load(location.href + " #item_form");--}}
{{--window.location.reload();--}}


