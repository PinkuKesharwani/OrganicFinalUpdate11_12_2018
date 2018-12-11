@extends('web.layouts.e_master')

@section('title', 'Organic Food : Recipe Details')

@section('head')

@stop
@section('content')
    <section class="product_section">
        <div class="container">
            <div class="view_recipe_mainbox">
                <div class="col-sm-8">
                    <div class="recipe_view_container">
                        <div class="view_recipe_imgbox">
                            @if(file_exists(url('').'/'.$recipe->image))
                                <img class="view_rec_img" src="{{url('').'/'.$recipe->image}}"/>
                            @else
                                <img class="view_rec_img" src="{{url('recipe/default_recipe.png')}}"/>
                            @endif
                        </div>

                        <div class="recipe_details_box">
                            <div class="recipe_view_title">{{$recipe->title}}</div>
                            <div class="carousal_head">
                                <span class="filter_head_txt slider_headtxt">Benefits</span>
                            </div>
                            <div class="benefits_txt">
                                {!! $recipe->desciption !!}
                            </div>
                            @php
                                $recipe_ingredients = \App\RecipeIngredient::where(['rec_id'=>$recipe->id])->get();
                                $recipe_instructions = \App\RecipeInstruction::where(['rec_id'=>$recipe->id])->get();
                            $step_count = 1;
                            @endphp
                            <div class="row view_row">
                                <div class="col-sm-5">
                                    <div class="carousal_head">
                                        <span class="filter_head_txt slider_headtxt"><i
                                                    class="mdi mdi-view-list basic_icon_margin"></i>Ingredients</span>
                                    </div>
                                    <ul class="ingre_ul list-unstyled">
                                        @if(count($recipe_ingredients)>0)
                                            @foreach($recipe_ingredients as $recipe_ingredient)
                                                <li>
                                                    <span class="ingre_name">{{isset($recipe_ingredient->product_id)?$recipe_ingredient->product->name:$recipe_ingredient->ingrediant}}</span><span
                                                            class="ingre_weight">{{$recipe_ingredient->qty}}</span></li>
                                            @endforeach
                                        @endif
                                        {{--<li><span class="ingre_name">Chana</span><span
                                                    class="ingre_weight">200 Gms</span></li>
                                        <li><span class="ingre_name">Daliya</span><span
                                                    class="ingre_weight">300 Gms</span></li>
                                        <li><span class="ingre_name">Baisan</span><span class="ingre_weight">1 KG</span>
                                        </li>
                                        <li><span class="ingre_name">Honey</span><span
                                                    class="ingre_weight">50 Gms</span></li>
                                        <li><span class="ingre_name">Oil</span><span class="ingre_weight">500 Ml</span>
                                        </li>--}}
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <div class="carousal_head">
                                        <span class="filter_head_txt slider_headtxt"><i
                                                    class="mdi mdi-sort-ascending basic_icon_margin"></i>Steps</span>
                                    </div>
                                    @if(count($recipe_instructions)>0)
                                        <ul class="staps_ul list-unstyled">
                                            @foreach($recipe_instructions as $recipe_instruction)
                                                <li>
                                                    <div class="stap_count">{{$step_count}}</div>
                                                    <div class="stap_txt">{{$recipe_instruction->instruction}}</div>
                                                </li>
                                                @php
                                                    $step_count++;
                                                @endphp
                                            @endforeach
                                            {{--<li>
                                                <div class="stap_count">2</div>
                                                <div class="stap_txt">Mix chicken broth, beef broth, red wine and
                                                    Worcestershire sauce into pot. Bundle the parsley, thyme, and bay leaf
                                                    with twine and place in pot.
                                                </div>
                                            </li>
                                            <li>
                                                <div class="stap_count">3</div>
                                                <div class="stap_txt">Preheat oven broiler. Arrange bread slices on a baking
                                                    sheet and broil 3 minutes, turning once, until well toasted on both
                                                    sides. Remove from heat; do not turn off broiler.
                                                </div>
                                            </li>
                                            <li>
                                                <div class="stap_count">4</div>
                                                <div class="stap_txt">Preheat oven broiler. Arrange bread slices on a baking
                                                    sheet and broil 3 minutes, turning once, until well toasted on both
                                                    sides. Remove from heat; do not turn off broiler.
                                                </div>
                                            </li>
                                            <li>
                                                <div class="stap_count">5</div>
                                                <div class="stap_txt">Preheat oven broiler. Arrange bread slices on a baking
                                                    sheet and broil 3 minutes, turning once, until well toasted on both
                                                    sides. Remove from heat; do not turn off broiler.
                                                </div>
                                            </li>--}}
                                        </ul>
                                    @else
                                        <span>< No Steps Available ></span>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order_listbox">
                        <div class="my_profile_picshow">

                            @if($recipe->user->profile_img != 'images/Male_default.png')
                                <img class="testominial_img"
                                     src="{{url('u_img').'/'.$recipe->created_by.'/'.$recipe->user->profile_img}}" />
                            @else
                                <img class="testominial_img" src="{{url('images/Male_default.png')}}" />
                            @endif
                            <div class="my_profile_name">By {{$recipe->user->name}}</div>
                        </div>
                        <hr>
                        <ul class="list-unstyled recipe_details_ul">
                            <li>
                                <div class="recipe_title">Cooking Time :</div>
                                <div class="recipe_icon_txt">
                                    <i class="mdi mdi-watch basic_icon_margin"></i>{{$recipe->cooking_time}} Min
                                </div>
                            </li>
                            <li>
                                <div class="recipe_title">Serving :</div>
                                <div class="recipe_icon_txt">
                                    <i class="mdi mdi-account basic_icon_margin"></i>{{$recipe->serve_count}} People
                                </div>
                            </li>
                            <li>
                                <div class="recipe_title">Ingredients :</div>
                                <div class="recipe_icon_txt">
                                    <i class="mdi mdi-account basic_icon_margin"></i> {{count($recipe_ingredients)}}
                                    Items
                                </div>
                            </li>
                            <li>
                                <div class="recipe_title">Difficulty Level :</div>
                                <div class="recipe_icon_txt">
                                    <i class="mdi mdi-star-outline basic_icon_margin"></i>{{$recipe->difficulty_level}}
                                </div>
                            </li>
                            <li>
                                <div class="recipe_title">Created :</div>
                                <div class="recipe_icon_txt">
                                    <i class="mdi mdi-calendar basic_icon_margin"></i>{{$recipe->created_time}}
                                </div>
                            </li>


                        </ul>
                    </div>

                    <div class="order_listbox">
                        <div class="carousal_head">
                            <span class="filter_head_txt slider_headtxt">Similar Recipes</span>
                        </div>
                        <div class="similiour_recipe_box">
                            @if(count($similar_recipes)>0)
                                @foreach($similar_recipes as $similar_recipe)
                                    <div class="simi_row">
                                        <div class="simi_img_box">
                                            @if(isset($similar_recipe->image)&&!file_exists(url('').'/'.$similar_recipe->image))
                                                <img class="simi_img" src="{{url('').'/'.$similar_recipe->image}}"/>
                                            @else
                                                <img class="simi_img" src="{{url('recipe/default_recipe.png')}}"/>
                                            @endif
                                            <div class="simi_title">
                                                <a href="{{url('view_recipe').'/'.$similar_recipe->id}}">{{$similar_recipe->title}}</a>
                                            </div>
                                        </div>
                                        {{-- <div class="simi_row">
                                             <div class="simi_img_box">
                                                 <img class="simi_img" src="{{url('images/product_12.jpg')}}"></div>
                                             <div class="simi_title">
                                                 <a>Chilled mocha</a>
                                             </div>
                                         </div>
                                         <div class="simi_row">
                                             <div class="simi_img_box">
                                                 <img class="simi_img" src="{{url('images/product_11.jpg')}}"></div>
                                             <div class="simi_title">
                                                 <a>Mix Vag Biryani</a>
                                             </div>
                                         </div>--}}

                                    </div>
                                @endforeach
                            @else
                                <div class="simi_row">
                                    No Similar Recipes Available
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
    </section>
    @include('web.layouts.footer')
@stop