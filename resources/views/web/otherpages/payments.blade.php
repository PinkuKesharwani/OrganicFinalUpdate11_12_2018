@extends('web.layouts.e_master')
@section('title', 'Organic Food : payments')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <style type="text/css">
        .privacy_{
            padding-top: 100px;
            padding-bottom:50px;
            background-color:#cccccc2e;
        }
        .card {
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            border: 0;
            padding:0px 15px 10px 15px;
            background-color: #ffffff;
        }
        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 0.1rem;
        }
        .terms_title_heading {
            border-bottom: 1px solid #b9b8b8;
            display: inline-block;
            width: 100%;
            padding-bottom: 7px;
        }
        .terms_title {
            font-size: 22px;
            border-bottom: 2px solid #86bc43;
            padding-bottom: 9px;
        }
    </style>
@stop

@section('content')
    <section class="faq_main_div" onclick="RedirectProduct();">
        <div class="privacy_">
            <div class="container">
                <div class="card">

                    <p class="card-body">
                    <div class="terms_title_heading"> <span class="terms_title">Payments</span></div>
                    <h3>How do I pay for a Organic Dolchi purchase?</h3>
                    <p>Flipkart offers you multiple payment methods. Whatever your online mode of payment,
                        you can rest assured that Flipkart's trusted payment gateway partners use secure encryption
                        technology to keep your transaction details confidential at all times.</p>
                    <p>You may use Internet Banking, Gift Card, Cash on Delivery and Wallet to make your purchase.</p>
                    <p>Flipkart also accepts payments made using Visa, MasterCard, Maestro and American Express credit/debit
                        cards in India and 21 other countries.</p>
                    <hr>
                    <h3>Are there any hidden charges (Octroi or Sales Tax) when I make a purchase on Organic Dolchi?</h3>
                    <p>
                        There are NO hidden charges when you make a purchase on Flipkart. The prices listed for all the items are
                        final and all-inclusive. The price you see on the product page is exactly what you pay.

                    </p>
                    <p>
                        Delivery charges may be extra depending on the seller policy. Please check individual seller for the same.
                        In case of seller WS Retail, the ₹50 delivery charge is waived off on orders worth ₹500 and over.

                    </p>
                    <hr>
                    <p>
                        This policy does not apply to the practices of organizations that we do not own or to people
                        that we do not employ or manage.</p>
                    <hr>
                    <h3>What is Cash on Delivery?</h3>

                    <p>
                        If you are not comfortable making an online payment on Flipkart.com, you can opt for the Cash on Delivery
                        (C-o-D) payment method instead. With C-o-D you can pay in cash at the time of actual delivery of the
                        product at your doorstep, without requiring you to make any advance payment online.
                    </p>
                    <p>

                        The maximum order value for a Cash on Delivery (C-o-D) payment is ₹50,000. It is strictly a cash-only payment
                        method. Gift Cards or store credit cannot be used for C-o-D orders. Foreign currency cannot be used to make
                        a C-o-D payment. Only Indian Rupees accepted.
                    </p>
                    <hr>


                    <h3>How do I pay using a credit/debit card?</h3>
                    <p>We accept payments made by credit/debit cards issued in India and 21 other countries.</p>

                    <h5>Credit cards</h5>

                    <p>We accept payments made using Visa, MasterCard and American Express credit cards.</p>

                    <p>To pay using your credit card at checkout, you will need your card number, expiry date, three-digit CVV number
                        (found on the backside of your card). After entering these details, you will be redirected to the bank's page
                        for entering the online 3D Secure password.</p>

                    <h5>Debit cards</h5>

                    <p>We accept payments made using Visa, MasterCard and Maestro debit cards.</p>

                    <p>To pay using your debit card at checkout, you will need your card number, expiry date (optional for Maestro cards),
                        three-digit CVV number (optional for Maestro cards). You will then be redirected to your bank's secure page for
                        entering your online password (issued by your bank) to complete the payment.
                    </p>

                    <p>Internationally issued credit/debit cards cannot be used for Flyte, Wallet and eGV payments/top-ups.</p>

                    <hr>
                    <h3>Is it safe to use my credit/debit card on Flipkart?</h3>

                    <p>Your online transaction on Flipkart is secure with the highest levels of transaction security currently available on the
                        Internet. Flipkart uses 256-bit encryption technology to protect your
                        card information while securely transmitting it to the respective banks for payment processing.</p>

                    <p>All credit card and debit card payments on Flipkart are processed through secure and trusted payment gateways managed
                        by leading banks. Banks now use the 3D Secure password service for online transactions, providing an additional layer of
                        security through identity verification.</p>
                    <hr>
                    <h3>What steps does Flipkart take to prevent card fraud?</h3>
                    <p>Flipkart realizes the importance of a strong fraud detection and resolution capability. We and our online payments partners
                        monitor transactions continuously for suspicious activity and flag potentially fraudulent transactions for manual verification
                        by our team.</p>

                    <p>In the rarest of rare cases, when our team is unable to rule out the possibility of fraud categorically, the transaction
                        is kept on hold,and the customer is requested to provide identity documents. The ID documents help us ensure that
                        the purchases were indeed made by a genuinecard holder. We apologise for any inconvenience that may be
                        caused to customers and request them to bear with us in the larger interest of ensuring a safe and secure environment
                        for online transactions.</p>

                    <hr>
                    <h3>Can I make a credit/debit card or Internet Banking payment on Flipkart through my mobile?</h3>
                    <p>Yes, you can make credit card payments through the Flipkart mobile site and application. Flipkart uses 256-bit encryption
                        technology to protect your card information while securely transmitting it to the secure and trusted payment gateways managed by
                        leading banks.</p>

                    <h3>How does 'Instant Cashback' work?</h3>
                    <p>The 'Cashback' offer is instant and exclusive to Flipkart.com. You only pay the final price you see in your shopping cart.</p>
                    <hr>

                    <h3>How do I place a Cash on Delivery (C-o-D) order?</h3>
                    <p>All items that have the "Cash on Delivery Available" icon are valid for order by Cash on Delivery.</p>

                    <p>Add the item(s) to your cart and proceed to checkout. When prompted to choose a payment option, select "Pay By Cash on Delivery".
                        Enter the CAPTCHA text as shown, for validation.</p>

                    <p>Once verified and confirmed, your order will be processed for shipment in the time specified, from the date of confirmation.
                        You will be required to make a cash-only payment to our courier partner at the time of delivery of your order to complete
                        the payment.</p>
                    <h4>Terms & Conditions:</h4>

                    <ul>
                        <li>The maximum order value for C-o-D is ₹50,000</li>
                        <li>Gift Cards or Store Credit cannot be used for C-o-D orders</li>
                        <li>Cash-only payment at the time of delivery.</li>
                    </ul>
                    <hr>
                    <h3>How do I make a payment using Flipkart's credit card EMI option?</h3>
                    <p>Once you've added the desired items to your Flipkart shopping cart, proceed with your order as usual by
                        entering your address. When you're prompted to choose a payment mode for your order, select 'EMI' & follow these simple steps:</p>
                    <ul>
                        <li>Choose your credit-card issuing bank you wish to pay from</li>

                        <li>Select the EMI plan of your preference</li>

                        <li>Enter your credit card details</li>

                        <li>Click 'Save and Pay'</li>


                    </ul>
                    <hr>
                    <p>Please note that the full amount will be charged on your card the day of the transaction.</p>
                </div>
            </div>
        </div>

    </section>
    @include('web.layouts.footer')
@stop