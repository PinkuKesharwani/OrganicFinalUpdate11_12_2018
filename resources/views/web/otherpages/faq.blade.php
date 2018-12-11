@extends('web.layouts.e_master')
@section('title', 'Organic Food : Home')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <style type="text/css">
        .faq_main_div{
            padding-top: 50px;
            width:100%;
            overflow: hidden;
            background-color: #cccccc2e;

        }
        .faq_heading{
            background-color:#ffffff !important;
            color: #86bc43 !important;
            /*border-bottom:1px solid #86bc43 !important;*/
        }
        .faq_heading a{
            text-decoration: none;
        }
        .heading_section_faq{
            padding-bottom: 10px;
            padding-top: 10px;

        }
    </style>
@stop

@section('content')
    <section class="faq_main_div" onclick="RedirectProduct();">
            <div class="container">
                    <div class="heading_section_faq">
                        <div class="main_heading">
                            <div class="main_head_txt">
                                FAQ
                            </div>
                            <div class="organic_border">
                                <span class="organic_icons"></span>
                            </div>

                        </div>
                    </div>
                    <div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_1">

                                            <span>Q.</span> How can I Post ? </a>
                                    </h4>
                                </div>
                                <div id="#faq_1" class="panel-collapse collapse in">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a  class="active" data-toggle="collapse" data-parent="#accordion" href="#faq_2">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_3">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a  class="active" data-toggle="collapse" data-parent="#accordion" href="#faq_2">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_3">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a  class="active" data-toggle="collapse" data-parent="#accordion" href="#faq_2">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_3">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a  class="active" data-toggle="collapse" data-parent="#accordion" href="#faq_2">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_3">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a  class="active" data-toggle="collapse" data-parent="#accordion" href="#faq_2">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_3">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a  class="active" data-toggle="collapse" data-parent="#accordion" href="#faq_2">
                                            <span>Q.</span>  How can I Post ?</a>
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
                                <div class="panel-heading faq_heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq_3">
                                            <span>Q.</span>  How can I Post ?</a>
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
    </section>
    @include('web.layouts.footer')
@stop