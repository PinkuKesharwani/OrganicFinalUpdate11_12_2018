<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::GET('lgt', function () {
    session_start();
    $_SESSION['admin_master'] = null;
    $_SESSION['user_master'] = null;
    return redirect('/access');
});
Route::GET('logout', function () {
    session_start();
    $_SESSION['admin_master'] = null;
    $_SESSION['user_master'] = null;
    return redirect('/');
});
Route::get('/', 'FrontendController@user_home');
Route::get('my_profile', 'FrontendController@my_profile');
Route::get('product_list', 'FrontendController@product_list');
Route::get('order_list', 'FrontendController@order_list');
Route::get('product_feedback', 'FrontendController@product_feedback');
Route::post('submit_feedback', 'FrontendController@submit_feedback');
Route::get('mycart', 'FrontendController@mycart');
Route::get('checkout', 'FrontendController@checkout');
Route::get('pd', 'FrontendController@product_details');
Route::get('view_product/{slug}', 'FrontendController@product_details');
Route::get('view_product_search/{id}', 'FrontendController@view_product_search');
Route::get('/wishlist', 'FrontendController@wishlist');

Route::get('get_shop_points', 'FrontendController@get_shop_points');

Route::get('clear-cache', function () {
    try {
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('config:cache');
        return ['success' => true, 'data' => [], 'message' => 'Cache Has Been Clear'];
    }catch (Exception $ex){
        return ['success' => false, 'data' => [], 'message' => $ex->getMessage()];
    }
});
//Route::post('login', 'FrontendController@login');
Route::get('register_user', 'User_loginController@register');
Route::get('login_user', 'User_loginController@login');
//Route::get('checkrc', 'LoginController@checkrc');
Route::get('checkno', 'User_loginController@checkno');
Route::get('checkemail', 'User_loginController@checkemail');
Route::get('verify_otp', 'User_loginController@verify_otp');
Route::get('forgot_password', 'User_loginController@forgot_password');


Route::post('profile_update', 'FrontendController@profile_update');
Route::get('removeProfile', 'FrontendController@removeProfile'); //Profile
Route::get('getexistaddress', 'FrontendController@getexistaddress');
Route::get('address_update', 'FrontendController@address_update');
Route::post('change_p', 'FrontendController@change_password');
Route::post('confirm_order', 'FrontendController@confirm_order');

Route::get('web_check_promo', 'FrontendController@web_check_promo');

Route::get('search_product', 'FrontendController@search_product');


Route::get('cart_load', 'CartController@cartload');
Route::get('wishlist_load', 'CartController@wishlist_load');
Route::post('cart_update/{id}', 'CartController@cart_update');
Route::get('addtocart', 'CartController@addtocart');
Route::get('addtowishlist', 'CartController@addtowishlist');
Route::get('cart_delete', 'CartController@delete');
Route::get('wishlist_delete', 'CartController@wishlist_delete');
Route::get('wishlist_item_delete', 'CartController@wishlist_item_delete');


Route::get('view_item', 'FrontendController@view_item');
Route::get('getmoreproducts', 'FrontendController@getmoreproducts');
Route::get('getShortproducts', 'FrontendController@getShortproducts');
Route::get('getallproducts', 'FrontendController@getallproducts');

Route::get('/payment', 'CartController@payment');
Route::post('success', 'CartController@payment_success');
Route::post('failed', 'CartController@payment_failed');
Route::get('blogs', 'FrontendController@blog_list');
Route::get('view_blog/{slug}', 'FrontendController@view_blog');

Route::get('/blog', 'BlogController@blog');
Route::get('/addblogcat', 'BlogController@addblogcat');
Route::get('/blogpost', 'BlogController@blogpost');
Route::post('/blogpic', 'BlogController@blogpic');
Route::get('myrecipe', 'RecipeController@my_recipe_list');
Route::post('recipe_store', 'RecipeController@recipe_store');
Route::get('recipe_delete', 'RecipeController@recipe_delete');
Route::get('/recipelist', 'RecipeController@recipe_list');
Route::get('notify', 'FrontendController@notify');
Route::get('subscribe', 'FrontendController@subscribe');
Route::get('view_recipe/{id}', 'RecipeController@view_recipe');


