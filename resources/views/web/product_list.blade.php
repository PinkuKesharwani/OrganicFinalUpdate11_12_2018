@extends('web.layouts.e_master')

@section('title', 'Organic Food : Product List')

@section('head')
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <style type="text/css">
        .owl-carousel {
            width: 100%;
            -webkit-tap-highlight-color: transparent;
            /* position relative and z-index fix webkit rendering fonts issue */
            position: relative;
            z-index: 1;
            margin: 5px 0px 15px 0px;
        }

        .owl-dots {
            display: none;
        }
        .animate_top {
            top: 90px;
        }
        .owl-carousel .product_block {
            width: 100%;
            text-align: left;
        }

        .owl-carousel .owl-stage {
            position: relative;
            -ms-touch-action: pan-Y;
            touch-action: manipulation;
            -moz-backface-visibility: hidden;
            /* fix firefox animation glitch */
        }

        .owl-carousel .owl-stage:after {
            content: ".";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: 0;
            height: 0;
        }

        .owl-carousel .owl-stage-outer {
            position: relative;
            overflow: hidden;
            /* fix for flashing background */
            -webkit-transform: translate3d(0px, 0px, 0px);
        }

        .owl-carousel .owl-wrapper,
        .owl-carousel .owl-item {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
        }

        .owl-carousel .owl-item {
            position: relative;
            min-height: 1px;
            float: left;
            -webkit-backface-visibility: hidden;
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none;
        }

        .owl-carousel .owl-item img {

        }

        .owl-carousel .owl-dots.disabled {
            display: none;
        }

        .owl-carousel .owl-nav .owl-prev,
        .owl-carousel .owl-nav .owl-next,
        .owl-carousel .owl-dot {
            cursor: pointer;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .owl-carousel button.owl-dot {
            color: inherit;
            padding: 0 !important;
            font: inherit;
        }

        .owl-carousel.owl-loaded {
            display: block;
        }

        .owl-carousel.owl-loading {
            opacity: 0;
            display: block;
        }

        .owl-carousel.owl-hidden {
            opacity: 0;
        }

        .owl-carousel.owl-refresh .owl-item {
            visibility: hidden;
        }

        .owl-carousel.owl-drag .owl-item {
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .owl-carousel.owl-grab {
            cursor: move;
            cursor: grab;
        }

        .owl-carousel.owl-rtl {
            direction: rtl;
        }

        .owl-carousel.owl-rtl .owl-item {
            float: right;
        }

        .no-js .owl-carousel {
            display: block;
        }

        .owl-carousel .animated {
            animation-duration: 2000ms;
            animation-fill-mode: both;
        }

        .owl-carousel .owl-animated-in {
            z-index: 0;
        }

        .owl-carousel .owl-animated-out {
            z-index: 1;
        }

        .owl-carousel .fadeOut {
            animation-name: fadeOut;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        /*
         * 	Owl Carousel - Auto Height Plugin
         */
        .owl-height {
            transition: height 500ms ease-in-out;
        }

        .owl-carousel .owl-item .owl-lazy {
            opacity: 0;
            transition: opacity 400ms ease;
        }

        .owl-carousel .owl-item .owl-lazy[src^=""], .owl-carousel .owl-item .owl-lazy:not([src]) {
            max-height: 0;
        }

        .owl-carousel .owl-item img.owl-lazy {
            transform-style: preserve-3d;
        }


    </style>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <style type="text/css">
        /* .vertical .carousel-inner {
             height: 100%;
         } */
        .carousel.vertical .item {
            -webkit-transition: 0.6s ease-in-out top;
            -moz-transition: 0.6s ease-in-out top;
            -ms-transition: 0.6s ease-in-out top;
            -o-transition: 0.6s ease-in-out top;
            transition: 0.6s ease-in-out top;
        }

        .carousel.vertical .active {
            top: 0;
        }

        .carousel.vertical .next {
            top: 400px;
        }

        .carousel.vertical .prev {
            top: -400px;
        }

        .carousel.vertical .next.left,
        .carousel.vertical .prev.right {
            top: 0;
        }

        .carousel.vertical .active.left {
            top: -400px;
        }

        .carousel.vertical .active.right {
            top: 400px;
        }

        .carousel.vertical .item {
            left: 0;
        }

        .slider_nav {
            position: absolute;
            right: 0px;
            top: -45px;
        }

        .glo_sliderarrow_btn {
            width: 25px;
            height: 25px;
            background: #ffffff !important;
            display: inline-block;
            margin-left: 5px;
            line-height: 22px !important;
            color: #c3c0c0;
            transition: .5s all;
            outline: none;
            text-align: center;
            border: solid thin #e4d8d8;
            background-image: none !important;
            padding: 0px;
        }

        .glo_sliderarrow_btn i {
            font-size: 18px;
        }

        .glo_sliderarrow_btn:active {
            text-decoration: none;
        }

        .glo_sliderarrow_btn:hover {
            background: #86bc43 !important;
            color: #ffffff !important;
            border-color: #86bc43 !important;
            text-decoration: none;
        }

        .slide_up_carousel .product_block {
            width: 100%;
            margin-top: 5px;
            box-shadow: none;
            border: solid thin #e1e1e1;
        }

        @media (max-width: 767px) and (min-width: 320px) {
            .animate_top {
                top: 85px;
            }
        }
    </style>
    <script type="text/javascript">
        function appendimages(dis) {
            var src_no = $(dis).attr('src');
            $('#view_images').attr('src', src_no);
            $('#view_large_bg').css('background-image', 'url("' + src_no + '")');
            Initialize_ProductDetails();
        }

        function Initialize_ProductDetails() {
            var native_width = 0;
            var native_height = 0;
            $(".large").css("background", "url('" + $(".small").attr("src") + "') no-repeat");
            //Now the mousemove function
            $(".magnify").mousemove(function (e) {
                if (!native_width && !native_height) {
                    var image_object = new Image();
                    image_object.src = $(".small").attr("src");
                    native_width = image_object.width;
                    native_height = image_object.height;
                }
                else {
                    var magnify_offset = $(this).offset();
                    var mx = e.pageX - magnify_offset.left;
                    var my = e.pageY - magnify_offset.top;
                    if (mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0) {
                        $(".large").fadeIn(100);
                    }
                    else {
                        $(".large").fadeOut(100);
                    }
                    if ($(".large").is(":visible")) {
                        var rx = Math.round(mx / $(".small").width() * native_width - $(".large").width() / 2) * -1;
                        var ry = Math.round(my / $(".small").height() * native_height - $(".large").height() / 2) * -1;
                        var bgp = rx + "px " + ry + "px";
                        var px = mx - $(".large").width() / 2;
                        var py = my - $(".large").height() / 2;
                        $(".large").css({left: px, top: py, backgroundPosition: bgp});
                    }
                }
            });
        }

        function AddTOcart(dis) {
            var cart = $('#baskit_block');
//            var cart_counter = $('#baskit_counter');
//            var cart_value = Number($(cart_counter).text());
//            cart_value++;
            var imgtodrag = $(dis).parent().parent().find("img").eq(0);
            if (imgtodrag) {
                var imgclone = imgtodrag.clone()
                    .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                    .css({
                        'opacity': '0.5',
                        'position': 'absolute',
                        'height': '150px',
                        'width': '150px',
                        'z-index': '200'
                    })
                    .appendTo($('body'))
                    .animate({
                        'top': cart.offset().top + 10,
                        'left': cart.offset().left + 10,
                        'width': 50,
                        'height': 50
                    }, 1000, 'easeInOutExpo');

                setTimeout(function () {
                    cart.effect("shake", {
                        times: 1
                    }, 100);
//                    cart_counter.text(cart_value);
                }, 1500);

                imgclone.animate({
                    'width': 0,
                    'height': 0
                }, function () {
                    $(this).detach()
                });
            }

            var itemid = $(dis).attr('id');
            var rateid = $(dis).attr('data-content');
            var qty = $('#qty_' + itemid).val();
            var carturl = "{{url('addtocart')}}";
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: carturl,
                data: {itemid: itemid, rateid: rateid, quantity: qty},
                success: function (data) {
                    $("#cartload").html(data);
//                    ShowSuccessPopupMsg('Product has been added to cart');
                },
                error: function (xhr, status, error) {
                    $("#cartload").html(xhr.responseText);
//                    alert('Technical Error Occured!');
                }
            });

        }

        function AddTOcart_load(dis) {
            var cart = $('#baskit_block');
//            var cart_counter = $('#baskit_counter');
//            var cart_value = Number($(cart_counter).text());
//            cart_value++;
            var imgtodrag = $(dis).parent().parent().find("img").eq(0);
            if (imgtodrag) {
                var imgclone = imgtodrag.clone()
                    .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                    .css({
                        'opacity': '0.5',
                        'position': 'absolute',
                        'height': '150px',
                        'width': '150px',
                        'z-index': '200'
                    })
                    .appendTo($('body'))
                    .animate({
                        'top': cart.offset().top + 10,
                        'left': cart.offset().left + 10,
                        'width': 50,
                        'height': 50
                    }, 1000, 'easeInOutExpo');

                setTimeout(function () {
                    cart.effect("shake", {
                        times: 1
                    }, 100);
//                    cart_counter.text(cart_value);
                }, 1500);

                imgclone.animate({
                    'width': 0,
                    'height': 0
                }, function () {
                    $(this).detach()
                });
            }
            var itemid = $(dis).attr('id');
            var rateid = $(dis).attr('data-content');
            var qty = $('#qty_load_' + itemid).val();
            var carturl = "{{url('addtocart')}}";
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: carturl,
                data: {itemid: itemid, rateid: rateid, quantity: qty},
                success: function (data) {
                    $("#cartload").html(data);
//                    ShowSuccessPopupMsg('Product has been added to cart');
                },
                error: function (xhr, status, error) {
                    $("#cartload").html(xhr.responseText);
//                    alert('Technical Error Occured!');
                }
            });

        }

        function checkOffset() {
            if ($('#product_filter_container').offset().top + $('#product_filter_container').height() >= $('#footer').offset().top - 30) {
                $('#product_filter_container').addClass('filter_removefixed');
            }
            if ($(document).scrollTop() + window.innerHeight < $('#footer').offset().top) {
                $('#product_filter_container').removeClass('filter_removefixed');
            }
            //debugger;

        }

        $(document).scroll(function () {
           // checkOffset();
        });
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 6000
            });
            var owl = $('.brics_5');
            owl.owlCarousel({
                type: 'slidey-up',
                items: 1,
                loop: true,
                margin: 15,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                /*  slidey-up: 'bottom to top',*/
                navigation: true
            });
            $('#filter_data li').click(function () {
                $('#filter_data li').removeClass('selected');
                $(this).addClass('selected');
                var gettext = $(this).text();
//                if (gettext == "Products Category") {
//                    $('#product_category').show();
//                    $('#product_all').hide();
//                } else {
//                    $('#product_all').show();
//                    $('#product_category').hide();
//                }
            });
        });

        function getBuyItem() {
            var input = document.getElementById("Search");
            var filter = input.value.toLowerCase();
            var nodes = document.getElementsByClassName('product_list_li');
            for (i = 0; i < nodes.length; i++) {
                if (nodes[i].innerText.toLowerCase().includes(filter)) {
                    nodes[i].style.display = "block";
                } else {
                    nodes[i].style.display = "none";
                }
            }
        }
    </script>
