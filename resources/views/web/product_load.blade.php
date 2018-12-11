<input type="hidden" id="products_count" value="{{$items_count}}"/>
@foreach ($items as $item)


    @if (isset($_SESSION['user_master']))
        @php
            $wishlist_item =  \App\Wishlist::where(['user_id' => $_SESSION['user_master']->id, 'item_id' => $item->id])->first();
        @endphp
    @endif
    <div class="product_block" id="product_block">
        <div class="product_name"><a class="product_details_link"
                                     href="{{url('view_product').'/'.(encrypt($item->id))}}">{{$item->name}}</a>
        </div>
        <div class="product_wish {{isset($wishlist_item)?'add_wish':''}}" id="{{$item->id}}"
             onclick="AddtoWishlist(this);" data-toggle="tooltip"
             title="Wishlist">
            <i class="mdi mdi-heart"></i>
        </div>
        <div class="long_product_img">
            <?php $image = \App\ItemImages::where(['item_master_id' => $item->id])->first(); ?>
            @if(isset($image->image) && file_exists("p_img/$item->id/".$image->image))
                <img src="{{url('p_img').'/'.$item->id.'/'.$image->image}}"/>
            @else
                <img src="{{url('images/default.png')}}"/>
            @endif
            <div class="hover_center_block" id="{{$item->id}}"
                 onclick="getItemDetails(this);"
                 data-toggle="modal"
                 data-target="#Modal_ViewProductDetails">
                <div class="product_hover_block">
                    <div class="mdi mdi-magnify"></div>
                </div>
            </div>
        </div>
        <?php
        $prices = \App\ItemPrice::where('item_master_id', '=', $item->id)->where('qty', '>', '0')->get();

        ?>
        @if(count($prices)>0)
            @foreach($prices as $price)
                <div class="long_spinner_withbtn">
                    <div class="input-group long_qty_box"><span class="long_qty_txt" id="price_{{$item->id}}"
                                                                data-content="{{$price->id}}">{{$price->unit.' '.$price->weight}}
                            - {{"Rs.".$price->price}}</span>
                        <input type="number"
                               class="form-control text-center qty_edittxt"
                               min="1" @if($price->qty < 10) data-toggle="tooltip"
                               title="Only {{$price->qty}} Quantity Left In Stock" data-placement="right" @endif
                               max="{{$price->qty}}" onkeypress="return false" onkeydown="return false"
                               value="1" id="qty_load_{{$item->id}}">
                    </div>
                    <button class="spinner_addcardbtn btn-primary"
                            id="{{$item->id}}"
                            type="button" data-content="{{$price->id}}"
                            onclick="AddTOcart_load(this);">
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
                <div class="notify_me_btn" data-toggle="modal" onclick="getItemid({{$item->id}})"
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
{{--@else--}}
{{--<div class="product_block">No Items Available</div>--}}
{{--@endif--}}