/*************API******************/
Route::get('getCategory', 'APIController@getCategory');
Route::get('getItem_bycid', 'APIController@get_item_by_cid');
Route::get('getItem', 'APIController@get_item_by_id');
Route::get('getAllItem', 'APIController@get_All_item');
Route::get('getlogin', 'APIController@getlogin');
Route::get('verifyotp', 'APIController@verify_otp');
Route::get('forgotpassword', 'APIController@forgot_password');
Route::get('resend_otp', 'APIController@resend_otp');
Route::get('searchCategory', 'APIController@searchCategory');
Route::post('getregister', 'APIController@getregister');
Route::get('change_password', 'APIController@change_password');
Route::post('edit_profile', 'APIController@edit_profile');
Route::post('insert_user_address', 'APIController@insert_user_address');
Route::post('update_user_address', 'APIController@update_user_address');
Route::get('getaddress', 'APIController@getaddress');
Route::get('getaddressbyid', 'APIController@getaddressbyid');

Route::post('insert_review', 'APIController@insert_review');
Route::get('getreview', 'APIController@getreview');
Route::get('delivery_charge', 'APIController@delivery_charge');
Route::get('searchitem', 'APIController@searchitem');
Route::get('check_promo', 'APIController@check_promo');
Route::post('confirm_checkout', 'APIController@confirm_checkout');
Route::get('getOrders', 'APIController@getOrders');
/*************API******************/
/////////////////////////////////******Aditya***********/////////////////////////////////////////////////////////////////////////

///////////////////////////////admin/////////////////////////////////////////////////////////////////////////////////////////
Route::get('/admin', 'AdminController@admin');
Route::get('access', 'AdminController@adminlogin');
Route::get('organic/{id}/admin', 'AdminController@admin');
Route::get('/adminlogin', 'AdminController@adminlogin');
Route::get('/logincheck', 'AdminController@logincheck');
/////////////////////******Category*****///////////////////////////////////////////////////////////////////////////////
Route::get('organic/{id}/category', 'AdminController@category');
Route::post('add_cat', 'CrudController@add_cat');
Route::post('updatecat', 'CrudController@updatecat');
Route::post('deletecat', 'CrudController@deletecat');
/////////////////////////*******item******//////////////////////////////////////////////////////////////////
Route::get('organic/{id}/items', 'ItemmasterController@items');
Route::get('/send_cat_price', 'ItemmasterController@send_cat_price');
Route::get('/update_item', 'ItemmasterController@update_item');
Route::post('mypost', 'ItemmasterController@itemsadd');
Route::get('itemshow/{id}', 'ItemmasterController@itemshow');
Route::get('edit_item_show/{id}', 'ItemmasterController@edit_item_show');
Route::get('deactivate_item', 'ItemmasterController@deactivate_item');
Route::get('activatemy_item', 'ItemmasterController@activatemy_item');
Route::post('itemeditpost', 'ItemmasterController@itemeditpost');
Route::get('searchtable', 'ItemmasterController@searchtable');
/////////////////////////////////////////api///////////////////////////////////////////////////////
/*Route::get('firstapi', 'ItemmasterController@apishowall');*/
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('organic/{id}/userlist', 'User_loginController@userlist');
Route::get('/deactivate_user', 'User_loginController@deactivate_user');
Route::get('/activate_user_cod', 'User_loginController@activate_user_cod');
Route::get('/deactivate_user_cod', 'User_loginController@deactivate_user_cod');
Route::get('/activate_user', 'User_loginController@activate_user');
Route::get('/usershow/{id}', 'User_loginController@usershow');
Route::get('/user_details/{id}', 'User_loginController@user_details');
////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('organic/{id}/review', 'ReviewController@review');
Route::get('/activate_review', 'ReviewController@activate_review');
Route::get('/un_activate_review', 'ReviewController@un_activate_review');
///////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('organic/{id}/orderlist', 'OrderController@orderlist');
Route::get('/ordered', 'OrderController@ordered');
Route::get('/packed', 'OrderController@packed');
Route::get('/shipped', 'OrderController@shipped');
Route::get('/delivered', 'OrderController@delivered');
Route::get('/active_order', 'OrderController@active_order');
Route::get('/inactive_order', 'OrderController@inactive_order');
Route::get('/cancle_order', 'OrderController@update_cancelled');
Route::get('/more_order/{id}', 'OrderController@more_order');
Route::get('/bill_order/{id}', 'OrderController@bill_order');
Route::get('delete_item_pic', 'ItemmasterController@delete_item_pic');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('organic/{id}/statelist', 'StateController@statelist');
Route::get('/add_state', 'StateController@add_state');
Route::get('/update_state', 'StateController@update_state');
Route::get('/delete_state', 'StateController@delete_state');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('organic/{id}/citylist', 'CityController@citylist');
Route::get('/add_city', 'CityController@add_city');
Route::get('/add_updatecity', 'CityController@add_updatecity');
Route::get('/delete_city', 'CityController@delete_city');
////////////////////////////////*********Settings***********///////////////////////////////////////////////////////////////////////////////////////////
Route::get('/settings/{id}', 'SettingController@settings');
Route::get('/changepass', 'SettingController@changepass');
Route::post('myadminpost', 'SettingController@myadminpost');
//////////////////////////////////////*********delivery*************////////////////////////////////////////////////////////////////////////////////////////

