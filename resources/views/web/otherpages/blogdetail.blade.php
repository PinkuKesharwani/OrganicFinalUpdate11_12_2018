@extends('web.layouts.e_master')
@section('title', 'Organic Food : blogdetail')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <style type="text/css">
        .box{
            /* margin-top: 29px; */
            height: auto;
            /* text-align: center; */
            width: 100%;
            /* background-attachment: fixed; */
            /* overflow: hidden; */
            -webkit-box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);
            box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);
            -webkit-border-radius: .25rem;
            border-radius: .25rem;

        }
        .img_box {
            margin-top: 30px;
            height: 450px;
            width: 100%;
            background-attachment: fixed;
            overflow: hidden;
            -webkit-box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .18), 0 4px 15px 0 rgba(0, 0, 0, .15);
            box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .18), 0 4px 15px 0 rgba(0, 0, 0, .15);
            -webkit-border-radius: .25rem;
            border-radius: .25rem;

        }


        .set{
            font-size: 13px;
        }
        .main{
            font-size: 16px;
            font-weight: bolder;
        }





        .sub_heading{

            margin-bottom: 10px;
            color: #11ac0f;
        }
        .main_containner_blog2{
            position: relative;
            top: 0;
            margin-bottom: 86px;

        }
        .main_blog_container{
            background-color: white;

            margin-top: 69px;

            /*padding-left: 26px;*/
            /*padding-right: 26px;*/
        }
        .main_heading_blog {
            /*width: 88%;*/
            padding: 30px;

            box-shadow: 0px 3px 2px 2px #8cfb036e;

            border-radius: 15px;
        }

    </style>
@stop

@section('content')
    <section class="faq_main_div" onclick="RedirectProduct();">
        <section class="faq_main_div">
            <div class="container">
                <div class="main_blog_container">

                    <div class="heading_section">
                        <div class="main_heading">
                            <div class="main_head_txt">
                                Blog Detail
                            </div>
                            <div class="organic_border">
                                <span class="organic_icons"></span>
                            </div>
                            <div class="main_subhead">
                                We produce Food In a Way Which Is Honest, Natural & Transparent.
                            </div>
                        </div>
                    </div>
                    <div class="main_containner_blog2">
                        <div class="img_box">
                            <img src="images/organic_blog_1.jpg" class="box" height="400" width="1000" />
                        </div>
                        <div class="main_heading_blog">
                            <div class="sub_heading">
                                <span class="set">Written by</span>
                                <span class="main">ADITYA SHRIVASTAVA,</span>
                                <span class="set">24/08/2008</span>
                            </div>
                            <p> Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.

                            </p>


                        </div>
                    </div>


                </div>
            </div>
        </section>
    </section>
    @include('web.layouts.footer')
@stop