@stop
@section('content')
    <section class="product_section">
        <div class="container-fluid product_maincontainer">
            <div class="product_all_container" id="product_all_container">
                {{--<div class="filter_res" onclick="ShowFilter();">--}}
                {{--<span class="res_filter_caption">Product Filter</span>--}}
                {{--<i class="mdi mdi-chevron-right"></i>--}}
                {{--</div>--}}
                <div class="product_filter_container" id="product_filter_container">
                    <div class="product_filter_head">
                        Product Filter
                    </div>
                    <div class="search_filter">
                        <input type="text" class="main_filter_search" id="Search" onkeyup="getBuyItem()"
                               placeholder="Search by category"/>
                        <div class="filter_search_icon">
                            <i class="mdi mdi-magnify"></i>
                        </div>
                    </div>
                    <div class="filter_category">
                        <ul class="product_list_ul style-scroll" id="filter_data">
                            <li class="product_list_li" onclick="get_category(this)">Products Category</li>
                            <li class="product_list_li selected" onclick="get_items(this)" id="0">All Products</li>
                            @foreach($categories as $category)
                                <li class="product_list_li" onclick="get_items(this)"
                                    id="{{$category->id}}">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{--<div class="product_container" id="product_category">--}}
                {{----}}
                {{--</div>--}}
                <div class="view_headbox">
                    {{--<span class="view_headtxt">Product List</span>--}}
                    <div class="responsive_show" onclick="Showres_search();"><i class="mdi mdi-magnify"></i>
                    </div>
                    <div class="responsive_show" onclick="ShowFilter();"><i class="mdi mdi-menu"></i>
                    </div>
                    <div class="product_searchbox" id="product_wise_search">
                        {{--<div class="search_filter">--}}
                        {{--<input type="text" class="main_filter_search" id="Search_by_product"--}}
                        {{--placeholder="Search by product">--}}
                        {{--<div class="filter_search_icon">--}}
                        {{--<i class="mdi mdi-magnify"></i>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="back_search_btn" onclick="Hideres_search();"><i class="mdi mdi-arrow-left"></i>
                        </div>
                        <div class="product_search_box">
                            <input type="text" class="header_search" autocomplete="off" onautocomplete="false"
                                   placeholder="Search by product" onkeyup="HeaderSearchFilter(this);">
                            <input type="hidden" name="search" id="search_user_id">
                            <i class="product_search_icon mdi mdi-magnify"></i>
                            <div class="search_filter_box scale0">
                                <div class="no_record_found hidden" id="no_record">
                                    &lt; No Friend Found &gt;
                                </div>
                                <ul class="filter_search_ul style-scroll" id="filter_friend_ul">
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/269/1535028253_chyawanprash.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Chyawanprash</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/181/1535026492_91nXnlS3HQL._AC_UL320_SR256,320_.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Risa dhosa mix</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/183/1535026181_rava idli mix.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Rava idli mix</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/184/1535027762_coffee powder smooth.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Coffee powder smooth</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/242/1535027510_sunab soft black hair color.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">sunab soft black hair color</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/243/1535027128_sunab-natural-dark-brown-500x500.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">Sunab Natural Dark brown</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/p_img/252/1535026878_organic henna powder.jpg"
                                                 class="head_filter_img">
                                            <div class="name_filter">organic henna powder</div>
                                        </a>
                                    </li>
                                    <li class="header_filter_row">
                                        <a>
                                            <img src="http://localhost:8000/images/default.png"
                                                 class="head_filter_img">
                                            <div class="name_filter">Indego Lief Powder</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="viewtype_block pull-right" id="view_thumb">
                        <div class="viewtype_txt">Sort</div>
                        <div class="type_brics" id="popularity" data-toggle="tooltip" onclick="Short_filer_items(this);"
                             data-placement="bottom" title="Popularity"><i
                                    class="mdi mdi-basket-fill"></i></div>
                        <div class="type_brics" id="alphabetical" data-toggle="tooltip"
                             onclick="Short_filer_items(this);"
                             data-placement="bottom" title="A-Z, Z-A"><i class="mdi mdi-filter-variant"></i>
                        </div>
                        <div class="viewtype_txt">View</div>
                        <div class="type_brics brics_selected" onclick="show_view(this , 'grid');" data-toggle="tooltip"
                             data-placement="bottom" title="Grid View"><i
                                    class="mdi mdi-view-grid"></i></div>
                        <div class="type_brics" onclick="show_view(this, 'list');" data-toggle="tooltip"
                             data-placement="bottom" title="List View"><i class="mdi mdi-view-list"></i>
                        </div>
                    </div>
                </div>
                <div class="product_container" id="product_all">

                </div>
            </div>
        </div>
    </section>
    <div class="loader" id="loader">
        <div class="internal_bg">
            {{--            <img src="{{url('assets/images/logo_loader.png')}}" class="top_loader" />--}}
        </div>
        <img class="loader_main" src="{{url('assets/images/1L.gif')}}"/>
    </div>
    <div class="filter_overlay" id="overlay_div" onclick="hide_filter()"></div>
    <input type="hidden" id="see_id" value="1"/>
    <input type="hidden" id="category_id" value="">
    {{--@include('web.layouts.footer')--}}

    <div id="Modal_ViewProductDetails" class="modal fade-scale" tabindex="-1" aria-labelledby="myModalLabel"
         role="dialog">
        <div class="modal-dialog product_details_model">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="modal_title" class="modal-title">Product Details</h4>
                </div>
                <div id="modal_body" class="modal-body res_pad0">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="Modal_NotifyMe" class="modal fade-scale" tabindex="-1" aria-labelledby="myModalLabel" role="dialog">
        <div class="modal-dialog notifyme_model">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Notify Me for Product</h4>
                </div>
                <div class="modal-body">

                    <div class="all_data_view">
                        <div class="model_row">
                            <input type="hidden" class="form-control" id="item_master_id"/>

                            <input type="email" class="form-control email" id="n_email"
                                   value="{{isset($_SESSION['user_master']) ? $_SESSION['user_master']->email : '' }}"
                                   placeholder="Email Id"/>
                        </div>
                        <div class="model_row">
                            <input type="text" class="form-control numberOnly" maxlength="10" id="n_contact"
                                   value="{{isset($_SESSION['user_master']) ? $_SESSION['user_master']->contact : '' }}"
                                   placeholder="Mobile No."/>
                        </div>
                        <div class="model_row">
                            <textarea class="form-control glo_txtarea" id="n_message"
                                      placeholder="Massage for product"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="getNotify()">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function show_view(dis, view_type) {
            //$('.type_brics').removeClass('brics_selected');
            if (view_type == 'list') {
                $('#product_all').addClass('view_by_list');
                $(dis).prev().removeClass('brics_selected');
                $(dis).addClass('brics_selected');
            } else {
                $('#product_all').removeClass('view_by_list');
                $(dis).next().removeClass('brics_selected');
                $(dis).addClass('brics_selected');
            }
        }

        function AddtoWishlist(dis) {
            var chkclass = $(dis).attr('class');

            var itemid = $(dis).attr('id');
            var carturl = "{{url('addtowishlist')}}";
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: carturl,
                data: {itemid: itemid},
                success: function (data) {
                    if (data == 'login_first') {
                        swal("Login Required", "Please login first to add this item to wishlist", "info");
                        ShowLoginSignup('signin');
                    } else {
                        if (chkclass == "product_wish add_wish") {
                            $(dis).removeClass('add_wish');
                        } else {
                            $(dis).addClass('add_wish');
                        }
                        $("#wishlist_load").html(data);
                    }
//                    ShowSuccessPopupMsg('Product has been added to cart');
                },
                error: function (xhr, status, error) {
                    $("#wishlist_load").html(xhr.responseText);
//                    alert('Technical Error Occured!');
                }
            });
        }
        function Showres_search() {
            $('#product_wise_search').addClass('product_searchbox_resshow');
        }
        function Hideres_search() {
            $('#product_wise_search').removeClass('product_searchbox_resshow');
        }
        var append_loading_img = '<div class="feed_loadimg_block" id="load_img">' + '<img height="50px" class="center-block" src="{{ url('images/loading.gif') }}"/></div>';
        var append_div = '<div class="product_block loading_block" id="load_item1"><div class="single_line"><div class="load_waves"></div></div><div class="img_load"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div></div><div class="product_block loading_block" id="load_item2"><div class="single_line"><div class="load_waves"></div></div><div class="img_load"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div></div><div class="product_block loading_block" id="load_item3"><div class="single_line"><div class="load_waves"></div></div><div class="img_load"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div></div><div class="product_block loading_block" id="load_item4"><div class="single_line"><div class="load_waves"></div></div><div class="img_load"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div><div class="single_line"><div class="load_waves"></div></div></div>';
        /*var no_record = '<div class="product_block">No Record Available</div>';*/
        var no_record = '<div class="no_found_row">No more items available !</div>';
        function getItemid(dis) {
            $('#item_master_id').val(dis);
        }
        function getNotify() {
            var n_email = $('#n_email').val();
            var n_contact = $('#n_contact').val();
            var n_message = $('#n_message').val();
            var item_master_id = $('#item_master_id').val();
            if (n_email == '') {
                swal("Required", "Please enter email", "info");
            } else if (n_contact == '') {
                swal("Required", "Please enter contact no", "info");
            } else if (n_message == '') {
                swal("Required", "Please enter message", "info");
            } else {
                $.ajax({
                    type: "get",
                    url: "{{url('notify')}}",
//                    data: "ask_number= " + ask_number,
                    data: {email: n_email, contact: n_contact, message: n_message, item_master_id: item_master_id},
                    success: function (data) {
                        if (data == 'success') {
                            $('#Modal_NotifyMe').modal('hide');
                            $('#n_email').val('');
                            $('#n_contact').val('');
                            $('#n_message').val('');
                            $('#item_master_id').val('');
                            swal("Thank you", "We will get back to you soon", "success");
                        } else {
                            swal("Oops", "Something went wrong", "info");
                        }
                    },
                    error: function (data) {
                        HidePopoupMsg();
                        swal("Oops", "Something went wrong", "info");
//                        ShowErrorPopupMsg('oops Something Went Wrong...');
                    }
                });
            }
        }
        function get_category(dis) {
            $('#loader').css('display', 'block');
            $('#view_thumb').css('display', 'none');
            var category_id = $(dis).attr('id');
            var limit = Number($('#see_id').val());
//            alert(category_id);
            $('#category_id').val(category_id);
            var popularity = $('#popularity').attr('class') == 'type_brics brics_selected' ? 1 : 0;
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('getallproducts') }}",
                data: {currentpage: limit, category_id: category_id, popularity: popularity},
                beforeSend: function () {
                    $('#product_all').html('');
                    $('#product_all').html(append_div);
                },
                success: function (data) {
                    $('#loader').css('display', 'none');
                    $("#load_item1").remove();
                    $("#load_item2").remove();
                    $("#load_item3").remove();
                    $("#load_item4").remove();
                    $("#product_all").html(data);

                },
                error: function (xhr, status, error) {
                    $('#product_all').html(xhr.responseText);
//                    ShowErrorPopupMsg('Error in uploading...');
                }
            });
            hide_filter();
        }
        function get_items(dis) {
            $('#loader').css('display', 'block');
            $('#view_thumb').css('display', 'block');
            var category_id = $(dis).attr('id');
            // $('#see_id').val('');
            var limit = 1;
            $('#see_id').val(1);
//            alert(category_id);
            $('#category_id').val(category_id);
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('getmoreproducts') }}",
                data: {currentpage: limit, category_id: category_id},
                beforeSend: function () {
                    $('#product_all').html(append_div);
                },
                success: function (data) {
                    $('#loader').css('display', 'none');
                    $("#load_item1").remove();
                    $("#load_item2").remove();
                    $("#load_item3").remove();
                    $("#load_item4").remove();
                    if (data.no_record == 'no_record') {
//                        $("#load_item").remove();
                        $("#product_all").html(no_record);
                    } else {
//                        $("#load_item").remove();
                        $('#product_all').html('');
                        $("#product_all").html(data);
                    }
                },
                error: function (xhr, status, error) {
                    $('#product_all').html(xhr.responseText);
//                    ShowErrorPopupMsg('Error in uploading...');
                }
            });
            hide_filter();
        }
        function first_get_items() {
//            $('#loader').css('display', 'block');
            var category_id = 0;
            // $('#see_id').val('');
            var limit = 1;
            $('#see_id').val(1);
//            alert(category_id);
            $('#category_id').val(category_id);
//            var popularity = $('#popularity').attr('class') == 'type_brics brics_selected' ? 1 : 0;
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('getmoreproducts') }}",
                data: {currentpage: limit, category_id: category_id, popularity: 1},
                beforeSend: function () {
                    $('#product_all').html(append_div);
                },
                success: function (data) {
//                    $('#loader').css('display', 'none');
                    $("#load_item1").remove();
                    $("#load_item2").remove();
                    $("#load_item3").remove();
                    $("#load_item4").remove();
                    if (data.no_record == 'no_record') {
                        $("#load_item").remove();
                        $("#product_all").html(no_record);
                    } else {
                        $("#load_item").remove();
                        $('#product_all').html('');
                        $("#product_all").html(data);
                    }
                    $('#page_loader').hide();
                },
                error: function (xhr, status, error) {
                    $('#product_all').html(xhr.responseText);
//                    ShowErrorPopupMsg('Error in uploading...');
                }
            });
            hide_filter();
        }

        function Short_filer_items(dis) {
            if ($(dis).attr('id') == 'popularity') {
                $('#alphabetical').removeClass('brics_selected');
            } else {
                $('#popularity').removeClass('brics_selected');
            }
            if ($(dis).attr('class') == 'type_brics brics_selected') {
                $(dis).removeClass('brics_selected');
            } else {
                $(dis).addClass('brics_selected');
            }
            var popularity = $('#popularity').attr('class') == 'type_brics brics_selected' ? 1 : 0;
            var alphabetical = $('#alphabetical').attr('class') == 'type_brics brics_selected' ? 1 : 0;
            $('#loader').css('display', 'block');
            var category_id = $('#filter_data').find('.selected').attr('id');
            var limit = 1;
            $('#see_id').val(1);
            $('#category_id').val(category_id);
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('getShortproducts') }}",
                data: {
                    currentpage: limit,
                    category_id: category_id,
                    popularity: popularity,
                    alphabetical: alphabetical
                },
                beforeSend: function () {
                    $('#product_all').html(append_div);
                },
                success: function (data) {

                    $('#loader').css('display', 'none');
                    $("#load_item1").remove();
                    $("#load_item2").remove();
                    $("#load_item3").remove();
                    $("#load_item4").remove();
                    if (data.no_record == 'no_record') {
                        $("#load_item").remove();
                        $("#product_all").html(no_record);
                    } else {
                        $("#load_item").remove();
                        $('#product_all').html('');
                        $("#product_all").html(data);
                    }
                    $('#page_loader').hide();
                },
                error: function (xhr, status, error) {
                    $('#product_all').html(xhr.responseText);
//                    ShowErrorPopupMsg('Error in uploading...');
                }
            });
            hide_filter();
        }

        $(document).ready(function () {
            first_get_items();
            $('[data-toggle="tooltip"]').tooltip();
            $('.header_search').keydown(function (e) {
                if ($(this).parent().find('.header_filter_row').length > 0) {
                    var po = $(this).parent().find('#filter_friend_ul').scrollTop();
                    var key = Number(e.keyCode);
                    //var count = 0;
                    var lenPress = Number($(this).parent().find('.P_pressed').length);
                    var lenCoun = Number($(this).parent().find('.header_filter_row:visible').length);
                    switch (key) {
                        case 13:
                            $('.search_filter_box').addClass('scale0');
                            $('#onpage_loader').show();
                            window.location = $(this).parent().find('.P_pressed a').attr('href');
                            return false;
                            break;
                        case 38:
                            if (lenPress == 0) {
                                $(this).parent().find('.header_filter_row:visible').last().attr('class', 'P_pressed');
                                $(this).parent().find('#filter_friend_ul').scrollTop($(this).parent().find('#filter_friend_ul').prop('scrollHeight'));
                            } else {
                                var PrevNum = Number($(this).parent().find('.P_pressed').prev('.header_filter_row:visible').length);
                                if (PrevNum == 0) {
                                    $(this).parent().find('.header_filter_row:visible').last().attr('class', 'P_pressed');
                                    $(this).parent().find('.P_pressed').first().attr('class', 'header_filter_row');
                                    $(this).parent().find('#filter_friend_ul').scrollTop($(this).parent().find('#filter_friend_ul').prop('scrollHeight'));
                                } else {
                                    $(this).parent().find('.P_pressed').prev().attr('class', 'P_pressed');
                                    $(this).parent().find('.P_pressed').last().attr('class', 'header_filter_row');
                                    $(this).parent().find('#filter_friend_ul').scrollTop(po - 40);
                                }
                            }
                            var v38 = $(this).parent().find('.P_pressed').text();
                            //$(this).val(v38);
                            break;
                        case 40:
                            var len40 = Number($(this).parent().find('.P_pressed').length);
                            if (len40 == 0) {
                                $(this).parent().find('.header_filter_row:visible').first().attr('class', 'P_pressed');
                            } else {
                                var inLen40 = Number($(this).parent().find('.P_pressed').first().next().length);
                                if (inLen40 == 0) {
                                    var coulen40 = Number($(this).parent().find('.header_filter_row:visible').length);
                                    if (coulen40 != 0) {
                                        $(this).parent().find('.P_pressed').attr('class', 'header_filter_row');
                                        $(this).parent().find('.header_filter_row:visible').first().attr('class', 'P_pressed');
                                        $(this).parent().find('#filter_friend_ul').scrollTop(0);
                                    }
                                } else {
                                    var outLen40 = Number($(this).parent().find('.P_pressed').first().next('.header_filter_row:visible').length);
                                    if (outLen40 == 0) {
                                        $(this).parent().find('.P_pressed').attr('class', 'header_filter_row');
                                        $(this).parent().find('.header_filter_row:visible').first().attr('class', 'P_pressed');
                                        $(this).parent().find('#filter_friend_ul').scrollTop(0);
                                    } else {
                                        $(this).parent().find('.P_pressed').first().next().attr('class', 'P_pressed');
                                        $(this).parent().find('.P_pressed').first().attr('class', 'header_filter_row');
                                        $(this).parent().find('#filter_friend_ul').scrollTop(po + 40);
                                    }
                                }
                            }
                            var v40 = $(this).parent().find('.P_pressed').text();
                            //$(this).val(v40);
                            break;
                    }
                }
            });
        });
        //        function HeaderSearchFilter(dis) {
        //            var ser_val = $(dis).val().length;
        //            var text = $(dis).val();
        //            if (ser_val > 0) {
        //                $(dis).parent().find('.search_filter_box').removeClass('scale0');
        //            } else {
        //                $(dis).parent().find('.search_filter_box').addClass('scale0');
        //            }
        //        }

        function HeaderSearchFilter(dis) {
            var ser_val = $(dis).val().length;
            var text = $(dis).val();
            var session_user = $('#session_user').val();
            if (ser_val > 0) {
                $.ajax({
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    url: "{{ url('search_product') }}",
                    data: {search_name: text},
                    success: function (data) {
                        var obj = jQuery.parseJSON(data);
                        if (obj.length > 0) {
                            var listItems = '';
                            for (var i = 0; i < obj.length; i++) {
                                var item_id = obj[i].id;
                                var url = obj[i].item_image != null ? 'p_img' + '/' + item_id + '/' + obj[i].item_image : 'images/default.png';
                                var item_name = obj[i].name;
                                var surl = "{{url('view_product_search').'/'}}" + item_id;
                                listItems += "<li class='header_filter_row'><a href='" + surl + "'><div><img src='{{url('').'/'}}" + url + "' class='head_filter_img'/><div class='name_filter'>" + item_name + "</div></div></a></li>";
                            }
                            $("#filter_friend_ul").html(listItems);
                            $('#no_record').addClass('hidden');
                        } else {
                            $("#filter_friend_ul").html('');
                            $('#no_record').removeClass('hidden');
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#filter_friend_ul').html(xhr.responseText);
                    }
                });
                $(dis).parent().find('.search_filter_box').removeClass('scale0');
            } else {
                $(dis).parent().find('.search_filter_box').addClass('scale0');
            }
        }

        function getmoreItems() {
            cp = 1;
            cp += parseFloat($('#see_id').val());
            $('#see_id').val(cp);
            var category_id = $('#category_id').val();
            var popularity = $('#popularity').attr('class') == 'type_brics brics_selected' ? 1 : 0;
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('getmoreproducts') }}",
                data: {currentpage: cp, category_id: category_id, popularity: popularity},
                beforeSend: function () {
                    $('#product_all').append(append_div);
                },
                success: function (data) {
//                    $("#load_item1").remove();
//                    $("#load_item2").remove();
//                    $("#load_item3").remove();
//                    $("#load_item4").remove();
                    if (data == 'no_record') {
                        $("#load_item1").remove();
                        $("#load_item2").remove();
                        $("#load_item3").remove();
                        $("#load_item4").remove();
                        $("#product_all").html(no_record);
                    } else {
                        $("#load_item1").remove();
                        $("#load_item2").remove();
                        $("#load_item3").remove();
                        $("#load_item4").remove();
                        $("#product_all").append(data);
                    }
                },
                error: function (xhr, status, error) {
                    $('#product_all').html(xhr.responseText);
                }
            });
        }
        $(window).scroll(function () {
            if ($(window).scrollTop() + window.innerHeight == $(document).height()) {
                if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
                    getmoreItems();
                }
            }
            /* if ($(window).scrollTop() + $(window).height() == $(document).height()) {
             if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
             getmoreItems();
             }
             }*/
            /* if($(window).scrollTop() + $(window).height() == $(document).height()) {

             }*/
            /*  if($(document).scrollTop() == $(document).height() - $(document).height()) {
             if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
             getmoreItems();
             }
             }*/
            /*if($(window).scrollTop() + $(window).height() == $(document).height()){ //scrolled to bottom of the page
             if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
             getmoreItems();
             }
             }*/
            /*if($(window).scrollTop() + $(window).height() == $("#product_all_container").height()){
             /!* if(($(window).scrollTop() == $(document).height() - $(window).height())) {*!/
             if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
             getmoreItems();
             }
             }*/
            /*if($(window).scrollTop() + $(window).height() >= $(document).height()){ //scrolled to bottom of the page
             if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
             getmoreItems();
             }
             }*/
            /*debugger;
             var chk_footer=$('#footer').offset().top;
             alert(chk_footer);
             alert($(window).checkScrollbar());
             if($(window).checkScrollbar() >= chk_footer)
             {
             if (parseFloat($('#see_id').val()) < parseFloat($('#products_count').val())) {
             getmoreItems();
             }else {
             $("#product_all").html(no_record);
             }
             }*/
        });
        function getItemDetails(dis) {
            $('#modal_body').html('<img height="50px" class="center-block" src="{{url('images/loading.gif')}}"/>');
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('view_item') }}",
                data: {item_id: $(dis).attr('id')},
                success: function (data) {
                    $('#modal_body').html(data);
                    Initialize_ProductDetails();
                },
                error: function (xhr, status, error) {
                    $('#modal_body').html(xhr.responseText);
                }
            });
        }
        function ShowFilter() {
            $('#overlay_div').show();
            $('#product_filter_container').addClass('product_filter_container_show');
        }
        function hide_filter() {
            $('#overlay_div').hide();
            $('#product_filter_container').removeClass('product_filter_container_show');
        }
    </script>
@stop