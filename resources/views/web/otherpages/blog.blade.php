@extends('web.layouts.e_master')
@section('title', 'Organic Food : blog')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <style type="text/css">
        .faq_main_div{
            margin-top:52px;
            width:100%;
            overflow: hidden;
            background-color: #cccccc2e;

        }
        .btn{
            height: 34px;
            width: 110px;
        }
        .h3_heading{
            font-weight: bolder;
            font-size: 25px;

        }
        .blog_detail_box{
            font-size: 14px;
            font-weight: 300;
            text-align: justify;
            line-height: 1.5;

        }
        .one {

            margin: 30px 0px 0px 0px;
            border-radius: 5px;
        }

        .shadow{
            border-radius:6px ;
            /*box-shadow: 1px 7px 16px 0px #5f393940;*/
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }
        .shadow:hover{
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }

        .two{
            margin: 15px 0px 0px 0px;
        }

        .line{
            padding-bottom: 20px;
            border-bottom: solid thin #ccc;
        }

        .view_more_button {
            border-radius: 40px;
            background: linear-gradient(40deg,#00C851,#007E33)!important;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 16px;
            height: 42px;
            color: white;
            width: 130px;
            transition: all 0.5s;
            /* margin: 10px; */


        }
        .view_more_button:hover{
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }
        .blog_img{
            border-radius: 5px;
            height: 241px;
            width: 360px;
        }

        .view_more_button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .view_more_button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .view_more_button:hover span {
            padding-right: 25px;
        }

        .view_more_button:hover span:after {
            opacity: 1;
            right: 0;
        }
        .blog_container{
            padding-left: 29px;
        }
        .main_blog_container{
            background-color: white;

            margin-top: 27px;
            margin-bottom: 20px;
            padding-left: 26px;
            padding-right: 26px;
        }
        .heading_blog_client_name{
            font-weight: bold;
            color: #86bc43;
        }
        .view_more_button a{
            color:white;
            text-decoration: none;
        }
    </style>
@stop

@section('content')
    <section class="faq_main_div" onclick="RedirectProduct();">
        <div class="container">
            <div class="heading_section">
                <div class="main_heading">
                    <div class="main_head_txt">
                        Blog List
                    </div>
                    <div class="organic_border">
                        <span class="organic_icons"></span>
                    </div>
                    <div class="main_subhead">
                        We produce Food In a Way Which Is Honest, Natural & Transparent.
                    </div>
                </div>
            </div>
            <div class="main_blog_container">
                <div class="row line">
                    <div class="col-sm-4 one">
                        <div class="shadow">
                            <img src="images/organic_blog_1.jpg" class="blog_img"/>
                        </div>
                    </div>
                    <div class="col-sm-8 two">
                        <div  class="blog_container">
                            <h3 class="h3_heading">Organic Food</h3>
                            <p class="blog_detail_box"> Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                            </p>
                            <div class="name">
                                <span>by</span>
                                <span class="heading_blog_client_name">ADITYA SHRIVASTAVA, </span>
                                <span>23/01/1996</span>
                            </div>
                            <br>
                            <button class="view_more_button"><a href="blogdetail">Read More</a></button>

                            <!--<button class="btn btn-primary">READ MORE</button>-->
                        </div>
                    </div>
                </div>
                <div class="row line">
                    <div class="col-sm-4 one">
                        <div class="shadow">
                            <img src="images/organic_blog_2.jpg" class="blog_img"/>
                        </div>
                    </div>
                    <div class="col-sm-8 two">
                        <div  class="blog_container">
                            <h3 class="h3_heading">Organic Food</h3>
                            <p class="blog_detail_box"> Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                            </p>
                            <div class="name">
                                <span>by</span>
                                <span class="heading_blog_client_name">ADITYA SHRIVASTAVA, </span>
                                <span>23/01/1996</span>
                            </div>
                            <br>
                            <button class="view_more_button"><a href="blogdetail">Read More</a></button>

                            <!--<button class="btn btn-primary">READ MORE</button>-->
                        </div>
                    </div>
                </div>
                <div class="row line">
                    <div class="col-sm-4 one">
                        <div class="shadow">
                            <img src="images/organic_blog_3.jpg" class="blog_img"/>
                        </div>
                    </div>
                    <div class="col-sm-8 two">
                        <div  class="blog_container">
                            <h3 class="h3_heading">Organic Food</h3>
                            <p class="blog_detail_box"> Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                            </p>
                            <div class="name">
                                <span>by</span>
                                <span class="heading_blog_client_name">ADITYA SHRIVASTAVA, </span>
                                <span>23/01/1996</span>
                            </div>
                            <br>
                            <button class="view_more_button"><a href="blogdetail">Read More</a></button>

                            <!--<button class="btn btn-primary">READ MORE</button>-->
                        </div>
                    </div>
                </div>
                <div class="row line">
                    <div class="col-sm-4 one">
                        <div class="shadow">
                            <img src="images/organic_blog4.jpg" class="blog_img"/>
                        </div>
                    </div>
                    <div class="col-sm-8 two">
                        <div  class="blog_container">
                            <h3 class="h3_heading">Organic Food</h3>
                            <p class="blog_detail_box"> Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                            </p>
                            <div class="name">
                                <span>by</span>
                                <span class="heading_blog_client_name">ADITYA SHRIVASTAVA, </span>
                                <span>23/01/1996</span>
                            </div>
                            <br>
                            <button class="view_more_button"><a href="blogdetail">Read More</a></button>

                            <!--<button class="btn btn-primary">READ MORE</button>-->
                        </div>
                    </div>
                </div>
                <div class="row line">
                    <div class="col-sm-4 one">
                        <div class="shadow">
                            <img src="images/organic_blog_5.jpg" class="blog_img"/>
                        </div>
                    </div>
                    <div class="col-sm-8 two">
                        <div  class="blog_container">
                            <h3 class="h3_heading">Organic Food</h3>
                            <p class="blog_detail_box"> Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                            </p>
                            <div class="name">
                                <span>by</span>
                                <span class="heading_blog_client_name">ADITYA SHRIVASTAVA, </span>
                                <span>23/01/1996</span>
                            </div>
                            <br>
                            <button class="view_more_button"><a href="blogdetail">Read More</a></button>

                            <!--<button class="btn btn-primary">READ MORE</button>-->
                        </div>
                    </div>
                </div>
                <div class="row line">
                    <div class="col-sm-4 one">
                        <div class="shadow">
                            <img src="images/organic_blog_6.jpg" class="blog_img"/>
                        </div>
                    </div>
                    <div class="col-sm-8 two">
                        <div  class="blog_container">
                            <h3 class="h3_heading">Organic Food</h3>
                            <p class="blog_detail_box"> Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                                Organic produce is often (but not always, so watch where it is from) produced on smaller farms near where it is sold.
                                Organic food is often fresher because it doesn’t contain preservatives that make it last longer.
                            </p>
                            <div class="name">
                                <span>by</span>
                                <span class="heading_blog_client_name">ADITYA SHRIVASTAVA, </span>
                                <span>23/01/1996</span>
                            </div>
                            <br>
                            <button class="view_more_button"><a href="blogdetail">Read More</a></button>

                            <!--<button class="btn btn-primary">READ MORE</button>-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @include('web.layouts.footer')
@stop