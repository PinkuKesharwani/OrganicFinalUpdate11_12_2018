<?php

namespace App\Http\Controllers;

use App\ItemMaster;
use App\RecipeIngredient;
use App\RecipeInstruction;
use App\RecipeMaster;
use App\UserMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class RecipeController extends Controller
{
    public function my_recipe_list(Request $request)
    {
//        echo $_REQUEST;
//        echo request('type');
        if (isset($_SESSION['user_master'])) {
            $user_ses = $_SESSION['user_master'];
            $user = UserMaster::find($user_ses->id);
            $items = ItemMaster::where(['is_active' => 1])->get();
            $recipes = RecipeMaster::where(['created_by' => $user->id, 'is_active' => 1])->orderBy('id', 'desc')->get();
            return view('web.myrecipe')->with(['user' => $user, 'recipes' => $recipes, 'items' => $items, 'type' => request('type')]);
        } else {
            return Redirect::back()->withInput()->withErrors(array('message' => 'Please login first'));
        }
    }

    public function recipe_list()
    {
        return view('web.recipelist');
    }

    public function recipe_store(Request $request)
    {
        if ($request->file('image') == null) {
            return redirect('myrecipe?type=new')->withInput()->withErrors(array('message' => 'Please select recipe image'));
        } else {
            $rec = new RecipeMaster();
            $rec->title = request('recipe_title');
            $rec->desciption = request('benefits');
//        $rec->preparation_time = request('preparation_time');
            $rec->cooking_time = request('cooking_time');
            $rec->difficulty_level = request('difficulty_level');
            $rec->serve_count = request('serve_count');
//        $rec->recipe_category_id = request('recipe_category_id');
            $rec->created_by = $_SESSION['user_master']->id;

//        $destinationPath = 'recipe';
            $file = $request->file('image');
            if ($request->file('image') != null) {
                $destination_path = 'recipe/';
                $filename = str_random(6) . '_' . $file->getClientOriginalName();
                $file->move($destination_path, $filename);
                $rec->image = $destination_path . $filename;
            }

            $rec->save();

            if (request('ingredient') != null) {
                foreach (array_combine(request('ingredient'), request('quantity')) as $ing => $qty) {
                    if ($ing != 'Other') {
//                    $recIng = RecipeIngredient::where(['rec_id' => $rec->id, 'product_id' => $ing])->first();
//                    if (isset($recIng) > 0) {
//                        $recIng->qty = $qty;
//                        $recIng->save();
//                    } else {
                        $ctgry = new RecipeIngredient();
                        $ctgry->rec_id = $rec->id;
                        $ctgry->ingrediant = null;
                        $ctgry->product_id = $ing;
                        $ctgry->qty = $qty;
                        $ctgry->save();
//                    }
                    }
                }
            }
            if (request('otr_ingredient') != null) {
                foreach (array_combine(request('otr_ingredient'), request('otr_ingredient_qty')) as $ingredients => $qty) {
//                $recIns = RecipeIngredient::where(['rec_id' => $rec->id, 'ingrediant' => $ing])->first();
//                if (isset($recIns) > 0) {
//                    $recIns->qty = $qty;
//                    $recIns->save();
//                } else {
//                echo $ing.$qty;
                    $ctgryOther = new RecipeIngredient();
                    $ctgryOther->rec_id = $rec->id;
                    $ctgryOther->ingrediant = $ingredients;
                    $ctgryOther->product_id = null;
                    $ctgryOther->qty = $qty;
                    $ctgryOther->save();
//                }
                }
            }

            if (request('instruction') != null) {
                foreach (request('instruction') as $instruction) {
                    $ctgryIns = new RecipeInstruction();
                    $ctgryIns->rec_id = $rec->id;
                    $ctgryIns->instruction = $instruction;
                    $ctgryIns->save();
                }
            }
            return redirect('myrecipe?type=list')->with('message', 'Your recipe has been submitted...');
        }
    }

    public function recipe_delete()
    {
        $recipe = RecipeMaster::find(request('recipe_id'));
        $recipe->is_active = 0;
        $recipe->save();
        echo 'success';
    }

    public function view_recipe($id)
    {
        $recipe = RecipeMaster::find($id);
        $recIng = RecipeIngredient::where(['rec_id' => $id])->first();
        $similar_recipes = $recipes = DB::select("SELECT * from recipe_master where is_active= 1 and id in (SELECT rec_id FROM `recipe_ingredients` WHERE product_id = $recIng->product_id)");
        return view('web.view_recipe')->with(['recipe' => $recipe, 'similar_recipes' => $similar_recipes]);
    }

    public function allreciepe($id)
    {  $tee = decrypt($id);
        if ($tee == 1) {
            return view('adminview.reciepe');
        }
    }

    public function approvereciepe()
    {
        try {
            $rdata = array(
                'is_approved' => 'approved',
            );
            RecipeMaster::where('id', request('myid'))
                ->update($rdata);
            return 1;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function rejectRecip()
    {
        try {
            $rdata = array(
                'is_approved' => 'rejected',
                'reject_reason' => request('value'),
            );
            RecipeMaster::where('id', request('myid'))
                ->update($rdata);
            return 2;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function deleteRecip()
    {
        try {
            $rdata = array(
                'is_active' => 0,
            );
            RecipeMaster::where('id', request('myid'))
                ->update($rdata);
            return 2;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }


    public function aboutus()
    {
        return view('web.otherpages.aboutus');
    }
    public function faq()
    {
        return view('web.otherpages.faq');
    }
    public function terms()
    {
        return view('web.otherpages.terms');
    }
    public function payments()
    {
        return view('web.otherpages.payments');
    }
    public function returnpolicy()
    {
        return view('web.otherpages.returnpolicy');
    }
    public function blog()
    {
        return view('web.otherpages.blog');
    }
    public function blogdetail()
    {
        return view('web.otherpages.blogdetail');
    }
    public function contactus()
    {
        return view('web.otherpages.contactus');
    }
    public function viewmore_recipe(){
        $get_recipe_master =RecipeMaster::where(['is_active'=>'1','id'=>request('id')])->first();
//        echo $get_recipe_master;
        return view('adminview.view_recipe_detail')->with(['data'=>$get_recipe_master]);
    }
    public function developers()
    {
        return view('rdevlop');
    }
}
