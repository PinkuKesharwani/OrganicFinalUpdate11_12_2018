<style type="text/css">

    .kot_table
    {
        background: #fff;
        min-height: 50px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        position: relative;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
        margin: 0px;
        padding: 0px;
    }
    .kot_table tbody tr td{
        padding:2px;
    }
    .kot_table tbody tr td
    {
        border: none;
    }
    .kot_table tbody tr td hr
    {
        margin: 5px 0px;
        border: solid thin #ccc;
    }
    .letter_txt
    {
        letter-spacing: -.5px;
    }
    .center_headtxt
    {
        display: inline-block;
        width: 100%;
        font-size: 20px;
    }
    .small_head
    {
        display: inline-block;
        width: 100%;
    }
    .right_txt
    {
        text-align: right;
    }
    .set_bill
    {
        width:400px;
        margin: 20px auto;
    }
    .backgroud_my
    {
        background-color: black;
        color: white;
        font-size: 30px;
    }
</style>

<div class="set_bill">
    <table class="kot_table table">
        <tbody>
        <tr>
            <td colspan="4" style="text-align: center;">
                <span onclick="abc();" class="center_headtxt backgroud_my">INVOICE</span>
                <br>
                <span class="center_headtxt"> Organic Dolchi </span>
                <span class="small_head">TIN No. : 23729162058</span>
                <span class="small_head">PH NO. : 0761-4048090,4045064</span>
                <span class="small_head">GSTIN : 23AACCD5322K1ZX</span>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2">Bill No : {{$order_data->order_no}}</td>
            <td colspan="2" class="right_txt">Date : {{ date_format(date_create($order_data->order_date), "d-M-Y")}}</td>{{--<td class="right_txt"  colspan="2">Table # 30</td>--}}</tr>
        <tr>
            {{--<td colspan="2" class="right_txt">Stevard : Surendar</td>--}}</tr>
        <tr>
            <td colspan="2" >Print Date : {{ date_format(date_create($order_data->order_date), "d-M-Y h:i A")}}</td>
            <td colspan="2" class="right_txt">Time : {{ date_format(date_create($order_data->order_date), "h:i A")}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <tr>
            <td>Item</td>
            <td class="right_txt">Qty</td>
            <td class="right_txt">Rate</td>
            <td class="right_txt">Amount</td>
        </tr>
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>


        @foreach($order_details as $objectmy)
            <tr>
                <td>{{$objectmy->my_name->name}}</td>
                <td class="right_txt">{{$objectmy->qty}}</td>
                <td class="right_txt">{{$objectmy->unit_price}}</td>
                <td class="right_txt">{{$objectmy->total}}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>

        <tr>
            <td colspan="2">Bill Amount</td>
            <td colspan="2" class="right_txt">{{$total_price[0]->total}}</td>
        </tr>
        {{-- <tr><td colspan="2">SGST (9%)</td><td colspan="2" class="right_txt">42.89</td></tr>
         <tr><td colspan="2">CGST (9%)</td><td colspan="2" class="right_txt">42.89</td></tr>
         <tr><td colspan="2">Round Off</td><td colspan="2" class="right_txt">0.22</td></tr>--}}
        <tr>
            <td colspan="4">
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="2">Net Amount</td>
            <td colspan="2" class="right_txt">{{$total_price[0]->total}}</td>
        </tr>
        <p class="clearfix"></p>
        {{-- <tr><td colspan="4"><hr></td></tr>

     <tr><td colspan="4"><br><br></td></tr>
       <tr><td colspan="1">CASHIER : Prakash</td><td colspan="3" class="right_txt">Guest Signature</td></tr>
       <tr><td colspan="4"><br><br><br></td></tr>
       <tr><td colspan="4" style="text-align: center;">
               <span class="center_headtxt">  THANK YOU FOR COMING PLEASE VISIT AGAIN !!! </span>
           </td>
       </tr>
       <tr><td colspan="4"><br></td></tr>--}}
        </tbody>
    </table>
</div>
<script>
    function abc() {
        window.print();
    }
</script>



<table width="90%" cellpadding="0" cellspacing="0" align="center" style="padding:0px;font-family:sans-serif;overflow:scroll">
    <tbody>
    <tr>
        <td>
            <table cellpadding="0" cellspacing="0" align="center" width="100%">
                <tbody>

                <tr>
                    <td align="center" colspan="2">
                        <!--<div style="line-height:50px;text-align:center;background-color:#fff;border-radius:5px;padding:20px">-->
                        <!--<a href="" target="_blank" >-->
                        <!--<img style="width: 50%;" src="' . $siteurl . 'images/logo.png"></a></div>-->
                        <h2>INVOICE</h2>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td >
                        <!--<div><img src="' . $siteurl . 'images/acknowledgement.jpg" style="height:auto;width:100%;" tabindex="0">-->
                        <div>

                            <p>Sold By: ORGANIC DOLCHI </p>
                            <p><b>GSTIN - 27AADCH8449J1Z4</b></p>


                        </div>
                        <!--</div>-->
                    </td>
                    <td align="right">
                        <p> <b  style="border: 1px dotted;padding:10px;">Invoice NO:FAHO1800205683</b></p>
                    </td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>
    <tr><td><p style="border-bottom: 1px solid"></p></td></tr>
    <tr>
        <td>
            <table width="100%">
                <tbody>
                <tr>
                    <td width="30%">


                        <p>Invoice Date:04-04-2018</p>


                    </td>
                    <td width="30%">
                        <p><b>Bill To</b></p>



                    </td>
                    <td width="30%">
                        <p><b>Ship To</b></p>



                    </td>
                </tr>
                <tr>
                    <td width="30%">
                        <p>Order Date:04-04-2018</p>

                    </td>
                    <td width="30%">

                        <p><b>Bijendra Sahu</b></p>
                    </td>
                    <td width="30%">
                        <p><b>Bijendra Sahu</b></p>

                    </td>
                </tr>
                <tr>
                    <td width="30%">
                        <p>Order Date:04-04-2018</p>

                    </td>
                    <td width="30%">

                        <p>Near Patel Ata Chakki Sanjeevni Nagar, Sanjivani Nagar Garden, Garha.</p>
                    </td>
                    <td width="30%">
                        <p>Near Patel Ata Chakki Sanjeevni Nagar, Sanjivani Nagar Garden, Garha.</p>

                    </td>
                </tr>


                </tbody>
            </table>
        </td>
    </tr>

    <tr><td><p style="border-bottom: 1px solid"></p></td></tr>

    <tr>
        <td>
            <table width="100%" border="0">
                <tbody>
                <tr>
                    <td width="40%"><p><b>Product</b></p></td>
                    <td width="10%"><p><b>Qty</b></p></td>
                    <td width="20%"><p><b>Gross Amount</b></p></td>
                    <td width="10%"><p><b>Discount</b></p></td>
                    <td width="20%" align="right"><p><b>Total</b></p></td>

                </tr>
                <tr>
                    <td width="40%">Product Name</td>
                    <td width="10%">1</td>
                    <td width="15%">1200</td>
                    <td width="15%">200</td>
                    <td width="20%" align="right">1000</td>

                </tr>


                </tbody>
            </table>
        </td>
    </tr>
    <tr><td><p style="border-bottom: 1px solid"></p></td></tr>

    <tr align="right">
        <td width="100%">
            <!--<p><b><span>Grand Total:</span></b>-->
            <table width="100%">
                <tbody>
                <tr>
                    <td width="80%"  align="right"><b>Grand Total:</b></td>
                    <td width="20%" align="right">&#8377; 1000</td>
                </tr>
                </tbody>
            </table>
            </p></td>
        <!--<td>  <span style="position: relative;">&#8377; 1000</span></td>-->
    </tr>

    </tbody>
</table>