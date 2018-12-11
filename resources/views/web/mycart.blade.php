@extends('web.layouts.e_master')

@section('title', 'Organic Food : My Cart')

@section('head')
    <style type="text/css">
        .btn-update {
            height: 30px;
            width: 30px;
            margin-right: 5px;
            text-align: center;
            padding: 0px;
            line-height: 28px;
            font-size: 18px;
        }

        .card_btn_collection {
            position: absolute;
            right: 0px;
            top: 0px;
        }
    </style>
@stop
@section('content')
    <?php $total = 0; $itemcount = 0; $gtotal = 0; $counter = 0; ?>
    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
        <?php $total += $row->price * $row->qty;
        $counter++;
        $itemcount++;
        ?>
    @endforeach
    <section class="product_section">
        <div class="container">
            <div class="mycart_mainbox">
                <div class="mycart_fixedamount_box">
                    <div class="order_listbox">
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
                            <?php $delivery_charge = DB::select("SELECT delivery_charge FROM delivery_charges where amount>=$total and is_active= '1' ORDER BY id DESC LIMIT 1"); ?>
                            <div class="option_availability">
                                <div class="option_txt">Delivery Charges</div>
                                <div class="product_right_txt">
                                    <i class="mdi mdi-currency-inr"></i>@if($total>0){{count($delivery_charge)>0?number_format($delivery_charge[0]->delivery_charge,2):'0'}}@else {{'0.00'}} @endif
                                </div>
                            </div>
                        </div>
                        <div class="option_availability">
                            <div class="option_txt">Amount Payable</div>
                            <div class="order_amt">
                                <i class="mdi mdi-currency-inr"></i>@if($total>0){{count($delivery_charge)>0?number_format($delivery_charge[0]->delivery_charge+$total,2):$total}}@else {{'0.00'}} @endif
                            </div>
                        </div>
                        <hr>
                        <!-- <div class="product_btn_box">
                             <a class="btn btn-warning" href="product_list.php"><i class="mdi mdi-basket basic_icon_margin"></i>Continue</a>
                             <a class="btn btn-success pull-right" href="checkout.php"><i class="mdi mdi-currency-inr basic_icon_margin"></i>Place Order</a>
                         </div>-->
                        <div class="product_btn_box">
                            <a class="btn btn-warning btn-sm" href="{{url('product_list')}}"><i
                                        class="mdi mdi-basket basic_icon_margin"></i>Keep Shopping</a>
                            <a class="btn btn-success pull-right btn-sm" href="{{url('checkout')}}"><i
                                        class="mdi mdi-currency-inr basic_icon_margin"></i>Place Order</a>
                        </div>
                    </div>
                </div>

                <div class="order_listbox">
                    <div class="carousal_head">
                        <span class="filter_head_txt slider_headtxt">My Cart ({{$itemcount}})</span>
                    </div>
                    <div class="order_list_container">
                        <div class="order_row border-none">
                            @php $total = 0; $itemcount = 0; $gtotal = 0; $counter = 0; @endphp
                            @if(count(\Gloudemans\Shoppingcart\Facades\Cart::content())>0)
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
                                    <div class="order_details_box">
                                        <div class="col-sm-8 res_pad0">
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
                                                        <img src="{{url('images/default.png')}}" alt="Organic product">
                                                    @endif

                                                </div>
                                                <div class="product_name">
                                                    <a class="cart_product_name"
                                                       title="{{$item->name}}"
                                                       href="{{url('view_product').'/'.(encrypt($item->id))}}">{{ $item->name }}</a>
                                                </div>
                                                @if($item_price->spl_price >0 )
                                                    <div class="option_availability">
                                                        <div class="option_txt">Price :</div>
                                                        <div class="product_right_txt">
                                                            @if($item_price->price > 0)
                                                                <strike> <span
                                                                            class="mdi mdi-currency-inr">{{$item_price->price}}</span>
                                                                </strike> <span
                                                                        class="mdi mdi-currency-inr"></span> {{$item_price->spl_price}}
                                                            @else
                                                                {{"-"}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="option_availability">
                                                        <div class="option_txt">Price :</div>
                                                        <div class="product_right_txt">
                                                            @if($item_price->price > 0)
                                                                <span class="mdi mdi-currency-inr"></span>
                                                                {{$item_price->price}}
                                                            @else
                                                                {{"-"}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="option_availability">
                                                    <div class="option_txt">Unit :</div>
                                                    <div class="product_right_txt">
                                                        @if(isset($item_price->unit))
                                                            <span class="mdi mdi-currency-inr"></span>  {{$item_price->unit."-".$item_price->weight}}
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
                                                {{--<div class="desc_cart">--}}
                                                {{--<div class="des_txt">Specifications :</div>--}}
                                                {{--<div class="des_details">--}}
                                                {{--{!! isset($item->specifcation)?$item->specifcation:'Not Mentioned'!!}--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                        <div class="col-sm-4 res_pad0">
                                            {{--<div class="track_del_address">Free delivery by 15-May-2018</div>--}}
                                            <div class="wish_rightcontainer">
                                                <div class="order_amt"><i
                                                            class="mdi mdi-currency-inr"></i>
                                                    @if($item_price->spl_price >0 )
                                                        {{number_format($item_price->spl_price,2)}}
                                                    @else
                                                        {{number_format($item_price->price,2)}}
                                                    @endif
                                                </div>
                                                <form action="{{url('cart_update').'/'.$row->rowId}}"
                                                      id="cartupdate{{$row->rowId}}"
                                                      method="post">
                                                    <input type="hidden" name="_token"
                                                           value="{{csrf_token()}}">
                                                    <div class="spinner_withbtn my_cartbtnbox">
                                                        <div class="input-group qty_box">
                                                            <span class="qty_txt">Qty</span>
                                                            <input type="number" name="qty"
                                                                   @if($item_price->qty < 10) data-toggle="tooltip"
                                                                   title="Only {{$item_price->qty}} Quantity Left In Stock"
                                                                   data-placement="right"
                                                                   @endif class="form-control text-center qty_edittxt"
                                                                   min="1" max="{{$item_price->qty}}"
                                                                   value="{{$row->qty}}">

                                                        </div>
                                                        <div class="card_btn_collection">
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-update">
                                                                <i class="mdi mdi-refresh "></i>
                                                            </button>
                                                            {{--<a type="submit"--}}
                                                            {{--class="btn btn-primary btn-update1">--}}
                                                            {{--<i class="mdi mdi-refresh "></i>--}}
                                                            {{--</a>--}}
                                                            <a onclick="remove_cart_item('{{$row->rowId}}')"
                                                               class="btn btn-danger btn-update"><i
                                                                        class="mdi mdi-close"></i></a>
                                                        </div>
                                                    </div>
                                                    {{--<div class="update_qty_box">--}}
                                                    {{--<button type="submit"--}}
                                                    {{--class="btn btn-primary btn-update">--}}
                                                    {{--<i class="mdi mdi-refresh "></i>--}}
                                                    {{--</button>--}}
                                                    {{--</div>--}}
                                                </form>
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
            </div>
        </div>
    </section>
    @include('web.layouts.footer')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        function remove_cart_item(cart_item_id) {
            $.ajax({
                type: 'get',
                url: "{{ url('cart_delete') }}",
                data: {cart_item_id: cart_item_id},
                success: function (data) {
                    $("#cartload").html(data);
                    $(".order_list_container").load(location.href + " .order_list_container");
                    $(".mycart_fixedamount_box").load(location.href + " .mycart_fixedamount_box");
                },
                error: function (xhr, status, error) {
                    $('#cartload').html(xhr.responseText);
                }
            });
            // promo_code

        }
        //         $('#crtupdate').click(function () {
        //             form = $('#cartupdate');
        // //                                form.attr('action', form.attr('action') + '.xls').trigger('submit');
        // //                                form.attr('action', action);
        //             form.submit();
        //         });
    </script>
@stop