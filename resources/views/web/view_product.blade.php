<div class="all_data_view">
    <div class="col-sm-6">
        <div class="magnifyimages_box">
            <div class="magnify">
                <div class="large" id="view_large_bg"></div>
                @php $image = \App\ItemImages::where(['item_master_id' => $item->id])->first(); @endphp
                @if(isset($image->image) && file_exists("p_img/$item->id/".$image->image))
                    <img class="small lb_small" id="view_images" src="{{url('p_img').'/'.$item->id.'/'.$image->image}}"/>
                @else
                    <img height="300px" id="view_images" width="300px" src="{{url('images/default.png')}}">
                @endif
            </div>
            <div class="images_thumbbox">
                @php $image = \App\ItemImages::where(['item_master_id' => $item->id])->first(); @endphp
                @if(count($item_images)>0)
                    @foreach($item_images as $img)
                        @if(file_exists("p_img/$item->id/".$image->image))
                            <img class="brics_images" src="{{url('p_img').'/'.$item->id.'/'.$img->image}}"
                                 onclick="appendimages(this);"/>
                        @endif
                    @endforeach
                @else
                    <img class="brics_images" id="view_images" src="{{url('images/default.png')}}">
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="more_other_details">
            <div class="more_product_head">
                {{$item->name}}
            </div>
            <div class="option_availability">
                <div class="option_txt">Option Availibity :</div>
                <select class="form-control rate" name="unit" id="price">
                    @foreach($item_prices as $item_price)
{{--                        @if($item_price->qty > 0)--}}
                            <option value="{{$item_price->id}}">{{$item_price->unit.' - '.'Rs '.$item_price->price}}</option>
                        {{--@endif--}}
                    @endforeach
                </select>
            </div>
            <div class="option_availability">
                <div class="option_txt">Qty :</div>
                <input type="number" min="1" max="10" id="qty_view_{{$item->id}}" class="form-control text-center"
                       value="1"/>
            </div>
            <div class="option_availability">
                <button class="more_addToCart btn-primary product_add_tocard" type="button" id="{{$item->id}}"
                        onclick="AddTOcartView(this);">
                    <i class="mdi mdi-cart"></i> <span id="{{$item->id}}" onclick="AddTOcartView(this);"
                                                       class="button-group__text">Add</span>
                </button>
            </div>
            <div class="more_product_head">
                Description :
            </div>
            <div class="more_product_details">
                {!!isset($item->description)?$item->description:'-'!!}
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function AddTOcartView(dis) {
        var itemid = $(dis).attr('id');
        var rateid = $('#price :selected').val();
        var qty = $('#qty_view_' + itemid).val();
        var carturl = "{{url('addtocart')}}";
        $.ajax({
            type: "get",
            contentType: "application/json; charset=utf-8",
            url: carturl,
            data: {itemid: itemid, rateid: rateid, quantity: qty},
            success: function (data) {
                $("#cartload").html(data);
                swal("Success!", "Item has been added to cart", "success");
                // ShowSuccessPopupMsg('Product has been added to cart');
            },
            error: function (xhr, status, error) {
                $("#cartload").html(xhr.responseText);
//                    alert('Technical Error Occured!');
            }
        });

    }

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

</script>