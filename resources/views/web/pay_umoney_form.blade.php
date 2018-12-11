<?php
$new_str = str_replace(' ', '', $firstName);
?>
<html>
<head>
    <script type="text/javascript">
        var hash = '<?php echo $hash1 ?>';
        function submitPayuForm() {
            if (hash == '') {
                return;
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }
    </script>
    {{--<style>--}}
        {{--.mandatory {--}}
            {{--color: red;--}}
            {{--padding: 8px;--}}
            {{--font-size: 17px;--}}
            {{--/* margin: 3px; */--}}
            {{--margin-left: -1px;--}}
            {{--/* margin-top: -5px; */--}}
        {{--}--}}

        {{--button.btn.btn-info.btn-color {--}}
            {{--width: 94%;--}}
            {{--padding: 7px;--}}
            {{--font-size: 17px;--}}
        {{--}--}}

        {{--form.form-horizontal {--}}
            {{--margin-top: 53px;--}}
        {{--}--}}

        {{--h4.heading {--}}
            {{--/* padding: 10px; */--}}
            {{--margin: 20px;--}}
            {{--font-weight: 700;--}}
        {{--}--}}
    {{--</style>--}}
</head>
<body onload="submitPayuForm()">
{{--<span style="color:red">Please fill all mandatory fields.</span>--}}
<?php //if($formError) { ?>
<?php //} ?>
<form method="post" name="payumoney" action="https://secure.payu.in/_payment" target="_blank" id="payumoney_form_btnblock1" style="margin-bottom: 0px">
    <div class="modal-body">
        <div class="basic_lb_row">
            <div class="col-sm-3 col-xs-12 text-right">
                <b class="">Amount :</b>
            </div>
            <div class="col-sm-7 col-xs-12">
                Rs. {{$totalCost}}
                <input type="hidden" class="form-control" name="amount" value="{{$totalCost}}" id="amt"/>
            </div>
        </div>
        <div class="basic_lb_row">
            <div class="col-sm-3 col-xs-12 text-right">
                <b>Name :</b>
            </div>
            <div class="col-sm-7 col-xs-12">
                <?php echo $new_str ?>
                <input type="hidden" value="<?php echo $new_str ?>"
                       name="firstname" class="form-control" id="fname"/>
{{--                <input type="hidden" name="page_id" id="page_id" value="{{$totalCost}}"/>--}}
            </div>
        </div>
        <div class="basic_lb_row">
            <div class="col-sm-3 col-xs-12 text-right">
                <b>Email :</b>
            </div>
            <div class="col-sm-7 col-xs-12">
                {{isset($email)?$email:'-'}}
                <input type="hidden" name="email" value="{{$email}}" class="form-control" id="inputType"/>
            </div>
        </div>
        <div class="basic_lb_row">
            <div class="col-sm-3 col-xs-12 text-right">
                <b>Phone :</b>
            </div>
            <div class="col-sm-7 col-xs-12">
                {{$mobile}}
                <input type="hidden" name="phone" value="{{$mobile}}" class="form-control" id="inputType"/>
            </div>
        </div>
        <div class="basic_lb_row">
            <div class="col-sm-3 col-xs-12 text-right">
                <b>Address :</b>
            </div>
            <div class="col-sm-7 col-xs-12">
                {{$addressdel1}}
                <input type="hidden" name="addressdel" class="form-control" value="{{$addressdel1}}"/>
            </div>
        </div>
        @if($shipping > 0)
            <div class="basic_lb_row">
                <div class="col-sm-3 col-xs-12 text-right">
                    <b>Shipping :</b>
                </div>
                <div class="col-sm-7 col-xs-12">
                    Rs. {{$shipping}}
                    <input type="hidden" name="shipping" class="form-control" value="{{$shipping}}"/>
                </div>
            </div>
        @endif
        <div class="col-md-12 hidden">
            <div class="form-group">
                <label for="inputType" class="col-md-2 control-label">Success URL:<span
                            class="mandatory">*</span></label>
                <div class="col-md-8">
                    <input type="text" name="surl" class="form-control"
                           value="{{url('success')}}"
                           placeholder="Enter Success URL"></div>
            </div>
        </div>
        <div class="col-md-12 hidden">
            <div class="form-group">
                <label for="inputType" class="col-md-2 control-label">Failure URL:<span
                            class="mandatory">*</span></label>
                <div class="col-md-8"><input type="text" name="furl"
                                             value="{{url('failed')}}"
                                             class="form-control" placeholder="Enter Failure URL"></div>
            </div>
        </div>
        <div class="col-md-12 hidden">
            <div class="form-group">
                <label for="inputType" class="col-md-2 control-label">Product Info<span
                            class="mandatory">*</span></label>
                <div class="col-md-10"><input name="productinfo" value="product" class="form-group" rows="5" cols="125"
                                              placeholder="Product information"></div>

                {{--------------------------------------------------optional--------------------------------------------------}}
                <input type="text" name="key" value="<?php echo $MERCHANT_KEY ?>"/>
                <input type="text" name="hash" value="<?php echo $hash1 ?>"/>
                <input type="text" name="txnid" value="<?php echo $txnid ?>"/>
                <input type="text" name="" value="<?php echo $hash_string ?>"/>
                <input type="hidden" name="lastname" id="lastname"
                       value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>"/>
                <input type="text" name="curl" value=""/>
                <input type="text" name="address1"
                       value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?> "/>
                <input type="text" name="address2"
                       value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>"/>
                <input type="text" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>"/>
                <input type="text" name="state"
                       value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>"/>
                <input type="text" name="country"
                       value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>"/>
                <input type="text" name="zipcode"
                       value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>"/>
                <input type="text" name="udf1" value="{{$shop_address_id}}"/>
                <input type="text" name="udf2" value="{{$shipping}}"/>
                <input type="text" name="udf3" value="{{$selected_point}}"/>
                <input type="text" name="udf4" value="{{$selected_promo}}"/>
                <input type="text" name="udf5" value="{{$address_id}}"/>
                <input type="text" name="service_provider" value="payu_paisa"/>
                {{--------------------------------------------------optional--------------------------------------------------}}
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
    </div>
</form>
</body>
</html>
