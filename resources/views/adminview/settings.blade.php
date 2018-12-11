{{--<ul class="nav nav-tabs nav-justified indigo" role="tablist">--}}
{{--<li class="nav-item active">--}}
{{--<a class="nav-link" data-toggle="tab" onclick="first();" href="#aditya" role="tab"><i--}}
{{--class="fa fa-user basicicon_margin"></i>--}}
{{--Profile Settings</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" data-toggle="tab" onclick="second();" href="#aditya" role="tab"><i--}}
{{--class="fa fa-unlock-alt basicicon_margin"></i> Change Password</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" data-toggle="tab" onclick="third();" href="#adiya" role="tab"><i class="fa fa-users basicicon_margin"></i>--}}
{{--Role Manager</a>--}}
{{--</li>--}}
{{--</ul>--}}

<div class="setting_containner">
    <div class="col-sm-4 border_right">
        <img src="{{url('admin_pic').'/'.$data->id.'/'.$data->image}}" class="img_profile"/>
    </div>
    <div class="col-sm-4 border_right">
        <form action="{{url('/myadminpost')}}" method="post" id="adminpostForm" enctype="multipart/form-data">
            <label>Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Your Name"
                   value="{{$_SESSION['admin_master']['username']}}" class="form-control" disabled/>
            <label>Upload Profile Picture</label>
            <input type="file" name="file" id="file" class="form-control"/>
            <div class="text-center">
                <hr>
                <button type="submit" name="submit" class="btn btn-success"><i
                            class="mdi mdi-send submit_icon_margin"></i>Submit
                </button>
            </div>
            {{--<input type="submit" class="btn btn-info">--}}
        </form>
    </div>
    <div class="col-sm-4">
        <label>Old Password</label>
        <input type="password" name="old_password" id="opass" placeholder="Enter Your Old Password"
               class="form-control required"/>
        <div class="error" id="almes"></div>
        <label>New Password</label>
        <input type="password" name="new_password" placeholder="Enter Your New Password" id="npass"
               class="form-control required"/>
        <div class="text-center">
            <hr>
            <button type="button" class="btn btn-success" onclick="passchange();"><i
                        class="mdi mdi-pencil submit_icon_margin"></i>Change
            </button>
        </div>
        {{--<input type="button" value="Change" onclick="passchange();" class="btn btn-info">--}}
    </div>
</div>
<script type="text/javascript">
    $("#adminpostForm").on('submit', function (e) {
//                var textval = $('#post_text').text();
//                $('#posttext').val(textval);
        if ($('#file').val() == "") {
            $('#file').addClass('valmy');
            return false;
        } else {
            $('#file').removeClass('valmy');
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ url('myadminpost') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    //console.log(data);
                    $('#myModal').modal('hide');
                    swal({
                        title: "Thankyou!",
                        text: "You successfully Changed your Profile Picture",
                        icon: "success",
                        button: "Ok",
                    });
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    $('#err1').html(xhr.responseText);
                }
            });
        }
    });
    function passchange() {
        if ($('#opass').val() == "") {
            $('#opass').addClass('valmy');
            return false;
        }
        else if ($('#npass').val() == "") {
            $('#opass').removeClass('valmy');
            $('#npass').addClass('valmy');
            return false;
        }else {
            $('#npass').removeClass('valmy');
            var opass = $('#opass').val();
            var npass = $('#npass').val();
            $.get('{{url('changepass')}}', {opass: opass, npass: npass}, function (data) {
                //console.log(data);
                if (data == '1') {
                    $('#myModal').modal('hide');
                    swal({
                        title: "Thankyou!",
                        text: "You successfully Changed your Password",
                        icon: "success",
                        button: "Ok",
                    });
                }
                else {
                    $('#almes').html(data);
                }
            });
        }
    }
</script>