<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeMaster extends Model
{
    public $table = 'recipe_master';
    public $timestamps = false;

    public function rec_category()
    {
        return $this->belongsTo('App\RecipeCategory', 'recipe_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\UserMaster', 'created_by');
    }
}
