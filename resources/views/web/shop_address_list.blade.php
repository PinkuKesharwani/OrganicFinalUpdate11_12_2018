@if(count($ShopPoints)>0)
    @foreach($ShopPoints as $ShopPoint)
        <div class="exis_addbox">
            <div class="first_row">
                <div class="radio_box">
                    <input type="hidden" id="shop_point_id{{$ShopPoint->id}}" name="shop_point_id{{$ShopPoint->id}}"
                           value="" />
                    <div class="radio">
                        <input id="shop_radio_{{$ShopPoint->id}}" value="{{$ShopPoint->id}}" class="deliever"
                               name="add_delivery"
                               type="radio" onclick="selected_shop_address('{{$ShopPoint->id}}');"/>
                        <label for="shop_radio_{{$ShopPoint->id}}" class="radio-label"></label>
                    </div>
                </div>
                {{--<div class="radio">--}}
                {{--<input id="deli_radio_{{$ShopPoint->id}}"--}}
                {{--onclick="selected_address('{{$ShopPoint->id}}');"--}}
                {{--value="1"--}}
                {{--class="gender"--}}
                {{--name="add_delivery"--}}
                {{--type="radio" {{$count==1?'checked="checked"':''}} />--}}
                {{--<label for="deli_radio_{{$ShopPoint->id}}"--}}
                {{--class="radio-label"></label>--}}
                {{--</div>--}}
                <div class="add_name_box">{{$ShopPoint->shop_name}}</div>
                <div class="contact_box">{{$ShopPoint->contact}}</div>
            </div>
            <div class="delivery_add">
                {{$ShopPoint->shop_address}}
            </div>
        </div>
    @endforeach
@else
    <div class="no_record_found" id="no_record">
        <input type="hidden" id="shop_point_id{{$ShopPoint->id}}" name="shop_point_id{{$ShopPoint->id}}"
               value="" />
        &lt; No Record Found &gt;
    </div>
@endif
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