Route::get('organic/{id}/delivery', 'DeliveryController@delivery');
Route::get('/add_delivery', 'DeliveryController@add_delivery');
Route::get('/update_delivery', 'DeliveryController@update_delivery');
Route::get('/delete_del', 'DeliveryController@delete_del');

/***************************Bijendra*******************************/
/******Brands******/
Route::get('organic/{id}/brand', 'BrandController@brands');
Route::get('/add_brand', 'BrandController@add_brand');
Route::get('/update_brand', 'BrandController@update_brand');
Route::get('/delete_brand', 'BrandController@delete_brand');
/******Brands******/

/******ShopPoints******/
Route::get('organic/{id}/shop_points', 'ShopPointsController@shop_points');
Route::get('/add_shop_points', 'ShopPointsController@add_shop_points');
Route::get('/update_shop_points', 'ShopPointsController@update_shop_points');
Route::get('/delete_shop_points', 'ShopPointsController@delete_shop_points');
/******ShopPoints******/

Route::get('/ask_number','AskController@ask_number');
/***************************Bijendra*******************************/


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('organic/{id}/ask', 'AskController@ask');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('organic/{id}/blog', 'BlogController@blog');
Route::get('/addblogcat', 'BlogController@addblogcat');
Route::get('/blogpost', 'BlogController@blogpost');
Route::get('/upblogpost', 'BlogController@upblogpost');
Route::post('/blogpic', 'BlogController@blogpic');
//////////////////////////////////////////////////////////////////////////////////////
Route::get('/myrecipe', 'RecipeController@my_recipe_list');
Route::get('/recipelist', 'RecipeController@recipe_list');
Route::get('/updateblog/{id}', 'BlogController@updateblog');
Route::get('/approvereciepe', 'RecipeController@approvereciepe');
Route::get('/rejectRecip', 'RecipeController@rejectRecip');
Route::get('/deleteRecip', 'RecipeController@deleteRecip');
Route::get('viewmore_recipe', 'RecipeController@viewmore_recipe');
Route::get('organic/{id}/allreciepe', 'RecipeController@allreciepe');
//////////////////////////////////////////////////////////////////////////////////////////////
Route::get('organic/{id}/testimonials', 'TestimonialsController@list');
Route::get('/addtstimonials', 'TestimonialsController@addtstimonials');
Route::get('/inactivetest', 'TestimonialsController@inactivetest');
Route::get('/activetest', 'TestimonialsController@activetest');
Route::get('/deletetest', 'TestimonialsController@deletetest');
Route::get('organic/{id}/subscribe', 'SubscribeController@view');
//////////////////////////////////////////////////////////////////////////////////////////////

Route::get('organic/{id}/rollmastermenu', 'RollmasterController@view');
Route::get('/postrollmaster', 'RollmasterController@postrollmaster');
Route::get('/postrollmasterupdate', 'RollmasterController@postrollmasterupdate');
Route::get('/getfullrole/{id}', 'RollmasterController@getfullrole');


/////////////////////////////////////////////Outer rought/////////////////////////////////////////////////
Route::get('/aboutus', 'RecipeController@aboutus');
Route::get('/faq', 'RecipeController@faq');
Route::get('/terms', 'RecipeController@terms');
Route::get('/payments', 'RecipeController@payments');
Route::get('/returnpolicy', 'RecipeController@returnpolicy');
Route::get('/blog', 'RecipeController@blog');
Route::get('/blogdetail', 'RecipeController@blogdetail');
Route::get('/contactus', 'RecipeController@contactus');


///////////////////////////////////////////////////////////////////
Route::get('/developers', 'RecipeController@developers');
Route::get('/check_user_address', 'CityController@check_user_address');