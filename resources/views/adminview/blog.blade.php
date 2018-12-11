@extends('adminlayout.adminmaster')
@section('title','Organic Dolchi | Blog')
<style type="text/css">

</style>
@section('content')
    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1" class="me">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                         All Blog
                         <button onclick="openblogcat();" class="btn btn-default pull-right"><i
                                     class="mdi mdi-plus"></i>Category</button>
                                         <button onclick="openblogform();" class="btn btn-default pull-right"
                                                 style="margin-right: 10px;"><i
                                                     class="mdi mdi-plus"></i>Blog</button>
                      </span>

                                    @foreach($blogdata as $myobject)
                                        <div class="row blog_row">
                                            <div class="col-sm-3">
                                                <div class="shadow">
                                                    <img src="{{url('blog_pic')}}/{{$myobject->id}}/{{$myobject->img_url}}"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="blog_details">
                                                    <h4>{{ucwords($myobject->title)}}</h4>
                                                    <div class="blog_detail_box">{!! $myobject->description!!}</div>
                                                    <div class="blog_name">
                                                        <span>by</span>
                                                        <span style="font-weight: bold">{{ucwords($myobject->created_by)}}
                                                            , </span>
                                                        <span> {{$myobject->created_date}}</span>
                                                    </div>
                                                    <a class="anchor" href="{{url('updateblog').'/'.$myobject->id}}">
                                                        <button type="submit" class="btn btn-primary" style="
    margin-right: 10px;
"><i class="mdi mdi-pencil submit_icon_margin"></i>Edit
                                                        </button>
                                                    </a>
                                                    <button onclick="MoreBlogDetails(this);" class="btn btn-success">
                                                        <i class="mdi mdi-more submit_icon_margin"></i>More
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{$blogdata->links()}}
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <div id="showmy" class="hidealways">
                    <section id="item_part3">

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist" id="blogform">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                        Make Blog

                                         <button onclick="openbloglist();" class="btn btn-default pull-right"><i
                                                     class="mdi mdi-plus"></i>Blog History</button>
                      </span>
                                    <p class="clearfix"></p>

                                    <div class="col-sm-6">
                                        <label>Title</label>
                                        <input type="text" name="title" id="title" placeholder="Enter Title"
                                               class="form-control">
                                        <label>Description</label>
                                        <div class="text_editor" id="txtEditor_blog"></div>
                                        <p></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Blog Meta Title</label>
                                        <input type="text" name="meta_title" id="blog_meta_title"
                                               placeholder="Enter Meta Title" class="form-control">
                                        <label>Blog Meta Keyword</label>
                                        <input type="text" name="meta_keyword" id="blog_meta_keyword"
                                               placeholder="Enter Meta Keyword" class="form-control">
                                        <label>Blog Meta Description</label>
                                        <input type="text" name="meta_description" id="blog_meta_description"
                                               placeholder="Enter Meta Description" class="form-control">
                                        <label>Created by</label>
                                        <input type="text" name="created_by" id="created_by"
                                               placeholder="Enter created by" class="form-control"
                                               value="{{ucfirst($_SESSION['admin_master']['username'])}}"
                                               disabled="disabled">
                                        <label>Select Catagory</label>
                                        <select class="form-control Glo_autocomplete" id="mycatid" multiple="multiple"
                                                data-placeholder="Select"
                                                style="width: 100%;">
                                            @foreach($data as $object)
                                                <option value="{{$object->id}}">{{$object->name}}</option>
                                            @endforeach
                                        </select>
                                        <p></p>

                                        <button type="button" class="btn btn-primary btn-block" onclick="blogpost();">
                                            Post
                                        </button>
                                        <p></p>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="formmy" class="hidealways">
                    <section id="item_part2">

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist" id="blogform">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                        Upload Image


                      </span>
                                    <p class="clearfix"></p>


                                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview">
                                            <input type="text" class="form-control image-preview-filename"
                                                   disabled="disabled">
                                            <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                                                <!-- image-preview-input -->

                                                <form action="{{url('/blogpic')}}" method="post" id="blogpicpost"
                                                      enctype="multipart/form-data">
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="file" id="file"/>
                        <!-- rename it -->
                    </div>
                                                <input type="submit" class="btn btn-primary" value="Upload">
                                                <p></p>
                                                </form>
                                           </span>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="blog_moredetails" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" id="myheader">
                    <div>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Blog Details</h4></div>
                </div>
                <div class="modal-body blogmore_container">
                    <div class="col-sm-5">
                        <div class="blog_img"><img src="images/default_blog.png" alt="Blog Image" id="lb_blogimg"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="blog_details">
                            <div class="lbblog_title" id="lb_blogtitle"></div>
                            <div class="lbblog_by" id="lb_blogby"></div>
                            <div class="lbblog_details" id="lb_blogdetails"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="myfooter">
                    <button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $("#blogpicpost").on('submit', function (e) {
//                var textval = $('#post_text').text();
//                $('#posttext').val(textval);
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ url('blogpic') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    openbloglist();
                    swal({
                        title: "Thankyou!",
                        text: "You successfully Upload Your Blog",
                        icon: "success",
                        button: "Ok",
                    });
                    location.reload();


//
                },
                error: function (xhr, status, error) {
//                    console.log('Error:', data);
//                    ShowErrorPopupMsg('Error in uploading...');
                    $('#err1').html(xhr.responseText);
                }
            });
