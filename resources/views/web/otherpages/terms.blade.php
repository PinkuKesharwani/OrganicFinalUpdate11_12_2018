@extends('web.layouts.e_master')
@section('title', 'Organic Food : terms')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <style type="text/css">
        .privacy_{
            padding-top: 40px;
            padding-bottom:50px;
            background-color: #cccccc2e;
        }
        .card {
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            border: 0;
            margin-top: 50px;
            background-color: #ffffff;
        }
        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }
        .terms_title_heading {
            border-bottom: 1px solid #b9b8b8;
            display: inline-block;
            width: 100%;
            margin-bottom: 15px;
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
                        <div class="card-body">
                            <div class="terms_title_heading"> <span class="terms_title">Terms And Conditions</span></div>
                            <p>In the course of registering for and availing various services we provide from time to time through our website www.gribee.com ("Website", telephone search, SMS and WAP) or any other medium in which gribee may provide services (collectively referred to as "Media") you may be required to give your name, residence address, workplace address, email address, date of birth, educational qualifications and similar Personal Information ("Personal Information"). The Personal Information is used for three general purposes: to customize the content you see, to fulfill your requests for certain services, and to contact you about our services via including but not limited to email's, sms’s and other means of communication. Unless otherwise stated explicitly, this Policy applies to Personal Information as disclosed on any of the Media.</p>
                            <hr>

                            <p>
                                We are committed to protecting the privacy and confidentiality of all Personal Information that you may share as a user of Media In furtherance thereof, we have this policy to demonstrate our good faith.

                            </p>
                            <hr>
                            <p>
                                This policy does not apply to the practices of organizations that we do not own or to people that we do not employ or manage.</p>
                            <hr>


                            <p>
                                Personal Information will be kept confidential and will be used for our research, marketing, and strategic client analysis objectives and other internal business purposes only. We do not sell or rent Personal Information except that in case you are a customer of our search services through any of the Media, your Personal Information shall be shared with our subscribers/advertisers and you shall be deemed to have given consent to the same. Further, the subscribers / advertisers who are listed with us, may call you, based on the query or enquiry that you make with us, enquiring about any</p>
                            <hr>
                            <p>
                                Product / Service or</p>

                            <p>
                                Product / Service of any subscriber / advertiser or
                            </p>

                            <p>Other operational terms</p>
                            <hr>

                            <p>
                                In case of orders where offers are applied the terms associated with individual offers will take precedence.</p>
                            <p>We will share Personal Information only under one or more of the following circumstances: - If we have your consent or deemed consent to do so - If we are compelled by law (including court orders) to do so</p>
                            <hr>
                            <p>
                                In furtherance of the confidentiality with which we treat Personal Information we have put in place appropriate physical, electronic, and managerial procedures to safeguard and secure the information we collect online.
                            </p>
                            <hr>
                            <p>We give you the ability to edit your account information and preferences at any time, including whether you want us to contact you about new services. To protect your privacy and security, we will also take reasonable steps to verify your identity before granting access or making corrections.</p>
                            <hr>
                            <p>You acknowledge that you are disclosing Personal Information voluntarily. Prior to the completion of any registration process on our website or prior to availing of any services offered on our website if you wish not to disclose any Personal Information you may refrain from doing so; however if you don't provide information that is requested, it is possible that the registration process would be incomplete and/or you would not be able to avail of the our services.</p>
                            <hr>
                            <p>If you are our corporate customer, it is possible that we have entered into a contract with you for non-disclosure of confidential information. This Policy shall not affect such a contract in any manner.</p>
                            <hr>
                            <p>If you have questions or concerns about these privacy policies; please send us an email at www.gribee.com</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @include('web.layouts.footer')
@stop