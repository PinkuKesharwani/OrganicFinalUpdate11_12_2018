<div class="slider_row">
    @php
        $categories = DB::select("select * from category_master ic where ic.id in (select DISTINCT category_id from item_category where is_active = 1)");
    @endphp

    @foreach($categories as $category)
        @php
            $items = DB::select("SELECT im.* FROM item_master im, item_category ic where im.is_active = 1 and im.id=ic.item_master_id and ic.category_id=$category->id");
        @endphp
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="product_carousal_box">
                <div class="carousal_head">
                    <span class="filter_head_txt slider_headtxt" style="cursor: pointer" onclick="get_items(this)" id="{{$category->id}}">{{$category->name}}</span>
                </div>

                <div id="myCarousel{{$category->id}}" class="carousel slide vertical">
                    <div class="carousel-inner slide_up_carousel">
                        <?php $counter = 0; ?>
                        @foreach($items as $item)
                            @if($counter == 0)
                                <div class="item active">
                                    <div class="product_block">
                                        <div class="product_name"><a class="product_details_link"
                                                                     href="{{url('view_product').'/'.(encrypt($item->id))}}">{{$item->name}}</a>
                                        </div>
                                        <div class="long_product_img">
                                            <?php $image = \App\ItemImages::where(['item_master_id' => $item->id])->first(); ?>
                                            @if(isset($image->image) && file_exists("p_img/$item->id/".$image->image))
                                                <img src="{{url('p_img').'/'.$item->id.'/'.$image->image}}">
                                            @else
                                                <img src="{{url('images/default.png')}}">
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
                                        @php $prices = \App\ItemPrice::where(['item_master_id' => $item->id])->get(); @endphp
                                        @foreach($prices as $price)
                                            <div class="long_spinner_withbtn">
                                                <div class="input-group long_qty_box">
                                                            <span class="long_qty_txt" id="price_{{$item->id}}"
                                                                  data-content="{{$price->id}}">{{$price->unit.' '.$price->weight}}
                                                                - {{"Rs.".$price->price}}</span>
                                                    <input type="number"
                                                           class="form-control text-center qty_edittxt"
                                                           min="0"
                                                           max="{{$price->qty}}"
                                                           value="0" id="qty_{{$item->id}}">
                                                </div>
                                                <button class="spinner_addcardbtn btn-primary"
                                                        id="{{$item->id}}"
                                                        type="button" data-content="{{$price->id}}"
                                                        onclick="AddTOcart(this);">
                                                    <i class="mdi mdi-basket"></i> <span
                                                            class="button-group_text">Add</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="item">
                                    <div class="product_block">
                                        <div class="product_name"><a class="product_details_link"
                                                                     href="{{url('view_product').'/'.(encrypt($item->id))}}">{{$item->name}}</a>
                                        </div>
                                        <div class="long_product_img">
                                            <?php $image = \App\ItemImages::where(['item_master_id' => $item->id])->first(); ?>
                                            @if(isset($image->image) && file_exists("p_img/$item->id/".$image->image))
                                                <img src="{{url('p_img').'/'.$item->id.'/'.$image->image}}">
                                            @else
                                                <img src="{{url('images/default.png')}}">
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
                                        <?php $prices = \App\ItemPrice::where(['item_master_id' => $item->id])->get(); ?>
                                        @if(count($prices)>0)
                                            @foreach($prices as $price)
                                                {{--                                                                @if($price->qty > 0)--}}
                                                <div class="long_spinner_withbtn">
                                                    <div class="input-group long_qty_box">
                                                            <span class="long_qty_txt" id="price_{{$item->id}}"
                                                            >{{$price->unit .' '.$price->weight}}
                                                                - {{"Rs.".$price->price}}</span>
                                                        <input type="number"
                                                               class="form-control text-center qty_edittxt"
                                                               min="0" max="{{$price->qty}}"
                                                               value="0" id="qty_{{$item->id}}">
                                                    </div>
                                                    <button class="spinner_addcardbtn btn-primary"
                                                            id="{{$item->id}}"
                                                            type="button"
                                                            data-content="{{$price->id}}"
                                                            onclick="AddTOcart(this);">
                                                        <i class="mdi mdi-basket"></i> <span
                                                                class="button-group_text">Add</span>
                                                    </button>
                                                </div>

                                            @endforeach
                                        @else
                                            <div class="notify_block long_notifyblock">
                                                <div class="out_of_stock">Out Of Stock</div>
                                                <div class="notify_me_btn" data-toggle="modal"
                                                     data-target="#Modal_NotifyMe">Notify Me
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <?php $counter++; ?>
                        @endforeach
                    </div>
                    <div class="slider_nav ">
                        <a class="left glo_sliderarrow_btn" href="#myCarousel{{$category->id}}"
                           data-slide="prev">‹</a>
                        <a class="right glo_sliderarrow_btn" href="#myCarousel{{$category->id}}"
                           data-slide="next">›</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>