<?php $recipe_ingredients = \App\RecipeIngredient::where(['rec_id' => $data->id])->get(); ?>
<?php $recipe_instruction = \App\RecipeInstruction::where(['rec_id' => $data->id])->get(); ?>
{{--<span style="font-size: 25px">{{$data->created_by}}</span>--}}
<div class="news_containner style-scroll">

    <table class="table table-bordered margin0">
        <tbody>
        <tr>
            <td class="width_35 title-more">Recipe By :</td>
            <td class="width_65" id="recipe_title">
                {{$data->user->name}}
            </td>
        </tr>
        <tr>
            <td class="width_35 title-more">Recipe Title :</td>
            <td class="width_65" id="recipe_title">
                {{$data->title}}
            </td>
        </tr>
        <tr>
            <td class="width_35 title-more">Cooking Time :</td>
            <td class="width_65" id="recipe_time">{{$data->cooking_time}}
            </td>
        </tr>
        <tr>
            <td class="width_35 title-more">People Serves :</td>
            <td class="width_65" id="adver_date">{{$data->serve_count}}</td>
        </tr>
        <tr>
            <td class="width_35 title-more">Difficulty Level :</td>
            <td class="width_65" id="adver_date">{{$data->difficulty_level}}</td>
        </tr>
        <tr>
            <td class="width_35 title-more">Discription :</td>
            <td class="width_65" id="recipe_des">{{$data->desciption}}</td>
        </tr>
        <tr>
            <td class="width_35 title-more">Ingredient :</td>
            <td class="width_65" id="recipe_ingradient">
                @foreach($recipe_ingredients as $index=>$ingredients)
                    @if($ingredients->product_id!=null)
                        {{\App\ItemMaster::where(['id'=>$ingredients->product_id])->first()->name}}
                        ({{$ingredients->qty}}),<br/>
                    @endif
                    {{--{{$names[0]->product_name}}--}}
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="width_35 title-more">Instruction</td>
            <td class="width_65">
                @foreach($recipe_instruction as $instruction )
                    {{$instruction->instruction}},<br/>
                @endforeach
            </td>
        </tr>

        </tbody>
    </table>
    <div class="recipe_img" id="recipe_append_img">
        <img src="{{url('/').$data->image}}" id="recipe_image">
    </div>
</div>
