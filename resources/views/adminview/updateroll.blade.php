@extends('adminlayout.adminmaster')

@section('title','Dashboard')

@section('content')
    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">

                <section id="item_part2">
                    <section id="item_list">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading">
                                        <span class="white_dash_head_txt">
                       Update Staff Member
                                            {{--<a href="{{url('organic').'/'.encrypt(1).'/rollmastermenu'}}">--}}
                                            <button class="btn btn-default pull-right" onclick="Backhistory();"><i
                                                        class="mdi mdi-content-duplicate"></i>List</button>
                                            {{--</a>--}}
                      </span>
                                    <form action="{{url('/postrollmasterupdate')}}" method="get">
                                        <div class="main_form_insert">
                                            <input type="text" value="{{$mydata->username}}" name="username"
                                                   class="form-control" placeholder="Enter User Name"
                                                   disabled="disabled">
                                            <input type="text" value="{{$mydata->password}}" name="password1"
                                                   class="form-control" placeholder="Enter User Password">
                                            <input type="hidden" value="{{$mydata->id}}" name="myid">
                                            <div class="title_box">
                                                <label>Select Menu :</label>
                                            </div>
                                            <?php  $munudata = \App\Menumodel::get();?>
                                            @foreach($munudata as $munudata1)
                                                <div class="pretty p-icon p-rotate col-sm-2">
                                                    <input value="{{$munudata1->id}}" class="item_chk" type="checkbox"
                                                           name="menuid[]"/>
                                                    <div class="state p-success">
                                                        <i class="icon mdi mdi-check"></i>
                                                        <label>{{ucwords($munudata1->menu)}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row col-sm-12 text-center form-group">
                                            <hr/>
                                            <button type="submit" name="submit" class="btn btn-success"><i
                                                        class="mdi mdi-send submit_icon_margin"></i>Update
                                            </button>
                                        </div>
                                        {{--<input type="submit" name="submit" class="btn btn-primary btn-block">--}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.item_chk').each(function () {
                @foreach($myallmenuid as $myobj)
                if ($(this).val() == '{{$myobj->menu_id}}') {
                    $(this).attr('checked', 'checked');
                }
                @endforeach
            });
        });
        function Backhistory() {
            window.history.go(-2);
        }
    </script>
@stop
{{--$("#myroll").load(location.href + " #myroll");--}}
{{--window.location.reload();--}}






