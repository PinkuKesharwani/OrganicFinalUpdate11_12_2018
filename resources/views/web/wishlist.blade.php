@extends('web.layouts.e_master')

@section('title', 'Organic Dolchi : My Wishlist')

@section('head')
    <style type="text/css">
        .order_row {
            background: white;
        }
    </style>
@stop
@section('content')
    <section class="product_section">
        <div class="container-fluid res_pad0" id="profile_section">
            <div class="col-sm-12 col-md-3">
                <div class="order_listbox wishlist_profile" id="profile_container">
                    <div class="carousal_head">
                        <span class="filter_head_txt slider_headtxt">My Profile</span>
                    </div>
                    <div class="order_list_container">
                        <div class="my_profile_picshow">
                            @if($user->profile_img != 'images/Male_default.png')
                                <img src="{{url('u_img').'/'.$user->id.'/'.$user->profile_img}}" id="_UserProfile"
                                     alt="UserProfile">
                            @else
                                <img src="{{url('images/Male_default.png')}}" id="_UserProfile" alt="UserProfile">
                            @endif
                            <div class="my_profile_name">{{$user->name}}</div>
                            <div class="deli_row">
                                <strong>My Rewards : </strong>
                                <strong>{{$user->gain_amount}}</strong>
                                {{--<input type="text" disabled name="contact" value="{{$user->contact}}" id="p_id"--}}
                                {{--placeholder="Phone No."--}}
                                {{--class="form-control" onkeypress="return false;"/>--}}
                            </div>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a class="menu_setting_row" href="{{url('my_profile')}}">
                                <i class="mdi mdi-account-edit"></i>
                                Edit Profile
                            </a>
                        </div>
                        {{--  <div class="menu_popup_settingrow">
                              <a class="menu_setting_row" onclick="ShowAddress();">
                                  <i class="mdi mdi-map-marker"></i>
                                  Manage Address
                              </a>
                          </div>--}}
                        <div class="menu_popup_settingrow">
                            <a href="{{url('myrecipe?type=list')}}" class="menu_setting_row">
                                <i class="mdi mdi-view-list"></i>
                                My Recipe List
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('myrecipe?type=new')}}" class="menu_setting_row">
                                <i class="mdi mdi-tooltip-edit"></i>
                                Add Recipe
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('order_list')}}" class="menu_setting_row">
                                <i class="mdi mdi-format-list-checks"></i>
                                Order List
                            </a>
                        </div>

                        <div class="menu_popup_settingrow">
                            <a href="{{url('product_feedback')}}" class="menu_setting_row">
                                <i class="mdi mdi-message-draw"></i>
                                Review &amp; Rating
                            </a>
                        </div>
                        {{--<div onclick="ChangePasswordShow();" class="menu_popup_settingrow"--}}
                        {{--data-target="#myModal_UpdatePassword" data-toggle="modal">--}}
                        {{--<a class="menu_setting_row" href="#">--}}
                        {{--<i class="mdi mdi-lock-open-outline"></i>--}}
                        {{--Change Password--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        <div class="menu_popup_settingrow border_none">
                            <a href="{{url('logout')}}" class="menu_setting_row">
                                <i class="mdi mdi-logout"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 res_ml_pad0">
                {{--<div class="view_headbox">--}}
                {{--<div class="responsive_show" onclick="Showres_search();"><i class="mdi mdi-magnify"></i>--}}
                {{--</div>--}}
                {{--<div class="responsive_show" onclick="ShowMenu();"><i class="mdi mdi-menu"></i>--}}
                {{--</div>--}}
                {{--<div class="product_searchbox" id="product_wise_search">--}}
                {{--<div class="search_filter">--}}
                {{--<input type="text" class="main_filter_search" id="Search_by_product"--}}
                {{--placeholder="Search by product">--}}
                {{--<div class="filter_search_icon">--}}
                {{--<i class="mdi mdi-magnify"></i>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="back_search_btn" onclick="Hideres_search();"><i class="mdi mdi-arrow-left"></i>--}}
                {{--</div>--}}
                {{--<div class="product_search_box">--}}
                {{--<input type="text" class="header_search" autocomplete="off" onautocomplete="false"--}}
                {{--placeholder="Search by product" onkeyup="HeaderSearchFilter(this);">--}}
                {{--<input type="hidden" name="search" id="search_user_id">--}}
                {{--<i class="product_search_icon mdi mdi-magnify"></i>--}}
                {{--<div class="search_filter_box scale0">--}}
                {{--<div class="no_record_found hidden" id="no_record">--}}
                {{--&lt; No Friend Found &gt;--}}
                {{--</div>--}}
                {{--<ul class="filter_search_ul style-scroll" id="filter_friend_ul">--}}
                {{--<li class="header_filter_row">--}}
                {{--<a>--}}
                {{--<img src="http://localhost:8000/p_img/269/1535028253_chyawanprash.jpg"--}}
                {{--class="head_filter_img">--}}
                {{--<div class="name_filter">Chyawanprash</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="header_filter_row">--}}
                {{--<a>--}}
                {{--<img src="http://localhost:8000/p_img/181/1535026492_91nXnlS3HQL._AC_UL320_SR256,320_.jpg"--}}
                {{--class="head_filter_img">--}}
                {{--<div class="name_filter">Risa dhosa mix</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="header_filter_row">--}}
                {{--<a>--}}
                {{--<img src="http://localhost:8000/p_img/183/1535026181_rava idli mix.jpg"--}}
                {{--class="head_filter_img">--}}
                {{--<div class="name_filter">Rava idli mix</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="header_filter_row">--}}
                {{--<a>--}}
                {{--<img src="http://localhost:8000/p_img/184/1535027762_coffee powder smooth.jpg"--}}
                {{--class="head_filter_img">--}}
                {{--<div class="name_filter">Coffee powder smooth</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="header_filter_row">--}}
                {{--<a>--}}
                {{--<img src="http://localhost:8000/p_img/242/1535027510_sunab soft black hair color.jpg"--}}
                {{--class="head_filter_img">--}}
                {{--<div class="name_filter">sunab soft black hair color</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="header_filter_row">--}}
                {{--<a>--}}
                {{--<img src="http://localhost:8000/p_img/243/1535027128_sunab-natural-dark-brown-500x500.jpg"--}}
                {{--class="head_filter_img">--}}
                {{--<div class="name_filter">Sunab Natural Dark brown</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="header_filter_row">--}}
                {{--<a>--}}
                {{--<img src="http://localhost:8000/p_img/252/1535026878_organic henna powder.jpg"--}}
                {{--class="head_filter_img">--}}
                {{--<div class="name_filter">organic henna powder</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li class="header_filter_row">--}}
                {{--<a>--}}
                {{--<img src="http://localhost:8000/images/default.png"--}}
                {{--class="head_filter_img">--}}
                {{--<div class="name_filter">Indego Lief Powder</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="viewtype_block pull-right">--}}
                {{--<div class="viewtype_txt">View</div>--}}
                {{--<div class="type_brics brics_selected" onclick="show_view(this , 'grid');" data-toggle="tooltip"--}}
                {{--data-placement="top" title="Grid View"><i--}}
                {{--class="mdi mdi-view-grid"></i></div>--}}
                {{--<div class="type_brics" onclick="show_view(this, 'list');" data-toggle="tooltip"--}}
                {{--data-placement="top" title="List View"><i class="mdi mdi-view-list"></i>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="wishlist_container" id="wishlist_all">
                    @if(count($wishlist)>0)
                        @foreach($wishlist as $item)
                            <div class="product_block" id="product_block">
                                <div class="product_name"><a class="product_details_link"
                                                             href="{{url('view_product').'/'.(encrypt($item->item_id))}}">{{$item->item->name}}</a>
                                </div>

                                <div class="product_wish" onclick="remove_wishlist('{{$item->item_id}}');"
                                     data-toggle="tooltip" title="" data-original-title="Remove">
                                    <i class="mdi mdi-delete"></i>
                                </div>
                                {{--<div class="product_wish {{isset($wishlist_item)?'add_wish':''}}" id="{{$item->item_id}}"--}}
                                {{--onclick="AddtoWishlist(this);" data-toggle="tooltip"--}}
                                {{--title="Wishlist">--}}
                                {{--<i class="mdi mdi-heart"></i>--}}
                                {{--</div>--}}
                                <div class="long_product_img">
                                    <?php $image = \App\ItemImages::where(['item_master_id' => $item->item_id])->first(); ?>
                                    @if(isset($image->image) && file_exists("p_img/$item->item_id/".$image->image))
                                        <img src="{{url('p_img').'/'.$item->item_id.'/'.$image->image}}"/>
                                    @else
                                        <img src="{{url('images/default.png')}}"/>
                                    @endif
                                    <div class="hover_center_block" id="{{$item->item_id}}"
                                         onclick="getItemDetails(this);"
                                         data-toggle="modal"
                                         data-target="#Modal_ViewProductDetails">
                                        <div class="product_hover_block">
                                            <div class="mdi mdi-magnify"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $prices = \App\ItemPrice::where('item_master_id', '=', $item->item_id)->where('qty', '>', '0')->get();

                                ?>
                                @if(count($prices)>0)
                                    @foreach($prices as $price)
                                        <div class="long_spinner_withbtn">
                                            <div class="input-group long_qty_box"><span class="long_qty_txt"
                                                                                        id="price_{{$item->item_id}}"
                                                                                        data-content="{{$price->id}}">{{$price->unit.' '.$price->weight}}
                                                    - {{$price->price}}</span>
                                                <input type="number"
                                                       class="form-control text-center qty_edittxt"
                                                       min="1"
                                                       max="{{$price->qty}}"
                                                       value="1" id="qty_load_{{$item->item_id}}">
                                            </div>
                                            <button class="spinner_addcardbtn btn-primary"
                                                    id="{{$item->item_id}}"
                                                    type="button" data-content="{{$price->id}}"
                                                    onclick="AddTOcart_wishlist(this);">
                                                <i class="mdi mdi-basket"></i> <span
                                                        class="button-group_text">Add</span>
                                            </button>
                                        </div>

                                    @endforeach
                                    @if(count($prices)!=4 && isset($item->specifcation))
                                        <div class="basic_description @if(count($prices) == 1) {{"line_4"}}@elseif(count($prices)==2) {{"line_3"}}@elseif(count($prices)==3) {{"line_1"}} @endif">
                                            {{$item->specifcation}}
                                        </div>
                                    @endif
                                @else

                                    <div class="notify_block long_notifyblock">
                                        <div class="out_of_stock">Out Of Stock</div>
                                        <div class="notify_me_btn" data-toggle="modal"
                                             onclick="getItemid({{$item->item_id}})"
                                             data-target="#Modal_NotifyMe">Notify Me
                                        </div>
                                    </div>
                                    @if(isset($item->specifcation))
                                        <div class="basic_description line_2">
                                            {{$item->specifcation}}
                                        </div>
                                    @endif
                                @endif

                            </div>
                        @endforeach
                    @else
                        <div class="order_row border-none">
                            <span class="no_record">&lt; No Record Available &gt;</span>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <p id="err1"></p>
    </section>
    <div class="filter_overlay" id="overlay_div" onclick="HideMenu()"></div>
    @include('web.layouts.footer')
    <script type="text/javascript">
        function AddTOcart_wishlist(dis) {
//            var cart = $('#baskit_block');
//            var cart_counter = $('#baskit_counter');
//            var cart_value = Number($(cart_counter).text());
//            cart_value++;
//            var imgtodrag = $(dis).parent().parent().find("img").eq(0);
//            if (imgtodrag) {
//                var imgclone = imgtodrag.clone()
//                    .offset({
//                        top: imgtodrag.offset().top,
//                        left: imgtodrag.offset().left
//                    })
//                    .css({
//                        'opacity': '0.5',
//                        'position': 'absolute',
//                        'height': '150px',
//                        'width': '150px',
//                        'z-index': '200'
//                    })
//                    .appendTo($('body'))
//                    .animate({
//                        'top': cart.offset().top + 10,
//                        'left': cart.offset().left + 10,
//                        'width': 50,
//                        'height': 50
//                    }, 1000, 'easeInOutExpo');
//
//                setTimeout(function () {
//                    cart.effect("shake", {
//                        times: 1
//                    }, 100);
////                    cart_counter.text(cart_value);
//                }, 1500);
//
//                imgclone.animate({
//                    'width': 0,
//                    'height': 0
//                }, function () {
//                    $(this).detach()
//                });
//            }
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
                    remove_wishlist(itemid);
                    $("#cartload").html(data);
//                    ShowSuccessPopupMsg('Product has been added to cart');
                },
                error: function (xhr, status, error) {
                    $("#cartload").html(xhr.responseText);
//                    alert('Technical Error Occured!');
                }
            });

        }

        function remove_wishlist(cart_item_id) {
            $.ajax({
                type: 'get',
                url: "{{ url('wishlist_item_delete') }}",
                data: {cart_item_id: cart_item_id},
                success: function (data) {
                    if (data == 'removed') {
                        window.location.reload();
                    }

                },
                error: function (xhr, status, error) {
                    $('#profile_section').html(xhr.responseText);
                }
            });
            // promo_code

        }

        function show_view(dis, view_type) {
            $('.type_brics').removeClass('brics_selected');
            if (view_type == 'list') {
                $('#wishlist_all').addClass('view_by_list');
                $(dis).addClass('brics_selected');
            } else {
                $('#wishlist_all').removeClass('view_by_list');
                $(dis).addClass('brics_selected');
            }
        }
        function Showres_search() {
            $('#product_wise_search').addClass('product_searchbox_resshow');
        }
        function Hideres_search() {
            $('#product_wise_search').removeClass('product_searchbox_resshow');
        }
        function ShowMenu() {
            $('#overlay_div').show();
            $('#profile_container').addClass('wishlist_profile_show');
        }
        function HideMenu() {
            $('#overlay_div').hide();
            $('#profile_container').removeClass('wishlist_profile_show');
        }
    </script>

@stop