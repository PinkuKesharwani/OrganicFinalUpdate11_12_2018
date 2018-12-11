/**
 * Created by Pinku Kesharwani on 12/01/2018.
 */
$(document).ready(function () {
    //$('[data-toggle="tooltip"]').tooltip();
    $(document).click(function (e) {
        $('.menu_basic_popup').addClass('scale0');
        e.stopPropagation();
    });
    $('.glo_menuclick').click(function (e) {
        $('.menu_basic_popup').addClass('scale0');
        $(this).find('.menu_basic_popup').removeClass('scale0');
        e.stopPropagation();
    });

});

var append_this = "<div onclick='GloCloseModel();' class='modal-backdrop fade in'></div>";
function update_password() {
    $('#myModal_UpdatePassword').addClass('in');
    $('#myModal_UpdatePassword').show();
    $('body').append(append_this);
    $('body').addClass('modal-open');
}
function HideTranparent() {
    $('.overlay_res').fadeOut();
    $('.dash_sidemenu').removeClass('dash_sidemenu_show');
    $('body').css('overflow', 'auto');
}
function ResponsiveMenuClick() {
    $('.overlay_res').fadeIn();
    $('.dash_sidemenu').addClass('dash_sidemenu_show');
    $('body').css('overflow', 'hidden');
}
function GridHeaderCheck(dis) {
    $('input[type="checkbox"]').prop("checked", $(dis).prop("checked"));
}
function ShowCuisinImage(dis, changepicid, closebtn) {
    var chkreturn = ChangeSetImage(dis, changepicid);
    if (chkreturn == true) {
        $(closebtn).fadeIn();
    }
}


/*----------Usedful Js......*/
function ChangePasswordShow() {
    $('#myModal_UpdatePassword').modal('show');
}
function ShowProfile() {
    $('#address_block').slideUp();
    $('#profile_box').slideDown();
}
function ShowAddress() {
    $('#profile_box').slideUp();
    $('#address_block').slideDown();
}
function AddressOption(txt) {
    empty_address();
    if (txt == "existing") {
        $('#existing_dropbox').fadeIn();
    } else {
        $('#existaddress').val(0);
        $('#existing_dropbox').fadeOut();
    }
}
function empty_address() {
    $('#add_name').val('');
    $('#add_email').val('');
    $('#add_contact').val('');
    $('#add_pincode').val('');
    // $('#add_city').val(0);
    $('#add_address').val('');
}
function RemoveProfileImage(changepicid, file_id) {
    $(changepicid).attr('src', 'images/Male_default.png');
    $(file_id).val('');
}
function ChangeSetImage(dis, changepicid) {
    var sizefile = Number(dis.files[0].size);
    if (sizefile > 1048576) {
        var finalfilesize = parseFloat(dis.files[0].size / 1048576).toFixed(2);
        ShowErrorPopupMsg('Your file size ' + finalfilesize + ' MB. File size should not exceed 1 MB');
        $(dis).val("");
        return false;
    }
    var validfile = ["png", "jpg", "jpeg", "gif"];
    var source = $(dis).val();
    var ext = source.substring(source.lastIndexOf(".") + 1, source.length).toLowerCase();
    for (var i = 0; i < validfile.length; i++) {
        if (validfile[i] == ext) {
            break;
        }
    }
    if (i >= validfile.length) {
        ShowErrorPopupMsg('Only following file extention is allowed, png, jpg, jpeg, gif ');
        $(dis).val("");
        return false;
    }
    else {
        var input = dis;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(changepicid).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0])
            return true;
        }
    }
}
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 20) {
        $('#top_scroll_btn').addClass('animate_top');
        $('#bottom_scroll_btn').addClass('animate_bottom');
        /*   $('#top_scroll_btn').css('top', '70px');
           $('#bottom_scroll_btn').css('bottom', '20px');*/
    } else {
        /*$('#top_scroll_btn').css('top', '5px');
        $('#bottom_scroll_btn').css('bottom', '-50px');*/
        $('#top_scroll_btn').removeClass('animate_top');
        $('#bottom_scroll_btn').removeClass('animate_bottom');
    }
}
function ScrollTop() {
    $("html, body").animate({ scrollTop: 0 }, 1000);
    // $('#bottom_scroll_btn').css('bottom', '-50px');
    $('#bottom_scroll_btn').removeClass('animate_bottom');
}
function ScrollBottom() {
    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    //$('#top_scroll_btn').css('top', '40px');
    $('#top_scroll_btn').removeClass('animate_top');
}
// window.onload = function (e) {
//     setTimeout(function () {
//        // $('#page_loader').fadeOut('slow');
//         $('#page_loader').hide();
//     }, 2000);
// }
function ShowMenuPopup(dis) {
    $('.menu_basic_popup').addClass('scale0');
    $(dis).find('.menu_basic_popup').removeClass('scale0');
}
function ShowSuccessPopupMsg(msg) {
    $('#sucess_popup').find('.dynamic_popuptxt').text(msg);
    $('#sucess_popup').addClass('show_popup');
}
function ShowErrorPopupMsg(msg) {
    $('#error_popup').find('.dynamic_popuptxt').text(msg);
    $('#error_popup').addClass('show_popup');
}
function ShowConformationPopupMsg(msg) {
    $('#conformation_popup').find('.dynamic_popuptxt').text(msg);
    $('#conformation_popup').addClass('show_popup');
}
function HidePopoupMsg() {
    $('.popup_bgcolor').removeClass('show_popup');
}
function ShowLoginSignup(txt) {
    if (txt == 'signin') {
        $('#loginSignup_popup').find('.left_block').slideUp();
        $('#loginSignup_popup').find('.right_block').slideUp();
        $('#loginSignup_popup').find('.login').slideDown();
    }
    else if (txt == 'forgot') {
        $('#loginSignup_popup').find('.left_block').slideUp();
        $('#loginSignup_popup').find('.right_block').slideUp();
        $('#loginSignup_popup').find('.forgot').slideDown();
    } else if (txt == 'verify') {
        $('#loginSignup_popup').find('.left_block').slideUp();
        $('#loginSignup_popup').find('.right_block').slideUp();
        $('#loginSignup_popup').find('.verify').slideDown();
    } else {
        $('#loginSignup_popup').find('.left_block').slideUp();
        $('#loginSignup_popup').find('.right_block').slideUp();
        $('#loginSignup_popup').find('.registration').slideDown();
    }
    $('#loginSignup_popup').addClass('show_popup');
}
function show_link(dis) {
    var chk_width=$(window).width();
    if(chk_width < 760)
    {
        $(dis).next().slideToggle();
    }
}