//                }
        });
        function MoreBlogDetails(dis) {
            $('#lb_blogimg').attr('src', $(dis).parent().parent().parent().find('img').attr('src'));
            $('#lb_blogtitle').text($(dis).parent().find('h4').text());
            $('#lb_blogby').text($(dis).parent().find('.blog_name').text());
            $('#lb_blogdetails').text($(dis).parent().find('.blog_detail_box').text());
            $('#blog_moredetails').modal();
        }
        function addblogcat() {
            var cat_name = $('#cat_name').val();
            var meta_title = $('#meta_title').val();
            var meta_keyword = $('#meta_keyword').val();
            var meta_description = $('#meta_description').val();
            var is_valid = true;
            if ($('#cat_name').val() == '') {
                is_valid = false;
                swal({
                    title: "Error!",
                    text: "Blog Category Name Required.",
                    icon: "error",
                    button: "Go",
                });
            }
            if (is_valid == false) {
                return false;
                return;
            } else {
                $.get('{{url('addblogcat')}}', {
                    cat_name: cat_name,
                    meta_title: meta_title,
                    meta_keyword: meta_keyword,
                    meta_description: meta_description
                }, function (data) {
                    swal({
                        title: "Good job!",
                        text: "Blog Category Added Successfully",
                        icon: "success",
                        button: "Go",
                    });
//                    $("#mycatid").load(window.location.href + " #mycatid");
//                    $('.Glo_autocomplete').select2();
                });
                $('#myModalsmall').modal('hide');
            }
        }
        function openblogcat() {
            $('#smallheader').html('');
            $('#smallbody').html('');
            $('#smallfooter').html('');
            $('#smallheader').append('<div><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add Blog Category</h4></div>');
            $('#smallbody').append('<input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Enter Category Name"><input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Enter Meta Title"><input type="text" name="meta_keyword" id="meta_keyword" class="form-control" placeholder="Enter Meta Keyword"><textarea id="meta_description" name="meta_description" class="form-control txtarea" placeholder="Enter Meta Description"></textarea>');
            $('#smallfooter').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="addblogcat();" class="btn btn-primary">Add</button>');
            $('#myModalsmall').modal();

        }
        function openblogform() {
            $("#showmy").removeClass("hidealways");
            $("#item_part1").addClass("hidealways");
        }
        function openbloglist() {
            $("#item_part1").removeClass("hidealways");
            $("#showmy").addClass("hidealways");
        }
        function blogpost() {
            var title = $('#title').val();
            var description = $("#txtEditor_blog").Editor("getText");
            var mycatid = $('#mycatid').val();
            var blog_meta_title = $('#blog_meta_title').val();
            var blog_meta_keyword = $('#blog_meta_keyword').val();
            var blog_meta_description = $('#blog_meta_description').val();
            $.get('{{url('blogpost')}}', {
                title: title,
                description: description,
                mycatid: mycatid,
                blog_meta_title: blog_meta_title,
                blog_meta_keyword: blog_meta_keyword,
                blog_meta_description: blog_meta_description
            }, function (data) {
                openpic();
            });


        }
        function openpic() {
            $("#item_part1").addClass("hidealways");
            $("#showmy").addClass("hidealways");
            $("#formmy").removeClass("hidealways");

        }
        $(document).on('click', '#close-preview', function () {
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                    $('.image-preview').popover('show');
                },
                function () {
                    $('.image-preview').popover('hide');
                }
            );
        });
        $(function () {
            // Create the close button
            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class", "close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
                content: "There's no image",
                placement: 'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function () {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function () {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@stop
{{--$("#fullid").load(location.href + " #fullid");--}}
{{--window.location.reload();--}}
{{--$.get('{{url('blogpost')}}', {title: title,description: description,mycatid: mycatid,blog_meta_title: blog_meta_title,blog_meta_keyword: blog_meta_keyword,blog_meta_description: blog_meta_description}, function (data) {
alert(data);
});--}}