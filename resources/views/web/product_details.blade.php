@extends('web.layouts.e_master')

@section('title', 'Organic Food : Product Details')

@section('head')
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <style type="text/css">
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            opacity: 1;
        }

        .long_qty_box {
            max-width: 200px;
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
                debugger;
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

        //var fixed_leftposition;


        //        function checkOffFixed() {
        //            if ($('#product_details_containner').offset().top + $('#product_details_containner').height()
        //                >= $('#footer').offset().top - 30) {
        //                $('#product_details_containner').removeClass('position_fixed_removed');
        //                $('#product_details_containner').css('left', 0);
        //            }
        //            if ($(document).scrollTop() + window.innerHeight < $('#footer').offset().top) {
        //                $('#product_details_containner').addClass('position_fixed_removed');
        //                $('#product_details_containner').css('left', fixed_leftposition);
        //            }
        //        }

        $(document).ready(function () {
            Initialize_ProductDetails();
//            fixed_leftposition = $('#product_details_containner').offset().left;
//            if ($(document).scrollTop() < 100) {
//                // $('#product_details_containner').css('left', fixed_leftposition);
//                $('#product_details_containner').addClass('position_fixed_removed');
//            }
        });
        $(document).scroll(function () {
            //checkOffFixed();
        });

        function Rating_slide() {
            var rating_position = $('#rating_product_row').offset().top;
            $('html, body').animate({scrollTop: rating_position - 60}, 1000);
        }

        function Review_slide() {
            var review_position = $('#review_product_row').offset().top;
            $('html, body').animate({scrollTop: review_position - 60}, 1000);
        }
    </script>
@stop
@section('content')
    <section class="product_viewblock">
        <div class="container-fluid">
            <div class="all_data_view">
                <div class="row">
                    <div class="col-sm-5 product_view_imgbox">
                        <div class="product_magnifyimages_box" id="product_details_containner">
                            <div class="magnify">
                                <div class="large" id="view_large_bg"></div>
                                @if(count($item_images)>0 && file_exists("p_img/$item->id/".$item_images[0]->image))
                                    <img class="small" id="view_images"
                                         src="{{url('p_img').'/'.$item->id.'/'.$item_images[0]->image}}">
                                @else
                                    <img class="small" id="view_images" src="{{url('images/default.png')}}">
                                @endif
                            </div>
                            <div class="product_images_thumbbox">
                                @if(count($item_images)>0)
                                    @foreach($item_images as $image)
                                        @if(file_exists("p_img/$item->id/".$image->image))
                                            <img class="product_brics_images"
                                                 src="{{url('p_img').'/'.$item->id.'/'.$image->image}}"
                                                 onclick="appendimages(this);">
                                            {{--@else--}}
                                            {{--<img class="product_brics_images"  src="{{url('images/default.png')}}">--}}
                                        @endif
                                    @endforeach
                                @else
                                    <img class="product_brics_images" id="view_images"
                                         src="{{url('images/default.png')}}"/>
                                @endif

                                {{--<img class="product_brics_images" src="images/grapsh.jpg" onclick="appendimages(this);">--}}
                                {{--<img class="product_brics_images" src="images/potato.jpg" onclick="appendimages(this);">--}}
                                {{--<img class="product_brics_images" src="images/onion.jpg" onclick="appendimages(this);">--}}
                            </div>
                            <div class="availability_boxes">
                                <div class="offer_available" style="display: none">
                                    <div class="option_availability">
                                        <div class="option_txt">Option Availibity :</div>
                                        <select class="form-control rate" name="unit" value="" id="unit3">
                                            <option value="7">1 kg -
                                                Rs.20.00
                                            </option>
                                            <option value="8">500 gm -
                                                Rs.10.00
                                            </option>
                                        </select>
                                    </div>
                                    <div class="option_availability">
                                        <div class="option_txt">Qty :</div>
                                        <input type="number" min="1" max="10" class="form-control text-center"
                                               value="1">
                                    </div>
                                </div>
                                <!-- <div class="option_availability">
                                     <div class="option_txt">Option Availibity :</div>-->
                                @foreach($item_prices as $price)
                                    <div class="long_spinner_withbtn">
                                        <div class="long_qty_box">
                                            <span class="long_qty_txt" id="price_{{$item->id}}"
                                                  data-content="{{$price->id}}">{{$price->unit}}
                                                - {{"Rs.".$price->price}}</span>
                                            <input type="number" class="form-control text-center qty_edittxt" min="0"
                                                   value="1" max="{{$price->qty}}" id="qty_{{$item->id}}"/>
                                        </div>
                                        <button class="spinner_addcardbtn btn-primary" data-content="{{$price->id}}"
                                                type="button" id="{{$item->id}}" onclick="AddTOcart_load(this);"><i
                                                    class="mdi mdi-basket"></i> <span id="{{$item->id}}"
                                                                                      data-content="{{$price->id}}"
                                                                                      onclick="AddTOcart_load(this);"
                                                                                      class="button-group_text">Add</span>
                                        </button>
                                    </div>
                            @endforeach
                            <!--</div>-->
                                <div class="product_btn_box" style="display: none;">
                                    <div class="btn btn-warning product_add_tocard" id="{{$item->id}}"
                                         data-content="{{$price->id}}" onclick="AddTOcart(this);"
                                         style="margin-right: 4%;">
                                        <i class="mdi mdi-basket"></i>Add To card
                                    </div>
                                    <a href="{{url('checkout')}}" class="btn btn-success product_add_tocard"><i
                                                class="mdi mdi-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="more_productother_details">
                            <div class="more_product_head">
                                {{$item->name}}
                            </div>
                            @php
                                $five = 0;
                                $four = 0;
                                $three = 0;
                                $two = 0;
                                $one = 0;
                                $all = 0;

                            @endphp
                            @foreach($reviews as $review)

                                @if($review->star_rating == 5)
                                    @php $five += 1; $all += 5 @endphp
                                @elseif($review->star_rating == 4)
                                    @php $four += 1; $all += 4  @endphp
                                @elseif($review->star_rating == 3)
                                    @php $three += 1; $all += 3  @endphp
                                @elseif($review->star_rating == 2)
                                    @php $two += 1; $all += 2  @endphp
                                @elseif($review->star_rating == 1)
                                    @php $one += 1; $all += 1  @endphp
                                @endif
                            @endforeach
                            <div class="product_row">
                                <div class="rating_box" onclick="Rating_slide();">
                                    <div class="star_with_txt">
                                        <i class="mdi mdi-star"></i>0.0
                                    </div>
                                    0 Ratings
                                </div>
                                <div class="review_box" onclick="Review_slide();">
                                    <div class="star_with_txt">
                                        <i class="mdi mdi-message-reply-text"></i></div>
                                    0 Reviews
                                </div>
                            </div>
                            {{-- <div class="product_row" style="display: none">
                                 <div class="real_amt">
                                     <i class="mdi mdi-currency-inr"></i>
                                     150.00
                                 </div>
                                 <div class="less_amt">
                                     <i class="mdi mdi-currency-inr"></i>
                                     180.00
                                 </div>
                             </div>--}}
                            {{--<div class="more_product_head product_mainhead">Delivery</div>--}}

                            {{--<div class="option_availability">--}}
                            {{--<div class="option_txt">Delivery</div>--}}
                            {{--<div class="product_right_txt">--}}
                            {{--Usually delivered in 1-2 days.--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="more_product_head product_mainhead">
                                Specifications :
                            </div>
                            <div class="more_product_details">
                                {!! isset($item->specifcation)?$item->specifcation:'-'!!}
                            </div>
                            {{-- <div class="option_availability">
                                 <div class="option_txt">Product Type</div>
                                 <div class="product_right_txt">
                                     Whole Grains
                                 </div>
                             </div>--}}

                            <div class="more_product_head product_mainhead">
                                Ingredients :
                            </div>
                            <div class="more_product_details">
                                {!! isset($item->ingredients)?$item->ingredients:'-'!!}
                            </div>
                            <div class="more_product_head product_mainhead">
                                Available Nutrients :
                            </div>
                            <div class="more_product_details">
                                {!! isset($item->nutrients)?$item->nutrients:'-'!!}
                            </div>
                            <div class="more_product_head product_mainhead">
                                Description :
                            </div>
                            <div class="more_product_details">
                                {!! isset($item->description)?$item->description:'-'!!}
                            </div>
                            <div class="more_product_head product_mainhead">
                                Usage :
                            </div>
                            <div class="more_product_details">
                                {!! isset($item->usage)?$item->usage:'-'!!}
                            </div>
                            <div class="more_product_head product_mainhead">
                                Recipe :
                            </div>
                            <div class="more_product_details">
                                @if(count($recipes)>0)
                                    <ul class="list-unstyled recipe_ul_detail_ margin_bottom0">
                                        @foreach($recipes as $recipe)
                                            <li><a target="_blank"
                                                   href="{{url('view_recipe').'/'.$recipe->id}}">{{$recipe->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="container">
                                        <span>No Recipe Available</span>
                                    </div>
                                @endif
                            </div>
                            <div class="more_product_head product_mainhead" id="rating_product_row">
                                Ratings :
                            </div>

                            <div class="product_row">
                                <div class="well well-sm">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 text-center">
                                            <h1 class="rating-num">
                                                {{$all/5}}</h1>
                                            {{--                                                {{count($reviews) > 0 ?count($reviews)/$all:'0.0'}}</h1>--}}

                                            <div class="rating">
                                                @for($i = 1; $i<=5; $i++)
                                                    @if($i <= $all/5)
                                                        <span class="glyphicon glyphicon-star"></span>
                                                    @else
                                                        <span class="glyphicon glyphicon-star-empty"></span>
                                                    @endif
                                                @endfor
                                                {{--<span class="glyphicon glyphicon-star">--}}
                                                {{--</span><span class="glyphicon glyphicon-star">--}}

                                                {{--</span><span class="glyphicon glyphicon-star">--}}
                                                {{--</span>--}}
                                            </div>
                                            <span class="glyphicon glyphicon-user basic_icon_margin"></span>{{count($reviews)}}
                                            total

                                        </div>
                                        <div class="col-xs-12 col-md-6">

                                            {{--@php--}}
                                            {{--$five = 0;--}}
                                            {{--$four = 0;--}}
                                            {{--$three = 0;--}}
                                            {{--$two = 0;--}}
                                            {{--$one = 0;--}}

                                            {{--@endphp--}}
                                            {{--@foreach($reviews as $review)--}}

                                            {{--@if($review->star == 5)--}}
                                            {{--@php $five += 1 @endphp--}}
                                            {{--@elseif($review->star == 4)--}}
                                            {{--@php $four += 1 @endphp--}}
                                            {{--@elseif($review->star == 3)--}}
                                            {{--@php $three += 1 @endphp--}}
                                            {{--@elseif($review->star == 2)--}}
                                            {{--@php $two += 1 @endphp--}}
                                            {{--@elseif($review->star == 1)--}}
                                            {{--@php $one += 1 @endphp--}}
                                            {{--@endif--}}

                                            {{--@endforeach--}}
                                            <div class="row rating-desc">
                                                <div class="col-xs-3 col-md-3 text-right">
                                                    <span class="glyphicon glyphicon-star"></span>5
                                                </div>
                                                <div class="col-xs-8 col-md-9">
                                                    <div class="progress progress-striped">
                                                        <div class="progress-bar progress-bar-success"
                                                             role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: {{count($reviews)>0 ? round($five *100 / count($reviews),2):'0'}}%">
                                                            <span class="sr-only">{{count($reviews)>0 ? round($five *100 / count($reviews),2):'0'}}
                                                                %</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end 5 -->
                                                <div class="col-xs-3 col-md-3 text-right">
                                                    <span class="glyphicon glyphicon-star"></span>4
                                                </div>
                                                <div class="col-xs-8 col-md-9">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-primary"
                                                             role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: {{count($reviews)>0 ? round($four *100 / count($reviews),2):'0'}}%">
                                                            <span class="sr-only">{{count($reviews)>0 ? round($four *100 / count($reviews),2):'0'}}
                                                                %</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end 4 -->
                                                <div class="col-xs-3 col-md-3 text-right">
                                                    <span class="glyphicon glyphicon-star"></span>3
                                                </div>
                                                <div class="col-xs-8 col-md-9">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: {{count($reviews)>0 ? round($three *100 / count($reviews),2):'0'}}%">
                                                            <span class="sr-only">{{count($reviews)>0 ? round($three *100 / count($reviews),2):'0'}}
                                                                %</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end 3 -->
                                                <div class="col-xs-3 col-md-3 text-right">
                                                    <span class="glyphicon glyphicon-star"></span>2
                                                </div>
                                                <div class="col-xs-8 col-md-9">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-warning"
                                                             role="progressbar"
                                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: {{count($reviews)>0 ? round($two *100 / count($reviews),2):'0'}}%">
                                                            <span class="sr-only">{{count($reviews)>0 ? round($two *100 / count($reviews),2):'0'}}
                                                                %</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end 2 -->
                                                <div class="col-xs-3 col-md-3 text-right">
                                                    <span class="glyphicon glyphicon-star"></span>1
                                                </div>
                                                <div class="col-xs-8 col-md-9">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                                             aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                             style="width:{{count($reviews)>0 ?round($one *100 / count($reviews),2):'0'}}%">
                                                            <span class="sr-only">{{count($reviews)>0 ?round($one *100 / count($reviews),2):'0'}}
                                                                %</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end 1 -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more_product_head product_mainhead" id="review_product_row">
                                Reviews :
                            </div>
                            <div class="product_row">
                                <div class="review-block">
                                    @if(count($reviews)>0)
                                        @foreach($reviews as $review)
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-5">
                                                    @if($review->user->profile_img != 'images/Male_default.png' && file_exists($review->user->profile_img))
                                                        <img src="{{url('u_img').'/'.$review->user_id.'/'.$review->user->profile_img}}"/>
                                                    @else
                                                        <img src="{{url('images/Male_default.png')}}"
                                                             class="img-rounded"/>
                                                    @endif
                                                    <div class="review-block-name"><a
                                                                href="#">{{$review->user->name}}</a></div>
                                                    <div class="review-block-date">{{ date_format(date_create($review->created_at), "d-M-Y")}}</div>
                                                </div>
                                                <div class="col-sm-8 col-md-9 col-xs-7 res_pad0">
                                                    <div class="review-block-rate">
                                                        @for($i = 1; $i<=5; $i++)
                                                            @if($i <= $review->star_rating)
                                                                <button type="button" class="btn btn-success btn-xs"
                                                                        aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-star"
                                                              aria-hidden="true"></span>
                                                                </button>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-default btn-grey btn-xs"
                                                                        aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-star"
                                                              aria-hidden="true"></span>
                                                                </button>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="review-block-title">
                                                        {{$review->review}}
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    @else
                                        <div class="row">
                                            <span>No Review Available</span>
                                        </div>
                                    @endif

                                    {{--  <div class="row">
                                          <div class="col-sm-3">
                                              <img src="images/testominial_img5.jpg" class="img-rounded">
                                              <div class="review-block-name"><a href="#">Anurag Agrawal</a></div>
                                              <div class="review-block-date">29-jun-2018</div>
                                          </div>
                                          <div class="col-sm-9">
                                              <div class="review-block-rate">
                                                  <button type="button" class="btn btn-success btn-xs"
                                                          aria-label="Left Align">
                                                          <span class="glyphicon glyphicon-star"
                                                                aria-hidden="true"></span>
                                                  </button>
                                                  <button type="button" class="btn btn-success btn-xs"
                                                          aria-label="Left Align">
                                                          <span class="glyphicon glyphicon-star"
                                                                aria-hidden="true"></span>
                                                  </button>
                                                  <button type="button" class="btn btn-success btn-xs"
                                                          aria-label="Left Align">
                                                          <span class="glyphicon glyphicon-star"
                                                                aria-hidden="true"></span>
                                                  </button>
                                                  <button type="button" class="btn btn-success btn-grey btn-xs"
                                                          aria-label="Left Align">
                                                          <span class="glyphicon glyphicon-star"
                                                                aria-hidden="true"></span>
                                                  </button>
                                                  <button type="button" class="btn btn-default btn-grey btn-xs"
                                                          aria-label="Left Align">
                                                          <span class="glyphicon glyphicon-star"
                                                                aria-hidden="true"></span>
                                                  </button>
                                              </div>
                                              <div class="review-block-title">this was nice in buy</div>
                                              <div class="review-block-description">I found this product very
                                                  satisfactory.
                                                  got rid of unwanted scars. A must buy for all dealing with scars and
                                                  marks.
                                              </div>
                                          </div>
                                      </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.layouts.footer')
    <script type="text/javascript">
        function AddTOcart_load(dis) {
            var cart = $('#baskit_block');
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
                    $("#cartload").html(data);
//                    ShowSuccessPopupMsg('Product has been added to cart');
                },
                error: function (xhr, status, error) {
                    $("#cartload").html(xhr.responseText);
//                    alert('Technical Error Occured!');
                }
            });

        }
    </script>
@stop