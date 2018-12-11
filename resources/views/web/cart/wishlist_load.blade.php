<span class="baskit_counter" id="wishlist_counter">{{count($wishlist)}}</span>
<i class="mdi mdi-heart wish_icon" data-toggle="tooltip" title="Wishlist" data-placement="left" id="wishlist_block"></i>
<div class="menu_basic_popup wishlist_popbox scale0">
    <div class="header_popup">
        <div class="total_item_count">
            <span class="basic_icon mdi mdi-basket-fill"></span>
            {{count($wishlist)}} Item
        </div>
    </div>
    <div class="menu_popup_containner style-scroll">
        <table class="table table-striped table_addcard">
            <tbody>

            @if(count($wishlist)>0)
                @foreach($wishlist as $row)
                    <tr>
                        <td class="text-left"><a class="cart_product_name"
                                                 title="{{$row->item->name}}"
                                                 href="{{url('view_product').'/'.(encrypt($row->item_id))}}">{{ str_limit($row->item->name, 30) }}</a></td>
                        {{--<td class="text-center"> x{{$row->qty}}</td>--}}
                        {{--<td class="text-center"><i class="fa fa-inr"></i>{{$row->price}}</td>--}}
                        <td class="text-right">
                            <a onclick="remove_wishlist_item('{{$row->item_id}}')" class="mdi mdi-close-circle cart-delete"
                               data-toggle="tooltip"
                               title="Remove"></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="cart_btn_box">
        {{--<a class="btn btn-warning btn-sm" href="{{url('mycart')}}">--}}
            {{--<span class="mdi mdi-basket basic_icon_margin"></span>View Cart--}}
        {{--</a>--}}
        <a class="btn btn-success btn-sm pull-right" href="{{url('wishlist')}}">
            <span class="mdi mdi-heart basic_icon_margin"></span>View wishlist
        </a>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    function remove_wishlist_item(cart_item_id) {
        $.ajax({
            type: 'get',
            url: "{{ url('wishlist_delete') }}",
            data: {cart_item_id: cart_item_id},
            success: function (data) {
                $("#wishlist_load").html(data);
                $('.wishlist_popbox').removeClass('scale0');
//                $("#product_block").load(location.href + "#product_block");
            },
            error: function (xhr, status, error) {
                $('#wishlist_load').html(xhr.responseText);
            }
        });
        // promo_code

    }
</script>