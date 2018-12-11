@extends('adminlayout.adminmaster')

@section('title','Organic Dolchi | Shop Points')

@section('content')


    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         Shop Points
                         <button onclick="opendeliform();" class="btn btn-default pull-right"><i
                                     class="mdi mdi-plus"></i>Add</button>
                      </span>
                                    <div class="col-md-3 pull-right">
                                        <input id="myInput" class="form-control search_icon" placeholder="Search" onkeyup="GlobalsearchTable('shoppoint_tablebody')" type="text">
                                    </div>
                                    <table class="table table-striped table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th class="sorting" onclick="w3.sortHTML('#myTable','.item', 'td:nth-child(1)')">City
                                                <i class="fa fa-sort"></i>
                                                </th>
                                            <th>Shop Address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="shoppoint_tablebody">
                                        @foreach($shop_points as $object)
                                            <tr class="item">
                                                <td>{{$object->cityname->city}}</td>
                                                <input type="hidden" value="{{$object->cityname->city}}"
                                                       id="cityname{{$object->id}}">
                                                <input type="hidden" value="{{$object->cityname->id}}"
                                                       id="cityid{{$object->id}}">

                                                <td>{{$object->shop_address}}</td>
                                                <input type="hidden" value="{{$object->shop_address}}"
                                                       id="shop_address{{$object->id}}">
                                                <td>
                                                    <button type="button" onclick="editshop({{$object->id}});"
                                                            class="btn btn-primary btn-xs">Edit
                                                    </button>
                                                    <button type="button" onclick="deleteshop({{$object->id}});"
                                                            class="btn btn-success btn-xs">Delete
                                                    </button>
                                                </td>

                                            </tr>
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


        function opendeliform() {
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add Shop Point</h4></div>');
            $('#smallbody').append('<select class="form-control" name="city_name" id="city_name"><option value="0">Select</option>@foreach($citydata as $mydata) @if($mydata->is_deleted=='0') <option value="{{$mydata->id}}">{{$mydata->city}}</option>@endif @endforeach </select><p></p><input type="text" name="shop_address" id="shop_address" placeholder="enter shop address" class="form-control">');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="addshop_address();" class="btn btn-primary">Add</button>');
            $('#myModalsmall').modal();
        }
        function addshop_address() {

            var cityid = $('#city_name').val();
            var shop_address = $('#shop_address').val();
            if (cityid == 0) {
                swal("Please select any city!", {icon: "warning",});
            } else if (shop_address == '') {
                swal("Please enter shop address..!", {icon: "warning",});
            } else {
                $.get('{{url('add_shop_points')}}', {
                    cityid: cityid,
                    shop_address: shop_address
                }, function (data) {
                    $('#myModalsmall').modal('hide');
                    $("#item_part1").load(location.href + " #item_part1");
                    swal({
                        title: "Success",
                        text: "Shop address has been added",
                        icon: "success",
                        button: "ok",
                    });

                });
            }
        }


        function editshop(id) {
            var cityname = $('#cityname' + id).val();
            var shop_address = $('#shop_address' + id).val();
            var cityid = $('#cityid' + id).val();
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Update Shop Point</h4></div>');
            $('#smallbody').append('<select class="form-control" name="city_name_one" id="city_name_one"><option value="' + cityid + '">' + cityname + '</option>@foreach($citydata as $mydata) @if($mydata->is_deleted=='0') <option value="{{$mydata->id}}">{{$mydata->city}}</option>@endif @endforeach </select><p></p><input type="text" name="area" id="area_one" value="' + shop_address + '" placeholder="enter shop address" class="form-control">');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="updateshop(' + id + ');" class="btn btn-primary">Update</button>');
            $('#myModalsmall').modal();

        }


        function updateshop(id) {
            var idd = id;
            var cityid = $('#city_name_one').val();
            var shop_address = $('#area_one').val();
            if (cityid == '0') {
                swal("Please select any city..!", {icon: "warning",});
            } else if (shop_address == '') {
                swal("Please enter shop address..!", {icon: "warning",});
            } else {
                $.get('{{url('update_shop_points')}}', {
                    cityid: cityid,
                    shop_address: shop_address,
                    idd: idd
                }, function (data) {
                    $('#myModalsmall').modal('hide');
                    $("#item_part1").load(location.href + " #item_part1");
                    swal({
                        title: "Update Success",
                        text: "Shop address has been updated",
                        icon: "success",
                        button: "ok",
                    });

                });
            }

        }


        function deleteshop(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this shop address",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.get('{{url('delete_shop_points')}}', {idd: id}, function (data) {
                        $('#myModalsmall').modal('hide');
                        $("#item_part1").load(location.href + " #item_part1");

                        swal("Shop address has been deleted!", {
                            icon: "success",
                        });
                    });
                } else {
                    swal("Your Delivery file is safe!"
        )
            ;
        }
        })
            ;
        }
    </script>


@stop
{{--$("#item_part1").load(location.href + " #item_part1");--}}
{{--window.location.reload();--}}


