<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" type="images/png" href="{{url('assets/images/odfevicon.png')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/materialdesignicons.min.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/Dashboard.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/Autocomplete.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/css/media.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
    {{--<link rel="stylesheet" href="{{url('assets/css/w3.css')}}"/>--}}
  {{--  <link rel="stylesheet" href="{{url('assets/css/form-wizard-green.css')}}">--}}
    {{--<link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap.min.css')}}"/>--}}
    <link rel="stylesheet" href="{{url('assets/css/text_editor.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/Global.js')}}"></script>
    <script src="{{url('js/my_validation.js')}}"></script>
    <script src="{{url('assets/js/text_editor.js')}}"></script>
    <script src="{{url('assets/js/Autocomplete.js')}}"></script>
    <script src="{{url('js/Sorting.js')}}"></script>
    {{--<script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="{{url('assets/js/dataTables.bootstrap.min.js')}}"></script>--}}
    <script type="text/javascript">
        function GetandSetOnEditor() {
            var htm = $("#txtEditor").Editor("getText");
            //alert(htm);
            /* var sethtm = $(grandPar).html();
             $("#txtEditor").Editor("setText", sethtm);*/
        }
        function HideTranparent() {
            $('.overlay_res').fadeOut();
            $('.dash_sidemenu').removeClass('dash_sidemenu_show');
            $('body').css('overflow', 'auto');
        }
        function ResponsiveMenuClick() {
            $('.overlay_res').fadeIn();
            $('.dash_sidemenu').addClass('dash_sidemenu_show');
            $('body').css('overflow', 'hidden');
        }
        $(document).ready(function () {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
            $(".text_editor").each(function () {
                $(this).Editor();
            });
            //$(".text_editor").Editor();
            // Tooltip jquery
            $('.Glo_autocomplete').select2();
            $('.grid_title').hover(function () {
                var headtxt = $(this).text();
                var left = $(this).offset().left;
                var top = $(this).offset().top;
                $('.icon_tp').css('margin', '0px');
                $('.icon_tp').show();
                $('.icon_txt').text(headtxt);
                $('.icon_tp').css("top", top - 30);
                $('.icon_tp').css("left", left);
            });
            $('.grid_title').mouseout(function () {
                $('.icon_tp').hide();
            });
        });
        function MenuClick(dis) {
            $('.dash_sub_menu').slideUp();
            $('.right_menu_li').find('i').removeClass('mdi-chevron-down');
            $('.right_menu_li').find('i').addClass('mdi-chevron-right');
            if ($(dis).find('.dash_sub_menu').is(':visible')) {
                $(dis).find('.dash_sub_menu').slideUp();
                $(dis).find('i').removeClass('mdi-chevron-down');
                $(dis).find('i').addClass('mdi-chevron-right');
            }
            else {
                $(dis).find('.dash_sub_menu').slideDown();
                $(dis).find('i').removeClass('mdi-chevron-right');
                $(dis).find('i').addClass('mdi-chevron-down');
            }
        }
        function GridHeaderCheck(dis) {
            $('input[type="checkbox"]').prop("checked", $(dis).prop("checked"));
        }
        function myFunction() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 3000);

        }
        function toggleFullScreen(elem) {
            if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
                if (elem.requestFullScreen) {
                    elem.requestFullScreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullScreen) {
                    elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                }
                $('.expand_on').hide();
                $('.expand_off').show();
                $('#fixed_nav').addClass('on_fullscreen_fixed');
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
                $('.expand_on').show();
                $('.expand_off').hide();
                $('#fixed_nav').removeClass('on_fullscreen_fixed');
            }
        }
        function MenuShift(dis) {
            var checkclass = $('#page_body').attr('class');
            if (checkclass == "body_color") {
                $('#page_body').addClass('collapse_side');
                $(dis).find('.left_show').show();
                $(dis).find('.right_show').hide();
                $(dis).css('left', '83px');
            } else {
                $('#page_body').removeClass('collapse_side');
                $(dis).find('.right_show').show();
                $(dis).find('.left_show').hide();
                $(dis).css('left', '216px');
            }
        }
        function settings() {
            var id = 2;
            $('#myheader').html('');
            $('#mybody').html('');
            $('#myfooter').html('');
            $('#myheader').html('<b>Update Profile</b> <button type="button" class="close" data-dismiss="modal">&times;</button>');
            $('#myfooter').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
            var editurl = '{{ url('settings') }}' + '/' + id;
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('#mybody').html(data);
                    $('#myModal').modal();

                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        }
    </script>
</head>
<body class="body_color" id="page_body">
<div id="myloaderid" class="loader"></div>
<nav class="top_navigationbar" id="fixed_nav">
    <div class="dash_menuicon" onclick="ResponsiveMenuClick();"><i class="mdi mdi-menu"></i>
    </div>
    <div class="option-container">

        <div class="user-info glo_menuclick">
            {{-- <img src="images/Male_default.png" class="profile_img">--}}
            <span>{{ucfirst($_SESSION['admin_master']['username'])}}</span>
            <span class="caret"></span>
            <div class="menu_basic_popup menu_popup_setting effect scale0">
                <div class="menu_popup_containner padding0">
                    {{-- <div class="menu_popup_settingrow effect">
                         <a href="#" class="menu_setting_row">
                             <i class="mdi mdi-account-edit global_color"></i>
                             Edit Profile
                         </a>
                     </div>--}}
                    <div class="menu_popup_settingrow effect" onclick="settings()">
                        <a href="#"  class="menu_setting_row">
                            <i class="mdi mdi-account-settings-variant global_color"></i>
                            Setting
                        </a>
                    </div>

                    {{--<div class="menu_popup_settingrow effect" onclick="update_password();" data-toggle="modal2" data-target="#myModal_UpdatePassword">
                        <a href="#" class="menu_setting_row">
                            <i class="mdi mdi-lock-open-outline global_color"></i>
                            Change Password
                        </a>
                    </div>--}}
                    <div class="menu_popup_settingrow effect">
                        <a href="{{url('lgt')}}" class="menu_setting_row">
                            <i class="mdi mdi-logout" style="color: #ff5a55;"> </i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="menu_basic_block glo_menuclick">--}}
        {{--<span class="mdi mdi-earth"></span>--}}
        {{--<div class="total_count">5</div>--}}
        {{--<div class="menu_basic_popup effect scale0 notification_popbox">--}}
        {{--<div class="menu_popup_head">Notification</div>--}}
        {{--<div class="menu_popup_containner">--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_text">--}}
        {{--<p class="popup_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,--}}
        {{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
        {{--veniam,</p>--}}
        {{--<div class="popup_iconwithtime"><i class="mdi mdi-calendar-clock global_color"></i>--}}
        {{--28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_text">--}}
        {{--<p class="popup_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,--}}
        {{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
        {{--veniam,</p>--}}
        {{--<div class="popup_iconwithtime"><i class="mdi mdi-calendar-clock global_color"></i>--}}
        {{--28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_showall">--}}
        {{--<a href="NotificationList.php"> See All </a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_basic_block glo_menuclick">--}}
        {{--<span class="mdi mdi-email"></span>--}}
        {{--<div class="total_count" id="spanShortList">2</div>--}}
        {{--<div class="menu_basic_popup effect scale0 massage_popbox">--}}
        {{--<div class="menu_popup_head">Messages</div>--}}
        {{--<div class="menu_popup_containner style-scroll">--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_row">--}}
        {{--<div class="menu_popup_imgbox"><img src="{{url('assets/images/Male_default.png')}}"--}}
        {{--class="profile_img"></div>--}}
        {{--<div class="menu_popup_massage">--}}
        {{--<div class="popup_user_namewithdate">--}}
        {{--Pinku Kesharwani--}}
        {{--<div class="popup_iconwithtime_right"><i--}}
        {{--class="mdi mdi-calendar-clock global_color"></i> 28-Dec-2017--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="popup_user_massagetxt">--}}
        {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit,--}}
        {{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim--}}
        {{--veniam,--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="menu_popup_showall">--}}
        {{--<a href="#"> See All </a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="expand_block" onclick="toggleFullScreen(document.body)">
            <i class="mdi mdi-arrow-expand-all expand_on"></i>
            <i class="mdi mdi-arrow-collapse-all expand_off"></i>
        </div>--}}
    </div>
</nav>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="myheader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body edit_item_container" id="mybody">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer" id="myfooter">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="inbox">
    <div class="fab btn-group show-on-hover dropup">
        <div data-toggle="tooltip" data-placement="left" title="Shortcut">
            <button type="button" class="btn btn-danger btn-io dropdown-toggle" data-toggle="dropdown">
            <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x fab-backdrop"></i>
                <i class="fa fa-plus fa-stack-1x fa-inverse fab-primary"></i>
                <i class="fa fa-pencil fa-stack-1x fa-inverse fab-secondary"></i>
            </span>
            </button>
        </div>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
            <li style="display: none;"><a href="#" data-toggle="tooltip" data-placement="left" title="FullView"><i
                            class="mdi mdi-fullscreen"></i></a></li>
            <li><a href="#" onclick="toggleFullScreen(document.body);" data-toggle="tooltip" data-placement="left"
                   title="FullView"><i class="mdi mdi-fullscreen"></i></a></li>
            <li><a href="#" onclick="settings();" data-toggle="tooltip" data-placement="left" title="Settings"><i
                            class="mdi mdi-account-settings-variant"></i></a></li>
            <li><a href="{{url('/admin')}}" data-toggle="tooltip" data-placement="left" title="Dashboard"><i
                            class="mdi mdi-speedometer"></i></a></li>
        </ul>
    </div>
</div>
<div class="modal fade" id="myModalsmall" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width:435px;">
            <div id="smallheader" class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div id="smallbody" class="modal-body">
                <p>This is a small modal.</p>
            </div>
            <div id="smallfooter" class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $loginUser = \App\LoginModel::find($_SESSION['admin_master']['id']); ?>
<aside class="dash_sidemenu pcb">
    <div class="shift_iconbox abc" onclick="MenuShift(this);">
        <i class="mdi mdi-arrow-left-bold right_show"></i>
        <i class="mdi mdi-arrow-right-bold left_show"></i>
    </div>
    <div class="logo_block">
        <img src="{{url('assets/images/organic_logo1.png')}}" class="big_aside_icon"/>
        <img src="{{url('assets/images/odfevicon.png')}}" class="small_aside_icon"/>
    </div>
    <div class="dash_emp_details">
        <img src="{{url('admin_pic/').'/'.$loginUser->id.'/'.$loginUser->image}}"
             class="dash_profile_img"/>
        <div class="dash_emp_basic">
            <span class="dash_name">{{ucfirst($_SESSION['admin_master']['username'])}}</span>
            {{--<span class="dash_designation">Admin</span>--}}
        </div>
    </div>
    <ul class="list-group dash_menu_ul style-scroll">
        <?php $mymenuroll = \App\Menurolemodel::where(['user_id' => $_SESSION['admin_master']->id])->get();?>
        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==1)
                <li class="right_menu_li">
                    <a href="{{url('organic').'/'.encrypt(1).'/admin'}}">
                        <i class="dash_arrow mdi mdi-speedometer global_color"></i>
                        <span class="aside_menu_txt">Dashboard</span>
                    </a>
                </li>
            @endif
        @endforeach
        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==2)
                <li class="right_menu_li">
                    <a href="{{url('organic').'/'.encrypt(1).'/category'}}">
                        {{--  <a href="{{url('/category')}}">--}}
                        <i class="dash_arrow mdi mdi-tag global_color"></i>
                        <span class="aside_menu_txt">Category</span>
                    </a>
                </li>
            @endif
        @endforeach


        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==3)
                <li class="right_menu_li">
                    <a href="{{url('organic').'/'.encrypt(1).'/items'}}">
                        {{--  <a href="{{url('/items')}}">--}}
                        <i class="dash_arrow mdi mdi-content-duplicate global_color"></i>
                        <span class="aside_menu_txt">Items</span>
                    </a>
                </li>
            @endif
        @endforeach

        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==4)
                <li class="right_menu_li">
                    <a href="{{url('organic').'/'.encrypt(1).'/userlist'}}">
                        {{--     <a href="{{url('/userlist')}}">--}}
                        <i class="dash_arrow mdi mdi-account-multiple global_color"></i>
                        <span class="aside_menu_txt">Users</span>
                    </a>
                </li>
            @endif
        @endforeach




        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==5)
                <li class="right_menu_li">
                    {{-- <a href="{{url('/orderlist')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/orderlist'}}">
                        <i class="dash_arrow mdi mdi-clipboard-plus global_color"></i>
                        <span class="aside_menu_txt">Order</span>
                    </a>
                </li>
            @endif
        @endforeach

        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==6)
                <li class="right_menu_li">
                    {{--<a href="{{url('/delivery')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/delivery'}}">
                        <i class="dash_arrow mdi mdi-truck-delivery global_color"></i>
                        <span class="aside_menu_txt">Delivery</span>
                    </a>
                </li>
            @endif
        @endforeach

        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==7)
                <li class="right_menu_li">
                    {{--<a href="{{url('/review')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/review'}}">
                        <i class="dash_arrow mdi mdi-forum global_color"></i>
                        <span class="aside_menu_txt">Reviews</span>
                    </a>
                </li>
            @endif
        @endforeach

        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==8)
                <li class="right_menu_li">
                    {{-- <a href="{{url('/statelist')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/statelist'}}">
                        <i class="dash_arrow mdi mdi-earth global_color"></i>
                        <span class="aside_menu_txt">State</span>
                    </a>
                </li> @endif
        @endforeach



        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==9)
                <li class="right_menu_li">
                    {{--<a href="{{url('/citylist')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/citylist'}}">
                        <i class="dash_arrow mdi mdi-map-marker global_color"></i>
                        <span class="aside_menu_txt">City</span>
                    </a>
                </li>
            @endif
        @endforeach


        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==10)
                <li class="right_menu_li">
                    {{--<a href="{{url('/ask')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/ask'}}">
                        <i class="dash_arrow mdi mdi-cellphone-android global_color"></i>
                        <span class="aside_menu_txt">Ask Caller</span>
                    </a>
                </li>
            @endif
        @endforeach
        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==13)
                <li class="right_menu_li">
                    {{--<a href="{{url('/blog')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/blog'}}">
                        <i class="dash_arrow mdi mdi-message-image global_color"></i>
                        <span class="aside_menu_txt">Blog</span>
                    </a>
                </li>
            @endif
        @endforeach
        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==11)
                <li class="right_menu_li">
                    {{--<a href="{{url('/testimonials')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/testimonials'}}">
                        <i class="dash_arrow mdi mdi-account-star global_color"></i>
                        <span class="aside_menu_txt">Testimonials</span>
                    </a>
                </li>
            @endif
        @endforeach

        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==12)
                <li class="right_menu_li">
                    {{--<a href="{{url('/allreciepe')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/allreciepe'}}">
                        <i class="dash_arrow mdi mdi-food-fork-drink global_color"></i>
                        <span class="aside_menu_txt">All Recipe</span>
                    </a>
                </li>
            @endif
        @endforeach

        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==14)
                <li class="right_menu_li">
                    {{--<a href="{{url('/subscribe')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/subscribe'}}">
                        <i class="dash_arrow mdi mdi-account-alert global_color"></i>
                        <span class="aside_menu_txt">Subscribe</span>
                    </a>
                </li>
            @endif
        @endforeach
        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==15)
                <li class="right_menu_li">
                    {{--<a href="{{url('/rollmastermenu')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/rollmastermenu'}}">
                        <i class="dash_arrow mdi mdi mdi-account-card-details global_color"></i>
                        <span class="aside_menu_txt">Role Master</span>
                    </a>
                </li>
            @endif
        @endforeach

        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==16)
                <li class="right_menu_li">
                    {{--<a href="{{url('/rollmastermenu')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/brand'}}">
                        <i class="dash_arrow mdi mdi mdi-briefcase-check global_color"></i>
                        <span class="aside_menu_txt">Brand</span>
                    </a>
                </li>
            @endif
        @endforeach
        @foreach($mymenuroll as $mymenurollone)
            @if($mymenurollone->menu_id==17)
                <li class="right_menu_li">
                    {{--<a href="{{url('/rollmastermenu')}}">--}}
                    <a href="{{url('organic').'/'.encrypt(1).'/shop_points'}}">
                        <i class="dash_arrow mdi mdi mdi-crosshairs-gps global_color"></i>
                        <span class="aside_menu_txt">Shop Points</span>
                    </a>
                </li>
            @endif
        @endforeach


        {{--<li class="right_menu_li" onclick="MenuClick(this);">
            <a href="javascript:;">
                <span class="dash_arrow mdi mdi-account-multiple-outline  global_color"></span>
                <span class="aside_menu_txt"> Option menu 1</span>
                <i class="mdi mdi-chevron-right icon-left-arrow"></i>
            </a>
            <ul class="list-group dash_sub_menu">
                <li>
                    <a href="Dashboard.html">Option Manu List 1</a>
                </li>
                <li>
                    <a href="Dashboard.html">Option Manu List 2</a>
                </li>
            </ul>
        </li>--}}
        {{--<li class="right_menu_li"  onclick="MenuClick(this);">
            <a href="javascript:;">
                <span class="dash_arrow mdi mdi-format-list-numbers  global_color"></span>
                <span class="aside_menu_txt">Option menu 2</span>
                <i class="mdi mdi-chevron-right icon-left-arrow"></i>
            </a>
            <ul class="list-group dash_sub_menu">
                <li>
                    <a href="Dashboard.html">Option Manu List 1</a>
                </li>
                <li>
                    <a href="Dashboard.html">Option Manu List 2</a>
                </li>
            </ul>
        </li>
        <li class="right_menu_li"  onclick="MenuClick(this);">
            <a href="javascript:;" class="waves-effect waves-block">
                <span class="dash_arrow mdi mdi-account-star  global_color"></span>
                <span class="aside_menu_txt">Option menu 3</span>
                <i class="mdi mdi-chevron-right icon-left-arrow"></i>
            </a>
            <ul class="list-group dash_sub_menu">
                <li>
                    <a href="Dashboard.html">Option Manu List 1</a>
                </li>
                <li>
                    <a href="Dashboard.html">Option Manu List 2</a>
                </li>
            </ul>
        </li>
        <li class="right_menu_li"  onclick="MenuClick(this);">
            <a href="javascript:;">
                <span class="dash_arrow mdi mdi-sitemap global_color"></span>
                <span class="aside_menu_txt">Option menu 4</span>
                <i class="mdi mdi-chevron-right icon-left-arrow"></i>
            </a>
            <ul class="list-group dash_sub_menu">
                <li>
                    <a href="Dashboard.html">Option Manu List 1</a>
                </li>
                <li>
                    <a href="Dashboard.html">Option Manu List 2</a>
                </li>
            </ul>
        </li>--}}
    </ul>
</aside>
@yield('content')
<div class="overlay_res" onclick="HideTranparent();"></div>
<div id="snackbar">New Categories added Successfully</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myloaderid').hide();
    });

    $('.fab').hover(function () {
        $(this).toggleClass('active');
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    function GlobalsearchTable(table_bodyid) {
        var input, filter, found, table, tr, td, i, j;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById(table_bodyid);
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
            if (found) {
                tr[i].style.display = "";
                found = false;
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    function GlobalHideShow(show_this, hide_this) {
        $('#' + hide_this).hide();
        $('#' + show_this).show();
    }
</script>
@if(session()->has('message'))
    <script type="text/javascript">
        setTimeout(function () {
            {{--            ShowSuccessPopupMsg('{{ session()->get('message') }}');--}}
            swal("Success!", "{{ session()->get('message') }}", "success");

        }, 500);
        function GlobalsearchTable(table_bodyid) {
            var input, filter, found, table, tr, td, i, j;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById(table_bodyid);
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                    found = false;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
@endif
</body>
</html>
