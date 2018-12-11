<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    public $table = 'recipe_ingredients';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\ItemMaster', 'product_id');
    }
}
