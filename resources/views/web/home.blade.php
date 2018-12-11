@extends('web.layouts.e_master')
@section('title', 'Organic Food : Home')
@section('head')
    <link rel="stylesheet" id="boldthemes_fonts-css"
          href="https://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CPlayfair+Display%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic%7CRaleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100italic%2C200italic%2C300italic%2C400italic%2C500italic%2C600italic%2C700italic%2C800italic%2C900italic&amp;subset=latin%2Clatin-ext&amp;ver=1.0.0"
          type="text/css" media="all" data-viewport-units-buggyfill="ignore"/>
    <script type="text/javascript">
        function RedirectProduct() {
            window.location.replace("{{url('product_list')}}");
        }
        $(document).ready(function () {
            setTimeout(function () {
                debugger;
                if($('#loginSignup_popup').is('block'))
                {
                   // alert('visible');
                }
                else {
                    //alert('redirect');
                    window.location.replace("{{url('product_list')}}");
                }
            }, 15000);
        });
    </script>
@stop

@section('content')
    <section class="home_about" onclick="RedirectProduct();">
        <div class="container">
            <div class="main_heading">
                <div class="main_head_txt">
                    Welcome To Organic Dolchi
                </div>
                <div class="main_subhead">
                    We produce Food In a Way Which Is Honest, Natural & Transparent.
                </div>
            </div>
            <div class="view_center_btn text-center">
                <a href="{{url('product_list')}}" class="btn btn-success view_product">
                    <i class="mdi mdi mdi-basket view_product_icon"></i> Move To Store</a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="collection_about_brics">
                    <div class="icons_block">
                        <div class="gamba-circles">
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle"></div>
                        </div>
                        <i class="about_icons flaticon-broccoli"></i>
                    </div>
                    <div class="about_heading">100% Natural</div>
                    <div class="about_basic_txt">
                        We care about what you eat. We want to produce food which nourishes your body and tastes
                        delicious.
                    </div>
                </div>
                <div class="collection_about_brics">
                    <div class="icons_block">
                        <div class="gamba-circles">
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle"></div>
                        </div>
                        <i class="about_icons flaticon-groceries"></i>
                    </div>
                    <div class="about_heading">Organic Products</div>
                    <div class="about_basic_txt">
                        We care about what you eat. We want to produce food which nourishes your body and tastes
                        delicious.
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-6 tab_display_none">
                <div class="center_about_img">
                    <img src="{{url('images/center_food_collection.jpg')}}"/>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 col-md-4">
                <div class="collection_about_brics">
                    <div class="icons_block">
                        <div class="gamba-circles">
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle"></div>
                        </div>
                        <i class="about_icons flaticon-lemon"></i>
                    </div>
                    <div class="about_heading">Always Fresh</div>
                    <div class="about_basic_txt">
                        We care about what you eat. We want to produce food which nourishes your body and tastes
                        delicious.
                    </div>
                </div>
                <div class="collection_about_brics">
                    <div class="icons_block">
                        <div class="gamba-circles">
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle"></div>
                        </div>
                        <i class="about_icons flaticon-flour"></i>
                    </div>
                    <div class="about_heading">Best Quality</div>
                    <div class="about_basic_txt">
                        We care about what you eat. We want to produce food which nourishes your body and tastes
                        delicious.
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop