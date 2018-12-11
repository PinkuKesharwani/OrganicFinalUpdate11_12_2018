@extends('web.layouts.e_master')
@section('title', 'Organic Food : returnpolicy')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <style type="text/css">
        .return_main_div{
            margin-top:52px;
            width:100%;
            overflow: hidden;
            background-color: #cccccc2e;

        }
        .return_heading{
            background-color:#ffffff !important;
            color: #86bc43 !important;
            /*border-bottom:1px solid #86bc43 !important;*/
        }
        .return_heading a{
            text-decoration: none;
        }
        .heading_section_return{
            padding-bottom: 10px;
            padding-top: 10px;

        }
    </style>
@stop

@section('content')
    <section class="faq_main_div" onclick="RedirectProduct();">
        <section class="return_main_div">
            <div class="container">
                <div class="">
                    <div class="heading_section_return">
                        <div class="main_heading">
                            <div class="main_head_txt">
                                RETURN POLICY
                            </div>
                            <div class="siteorigin-widget-tinymce textwidget">
                                <p>This relies upon the strategy you return it back to us, assuming express and followed,
                                    your discount will be handled in up to 3 days after we get it back.</p>
                            </div>
                            <div class="organic_border">
                                <span class="organic_icons"></span>
                            </div>

                        </div>
                    </div>
                    <div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading return_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_1">

                                            <span>Q.</span> I'm an International customer, have you received my returned items? </a>
                                    </h4>
                                </div>
                                <div id="#faq_1" class="panel-collapse collapse in">
                                    <div class="panel-body">Once our distribution center has got your arrival,we'll email you to tell you your discount has been issued. It would
                                        then be able to take 5-10 working days for the assets to show up in your record.On the off chance that you've
                                        returned more than one request in a similar bundle, please permit up to 24 hours for all backed things to be prepared.The time it takes
                                        for your bundle to contact us shifts relying on where you are returning it from.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading return_heading">
                                    <h4 class="panel-title">
                                        <a  class="active" data-toggle="collapse" data-parent="#accordion" href="#faq_2">
                                            <span>Q.</span>What is your International Returns Policy?</a>
                                    </h4>
                                </div>
                                <div id="faq_2" class="panel-collapse collapse">
                                    <div class="panel-body">Once our distribution center has got your arrival, we'll email you to tell you your discount has been issued.
                                        It would then be able to take 5-10 working days for the assets to show up in your record.On the off chance that
                                        you've returned more than one request in a similar bundle, please permit up to
                                        24 hours for all backed things to be prepared.The time it takes for your bundle to contact us shifts relying on where
                                        you are returning it from.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading return_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_3">
                                            <span>Q.</span> What should I do if my order hasn't been delivered yet? </a>
                                    </h4>
                                </div>
                                <div id="faq_3" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading return_heading">
                                    <h4 class="panel-title">
                                        <a  class="active" data-toggle="collapse" data-parent="#accordion" href="#faq_2">
                                            <span>Q.</span> How can I get a new returns note? </a>
                                    </h4>
                                </div>
                                <div id="faq_2" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading return_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_3">
                                            <span>Q.</span>  How can I get a new returns note? </a>
                                    </h4>
                                </div>
                                <div id="faq_3" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    @include('web.layouts.footer')
@stop