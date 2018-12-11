@extends('adminlayout.adminmaster')

@section('title','Organic Dolchi | Delivery')

@section('content')
    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         Delivery Charges
                         <button onclick="opendeliform();" class="btn btn-default pull-right"><i
                                     class="mdi mdi-plus"></i>Add</button>
                      </span>
                                    <div class="row">
                                        <div class="col-md-3 pull-right">
                                            <input id='myInput' class="form-control search_icon" placeholder="search"
                                                   onkeyup='GlobalsearchTable("delivery_body")' type='text'/>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered" id="DeliveryTable">
                                        <thead>
                                        <tr>
                                            <th class="sorting"
                                            onclick="w3.sortHTML('#DeliveryTable','.item', 'td:nth-child(1)')">City
                                            <i class="fa fa-sort"></i></th>
                                            <th>Area</th>
                                            <th>Pin</th>
                                            <th>Amount</th>
                                            <th>Delivery Charge</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="delivery_body">
                                        @foreach($deliverydata as $object)
                                            @if($object->is_active=='1')
                                                <tr class="item">
                                                    <td>{{$object->cityname->city}}</td>
                                                    <input type="hidden" value="{{$object->cityname->city}}"
                                                           id="cityname{{$object->id}}">
                                                    <input type="hidden" value="{{$object->cityname->id}}"
                                                           id="cityid{{$object->id}}">

                                                    <td>{{$object->area}}</td>
                                                    <input type="hidden" value="{{$object->area}}"
                                                           id="cityarea{{$object->id}}">
                                                    <td>{{$object->pin}}</td>
                                                    <input type="hidden" value="{{$object->pin}}"
                                                           id="citypin{{$object->id}}">
                                                    <td>{{$object->amount}}</td>
                                                    <input type="hidden" value="{{$object->amount}}"
                                                           id="cityamount{{$object->id}}">
                                                    <td>{{$object->delivery_charge}}</td>
                                                    <input type="hidden" value="{{$object->delivery_charge}}"
                                                           id="citydc{{$object->id}}">
                                                    <td>
                                                        <button type="button" onclick="editdelivery({{$object->id}});"
                                                                class="btn btn-primary btn-xs">Edit
                                                        </button>
                                                        <button type="button" onclick="deletedeli({{$object->id}});"
                                                                class="btn btn-success btn-xs">Delete
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
        function opendeliform() {
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add Delivery</h4></div>');
            $('#smallbody').append('<select class="form-control" name="city_name" id="city_name"><option value="0">Select</option>@foreach($citydata as $mydata) @if($mydata->is_deleted=='0') <option value="{{$mydata->id}}">{{$mydata->city}}</option>@endif @endforeach </select><p></p><input type="text" name="area" id="area" placeholder="enter area name" class="form-control"><p></p><input type="text" name="pin" id="pin" placeholder="enter pin code" class="form-control"><p></p><input type="text" name="amount" id="amount" placeholder="enter amount" class="form-control"><p></p><input type="text" name="del_charge" placeholder="enter delevery charge" id="del_charge" class="form-control"><p></p>');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="addarea();" class="btn btn-primary">Add</button>');
            $('#myModalsmall').modal();
        }
        function addarea() {
            var cityid = $('#city_name').val();
            var area = $('#area').val();
            var pin = $('#pin').val();
            var amount = $('#amount').val();
            var del_charge = $('#del_charge').val();
            if (cityid == 0) {
                swal("Please select any city!", {icon: "warning",});
            } else if (area == '') {
                swal("Please enter area..!", {icon: "warning",});
            } else if (pin == '') {
                swal("Please enter pin..!", {icon: "warning",});
            } else if (amount == '') {
                swal("Please enter amount..!", {icon: "warning",});
            } else if (del_charge == '') {
                swal("Please enter delivery charges..!", {icon: "warning",});
            } else {
                $.get('{{url('add_delivery')}}', {
                    cityid: cityid,
                    area: area,
                    pin: pin,
                    amount: amount,
                    del_charge: del_charge
                }, function (data) {
                    $('#myModalsmall').modal('hide');
                    $("#item_part1").load(location.href + " #item_part1");
                    swal({
                        title: "Success",
                        text: "Delivery Charge Added Successfull",
                        icon: "success",
                        button: "ok",
                    });

                });
            }
        }
        function editdelivery(id) {
            var cityname = $('#cityname' + id).val();
            var area = $('#cityarea' + id).val();
            var pin = $('#citypin' + id).val();
            var amount = $('#cityamount' + id).val();
            var delivery_charge = $('#citydc' + id).val();
            var cityid = $('#cityid' + id).val();
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Update Delivery</h4></div>');
            $('#smallbody').append('<select class="form-control" name="city_name_one" id="city_name_one"><option value="' + cityid + '">' + cityname + '</option>@foreach($citydata as $mydata) @if($mydata->is_deleted=='0') <option value="{{$mydata->id}}">{{$mydata->city}}</option>@endif @endforeach </select><p></p><input type="text" name="area" id="area_one" value="' + area + '" placeholder="enter area name" class="form-control textWithSpace"><p></p><input type="text" value="' + pin + '" name="pin" id="pin_one" placeholder="enter pin code" class="form-control numberOnly"><p></p><input type="text" name="amount" id="amount_one" value="' + amount + '" placeholder="enter amount" class="form-control numberOnly"><p></p><input type="text" name="del_charge" placeholder="enter delevery charge" value="' + delivery_charge + '" id="del_charge_one" class="form-control numberOnly"><p></p>');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="updateaddarea(' + id + ');" class="btn btn-primary">Update</button>');
            $('#myModalsmall').modal();

        }
        function updateaddarea(id) {
            var idd = id;
            var cityid = $('#city_name_one').val();
            var area = $('#area_one').val();
            var pin = $('#pin_one').val();
            var amount = $('#amount_one').val();
            var del_charge = $('#del_charge_one').val();
            if (area == '') {
                swal("Please enter area..!", {icon: "warning",});
            } else if (pin == '') {
                swal("Please enter pin..!", {icon: "warning",});
            } else if (amount == '') {
                swal("Please enter amount..!", {icon: "warning",});
            } else if (del_charge == '') {
                swal("Please enter delivery charges..!", {icon: "warning",});
            } else {
                $.get('{{url('update_delivery')}}', {
                    cityid: cityid,
                    area: area,
                    pin: pin,
                    amount: amount,
                    del_charge: del_charge,
                    idd: idd
                }, function (data) {
                    console.log(data);
                    $('#myModalsmall').modal('hide');
                    $("#item_part1").load(location.href + " #item_part1");
                    swal({
                        title: "Update Success",
                        text: "Delivery Charge has been updated",
                        icon: "success",
                        button: "ok",
                    });

                });
            }

        }
        function deletedeli(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Delivery Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.get('{{url('delete_del')}}', {idd: id}, function (data) {
                        $('#myModalsmall').modal('hide');
                        $("#item_part1").load(location.href + " #item_part1");

                        swal("Poof! Your file has been deleted!", {
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


