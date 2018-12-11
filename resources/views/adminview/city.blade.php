@extends('adminlayout.adminmaster')
@section('title','Organic Dolchi | City')
@section('content')
    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         All City
                         <button onclick="opencityform();" class="btn btn-default pull-right"><i
                                     class="mdi mdi-plus"></i>Add</button>
                      </span>
                                    <div class="row">
                                        <div class="col-md-3 pull-right">
                                            <input id="myInput" class="form-control search_icon" placeholder="Search" onkeyup="GlobalsearchTable('city_tablebody')" type="text">
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered" id="citytable">
                                        <thead>
                                        <tr>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#citytable','.item', 'td:nth-child(1)');">State
                                                Name
                                                <i class="fa fa-sort"></i></th>
                                            <th class="sorting"
                                                onclick="w3.sortHTML('#citytable','.item', 'td:nth-child(2)');">City
                                                Name
                                                <i class="fa fa-sort"></i></th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="city_tablebody">
                                        @foreach($citydata as $mydataown)
                                            @if($mydataown->is_deleted=='0')
                                                <tr class="item">
                                                    <td>{{$mydataown->cityname->state_name}}</td>
                                                    <td>{{$mydataown->city}}</td>
                                                    <td>
                                                        <input type="hidden" id="state{{$mydataown->id}}"
                                                               value="{{$mydataown->cityname->state_name}}">
                                                        <input type="hidden" id="city{{$mydataown->id}}"
                                                               value="{{$mydataown->city}}">
                                                        <input id="value{{$mydataown->id}}" type="hidden"
                                                               value="{{$mydataown->state_id}}">
                                                        <button type="button" onclick="updatecity({{$mydataown->id}});"
                                                                class="btn btn-success btn-xs">Update
                                                        </button>
                                                        <button type="button" onclick="deletecity({{$mydataown->id}});"
                                                                class="btn btn-info btn-xs">Delete
                                                        </button>
                                                    </td>
                                                </tr>
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
        function updatecity(id) {
            var idd = id;
            var mydata = $('#city' + id).val();
            var mystate = $('#state' + id).val();
            var myvalue = $('#value' + id).val();
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Update City</h4></div>');
            $('#smallbody').append('<select name="carlist" id="state_id" class="form-control"><option value="' + myvalue + '">' + mystate + '</option>@foreach($statedata as $stateobj) @if($stateobj->is_deleted=='0') <option value="{{$stateobj->id}}">{{$stateobj->state_name}}</option>@endif @endforeach </select><p></p><input type="text" name="city" id="city" value="' + mydata + '" placeholder="Enter City Name" class="form-control"><p></p>');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="addupdatecity(' + id + ');" class="btn btn-primary">Update</button>');
            $('#myModalsmall').modal();


        }
        function deletecity(id) {
            var IDD = id;
            $.get('{{url('delete_city')}}', {IDD: IDD}, function (data) {
                alert(data);
                $('#myModalsmall').modal('hide');
                $("#item_list").load(location.href + " #item_list");
                myFunction();
                $('#snackbar').html('');
                $('#snackbar').addClass('show');
                $('#snackbar').html('City Deleted Successfully');

            });
        }
        function addupdatecity(id) {
            var stateid = $('#state_id').val();
            var city = $('#city').val();
            var IDD = id;

            if (stateid == "") {
                $('#state_id').addClass("valmy");
                return false;
            }
            else if (city == "") {
                $('#city').addClass("valmy");
                return false;
            }
            else {
                $.get('{{url('add_updatecity')}}', {
                    stateid: stateid,
                    city: city,
                    IDD: IDD
                }, function (data) {

                    $('#myModalsmall').modal('hide');
                    $("#item_list").load(location.href + " #item_list");
                    myFunction();
                    $('#snackbar').html('');
                    $('#snackbar').addClass('show');
                    $('#snackbar').html('City Updated Successfully');

                });
            }
        }
        function opencityform() {
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add State</h4></div>');
            $('#smallbody').append('<select name="carlist" id="state_id" class="form-control"><option value="">Select State</option>@foreach($statedata as $stateobj) @if($stateobj->is_deleted=='0') <option value="{{$stateobj->id}}">{{$stateobj->state_name}}</option>@endif @endforeach </select> <p></p><input type="text" name="city" id="city" placeholder="Enter City Name" class="form-control"><p></p>');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="addcity();" class="btn btn-primary">Add</button>');
            $('#myModalsmall').modal();
        }
        function addcity() {
            var stateid = $('#state_id').val();
            var city = $('#city').val();
            if (stateid == "") {
                $('#state_id').addClass("valmy");
                return false;
            }
            else if (city == "") {
                $('#city').addClass("valmy");
                return false;
            }
            else {
                $.get('{{url('add_city')}}', {stateid: stateid, city: city}, function (data) {
                    $('#myModalsmall').modal('hide');
                    $("#item_list").load(location.href + " #item_list");
                    myFunction();
                    $('#snackbar').html('');
                    $('#snackbar').addClass('show');
                    $('#snackbar').html('City Added Successfully');
                });
            }
        }
    </script>



@stop
{{--$("#item_form").load(location.href + " #item_form");--}}
{{--window.location.reload();--}}


