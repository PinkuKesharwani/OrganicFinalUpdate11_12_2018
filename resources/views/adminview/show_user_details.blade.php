<div class="more_profile_pic">
    <div class="more_picbox">
        <img src="u_img\{{$user_data->id}}\{{$user_data->profile_img}}" alt="User" />
    </div>
    <div class="moretop_details text-center">
        <h4>{{$user_data->name}}</h4>
        <small>{{$user_data->id}}</small>
    </div>
</div>
<table class="table table-bordered margin0">
    <tbody>
    {{--<tr>--}}
        {{--<td class="width_35 title-more">User ID :</td>--}}
        {{--<td class="width_65">--}}
            {{--{{$user_data->id}}--}}
        {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td class="width_35 title-more">Name :</td>--}}
        {{--<td class="width_65">--}}
            {{--{{$user_data->name}}--}}
        {{--</td>--}}
    {{--</tr>--}}
    <tr>
        <td class="width_35 title-more">Email :</td>
        <td class="width_65"> {{$user_data->email}}
        </td>
    </tr>
    <tr>
        <td class="width_35 title-more">Contact No. :</td>
        <td class="width_65"> {{$user_data->contact}}</td>
    </tr>
    <tr>
        <td class="width_35 title-more">Status :</td>
        <td class="width_65">
            @if($user_data->is_active=='1')
                <div class="status approved">Active</div>
            @else
                <div class="status rejected">Inactive</div>
            @endif
        </td>
    </tr>
    <tr>
        <td class="width_35 title-more">COD  :</td>
        <td class="width_65">
        @if($user_data->is_cod_allow == 1)
            <div class="status pending">Allow</div>
        @else
            <div class="status rejected">Dis-Allow</div>
        @endif
       </td>
    </tr>
    <tr>
        <td class="width_35 title-more">Rewards :</td>
        <td class="width_65">
            {{$user_data->gain_amount}}
        </td>
    </tr>
    {{--<tr>--}}
        {{--<td class="width_35 title-more">Total Order</td>--}}
        {{--<td class="width_65">--}}
            {{--0--}}
        {{--</td>--}}
    {{--</tr>--}}
    </tbody>
</table>