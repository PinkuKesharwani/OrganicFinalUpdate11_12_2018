@extends('web.layouts.e_master')
@section('title', 'Organic Food : Home')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <style type="text/css">
        .image_main_div {
            margin-top: 52px;
            width: 100%;
            overflow: hidden;
        }

        .contant_list {
            text-align: center;
        }

        .contact_main_div {
            padding-top: 14px;
            text-align: center;
        }

        .contact_us_follow {
            margin-left: 29px;
        }

        .btn-follow {
            -webkit-box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .18), 0 4px 15px 0 rgba(0, 0, 0, .15);
            box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .18), 0 4px 15px 0 rgba(0, 0, 0, .15);
            width: 37px;
            height: 37px;
            vertical-align: middle;
            display: inline-block;
            overflow: hidden;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            padding: 9px;
            border: none;
            cursor: pointer;
            margin-right: 12px;
        }

        .contact_us_list {
            font-size: 17px;
        }

        .gmail {

            background-color: #D44638;
            font-size: 18px;
            color: white;
            text-align: center;

        }

        .linkedin {
            background-color: #1dcaff;
            font-size: 18px;
            color: white;
            text-align: center;

        }

        .twitter {
            background-color: #00aced;
            font-size: 18px;
            color: white;
            text-align: center;
        }

        .heading_border {
            border-bottom: 1px solid #86bc43
        }

        .main_div {
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .icon {
            padding-right: 20px;
            color: #86bc43;
        }

        .contact_inputtype_container {
            margin-top: 30px;
        }

        .input-type {
            height: 39px;
        }

        .text-area {
            height: 91px !important;
        }

        .send_btn {
            font-size: 18px;
            height: 39px;

        }

        .heading_section {
            padding-bottom: 50px;
        }
        .mapouter {
            text-align: right;
            height: 60vh;
            width: 100%;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            height:100%;
            width: 100%;
        }
        .contact_main_div
        {
            width: 100%;
            display: inline-block;
            padding-top: 50px;
        }
    </style>
@stop

@section('content')
    <section class="contact_main_div">
            <div class="container-fluid">
                <div class="row">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="100%" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <a href="https://www.pureblack.de"></a></div>
                </div>
                </div>
            </div>
            <div class="contact_inputtype_container">
                <div class="container">
                    <div class="heading_section">
                        <div class="main_heading">
                            <div class="main_head_txt">
                                Contact Us
                            </div>
                            <div class="organic_border">
                                <span class="organic_icons"></span>
                            </div>
                            <div class="main_subhead">
                                We produce Food In a Way Which Is Honest, Natural & Transparent.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <input type="text" class="form-control input-type" id="name" placeholder="Your Name"/>
                        </div>


                        <div class="form-group">
                            <input type="email" name="" class="form-control input-type" id="contact_email"
                                   placeholder="Email"/>
                        </div>


                        <div class="form-group">
                            <input type="text" id="phone" name="whatever1" class="form-control input-type"
                                   placeholder="Phone"/>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea class="form-control text-area" id="message" placeholder="Message"></textarea>


                        </div>
                        <div class="form-group"><a type="button" class="btn btn-success form-control send_btn">Send
                                Message</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container">
                <div class="main_div">

                    <div class="row heading_border">

                        <div class="col-sm-4">
                            <div class="contant_list">
                                <h3><i class="mdi mdi-map-marker icon"></i>Address</h3>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="contant_list">

                                <h3><i class="mdi mdi-arrow-down-bold icon"></i>follow Us</h3>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contant_list">
                                <h3><i class="mdi mdi-phone icon"></i>Contact</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">

                            <div class="contact_main_div">
                                <p class="contact_us_list">123, New Lenox Chicago,
                                    IL 60606</p>
                            </div>


                        </div>
                        <div class="col-sm-4">
                            <div class="contact_main_div">
                                <!--<h3>Social</h3>-->
                                <div class="contact_us_follow">
                                    <a><i class="mdi mdi-facebook facebook btn-follow"></i></a>
                                    <a><i class="mdi mdi-google-plus btn-follow gmail"></i></a>
                                    <a><i class="mdi mdi-linkedin btn-follow linkedin"></i></a>
                                    <a><i class="mdi mdi-twitter btn-follow twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact_main_div">
                                <!--<h3>Contact</h3>-->

                                <p class="contact_us_list"> 123-456-7890</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    @include('web.layouts.footer')
@stop