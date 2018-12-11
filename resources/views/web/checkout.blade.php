@extends('web.layouts.e_master')
@section('title', 'Organic Food : Checkout')
@section('head')
    <script type="text/javascript">
        function paymentOption(txt) {
            if (txt == "cash") {
                $('#terms_show').fadeOut();
            } else {
                $('#terms_show').fadeIn();
            }
        }
        function change_delivery_amt(txt) {
            $('#delivery_amt_label').text(txt);
        }
        var fixed_leftposition;
//        function checkOffFixed() {
//            if ($('#price_details_containner').offset().top + $('#price_details_containner').height()
//                >= $('#footer').offset().top - 30) {
//                $('#price_details_containner').removeClass('position_fixed_removed');
//                $('#price_details_containner').css('right', 0);
//            }
//            if ($(document).scrollTop() + window.innerHeight < $('#footer').offset().top) {
//                $('#price_details_containner').addClass('position_fixed_removed');
//                $('#price_details_containner').css('right', fixed_leftposition);
//            }
//        }
        function PromoSubmit() {
            var promo_code = $('#promo_code').val();
            $.ajax({
                type: 'get',
                url: "{{ url('web_check_promo') }}",
                data: {
                    promo_code: promo_code
                },
                success: function (data) {
                    if (data != 'Invalid') {
                        $('#promo_code_box').show();
                        gAmount = 0;
                        $('#promo').text(data);
                        $('#selected_promo').val(data);
                        var net_amount = parseFloat($('#net_amount').html());
                        gAmount += net_amount - data;
                        $('#net_amount').text(gAmount);
                        $('#net_amt').val(gAmount);
                        $('#PromoCode').modal('hide');
                        $('#have_a_promo').hide()
                        swal("Success", "Promo Code has been applied...", "success");
                    } else {
                        swal("Oops", "Please enter a valid promo code...", "info");
                    }
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    $('#promo').html(xhr.responseText);
                    // swal("Oops", "Something went wrong...", "error");
                }
            });
            // promo_code

        }
        function remove_promo() {
            gAmount = 0;
            var promo = parseFloat($('#selected_promo').val());
            var net_amount = parseFloat($('#net_amount').html());
            gAmount += net_amount + promo;
            $('#net_amt').val(gAmount);
            $('#net_amount').text(gAmount);
            $('#promo_code_box').hide();
            $('#have_a_promo').show();
            $('#promo').text('');
            $('#selected_promo').val('');
        }
        function getcod(dis) {
            var iscod = $(dis).val();
            if (iscod == 1) {
                $('#button_confirm_cod').addClass('btn btn-success pull-right btn-sm show');
                $('#button_confirm_pay').attr('class', 'btn btn-success pull-right btn-sm hide');

            } else {
                $('#button_confirm_pay').addClass('btn btn-success pull-right btn-sm show');
                $('#button_confirm_cod').attr('class', 'btn btn-success pull-right btn-sm hide');
            }
        }
        function Paybypoint(dis) {
            gAmount = 0;
            var pointamt = parseFloat($(dis).val());
            var net_amount = parseFloat($('#net_amount').html());
            if ($(dis).is(":checked")) {
                $('#applyamt').removeClass('apply');
                gAmount += net_amount - pointamt;
                $('#selected_point').val(pointamt);
                $('#net_amount').text(gAmount);
                $('#net_amt').val(gAmount);
            } else {
                gAmount += net_amount + pointamt;
                $('#selected_point').val('');
                $('#net_amount').text(gAmount);
                $('#net_amt').val(gAmount);
                $('#applyamt').addClass('apply');
            }
        }
        function proceed_to_pay() {
            var existaddress = $('#add_id').val();
            var shop_point_id = $('#shop_point_id').val();
            var net_amt = $('#net_amt').val();
            if (net_amt < 1) {
                swal("Cart Empty", "Your cart is empty", "info");
                return false;
            } else if (existaddress == '0' && shop_point_id == '') {
                swal("Required", "Please select address", "info");
            } else {
                submitPayUmoney();
            }
        }
        function submitPayUmoney() {

            var is_cod = $('#payment').val();
            // $('#modal_title').html('Checkout Payment');
//            $('#myModal').modal('show');
//            $('#modal_size').removeClass('modal-lg');
//            $('#modal_size').addClass('modal-md');
//            $('#modal_footer').addClass('hidden');
            // var is_express = $('#express').val();
            // var shipping = $('#shipping').text();
            $('#Payumoney_checkout').modal('show');
            $('#Payumoneymodal_body').html('<div class="modal-body"><img height="50px" class="center-block" src="{{url('images/loading.gif')}}"/></div>');
            debugger;
            var id = 1;
            var selected_point = $('#selected_point').val();
            var selected_promo = $('#selected_promo').val();
            var existaddress = $('#add_id').val();
            var shop_point_id = '';
            shop_point_id = $("input[name='add_delivery']:checked").val();

//            var shop_point_id = $('#shop_point_id').val();

            var delivery_charge = $('#delivery_charge').text();
            var amt = $('#net_amt').val();
            var payment_url = '{{ url('/') }}' + "/payment/";
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: payment_url,
                data: {
                    selected_point: selected_point,
                    selected_promo: selected_promo,
                    cod: is_cod,
                    amt: amt,
                    existaddress: existaddress,
                    shop_point_id: shop_point_id,
                    delivery_charge: delivery_charge.trim()
                },
                success: function (data) {
                    $('#Payumoneymodal_body').html(data);
                },
                error: function (xhr, status, error) {
                    $('#Payumoneymodal_body').html(xhr.responseText);
                }
            });
        }
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('#add_pincode_update').tooltip({'trigger': 'focus', 'title': 'Pincode must have 6 digit'});
        });
    </script>
