<?php

$new_str = str_replace(' ', '', $firstName);

?>
<html>
<head>
    <script>
        var hash = '<?php echo $hash1 ?>';

        function submitPayuForm() {
            if (hash == '') {
                return;
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }
    </script>
    <style>
        .mandatory {
            color: red;
            padding: 8px;
            font-size: 17px;
            /* margin: 3px; */
            margin-left: -1px;
            /* margin-top: -5px; */
        }

        button.btn.btn-info.btn-color {
            width: 94%;
            padding: 7px;
            font-size: 17px;
        }

        form.form-horizontal {
            margin-top: 53px;
        }

        h4.heading {
            /* padding: 10px; */
            margin: 20px;
            font-weight: 700;
        }
    </style>
</head>
<body onload="submitPayuForm()">
{{--<span style="color:red">Please fill all mandatory fields.</span>--}}
<?php //if($formError) { ?>

<?php //} ?>


<!--<form method="post" name="payumoney" action="{{url('Atompay/sample.php')}}" id="payumoney_form_btnblock">-->
<form method="post" name="payumoney" target="_blank" action="https://secure.payu.in/_payment" id="payumoney_form_btnblock">
<!--<form method="post" name="payumoney" action="{{url('PaytmKit/TxnTest.php')}}" id="payumoney_form_btnblock">-->

    <div class="container">
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputType" class="col-md-2 control-label">Amount<span class="mandatory">*</span><span
                            style="font-size: 10px; font-weight: 600"></span></label>
                <div class="col-sm-3"><label for=""><b>Rs. {{$totalCost}}</b></label>
                    <input type="hidden" readonly="readonly" class="form-control" name="amount"
                           value="{{$totalCost}}" id="inputType" placeholder="Enter Amount">
                </div>
                <label for="inputType" class="col-md-1 control-label">Name<span class="mandatory">*</span></label>
                <div class="col-sm-3"><label for=""><b><?php echo $new_str ?></b></label>
                    <input type="hidden" readonly="readonly" value="<?php echo $new_str ?>"
                           name="firstname" class="form-control" id="inputType"
                           placeholder="Enter Name"></div>
                <input type="hidden" name="page_id" id="page_id" value="{{$totalCost}}"/>
            </div>
        </div>
        <p class="clearfix"></p>


        <div class="col-md-12">
            <div class="form-group">
                {{--<label for="inputType" class="col-md-2 control-label">Email<span class="mandatory">*</span></label>--}}
                {{--<div class="col-sm-3"><label for=""><b>{{$email}}</b></label>--}}
                    {{--<input type="hidden" readonly="readonly" name="email"--}}
                           {{--value="{{$email}}" class="form-control" id="inputType"--}}
                           {{--placeholder="Enter Email">--}}
                {{--</div>--}}
                <label for="inputType" class="col-md-2 control-label">Phone<span class="mandatory">*</span></label>
                <div class="col-sm-3"><label for=""><b>{{$mobile}}</b></label>
                    <input type="hidden" readonly="readonly" name="phone"
                           value="{{$mobile}}" class="form-control" id="inputType"
                           placeholder="Enter Phone"></div>

                <label for="inputType" class="col-md-1 control-label">Address:<span class="mandatory">*</span></label>
                <div class="col-sm-3"><label for=""><b>{{$addressdel1}}</b></label>
                    <input type="hidden" readonly="readonly" name="addressdel" class="form-control"
                           value="{{$addressdel1}}"
                           placeholder=" Enter Address"></div>

            </div>
        </div>
        {{--<p class="clearfix"></p>--}}
        {{--<div class="col-md-12">--}}
            {{--<div class="form-group">--}}
                {{--<label for="inputType" class="col-md-2 control-label">Address:<span class="mandatory">*</span></label>--}}
                {{--<div class="col-md-7"><label for=""><b>{{$addressdel1}}</b></label>--}}
                    {{--<input type="hidden" readonly="readonly" name="addressdel" class="form-control"--}}
                           {{--value="{{$addressdel1}}"--}}
                           {{--placeholder=" Enter Address"></div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--@if($shipping > 0)--}}
            {{--<p class="clearfix"></p>--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="inputType" class="col-md-2 control-label">Shipping:<span--}}
                                {{--class="mandatory">*</span></label>--}}
                    {{--<div class="col-md-7"><label for=""><b>Rs. {{$shipping}}</b></label>--}}
                        {{--<input type="hidden" readonly="readonly" name="shipping" class="form-control"--}}
                               {{--value="{{$shipping}}"--}}
                               {{--placeholder=" Enter Shipping">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}

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
                <input type="text" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '1' : $posted['udf1']; ?>"/>
                <input type="text" name="udf2" value="{{$shipping}}"/>
                <input type="text" name="udf3" value="{{$selected_point}}"/>
                <input type="text" name="udf4" value="{{$selected_promo}}"/>
                <input type="text" name="udf5" value="{{$address_id}}"/>
                <input type="text" name="service_provider" value="payu_paisa"/>
                {{--------------------------------------------------optional--------------------------------------------------}}
            </div>
        </div>
        <p class="clearfix"></p>
        <div class="col-md-12 hidden">
            <div class="form-group">
                <label for="inputType" class="col-md-2 control-label hidden">Failure URL:<span
                            class="mandatory">*</span></label>
                <button type="submit" class="btn btn-info btn-color">Submit</button>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-2">
            <button type="submit" class="btn btn-info btn-color">Submit</button>
        </div>
    </div>


</form>
</body>
</html>
