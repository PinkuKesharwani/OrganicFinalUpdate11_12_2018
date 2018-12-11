@extends('adminlayout.adminmaster')

@section('title','Categories')

@section('content')
    <style>
        .btn_center {
            text-align: center;
            margin-top: 10px;
        }

    </style>

    <section class="box_containner">
        <div class="container-fluid">
            <div class="row">

                <section id="menu2">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="dash_boxcontainner white_boxlist">
                            <div class="upper_basic_heading"><span class="white_dash_head_txt">
                       All Categories
                       <button id="open_modal" class="btn btn-default pull-right"><i
                                   class="mdi mdi-plus"></i>Add</button>
                    </span>

                                <div id="snackbar">New Categories added Successfully</div>
                                <p class="clearfix"></p>
                                <section id="mytablereload">
                                    <table class="table table-striped" id="mycattable">
                                        <thead>
                                        <tr>
                                            <th class="sorting sno"
                                                onclick="w3.sortHTML('#mycattable','.item', 'td:nth-child(1)')">Sr. <i
                                                        class="fa fa-sort"></i></th>
                                            <th class="sorting name"
                                                onclick="w3.sortHTML('#mycattable','.item', 'td:nth-child(2)')">Name
                                                <i class="fa fa-sort"></i></th>
                                            <th>Description</th>
                                            <th class="action_2btn">Action</th>

                                        </tr>
                                        </thead>
                                        @if(count($alldata) > 0)
                                            <tbody>
                                            @foreach($alldata as $object)
                                                <tr class="item hiderow{{$object->id}}" id="{{$object->id}}">
                                                    <td class="sno">{{$no++}}</td>
                                                    <td contenteditable="false"
                                                        class="name edittable{{$object->id}} name">{{$object->name}}</td>
                                                    <td contenteditable="false"
                                                        class="edittable{{$object->id}} description ">{{$object->description}}</td>
                                                    <td class="action_2btn">
                                                        <button class="btn btn-xs btn-info edit{{$object->id}}"
                                                                onclick="abcd({{$object->id}});">Edit
                                                        </button>
                                                        <button class="btn btn-xs btn-primary update_btn update{{$object->id}}"
                                                                onclick="update(this,'{{$object->id}}');">Update
                                                        </button>
                                                        |
                                                        <button class="btn btn-xs btn-danger"
                                                                onclick="deletecat({{$object->id}});">Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        @else
                                            <tbody>
                                            <tr>
                                                <td>No record Available</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>

                                            </tbody>
                                        @endif

                                    </table>
                                    <div align="center">
                                        {{$alldata->links()}}
                                    </div>
                                </section>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function validate() {
            var cat_name = $('#cat_name').val();
            var cat_description = $('#cat_description').val();
            if (cat_name == "") {
                $('#cat_name').addClass("errorcls");
                return false;
            }
            else {
                sendcat();
            }
        }

        function sendcat() {
            var cat_name = $('#cat_name').val();
            var cat_description = $('#cat_description').val();
            $.ajax({
                type: "post",
                url: "{{url('add_cat')}}",
                data: "cat_name= " + cat_name + "&cat_description= " + cat_description,
                success: function (data) {
                    $('#snackbar').html('');
                    $('#snackbar').html('Categories added successfully');
                    $('#myModal').modal('hide');
                    $('#mycattable').prepend('<tr class="hiderow newrow"' + data.id + '" id="' + data.id + '"><td>New</td><td contenteditable="false"class="edittable newrow' + data.id + ' name">' + data.name + '</td><td contenteditable="false"class="edittable newrow' + data.id + ' description ">' + data.description + '</td><td><button class="btn btn-sm btn-info edit' + data.id + '"onclick="abcd(' + data.id + ');">Edit</button><button class="btn btn-sm btn-primary update_btn update' + data.id + '"onclick="update(this,' + data.id + ');">Update</button> | <button class="btn btn-sm btn-danger"onclick="deletecat(' + data.id + ');">Delete </button> </td></tr>');
                    myFunction();
                    $("#item_form").load(location.href + " #item_form");
                    $("#mytablereload").load(location.href + " #mytablereload");


                },
                error: function (data) {

                }
            });
        }

        $(document).ready(function () {
            $('#open_item_form').click(function () {
                $('#item_list').hide();
                $('#item_form').show();
            });
            $('#open_modal').click(function () {
                $('#myheader').html('');
                $('#mybody').html('');
                $('#myfooter').html('');
                $('#myheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add Categories</h4></div>');
                $('#mybody').append('<div class=""><input type="text" class="form-control required" name="cat_name" placeholder="Enter Your Category Name " maxlength="25" id="cat_name"><p class="clearfix"></p><textarea name="cat_description" id="cat_description" class="form-control vRequiredTex focus_req" rows="4" cols="50" maxlength="25" placeholder="Enter Your Description "></textarea></p></div>');
                $('#myfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="validate();" class="btn btn-primary">Add</button>');
                $('#myModal').modal();
                $('.required').focusout(function () {
                    if ($(this).val().length == 0) {
                        $(this).addClass('errorcls');
                        return false;
                    }
                    else {
                        $(this).removeClass('errorcls');
                    }
                });
            });

        });

    </script>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        function abcd($id) {
            $('.edittable' + $id).attr('contenteditable', 'true');
            $('.edittable' + $id).addClass("editclas");
            $('.edit' + $id).hide();
            $('.update' + $id).show();
        }
        function abcdd($id) {
            $('.edittable' + $id).attr('contenteditable', 'false');
            $('.edittable' + $id).removeClass("editclas");
            $('.edit' + $id).show();
            $('.update' + $id).hide();
        }
        function abcddd($id) {
            $('.edittable' + $id).attr('contenteditable', 'false');
            $('.edit' + $id).show();
            $('.update' + $id).hide();
            $('.hiderow' + $id).hide();
        }
        function update(dis, id) {
            var ID = id;
            var name = $(dis).parent().parent("#" + id).children('.name').html();
            var slug = $(dis).parent().parent("#" + id).children('.slug').html();
            var des = $(dis).parent().parent("#" + id).children('.description').html();
            /*alert(ID+one+two+three);*/
            $.ajax({
                type: "post",
                url: "{{url('updatecat')}}",
                data: "name= " + name + "&slug= " + slug + "&des= " + des + "&ID= " + ID,
                success: function (data) {
                    abcdd(ID);
                    $('#snackbar').html('');
                    $('#snackbar').html('Categories Updated successfully');
                    myFunction();
                    $("#item_form").load(location.href + " #item_form");
                },
                error: function (data) {
                    alert("Error")
                }
            });
        }
        function deletecat(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var ID = id;
                        $.ajax({
                            type: "post",
                            url: "{{url('deletecat')}}",
                            data: "&ID= " + ID,
                            success: function (data) {
                                abcddd(ID);
                                $('#snackbar').html('')
                                $('#snackbar').html('Successfully Deleted');
                                myFunction();
                                $("#item_form").load(location.href + " #item_form");
                            },
                            error: function (data) {
                                alert("Error")
                            }
                        });
                        swal("Your Entry has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your Entry is safe!");
                    }
                });
        }

    </script>
@stop
{{--$("#fullh").load(location.href + " #fullh");--}}
{{--window.location.reload();--}}
