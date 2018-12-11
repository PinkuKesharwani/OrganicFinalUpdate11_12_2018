<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ItemMaster extends Model
{
    protected $table = 'item_master';
    public $timestamps = false;

    public static function getItemBycid()
    {
        $cid = request('category_id');
        $items = DB::select("SELECT im.* FROM item_master im, item_category ic where im.id=ic.item_master_id and ic.category_id=$cid");
        $numrows = count($items);
        $rowsperpage = 10;
        $totalpages = ceil($numrows / $rowsperpage);
        if (request('currentpage') != '' && is_numeric(request('currentpage'))) {
            $currentpage = (int)request('currentpage');
        } else {
            $currentpage = 1;  // default page number
        }

        if ($currentpage < 1) {
            $currentpage = 1;
        }
        $offset = ($currentpage - 1) * $rowsperpage;

        $s = "SELECT im.* FROM item_master im, item_category ic where im.id=ic.item_master_id and ic.category_id=$cid ORDER BY im.id DESC LIMIT $offset,$rowsperpage";
//        echo $s;
        $items = DB::select($s);
        $results = array();
        foreach ($items as $item) {
            $product_prices = ItemPrice::where(['item_master_id' => $item->id])->get();
            $product_images = ItemImages::where(['item_master_id' => $item->id])->get();
            $product_review = Review::where(['item_master_id' => $item->id, 'is_approved' => 1])->get();
            $categories = DB::select("select ic.id as category_id, ic.name from category_master ic where ic.id in (select DISTINCT category_id from item_category where is_active = 1 and item_master_id = $item->id)");

            $results[] = ['id' => $item->id, 'name' => $item->name, 'is_active' => $item->is_active, 'description' => $item->description, 'usage' => $item->usage, 'specifcation' => $item->specifcation, 'ingredients' => $item->ingredients, 'nutrients' => $item->nutrients, 'delivery' => $item->delivery, 'item_images' => $product_images, 'item_prices' => $product_prices, 'product_review' => $product_review, 'item_category' => $categories];

        }
        return $results;
    }

    public static function getItemByid()
    {
        $item_id = request('item_id');
        $results = array();
        $products = ItemMaster::where(['is_active' => 1, 'id' => $item_id])->get();
        $product_prices = ItemPrice::where(['item_master_id' => $item_id])->get();
        $product_images = ItemImages::where(['item_master_id' => $item_id])->get();
        $product_review = Review::where(['item_master_id' => $item_id, 'is_approved' => 1])->get();
        $categories = DB::select("select ic.id as category_id, ic.name from category_master ic where ic.id in (select DISTINCT category_id from item_category where is_active = 1 and item_master_id = $item_id)");

        foreach ($products as $item) {
            $results[] = ['id' => $item->id, 'name' => $item->name, 'is_active' => $item->is_active, 'description' => $item->description, 'usage' => $item->usage, 'specifcation' => $item->specifcation, 'ingredients' => $item->ingredients, 'nutrients' => $item->nutrients, 'delivery' => $item->delivery, 'item_images' => $product_images, 'item_prices' => $product_prices, 'product_review' => $product_review, 'item_category' => $categories];
        }
        return $results;
    }

    public static function getAllItems()
    {
        $results = array();
        $products = ItemMaster::where(['is_active' => 1])->get();
        foreach ($products as $item) {
            $item_id = $item->id;
            $product_prices = ItemPrice::where(['item_master_id' => $item_id])->get();
            $product_images = ItemImages::where(['item_master_id' => $item_id])->get();
            $product_review = Review::where(['item_master_id' => $item_id, 'is_approved' => 1])->get();
            $categories = DB::select("select ic.id as category_id, ic.name from category_master ic where ic.id in (select DISTINCT category_id from item_category where is_active = 1 and item_master_id = $item_id)");
            $results[] = ['id' => $item->id, 'name' => $item->name, 'is_active' => $item->is_active, 'description' => $item->description, 'usage' => $item->usage, 'specifcation' => $item->specifcation, 'ingredients' => $item->ingredients, 'nutrients' => $item->nutrients, 'delivery' => $item->delivery, 'item_images' => $product_images, 'item_prices' => $product_prices, 'product_review' => $product_review, 'item_category' => $categories];
        }
        return $results;
    }
}
