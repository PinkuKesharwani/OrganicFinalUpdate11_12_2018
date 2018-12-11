@extends('adminlayout.adminmaster')
@section('title','Subscribe List')
@section('content')
    <section class="box_containner" id="fullid">
        <div class="container-fluid">
            <div class="row">
                <section id="item_part1">
                    <section id="item_list">
                        <div class="col-sm-12">
                            <div class="dash_boxcontainner white_boxlist">
                                <div class="upper_basic_heading"><span class="white_dash_head_txt">
                        All Subscribers

                      </span>
                                    <?php $Sdata = \App\Subscribe::get();
                                    $count = 1;
                                    ?>
                                    <div class="col-md-3 pull-right">
                                        <input id="myInput" class="form-control search_icon" placeholder="Search"
                                               onkeyup="GlobalsearchTable('subscribe_tablebody')" type="text">
                                    </div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="10%">Serial No</th>
                                            <th width="10%">Email</th>
                                            {{--     <th width="50%"></th>--}}
                                        </tr>
                                        </thead>
                                        <tbody id="subscribe_tablebody">
                                        @foreach($Sdata as $mysobj)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{isset($mysobj->email)?$mysobj->email:'-'}}</td>
                                                <?php $count++; ?>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>

        <div class="modal fade" id="myModalR" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div id="Rh" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Reject Information</h4>
                    </div>
                    <div id="Rb" class="modal-body">
                        <textarea class="form-control" id="rejectdetails" placeholder="Enter Some Details"></textarea>
                    </div>
                    <div id="Rf" class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        </div>


    </section>

    <script type="text/javascript">
        function approvedr(id) {
            var myid = id;
            $.get('{{url('approvereciepe')}}', {myid: myid}, function (data) {
                /* alert(data);*/

                location.reload();
            });
        }
        function rejectr(id) {
            $('#Rf').html('');
            $('#Rf').append('<button id="add_btn" type="button" class="btn btn-default" data-dismiss="modal">Close</button><button onclick="sendrejreq(' + id + ');" class="btn btn-danger">Reject</button>');
            $('#myModalR').modal();


        }
        function sendrejreq(id) {
            var myid = id;
            var value = $('#rejectdetails').val();

            $.get('{{url('rejectRecip')}}', {myid: myid, value: value}, function (data) {
                /* alert(data);*/
                alert(data);
                console.log(data);
                location.reload();
            });
        }
        function deleteR(id) {
            myid = id;
            $.get('{{url('deleteRecip')}}', {myid: myid}, function (data) {
                /* alert(data);*/

                console.log(data);
                location.reload();
            });
        }

    </script>
@stop
{{--$("#myroll").load(location.href + " #myroll");--}}
{{--window.location.reload();--}}