@stop
@section('content')
    @php $total = 0; $itemcount = 0; $gtotal = 0; $counter = 0; @endphp
    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
        @php $total += $row->price * $row->qty;
        $counter++;
        $itemcount++;
        @endphp
    @endforeach
    <section class="product_section">
        <div class="container">
            <div class="mycart_mainbox">
                <form action="{{url('confirm_order')}}" id="confirm_order" method="post" enctype="multipart/form-data">
                    <div class="mycart_fixedamount_box" id="price_details_containner">
                        <div class="order_listbox check_mainbox">
                            <div class="carousal_head">
                                <span class="filter_head_txt slider_headtxt">Price Details</span>
                            </div>
                            <div class="cart_price_details_box">
                                <div class="option_availability">
                                    <div class="option_txt">Price ({{$itemcount}} items)</div>
                                    <div class="product_right_txt">
                                        <i class="mdi mdi-currency-inr"></i>{{number_format($total,2)}}
                                    </div>
                                </div>
                                @php $delivery_charge = DB::selectOne("select delivery_charge from delivery_charges where amount>$total and is_active= '1'"); @endphp
                                <div class="option_availability">
                                    <div class="option_txt">Delivery Charges</div>
                                    <div class="product_right_txt" id="delivery_charge">
                                        <i class="mdi mdi-currency-inr"></i>@if($total>0 && isset($delivery_charge)){{($delivery_charge->delivery_charge > 0 )?number_format($delivery_charge->delivery_charge,2):'0.00'}}@else {{'0.00'}} @endif
                                        <input type="hidden" name="delivery_charge"
                                               value="@if($total>0 && isset($delivery_charge)){{($delivery_charge->delivery_charge > 0 )?number_format($delivery_charge->delivery_charge,2):'0.00'}}@else {{'0.00'}} @endif">
                                    </div>


                                </div>
                                <div class="option_availability">
                                    <div class="option_txt">Pay by point</div>
                                    <div class="product_right_txt">
                                        <div class="point_paybox apply" id="applyamt">
                                            <div class="checkbox margin0">
                                                <input type="checkbox" name="pay_by_point" id="pay_by_point"
                                                       value="{{isset($user->gain_amount)?$user->gain_amount:'0'}}"
                                                       onchange="Paybypoint(this);"/>
                                                <input type="hidden" name="selected_point" id="selected_point"/>
                                                <input type="hidden" name="selected_promo" id="selected_promo"/>
                                                <i class="mdi mdi-currency-inr"
                                                   id="point">{{isset($user->gain_amount)?intval($user->gain_amount):'0'}}</i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="option_availability" id="promo_code_box" style="display: none">
                                    <div class="option_txt">Promo Pay</div>
                                    <div class="product_right_txt">
                                        <i class="mdi mdi-currency-inr" id="promo">0.0</i> <i
                                                onclick="remove_promo()" class="mdi mdi-delete" id="remove_promo"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="option_availability">
                                <div class="option_txt">Net Payable</div>
                                <div class="order_amt">
                                    <i class="mdi mdi-currency-inr" id="net_amount">
                                        @if($total>0)
                                            @if(isset($delivery_charge))
                                                {{$delivery_charge->delivery_charge + $total}}
                                            @else
                                                {{$total}}
                                            @endif
                                        @else
                                            {{'0.00'}}
                                        @endif
                                    </i>
                                    <input type="hidden" name="amount" id="net_amt"
                                           value="@if($total>0)
                                           @if(isset($delivery_charge))
                                           {{$delivery_charge->delivery_charge + $total}}
                                           @else
                                           {{$total}}
                                           @endif
                                           @else
                                           {{'0.00'}}
                                           @endif">
                                </div>
                            </div>
                            <div data-toggle="modal" id="have_a_promo" data-target="#PromoCode" class="promo_txt">
                                Have a promo code?
                            </div>
                            <div class="promo_txt">
                                Delivery within 5 days
                            </div>
                            <div class="product_btn_box">

                                <a class="btn btn-warning btn-sm" href="{{url('product_list')}}"><i
                                            class="mdi mdi-basket basic_icon_margin"></i>Keep Shopping</a>

                                <button onclick="confirm_order();" type="button"
                                        class="btn btn-success pull-right btn-sm @if($_SESSION['user_master']->is_cod_allow==1) show @else hide @endif"
                                        id="button_confirm_cod"><i
                                            class="mdi mdi-currency-inr basic_icon_margin"></i>Confirm Order
                                </button>

                                <button onclick="proceed_to_pay();" type="button" id="button_confirm_pay"
                                        class="btn btn-success pull-right btn-sm  @if($_SESSION['user_master']->is_cod_allow==0)show @else hide @endif">
                                    <i
                                            class="mdi mdi-currency-inr basic_icon_margin"></i>Proceed To Pay
                                </button>

                            </div>
                            <!--<div class="product_btn_box">
                                <div class="btn btn-success confirm_order_btn">
                                    <i class="mdi mdi-currency-inr basic_icon_margin"></i>Proceed To Pay
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="order_listbox margin_bottom0">
                        <div class="carousal_head">
                            <span class="filter_head_txt slider_headtxt">Delivery Address</span>
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="active" onclick="change_delivery_amt('Cash On Delivery');"><a data-toggle="tab"
                                                                                                     href="#home">Home
                                    Delivery</a></li>
                            <li onclick="change_delivery_amt('On Hand Delivery')"><a data-toggle="tab" href="#menu1">Shop
                                    Pickup</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div id="address_refresh">
                                    <div class="exis_container style-scroll">
                                        @php
                                            $addresses = \App\UserAddress::where(['is_active' => '1', 'user_id' => isset($user->id)?$user->id:'0'])->orderBy('created_time','desc')->get();
                                        $count=1;
                                        @endphp

                                        @if(count($addresses)>0)
                                            @foreach($addresses as $address)
                                                <div class="exis_addbox">
                                                    <div class="first_row">
                                                        <div class="radio_box">
                                                            @if($count == 1)
                                                                <input type="hidden" id="add_id" name="add_id"
                                                                       value="{{$address->id}}"/>
                                                            @endif
                                                            <div class="radio">
                                                                <input id="deli_radio_{{$address->id}}"
                                                                       onclick="selected_address('{{$address->id}}');"
                                                                       value="1"
                                                                       class="gender"
                                                                       name="add_delivery"
                                                                       type="radio" {{$count==1?'checked="checked"':''}} />
                                                                <label for="deli_radio_{{$address->id}}"
                                                                       class="radio-label"></label>
                                                            </div>
                                                        </div>
                                                        <div class="add_name_box">{{$address->name}}</div>
                                                        <div class="contact_box">{{$address->contact}}</div>
                                                    </div>
                                                    {{--  <div class="delivery_email">pinkukesharwani89@gmail.com</div>--}}
                                                    <div class="delivery_add">
                                                        {{$address->address}}, Jabalpur, Madhya Pradesh
                                                        - {{$address->zip}}
                                                    </div>

                                                    <div class="deli_btnbox">
                                                        <button type="button"
                                                                onclick="ChooseAddress('deli_radio_{{$address->id}}',{{$address->id}});"
                                                                class="btn btn-success btn-sm"><i
                                                                    class="mdi mdi-home-map-marker basic_icon_margin"></i>Deliver
                                                            Here
                                                        </button>

                                                        <button onclick="AddUpdate_Address('edit','{{$address->id}}');"
                                                                type="button"
                                                                class="btn btn-warning pull-right btn-sm"><i
                                                                    class="mdi mdi-map-marker-radius basic_icon_margin"></i>Edit
                                                            Address
                                                        </button>
                                                    </div>

                                                </div>
                                                @php $count++ @endphp
                                            @endforeach
                                        @else

                                        @endif
                                    </div>
                                    <div class="new_addbox">
                                        <div class="new_add_head col-sm-12">

                                            <div class="add_name_box" id="add_update_head">ADD A NEW ADDRESS</div>

                                            <button onclick="AddUpdate_Address('new','0');" type="button"
                                                    class="btn btn-primary pull-right btn-sm"><i
                                                        class="mdi mdi-map-marker-plus basic_icon_margin"></i>Add New
                                            </button>
                                        </div>
                                        <form enctype="multipart/form-data" id="userAddress">
                                            <div class="add_update_box" id="content_address_box">
                                                <div class="deli_row">
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="Name*" name="name"
                                                               id="add_name_update"
                                                               class="form-control textWithSpace required"
                                                               value="{{$_SESSION['user_master']->name}}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="Phone No.*" name="contact"
                                                               id="add_contact_update" minlength="10" maxlength="10"
                                                               class="numberOnly form-control required"
                                                               value="{{$_SESSION['user_master']->contact}}">
                                                    </div>
                                                </div>
                                                <div class="deli_row">
                                                    <div class="col-sm-3">
                                                        <?php
                                                        $address_id = \App\UserAddress::where('user_id', $_SESSION['user_master']->id)->first();
                                                        $states = \App\StateModel::where('is_deleted',0)->get();
                                                        ?>

                                                        <select class="form-control"  id="add_state" name="add_state">
                                                            @foreach($states as $state)
                                                                <?php
                                                                $state_id=isset($address_id->state_id)?$address_id->state_id:17;
                                                                ?>
                                                                @if($state->id==$state_id)
                                                                    <option selected
                                                                            value="{{$state->id}}">{{$state->state_name}}</option>
                                                                @else
                                                                    <option value="{{$state->id}}">{{$state->state_name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" id="add_city" name="add_city">
                                                            @foreach($cities as $city)
                                                                @if($city->id==isset($address_id->city_id)?$address_id->city_id:0)
                                                                    <option selected
                                                                            value="{{$city->id}}">{{$city->city}}</option>
                                                                @else
                                                                    <option value="{{$city->id}}">{{$city->city}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="Pincode*" name="pincode"
                                                               id="add_pincode_update" minlength="6" maxlength="6"
                                                               class="form-control numberOnly required">
                                                    </div>
                                                </div>
                                                <div class="deli_row">
                                                    <div class="col-sm-12">
                                        <textarea class="form-control glo_txtarea" id="add_address_update"
                                                  name="address" placeholder="Address"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 address_btnbox">
                                                    <button id="btn_add_new" type="button" onclick="saveaddress()"
                                                            class="btn btn-danger pull-right"><i
                                                                class="mdi mdi-map-marker-plus basic_icon_margin"></i>SAVE
                                                        AND
                                                        DELIVER
                                                        HERE
                                                    </button>
                                                    <button id="btn_add_update" type="button" onclick="saveaddress()"
                                                            style="display: none"
                                                            class="btn btn-danger pull-right"><i
                                                                class="mdi mdi-map-marker-plus basic_icon_margin"></i>UPDATE
                                                        AND
                                                        DELIVER
                                                        HERE
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{--<form enctype="multipart/form-data" id="userAddress">--}}
                                    <div class="order_list_container margin_top15" style="display: none">
                                        <div class="deli_row">
                                            <div class="col-sm-6">
                                                <div class="radio">
                                                    <input id="add_1" value="male" class="gender" name="address_radio"
                                                           type="radio"
                                                           checked="" onchange="AddressOption('new');">
                                                    <label for="add_1" class="radio-label">New</label>
                                                </div>

                                                <div class="radio">
                                                    <input id="add_2" onchange="AddressOption('existing');"
                                                           value="female"
                                                           class="gender" name="address_radio" type="radio">
                                                    <label for="add_2" class="radio-label">Existing</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6" id="existing_dropbox" style="display:none">
                                                @php
                                                    $addresses = \App\UserAddress::where(['is_active' => '1', 'user_id' =>  isset($user->id)?$user->id:'0'])->get();
                                                @endphp
                                                @if(count($addresses)>0)
                                                    <select onchange="getuseraddress();" class="form-control"
                                                            id="existaddress" name="address_id">
                                                        <option value="0"> --- Please Select ---</option>
                                                        @foreach($addresses as $address)
                                                            <option value="{{$address->id}}">{{$address->name.', '.$address->contact.', '.$address->address.', '.(isset($address->city_id)?isset($address->city->city):'-').', '.$address->zip}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select onchange="getuseraddress();" class="form-control"
                                                            id="existaddress" name="address_id">
                                                        <option value="0"> --- Please Select ---</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="deli_row">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Name" name="name" id="add_name"
                                                       class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Phone No." name="contact"
                                                       id="add_contact"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="deli_row">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Email Id" name="email" id="add_email"
                                                       class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Pincode" name="pincode" id="add_pincode"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="deli_row">
                                            <div class="col-sm-6">
                                                <select class="form-control" id="add_city_pre"
                                                        name="add_city_pre">
                                                    {{--<option value="0"> --Please Select City--</option>--}}
                                                    @foreach($cities as $city)
                                                        <option {{$city->id == 1 ? "selected":''}} value="{{$city->id}}">{{$city->city}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                        <textarea class="form-control glo_txtarea" id="add_address" name="address"
                                                  placeholder="Address"></textarea>
                                            </div>
                                        </div>
                                        <div class="deli_row">
                                            <div class="col-sm-12">
                                                <div id="update_address" class="hidden">
                                                    <input type="button" onclick="disable_remove();"
                                                           class="btn btn-primary pull-right" value="Update Address"/>
                                                    <input type="button" onclick="cancel_update();"
                                                           class="btn btn-danger pull-right"
                                                           value="Cancel"/>
                                                </div>
                                                {{--<div id="save_address" class="hidden">


                                                </div>--}}

                                                {{--<input type="checkbox" value="test1" name="test_record[]" />--}}
                                                {{--<input type="checkbox" value="test2" name="test_record[]" />--}}
                                                {{--<input type="checkbox" value="test3" name="test_record[]" />--}}
                                                <input type="button" onclick="saveaddress()"
                                                       class="btn btn-success pull-right"
                                                       value="Save"/></div>
                                        </div>
                                    </div>
                                    {{--</form>--}}
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="shop_delivery_block">
                                    <div class="shop_city_row">
                                        <span class="city_content">Select City :</span>
                                        <div>
                                            {{--<select class="form-control requiredDD" name="delivery_city">--}}
                                            {{--<option selected="" value="0">Jabalpur</option>--}}
                                            {{--<option value="1">Katni</option>--}}
                                            {{--<option value="2">Maihar</option>--}}
                                            {{--<option value="3">Riwa</option>--}}
                                            {{--</select>--}}

                                            <select class="form-control" id="shop_city" onchange="getShopAddress();"
                                                    name="shop_city">
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="exis_container style-scroll" id="shop_points_list">
                                        {{--@php--}}
                                        {{--$addresses = \App\UserAddress::where(['is_active' => '1', 'user_id' => isset($user->id)?$user->id:'0'])->orderBy('created_time','desc')->get();--}}
                                        {{--$count=1;--}}
                                        {{--@endphp--}}
                                        {{--<div class="exis_addbox">--}}
                                        {{--<div class="first_row">--}}
                                        {{--<div class="radio_box">--}}
                                        {{--<div class="radio">--}}
                                        {{--<input id="shop_radio_1" value="2" class="deliever"--}}
                                        {{--name="add_delivery"--}}
                                        {{--type="radio"/>--}}
                                        {{--<label for="shop_radio_1" class="radio-label"></label>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="add_name_box">Organic Dolchi, Sam</div>--}}
                                        {{--<div class="contact_box">07489495357</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="delivery_add">--}}
                                        {{--1st Floor, South Avenue Mall, Bhim Nagar, Polipather, Jabalpur, Madhya--}}
                                        {{--Pradesh--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="exis_addbox">--}}
                                        {{--<div class="first_row">--}}
                                        {{--<div class="radio_box">--}}
                                        {{--<div class="radio">--}}
                                        {{--<input id="shop_radio_2" value="2" class="deliever"--}}
                                        {{--name="add_delivery"--}}
                                        {{--type="radio"/>--}}
                                        {{--<label for="shop_radio_2" class="radio-label"></label>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="add_name_box">Organic Dolchi, Kachnar</div>--}}
                                        {{--<div class="contact_box">6525352642</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="delivery_add">--}}
                                        {{--Kachnar Plaza, Kachnar City Gate; Jabalpur, Madhya Pradesh.--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousal_head">
                            <span class="filter_head_txt slider_headtxt">Payment Option</span>
                        </div>
                        <div class="order_list_container margin_top15 min_height_0">
                            <div class="deli_row">
                                <div class="col-sm-12">
                                    @if($_SESSION['user_master']->is_cod_allow==1)
                                        <div class="radio">
                                            <input id="radio-2" value="1" class="gender" name="payment_type"
                                                   type="radio" onclick="getcod(this);"
                                                   checked="" onchange="paymentOption('cash');">
                                            <label for="radio-2" class="radio-label" id="delivery_amt_label">Cash On
                                                Delivery</label>
                                        </div>
                                    @endif
                                    <div class="radio">
                                        @if($_SESSION['user_master']->is_cod_allow==0)
                                            <input id="radio-1" value="0" onclick="getcod(this);" class="gender"
                                                   name="payment_type"
                                                   type="radio" checked="checked"
                                                   onchange="paymentOption('payumoney');">
                                        @else
                                            <input id="radio-1" value="0" onclick="getcod(this);" class="gender"
                                                   name="payment_type"
                                                   type="radio"
                                                   onchange="paymentOption('payumoney');">
                                        @endif
                                        <label for="radio-1" class="radio-label"> Pay With PayUMoney</label>
                                    </div>


                                    {{--<div class="percent_show" id="terms_show" style="display: none">--}}
                                    {{--3% Gateway Charge applicable on Total Amount levied by PayUMoney.--}}
                                    {{--</div>--}}
                                    <input type="hidden" name="payment" value="1" id="payment">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order_listbox">
                        <div class="carousal_head">
                            <span class="filter_head_txt slider_headtxt">Order Summary</span>
                            <a class="btn btn-success btn-sm pull-right" href="{{url('mycart')}}"><i
                                        class="mdi mdi-basket basic_icon_margin"></i>Edit Cart</a>
                        </div>
                        <div class="order_list_container">
                            <div class="order_row border-none">
                                @php $total = 0; $itemcount = 0; $gtotal = 0; $counter = 0; @endphp
                                @if(count(\Gloudemans\Shoppingcart\Facades\Cart::content())>0)
                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
                                        <div class="order_details_box">
                                            <div class="col-sm-9 res_pad0">
                                                <div class="productdetails_order_row">
                                                    <div class="order_product_imgbox">
                                                        @php $item_image = \App\ItemImages::where(['item_master_id' => $row->id])->first();
                                                    $item_price = \App\ItemPrice::find($row->options->has('item_price_id') ? $row->options->item_price_id : '1');
                                                    $item = \App\ItemMaster::find($row->id);
                                                        @endphp
                                                        @if(isset($item_image))
                                                            <img src="{{url('p_img').'/'.$row->id.'/'.$item_image->image}}"
                                                                 alt="{{$row->name}}">
                                                        @else
                                                            <img src="{{url('images/default.png')}}"
                                                                 alt="Organic product">
                                                        @endif

                                                    </div>
                                                    <div class="product_name">
                                                        {{$item->name}}
                                                    </div>
                                                    <div class="option_availability">
                                                        <div class="option_txt">Price :</div>
                                                        <div class="product_right_txt">
                                                            @if($item_price->price > 0)
                                                                <span class="mdi mdi-currency-inr"></span>{{$item_price->price}}
                                                            @else
                                                                {{"-"}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="option_availability">
                                                        <div class="option_txt">Special Price :</div>
                                                        <div class="product_right_txt">
                                                            @if($item_price->spl_price >0 )
                                                                <span class="mdi mdi-currency-inr"></span> {{$item_price->spl_price}}
                                                            @else
                                                                {{"-"}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="option_availability">
                                                        <div class="option_txt">Quantity :</div>
                                                        <div class="product_right_txt">
                                                            {{$row->qty}}
                                                        </div>
                                                    </div>


                                                    {{-- <div class="option_availability">
                                                         <div class="option_txt">Specification</div>
                                                         <div class="product_right_txt">
                                                             {!! $item->specifcation!!}
                                                         </div>
                                                     </div>
                                                     <div class="option_availability">
                                                         <div class="option_txt">Quantity:</div>
                                                         <div class="product_right_txt">
                                                             {{$row->qty}}
                                                         </div>
                                                     </div>--}}
                                                    {{--<div class="option_availability">--}}
                                                    {{--<div class="option_txt">Container Type</div>--}}
                                                    {{--<div class="product_right_txt">--}}
                                                    {{--Bottle--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="option_availability">--}}
                                                    {{--<div class="option_txt">Sales Package</div>--}}
                                                    {{--<div class="product_right_txt">--}}
                                                    {{--Oil Bottle (60 ml)--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                            <div class="col-sm-3 res_pad0">
                                                <div class="wish_rightcontainer">
                                                    <div class="order_amt margin_top15"><i
                                                                class="mdi mdi-currency-inr"></i> {{number_format($row->price*$row->qty,2)}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <span class="no_record">< No Record Available ></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('web.layouts.footer')
    <div class="modal right fade" id="PromoCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Promo Code</h4>
                </div>
                <div class="modal-body">
                    <div class="deli_row">
                        <input type="text" name="ask_number" id="promo_code" maxlength="15" autocomplete="off"
                               class="form-control login_txt" placeholder="Enter Promo Code"/>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="PromoSubmit" onclick="PromoSubmit();">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="Payumoney_checkout">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Checkout Payment</h4>
                </div>
                <div id="Payumoneymodal_body">
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div>
    <script type="text/javascript">

        $(document).ready(function () {
            getShopAddress();
        });
        function getShopAddress() {
            var city_id = $('#shop_city').val();
            //alert(city_id);
            $.ajax({
                type: 'get',
                url: "{{ url('get_shop_points') }}",
                data: {
                    city_id: city_id
                },
                beforeSend: function () {
                    $('#shop_points_list').html('<img height="50px" class="center-block" src="{{url('images/loading.gif')}}"/>');
                },
                success: function (data) {
                    $('#shop_point_id').val('');
                    $('#shop_points_list').html(data);
                },
                error: function (xhr, status, error) {
                    swal("Oops", "Some went wrong...", "error");
                }
            });
        }
        function AddUpdate_Address(curr_action, get_id) {
            $('.deliever').prop("checked", false);
            if (curr_action == "new") {
                $('#add_id').val(0);
                //$('#add_city :selected').val(1);
                $('#btn_add_new').show();
                $('#btn_add_update').hide();
                $('#content_address_box').slideDown();
                $('#add_update_head').text('ADD A NEW ADDRESS');
                empty_address();
            } else {
                $('#add_id').val(get_id);
                $('#btn_add_new').hide();
                $('#btn_add_update').show();
                $('#content_address_box').slideDown();
                $('#add_update_head').text('UPDATE ADDRESS');
            }
            if (get_id > 0) {
                getuseraddress(get_id);
            }
        }

        function ChooseAddress(chk_id, get_id) {
            $('#add_id').val(get_id);
            $('.deliever').prop("checked", false);
            document.getElementById(chk_id).checked = true;
            $('#add_update_head').text('ADD A NEW ADDRESS');
            $('#content_address_box').slideUp();
            $('#btn_add_new').show();
            $('#btn_add_update').hide();
        }
        function selected_address(cheched_address_id) {
            $('#add_id').val(cheched_address_id);
            $('#shop_point_id').val('');
        }

        function selected_shop_address(cheched_address_id) {
            $('#shop_point_id').val(cheched_address_id);
            $('#add_id').val('');
        }
        function disable_remove() {
            $('#add_name').removeAttr('disabled', 'disabled');
            $('#add_email').removeAttr('disabled', 'disabled');
            $('#add_contact').removeAttr('disabled', 'disabled');
            $('#add_address').removeAttr('disabled', 'disabled');
            $('#add_city').removeAttr('disabled', 'disabled');
            $('#add_pincode').removeAttr('disabled', 'disabled');
            $('#update_address').attr('class', 'hidden');
            $('#save_address').removeAttr('class', 'hidden');
        }

        function cancel_update() {
            $('#add_name').attr('disabled', 'disabled');
            $('#add_email').attr('disabled', 'disabled');
            $('#add_contact').attr('disabled', 'disabled');
            $('#add_address').attr('disabled', 'disabled');
            $('#add_city').attr('disabled', 'disabled');
            $('#add_pincode').attr('disabled', 'disabled');
            $('#update_address').removeAttr('class', 'hidden');
            $('#save_address').attr('class', 'hidden');
        }

        function saveaddress() {
            debugger;
            var existaddress = $('#add_id').val();
            var add_name = $('#add_name_update').val();
            var add_contact = $('#add_contact_update').val();
//            var add_email = $('#add_email').val();
            var add_city = $('#add_city_pre :selected').val();
            var state = $('#add_state :selected').val();
            var add_pincode = $('#add_pincode_update').val();
            var add_address = $('#add_address_update').val();
            if (add_name == '') {
                swal("Fields Required", "Please enter name", "error");
//                $('#add_name_update').focus();
                return false;
            } else if (add_contact == '') {
                swal("Fields Required", "Please enter contact", "error");
//                $('#add_contact').focus();
                return false;
            } else if (add_city == '0') {
                swal("Fields Required", "Please select city", "error");
//                $('#add_city').focus();
                return false;
            } else if (add_pincode.length < 6) {
                swal("Fields Required", "Pincode must have 6 digits", "error");
//                $('#add_pincode').focus();
                return false;
            } else if (add_pincode == '') {
                swal("Fields Required", "Please enter pincode", "error");
//                $('#add_pincode').focus();
                return false;
            } else if (add_address == '') {
                swal("Fields Required", "Please enter address", "error");
//                $('#add_address').focus();
                return false;
            } else {
                $.ajax({
                    type: 'get',
                    url: "{{ url('address_update') }}",
                    data: {
                        add_name: add_name,
//                        add_email: add_email,
                        add_contact: add_contact,
                        add_city: add_city,
                        add_pincode: add_pincode,
                        add_address: add_address,
                        existaddress: existaddress,
                        state: state

                    },
                    // data: value,
                    success: function (data) {
                        // alert(data);
                        // console.log(data);
                        if (data == 'success') {
                            swal("Success", "Address has been updated...", "success");
                            $("#address_refresh").load(location.href + " #address_refresh");

                        } else {
                            swal("Oops", "Some went wrong...", "error");
                        }

                    },
                    error: function (xhr, status, error) {
                        swal("Oops", "Some went wrong...", "error");
                    }
                });
                // }
            }
        }

        function confirm_order() {
            var existaddress = $('#add_id').val();
            var shop_address = $("input[name='add_delivery']:checked").val();
            var net_amt = $('#net_amt').val();
            if (net_amt < 1) {
                swal("Cart Empty", "Your cart is empty", "info");
                return false;
            } else if (existaddress == '0' && shop_address == '') {
                swal("Address Required", "Please select delivery address or shop pickup", "warning");
//                $('#existaddress').focus();
                return false;
            } else {
//                var valid = check_address_exist();
//                if (valid == true) {
//                    alert(valid);

                    swal({
                        title: "Are you sure?",
                        text: "Confirm Order, you will not be able to edit once you confirm the order",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willSubmit) => {
                            if (willSubmit) {
                                document.getElementById("confirm_order").submit();
                            }
                        }
                    )
                    ;
//                }else{
//                    swal("Address Required", "Please select delivery address or shop pickup", "warning");
//                    return false;
//                }
            }
        }
        {{--function check_address_exist(){--}}
            {{--debugger;--}}
            {{--var isvalid;--}}
            {{--alert(isvalid)--}}
            {{--$.get('{{url('check_user_address')}}',function(rs){--}}
                {{--alert(rs)--}}
                {{--if(rs.success==true){--}}

                    {{--isvalid= true--}}
                {{--}else{--}}
                    {{--isvalid=false;--}}
                {{--}--}}

            {{--});--}}
            {{--return isvalid;--}}

        {{--}--}}

        function getuseraddress(getid) {
//            var address_id = $('#existaddress :selected').val();
//            if (address_id > 0) {
            $.ajax({
                type: 'get',
                url: "{{ url('getexistaddress') }}",
                data: {address_id: getid},
                success: function (data) {
                    $('#add_name_update').val(data.name);
                    $('#add_id').val(getid);
//                        $('#add_email').val(data.email);
                    $('#add_contact_update').val(data.contact);
                    $('#add_address_update').val(data.address);
                    $('#add_city_pre').val(data.city_id);
                    $('#add_pincode_update').val(data.pincode);

//                        $('#add_name').attr('disabled', 'disabled');
//                        $('#add_email').attr('disabled', 'disabled');
//                        $('#add_contact').attr('disabled', 'disabled');
//                        $('#add_address').attr('disabled', 'disabled');
//                        $('#add_city').attr('disabled', 'disabled');
//                        $('#add_pincode').attr('disabled', 'disabled');
//                        $('#update_address').removeAttr('class', 'hidden');
                },
                error: function (xhr, status, error) {
                    ShowErrorPopupMsg('Error in uploading...');
                    $('#userpostForm').css("opacity", "");
                    // $('#err1').html(xhr.responseText);
                    // ShowErrorPopupMsg(xhr.message);
                }
            });
//            } else {
//                $('#update_address').attr('class', 'hidden');
//                $('#save_address').attr('class', 'hidden');
//                empty_address();
//            }
        }

    </script>
@stop