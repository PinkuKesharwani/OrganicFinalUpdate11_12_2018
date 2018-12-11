@extends('web.layouts.e_master')
@section('title', 'Organic Food : My Recipe')
@section('head')
@stop
@section('content')
    <input type="text" id="recipe_type" value="{{$type}}"/>
    <section class="product_section">
        <div class="container res_pad0">
            <div class="col-sm-12 col-md-3">
                <div class="order_listbox">
                    <div class="carousal_head">
                        <span class="filter_head_txt slider_headtxt">Profile Details</span>
                    </div>
                    <div class="order_list_container">
                        <div class="my_profile_picshow">
                            @if($user->profile_img != 'images/Male_default.png')
                                <img src="{{url('u_img').'/'.$user->id.'/'.$user->profile_img}}" id="_UserProfile"
                                     alt="UserProfile">
                            @else
                                <img src="{{url('images/Male_default.png')}}" id="_UserProfile" alt="UserProfile">
                            @endif
                            <div class="my_profile_name">{{$user->name}}</div>
                            <div class="deli_row">
                                <strong>My Rewards : </strong>
                                <strong>{{$user->gain_amount}}</strong>
                                {{--<input type="text" disabled name="contact" value="{{$user->contact}}" id="p_id"--}}
                                {{--placeholder="Phone No."--}}
                                {{--class="form-control" onkeypress="return false;"/>--}}
                            </div>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a class="menu_setting_row" href="{{url('my_profile')}}">
                                <i class="mdi mdi-account-edit"></i>
                                Edit Profile

                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a class="menu_setting_row" onclick="Recipe('list');">
                                <i class="mdi mdi-view-list"></i>
                                My Recipe List
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a class="menu_setting_row" onclick="Recipe('new');">
                                <i class="mdi mdi-tooltip-edit"></i>
                                Add Recipe
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('order_list')}}" class="menu_setting_row">
                                <i class="mdi mdi-format-list-checks"></i>
                                Order List
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('product_feedback')}}" class="menu_setting_row">
                                <i class="mdi mdi-message-draw"></i>
                                Review &amp; Rating
                            </a>
                        </div>
                        <div class="menu_popup_settingrow">
                            <a href="{{url('logout')}}" class="menu_setting_row">
                                <i class="mdi mdi-logout"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="order_listbox">
                    <div id="Recipe_submit_box" style="display:block;">
                        <div class="carousal_head">
                            <span class="filter_head_txt slider_headtxt">Recipe Details</span>
                        </div>
                        <div class="order_list_container">
                            <form enctype="multipart/form-data" action="{{url('recipe_store')}}" id="myrecipeaddform"
                                  method="post"
                                  class="margin_bottom0">
                                <div class="order_details_box">
                                    <div class="deli_row">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Recipe Title*" name="recipe_title"
                                                   id="txt_recp_title"
                                                   class="form-control required_field">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" placeholder="Cooking Time* Eg. 30.00 Min / 1.30 Min"
                                                   name="cooking_time" id="txt_recp_time"
                                                   class="form-control required_field">
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-6">
                                            <input type="text" minlength="1" maxlength="3"
                                                   placeholder="Serves how many people?*" name="serve_count"
                                                   class="form-control numberOnly required_field">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control requiredDD" name="difficulty_level">
                                                <option selected value="0">Difficulty Level*</option>
                                                <option value="Easy">Easy</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Difficult">Difficult</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control glo_txtarea required required_field"
                                                      name="benefits"
                                                      placeholder="Benefits*"></textarea>
                                        </div>
                                    </div>
                                    <div class="instruction_container" id="ingredients_container">
                                        <div class="instrutiondeli_row">
                                            <div class="ingredian_select_box checkgradian">
                                                <select class="list-unstyled form-control requiredDD ingre_select"
                                                        name="ingredient[]"
                                                        onchange="checkIngredient(this);">
                                                    <option selected="" value="0">Select Ingredients*
                                                    </option>
                                                    @foreach($items as $item)
                                                        <option value="{{$item->id}}">{{ucfirst($item->name)}}</option>
                                                    @endforeach
                                                    <option value="00">Other</option>
                                                </select>
                                                <input type="text" placeholder="Quantity*" name="quantity[]"
                                                       class="form-control required ingre_qty_select check_ingrediant">
                                            </div>
                                            <div class="other_ingredientsbox checkgradian">
                                                <input type="text" placeholder="Enter Ingredients"
                                                       name="otr_ingredient[]"
                                                       id="txt_otr_ingredient" class="form-control check_ingrediant">
                                                <input type="text" placeholder="Quantity*" name="otr_ingredient_qty[]"
                                                       id="txt_otr_ingredient_qty"
                                                       class="form-control ingre_qty check_ingrediant">
                                                <div class="close_ingradian_otr"
                                                     onclick="showIngredient_dropdown(this);">
                                                    <i class="mdi mdi-close"></i>
                                                </div>
                                            </div>
                                            <div class="addmore" onclick="addmore_ingredient(this);">
                                                <i class="mdi mdi-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="instruction_container" id="instruction_container">
                                        <div class="instrutiondeli_row">
                                            <textarea class="form-control instruction_area required_field"
                                                      id="txt_recp_banifits"
                                                      name="instruction[]"
                                                      placeholder="Instruction / Each Steps*"></textarea>
                                            <div class="addmore" onclick="addmore_instruction(this);">
                                                <i class="mdi mdi-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="deli_row">
                                        <div class="col-sm-12">
                                            <label>Upload Recipe Image*</label>
                                            <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" onchange="Filesettxt(this, 'recipe_img_txt');" name="image"
                                   accept=".png,.jpg, .jpeg, .gif, media_type" id="imgInp"/>
                </span>
            </span>
                                                <input type="text" id="recipe_img_txt"
                                                       class="form-control margin_bottom0 required_field_file"
                                                       readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="address_btnbox">
                                    <button id="btn_add_new" type="button" onclick="SubmitRecipe();"
                                            class="btn btn-success pull-right"><i
                                                class="mdi mdi-tooltip-edit basic_icon_margin"></i>Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="my_Recipe" style="display: none">
                        <div class="carousal_head">
                            <span class="filter_head_txt slider_headtxt">My Recipe</span>
                        </div>
                        <div class="order_list_container" id="my_recipe_list">
                            @if(count($recipes)>0)
                                @foreach($recipes as $recipe)
                                    <div class="my_recipe_row">
                                        <div class="my_recipe_imgbox">
                                            @if(isset($recipe->image)&&!file_exists(url('').'/'.$recipe->image))
                                                <img class="my_rec_img" src="{{url('').'/'.$recipe->image}}">
                                            @else
                                                <img class="my_rec_img" src="{{url('recipe/default_recipe.png')}}">
                                            @endif
                                        </div>
                                        <div class="my_recipe_details">
                                            <div class="product_name"><a>{{$recipe->title}}</a>
                                            </div>
                                            <ul class="list-unstyled recipe_ul">
                                                <li>
                                                    <div class="recipe_title">Cooking Time :</div>
                                                    <div class="recipe_icon_txt">
                                                        <i class="mdi mdi-watch basic_icon_margin"></i>{{$recipe->cooking_time}}
                                                        Min
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="recipe_title">Serving :</div>
                                                    <div class="recipe_icon_txt">
                                                        <i class="mdi mdi-account basic_icon_margin"></i>{{$recipe->serve_count}}
                                                        People
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="recipe_title">Status :</div>
                                                    @if($recipe->is_approved == 'pending')
                                                        <div class="status pending">Pending</div>
                                                    @elseif($recipe->is_approved == 'approved')
                                                        <div class="status approved">Approved</div>
                                                    @else
                                                        <div class="status rejected">Rejected</div>
                                                        <div class="mdi mdi-help-circle reason_help"
                                                             data-toggle="tooltip"
                                                             data-placement="bottom"
                                                             title="{{$recipe->reject_reason}}"></div>
                                                    @endif
                                                </li>
                                                <li>
                                                    <div class="recipe_title">Difficult Level :</div>
                                                    <div class="recipe_icon_txt">
                                                        <i class="mdi mdi-star-outline basic_icon_margin"></i>{{$recipe->difficulty_level}}
                                                    </div>
                                                </li>

                                            </ul>
                                            <div class="des_details">
                                                {{$recipe->desciption}}
                                            </div>
                                            <div class="myrecipe_btnbox">
                                                <button type="button" id="{{$recipe->id}}" onclick="delete_recipe(this)"
                                                        class="btn btn-danger btn-sm pull-right"><i
                                                            class="mdi mdi-delete basic_icon_margin"></i>Delete
                                                </button>
                                                <a href="{{url('view_recipe').'/'.$recipe->id}}"
                                                   class="btn btn-default btn-sm pull-right"><i
                                                            class="mdi mdi-more basic_icon_margin"></i>View More
                                                </a>
                                                {{-- <button onclick="Recipe('new');" type="button"
                                                         class="btn btn-warning btn-sm pull-right"><i
                                                             class="mdi mdi-pencil basic_icon_margin"></i>Edit
                                                 </button>--}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="my_recipe_norecord">No recipe added by you.</br>
                                    <div class="address_btnbox margin_top15">
                                        <button onclick="Recipe('new');" type="button" class="btn btn-success"><i
                                                    class="mdi mdi-tooltip-edit basic_icon_margin"></i>Add Recipe
                                        </button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            checkRecipeTab();
            $('.required_field').focusout(function () {
                GlobalRequiredtxt(this);
            });
        });
        function checkIngredient(dis) {
            var curr_val = $(dis).find('option:selected').text();
            if (curr_val == 'Other') {
                $(dis).parent().hide();
                $(dis).parent().parent().find('.other_ingredientsbox').show();
            }
        }
        function showIngredient_dropdown(dis) {
            $(dis).parent().hide();
            $(dis).parent().parent().find('.ingredian_select_box').show();
            $(dis).parent().parent().find('.ingre_select').val("Select Ingredients");
        }
        function addmore_instruction(dis) {
            var append_moreinst = '<div class="instrutiondeli_row">\n' +
                '                                                    <textarea class="form-control instruction_area required_field" id="txt_recp_banifits" name="instruction[]" placeholder="Instruction / Each Steps"></textarea>\n' +
                '                                        <div class="addmore close_more" onclick="closemore_more(this);">\n' +
                '                                            <i class="mdi mdi-close"></i>\n' +
                '                                        </div>\n' +
                '                                        </div>';
            $('#instruction_container').append(append_moreinst);//
        }
        function addmore_ingredient(dis) {
            var items = '@foreach($items as $item) <option value="{{$item->id}}">{{ucfirst($item->name)}}</option> @endforeach<option value="Other">Other</option>';
            var append_moreingredient = '  <div class="instrutiondeli_row">\n' +
                '                                                <div class="ingredian_select_box checkgradian">\n' +
                '                                                    <select class="form-control ingre_select" onchange="checkIngredient(this);" name="ingredient[]">\n' + items + ' </select>\n' +
                '                                                    <input type="text" placeholder="Quantity*" class="form-control ingre_qty_select check_ingrediant"  name="quantity[]">\n' +
                '                                                </div>\n' +
                '                                                <div class="other_ingredientsbox checkgradian">\n' +
                '                                                    <input type="text" placeholder="Enter Ingredients*" name="" id="txt_otr_ingredient" class="form-control check_ingrediant" name="otr_ingredient[]" >\n' +
                '                                                    <input type="text" placeholder="Quantity*" name="" id="txt_otr_ingredient_qty" class="form-control ingre_qty check_ingrediant" name="otr_ingredient_qty[]" >\n' +
                '                                                    <div class="close_ingradian_otr" onclick="showIngredient_dropdown(this);">\n' +
                '                                                        <i class="mdi mdi-close"></i>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                                <div class="addmore close_more" onclick="closemore_more(this);">\n' +
                '                                                    <i class="mdi mdi-close"></i>\n' +
                '                                                </div>\n' +
                '                                            </div>';
            $('#ingredients_container').append(append_moreingredient);
        }
        function closemore_more(dis) {
            $(dis).parent().remove();
        }
        function Recipe(form_req) {
            if (form_req == "new") {
//                alert('this new');
                $('#Recipe_submit_box').slideDown();
                $('#my_Recipe').slideUp();
            } else {
//                alert('this list');

                $('#Recipe_submit_box').slideUp();
                $('#my_Recipe').slideDown();
            }
        }
        function checkRecipeTab() {
            var tabname = $('#recipe_type').val();
            Recipe(tabname);
        }

    </script>
    <script type="text/javascript">
        function Filesettxt(dis, changetxtid) {
            //debugger;
            $('#' + changetxtid).val('');
            $('#' + changetxtid).addClass('errorClass');
            if ($(dis).val() != "") {
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
                        $('#' + changetxtid).val($(dis).val());
                        $('#' + changetxtid).removeClass('errorClass');
                        return true;
                    }
                }
            }
        }
        function SubmitRecipe() {
            var result = true;
            $('.checkgradian').each(function () {
                if ($(this).is(':visible')) {
                    var thistxt = $(this).find('.check_ingrediant');
                    if (!Boolean(GlobalRequiredtxt(thistxt))) {
                        result = false;
                    }
                }
            });
            $('.required_field').each(function () {
                if (!Boolean(GlobalRequiredtxt($(this)))) {
                    result = false;
                }
            });
            if (!Boolean(Requiredtxt(".required_field_file"))) {
                result = false;
            }
            $('.requiredDD').each(function () {
                if ($(this).val() == 0) {
                    $(this).addClass('errorClass');
                } else {
                    $(this).removeClass('errorClass');
                }
            });
            if (!result) {
                return false;
            } else {
                //alert('done');
                $('form#myrecipeaddform').submit();
            }
        }
        function delete_recipe(dis) {
            var recipe_id = $(dis).attr('id');
            swal({
                title: "Are you sure?",
                text: "you want to delete this recipe",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willSubmit) => {
                if (willSubmit) {
                    $.ajax({
                        type: 'get',
                        url: "{{ url('recipe_delete') }}",
                        data: {
                            recipe_id: recipe_id,
                        },
                        // data: value,
                        success: function (data) {
                            // alert(data);
                            // console.log(data);
                            if (data == 'success') {
                                swal("Success", "Recipe has been deleted", "success");
                                $("#my_recipe_list").load(location.href + " #my_recipe_list");
                            } else {
                                swal("Oops", "Some went wrong...", "error");
                            }

                        },
                        error: function (xhr, status, error) {
                            swal("Oops", "Some went wrong...", "error");
                        }
                    });
                }
            });
        }

    </script>
    @include('web.layouts.footer')
@stop