@extends('web.layouts.e_master')
@section('title', 'Organic Food : aboutus')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <style>
        .aboutus_main_heading {
            font-family: Playfair Display;
            font-size: 52px;
            font-weight: bold;
            color: #86bc43;
        }
        .heading_box{
            font-weight: bold;
            font-size: 35px;
            text-align: center;
            /*height: auto;*/
            /*background-color: limegreen;*/
            /*!*background-image: url(images/blog10.jpg);*!*/
            /*background-size: 100%;*/
        }
        .about{
            margin-top: 10px;
            margin-bottom: 60px;
        }
        .main_img{
            margin-top: 10px;
            width: 100%;
        }

        .about_content{
            line-height: 1.5;
            font-size: 18px;
        }
        .next_heading{
            letter-spacing: 2.5px;
            color: #FFC107;
            font-family: fantasy;
            font-size: 30px;

        }
        .box1{
            height: auto;
        }
        .img{
            margin-right: 40px;
            float: left;
            position: relative;
            max-width: 180px;
            display: inline-block
        }
       .portfolio.opened-article .project  .profile.opened-article .profile  ,cmsms_row_inner {
             position: relative;
             width: 980px;
             padding: 0 20px;
             margin: 0 auto;
             -webkit-box-sizing: border-box;
             -moz-box-sizing: border-box;
             box-sizing: border-box;
         }
        .quote_grid {
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }
        .quote_grid .quote_vert {
            position: absolute;
            top: 0;
            height: 100%;
            /*border-left-width: 4px;*/
            /*border-left-style: solid;*/
        }
        .quote_grid .quotes_list {
            width: 100%;
            padding-left: 0;
            margin-bottom: -2px;
            /*border-bottom-width: 4px;*/
            /*border-bottom-style: solid;*/
            overflow: hidden;
        }
        .quote_grid .cmsms_quote:first-child {
            padding-top: 30px;
        }

        .quote_grid.quote_two .cmsms_quote {
            width: 50%;
        }
        .quote_grid .cmsms_quote {
            padding: 30px;
            float: left;
        }
        .quote_grid .cmsms_quote .cmsms_quote_inner {
            text-align: center;
        }
        .cmsms_quote_inner, .quote_content_wrap {
            overflow: hidden;
        }
        .quote_grid .quote_image {
            margin-right: 40px;
            float: left;
            position: relative;
            max-width: 180px;
            display: inline-block;
        }

        figure {
            background-image: none !important;
        }
        .quote_grid .cmsms_quote .cmsms_quote_inner .quote_content_wrap {
            text-align: left;
        }
        .images_feedback{
            border-radius: 100px;
        }
        .p_font{
            font-size:13.5px;
        }
        .h4_feedback{
            font-size: 20px;
            font-weight: bold;
            color: rgba(68, 68, 68, 1);
        }

        .text-success-icon{
            text-align: center;
        }
        .text-success {
            color:  #86bc43!important;
        }
        .text-secondary {
            text-align: center;
            color: #000000!important;
            font-weight: bold;
            font-size: 16px;
        }
        .heading{
            margin: 30px;
            font-size: 35px;
            font-weight: bolder;
        }
        .text-center{
            margin-bottom: 40px;
        }
        .heading_provide{
            font-size: 35px;
            font-weight: bolder;
        }
        .txt_content{
            text-align: center;
        }
        .img_place{

            margin-top: 25px;
            display: inline-flex;
        }
        .text{
            margin-left: 300px;
            width: 500px;
            color:#9e9e9e;
        }
        .heading1{
            font-weight: bolder;
            font-size: 24px;
            color: black;
        }
        .text1{
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 15px;
            color: #9e9e9e;
        }
        .img_place1{

        }
        .blog_div{
            margin-bottom: 50px;
            text-align: center;
        }

        .img_decor{
            border-radius: 5px;
            /*margin-left: 50px;*/
            border-radius: 5px;
            height:200px;
            width:300px;
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }
        .content{
            display: inline-flex;
            height: 100px;
            margin-top: 20px;
        }
        .content1{
            position: relative;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
        }
        .content_txt1{
            background-color: #ffffff;
            width: 300px;
            /*margin-left: 50px;*/
            text-align: center;
        }
        .fa_icon{
            padding-right: .5rem!important;
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
        }
        .view .icon {
            position: relative;
            font-size: 15px;
        }
        /*.fa {*/
        /*display: inline-block;*/
        /*font: normal normal normal 14px/1 FontAwesome;*/
        /*font-size: inherit;*/
        /*text-rendering: auto;*/
        /*}*/
        .view_more {
            background: linear-gradient(40deg,#45cafc,#303f9f)!important;
            color: #fff!important;
        }
        .content_txt {
            display: inline-block!important;
        }
        .view {
            padding: 10px 20px;
            font-weight: normal;
            line-height: 1.42857143;
            margin-top: 15px;
            text-align: center;
            user-select: none;
            border-radius: 20px;
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }
        .view:hover{
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }
        .heading_border{
            border: 1px dotted #ccc;
            margin-bottom: 10px;

        }
        .border_para_heading{
            color: orange;
            font-size: 20px;
        }
        .div1 {
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            content: "";
            height: 70%;
            /* left: -30px; */
            top: -25px;
            transform: skewY(4deg);
            width: 75%;
            z-index: 1;
            padding: 20px 70px 20px 30px;
            position: relative;
            background-color: white;
            margin-left: 40px;
            margin-top: 50px;
        }
        .div2{
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            background-color: #86bc43;
            bottom: -40px;
            content: "";
            height: 113%;
            margin-left: 75px;
            position: absolute;
            /* right: -30px; */
            transform: skewY(175deg);
            width: 75%;
        }
        .center_div{
            margin-top: 100px;
            margin-bottom: 100px;
        }
        .row1_border{
            border-bottom: 1px dotted #ccc;
        }
        .center_image{
            margin-top: 46px;
            transform: skewY(-4deg);
            height:228px;
            width:340px;
        }
        .text_para{
            font-size: 13px;
            color: #676161;
        }
        .center_para_img{
            margin-top: 10px;
            transform: skewY(-4deg);
            height: 100px;
            width: 330px;
        }
        /*.demo{*/
        /*border: 1px solid #ebebeb;*/
        /*border-radius: 18px;*/
        /*display: inline-block;*/
        /*overflow: hidden;*/
        /*padding: 7px 15px;*/
        /*}*/
    </style>
@stop

@section('content')
    <section class="home_about" onclick="RedirectProduct();">
        <div class="col-sm-12 about">
            <div class="col-sm-6">
                <img src="images/about_organic_dolchi.jpg" class="main_img"/>
            </div>
            <div class="col-sm-6">
                <p class="aboutus_main_heading">About Organic Dolchi</p>
                <p class="about_content">
                    Organic fruits and vegetables at a farmers' market in Argentina
                    Organic food is food produced by methods that comply with the standards of organic farming. Standards vary worldwide,
                    but organic farming in general features practices that strive to cycle resources, promote ecological balance,
                    and conserve biodiversity. Organizations regulating organic products may restrict the use of certain pesticides and
                    fertilizers in farming. In general,organic foods are also usually not processed using irradiation, industrial solvents
                    or synthetic food additives.
                </p>
                <p class="Next_heading">
                    Save more with GO! We give you the lowest prices on all your grocery needs.
                </p>

            </div>
        </div>
        <div class="container">
            <h2 class="cmsms_heading heading">What People Say</h2>
                                    <div class="cmsms_quotes quote_grid quote_two">
                                        <div class="quote_vert"></div><div class="quotes_list">
                                            <div class="cmsms_quote">

                                                <!--_________________________ Start Grid Article _________________________ -->

                                                <article class="cmsms_quote_inner">
                                                    <figure class="quote_image">
                                                        <img class="images_feedback" src="images/awesome.jpg" height="200px" width="200px"/>
                                                    </figure>
                                                    <div class="quote_content_wrap">
                                                        <div class="quote_content">
                                                            <h4 class="h4_feedback">Awesome!</h4>
                                                            <p class="p_font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere.</p>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                        <h6 class="quote_title">Phil Chili</h6>
                                                        <span class="quote_subtitle">Chili LTD</span>
                                                    </div>
                                                </article>
                                                <!--_________________________ Finish Grid Article _________________________ -->

                                            </div>
                                            <div class="cmsms_quote">

                                                <!--_________________________ Start Grid Article _________________________ -->

                                                <article class="cmsms_quote_inner">
                                                    <figure class="quote_image">
                                                        <img class="images_feedback" src="images/perfect.jpg" height="200px" width="200px"/></figure>
                                                    <div class="quote_content_wrap">
                                                        <div class="quote_content">
                                                            <h4 class="h4_feedback">Perfect!</h4>
                                                            <p class="p_font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere.</p>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                        <h6 class="quote_title">Jordan Michael</h6>
                                                        <span class="quote_subtitle">Space Jam Co.</span>
                                                    </div>
                                                </article>
                                                <!--_________________________ Finish Grid Article _________________________ -->

                                            </div>
                                        </div><div class="quotes_list">
                                            <div class="cmsms_quote">

                                                <!--_________________________ Start Grid Article _________________________ -->

                                                <article class="cmsms_quote_inner">
                                                    <figure class="quote_image">
                                                        <img class="images_feedback" src="images/fantastic.jfif" height="200px" width="200px"/></figure>
                                                    <div class="quote_content_wrap">
                                                        <div class="quote_content">
                                                            <h4 class="h4_feedback">Fantastic!</h4>
                                                            <p class="p_font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere.</p>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                        <h6 class="quote_title">Sabina Jennings</h6>
                                                        <span class="quote_subtitle">Ex Minister</span>
                                                    </div>
                                                </article>
                                                <!--_________________________ Finish Grid Article _________________________ -->

                                            </div>
                                            <div class="cmsms_quote">

                                                <!--_________________________ Start Grid Article _________________________ -->

                                                <article class="cmsms_quote_inner">
                                                    <figure class="quote_image">
                                                        <img class="images_feedback" src="images/outstanding.jpg" height="200px" width="200px"/></figure>
                                                    <div class="quote_content_wrap">
                                                        <div class="quote_content">
                                                            <h4 class="h4_feedback">Outstanding!</h4>
                                                            <p class="p_font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget felis sit amet arcu facilisis dignissim et sit amet arcu. Mauris dui risus, consequat vitae leo non, consectetur malesuada tortor. Ut mollis a velit et pretium. Aliquam ornare justo ut dui volutpat tincidunt. Sed tempor, neque in hendrerit ultrices, purus diam posuere dui, id fermentum risus felis a felis. Nulla bibendum dictum posuere.</p>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                        <h6 class="quote_title">Vanessa Fouler</h6>
                                                        <span class="quote_subtitle">Pretty girl</span>
                                                    </div>
                                                </article>
                                                <!--_________________________ Finish Grid Article _________________________ -->

                                            </div>
                                        </div>
        </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                        <div class="txt_content">
                            <h1 class="heading">Our Latest Blog</h1>
                        </div>
                    <div class="col-sm-12 blog_div">
                        <div class="img_place">
                                <div class="col-sm-3 ">
                                    <img src="images/organic_blog6.jpg" class="img_decor" />
                                    <div class="content_txt1">
                                        <h3>Blog Title 1</h3>
                                      <a class="view view_more content1">
                                      <i class="fa fa-clone fa_icon" aria-hidden="true"></i>
                                      <span class="clearfix content_txt">View More</span>
                                      </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 img_place1">
                                    <img src="images/organic_blog7.png" class="img_decor" />
                                    <div class="content_txt1">
                                        <h3>Blog Title 1</h3>
                                        <a class="view view_more content1">
                                            <i class="fa fa-clone fa_icon" aria-hidden="true"></i>
                                            <span class="clearfix content_txt">View More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 img_place1">
                                    <img src="images/organic_blog12.jpg" class="img_decor" />
                                    <div class="content_txt1">
                                        <h3>Blog Title 1</h3>
                                        <a class="view view_more content1">
                                            <i class="fa fa-clone fa_icon" aria-hidden="true"></i>
                                            <span class="clearfix content_txt">View More</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 img_place1">
                                    <img src="images/organic_blog2.jpg" class="img_decor" />
                                    <div class="content_txt1">
                                        <h3>Blog Title 1</h3>
                                        <a class="view view_more content1">
                                            <i class="fa fa-clone fa_icon" aria-hidden="true"></i>
                                            <span class="clearfix content_txt">View More</span>
                                        </a>
                                    </div>
                                </div>
                          </div>
                    </div>
            </div>
        </div>
                {{--<div class="col-sm-12 content">--}}
                    {{--<div class="col-sm-3 content_txt1">--}}
                        {{--<a class="view view_more content1">--}}
                            {{--<i class="fa fa-clone fa_icon" aria-hidden="true"></i>--}}
                            {{--<span class="clearfix content_txt">View More</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3 content_txt1">--}}
                        {{--<a class="view view_more content1">--}}
                            {{--<i class="fa fa-clone fa_icon" aria-hidden="true"></i>--}}
                            {{--<span class="clearfix content_txt">View More</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3 content_txt1">--}}
                        {{--<a class="view view_more content1">--}}
                            {{--<i class="fa fa-clone fa_icon" aria-hidden="true"></i>--}}
                            {{--<span class="clearfix content_txt">View More</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3 content_txt1">--}}
                        {{--<a class="view view_more content1">--}}
                            {{--<i class="fa fa-clone fa_icon" aria-hidden="true"></i>--}}
                            {{--<span class="clearfix content_txt">View More</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

        <div class="section-title text-center mb-5">
                <h2 class="heading_provide">What We Provide?</h2>
                <div class="container heading_border"></div>
                <p class="border_para_heading"> We give you the lowest prices on all your grocery needs.</p>
            </div>
            <div class="container">
                <div class="col-sm-3">
                    <div class="row row1_border">
                        <div class="mt-4 mb-4 text-success-icon">
                            <i class="text-success mdi mdi-shopping mdi-48px"></i></div>
                        <h5 class="mt-3 mb-3 text-secondary">Best Prices &amp; Offers</h5>
                        <p class="text_para">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div>

                    <div class="row row1_border">
                        <div class="mt-4 mb-4 text-success-icon"><i class="text-success mdi mdi-earth mdi-48px"></i></div>
                        <h5 class="mb-3 text-secondary">Wide Assortment</h5>
                        <p class="text_para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text eve.</p>
                    </div>

                    <div class="row ">
                        <div class="mt-4 mb-4 text-success-icon"><i class="text-success mdi mdi-refresh mdi-48px"></i></div>
                        <h5 class="mt-3 mb-3 text-secondary">Easy Returns</h5>
                        <p class="text_para">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using.</p>
                    </div>

                </div>
                <div class="col-sm-6 center_div">
                    <div class="div1">
                        <img class="center_image" src="images/about_organic_dolchi.jpg" />
                        <img class="center_para_img" src="images/about_dolchi.png"/>
                    </div>
                    <div class="div2">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row row1_border">
                        <div class="mt-4 mb-4 text-success-icon"><i class="text-success mdi mdi-truck-fast mdi-48px"></i></div>
                        <h5 class="mb-3 text-secondary">Free &amp; Next Day Delivery</h5>
                        <p class="text_para">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC.</p>
                    </div>
                    <div class="row row1_border">
                        <div class="mt-4 mb-4 text-success-icon"><i class="text-success mdi mdi-basket mdi-48px"></i></div>
                        <h5 class="mt-3 mb-3 text-secondary">100% Satisfaction Guarantee</h5>
                        <p class="text_para">There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form, by injected humour.</p>
                    </div>
                    <div class="row">
                        <div class="mt-4 mb-4 text-success-icon"><i class="text-success mdi mdi mdi-tag-heart mdi-48px"></i></div>
                        <h5 class="mt-3 mb-3 text-secondary">Great Daily Deals Discount</h5>
                        <p class="text_para">It is a long established fact that a reader will be distracted by the
                            readable content of a page when looking at its layout. The point of using.</p>
                    </div>
                </div>
            </div>
    </section>
       @include('web.layouts.footer')
@stop