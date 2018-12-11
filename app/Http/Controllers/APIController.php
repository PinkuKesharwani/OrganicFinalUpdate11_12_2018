<?php

namespace App\Http\Controllers;

use App\CategoryMaster;
use App\ItemImages;
use App\ItemMaster;
use App\ItemPrice;
use App\OrderDescription;
use App\OrderMaster;
use App\Review;
use App\UserAddress;
use App\UserMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class APIController extends Controller
{

    /**************Rest API Function**************/
    public function sendResponse($result, $message)
    {
        $response = [
            'status' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'status' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    /**************Rest API Function**************/

    public function searchCategory()
    {
        $s = request('search_name');
        $categories = DB::select("SELECT id, name FROM category_master WHERE name LIKE '$s%' and is_active = 1");
        if (count($categories) > 0) {
            return $this->sendResponse($categories, 'Category List');
        } else {
            return $this->sendError('No Category available', '');
        }
    }

    public function getCategory()
    {
        $categories = CategoryMaster::where(['is_active' => 1])->get();
        if (count($categories) > 0) {
            return $this->sendResponse($categories, 'Category List');
        } else {
            return $this->sendError('No Category available', '');
        }
    }

    public function get_item_by_cid(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $items = ItemMaster::getItemBycid();
        if (count($items) > 0) {
            return $this->sendResponse($items, 'Item List');
        } else {
            return $this->sendError('No Item available', '');
        }
    }


    public function get_item_by_id(Request $request)
    {
        $items = ItemMaster::getItemByid();
        if (count($items) > 0) {
            return $this->sendResponse($items, 'Item List');
        } else {
            return $this->sendError('No Item available', '');
        }
    }


    public function get_items(Request $request)
    {
        $items = ItemMaster::getItemBycid();
        if (count($items) > 0) {
            return $this->sendResponse($items, 'Item List');
        } else {
            return $this->sendError('No Item available', '');
        }
    }

    public function get_All_item(Request $request)
    {
        $allitems = ItemMaster::where(['is_active' => 1])->get();
        $numrows = count($allitems);
        $rowsperpage = 10;
        $totalpages = ceil($numrows / $rowsperpage);
        if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
            $currentpage = (int)$_GET['currentpage'];
        } else {
            $currentpage = 1;  // default page number
        }
        if ($currentpage < 1) {
            $currentpage = 1;
        }
        $offset = ($currentpage - 1) * $rowsperpage;
        $s = "SELECT * FROM `item_master` where is_active = 1 ORDER BY id DESC LIMIT $offset,$rowsperpage";
        $items = DB::select($s);

        if (count($items) > 0) {
            $results = array();
            foreach ($items as $item) {
                $item_id = $item->id;
                $product_prices = ItemPrice::where(['item_master_id' => $item_id])->get();
                $product_images = ItemImages::where(['item_master_id' => $item_id])->get();
                $product_review = Review::where(['item_master_id' => $item_id, 'is_approved' => 1])->get();
                $categories = DB::select("select ic.id as category_id, ic.name from category_master ic where ic.id in (select DISTINCT category_id from item_category where is_active = 1 and item_master_id = $item_id)");
                $results[] = ['id' => $item->id, 'name' => $item->name, 'is_active' => $item->is_active, 'description' => $item->description, 'usage' => $item->usage, 'specifcation' => $item->specifcation, 'ingredients' => $item->ingredients, 'nutrients' => $item->nutrients, 'delivery' => $item->delivery, 'item_images' => $product_images, 'item_prices' => $product_prices, 'product_review' => $product_review, 'item_category' => $categories];
            }
            return $this->sendResponse($results, 'Item List');
        } else {
            return $this->sendError('No Item available', '');
        }
    }

    public function searchitem(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'item_name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $s = request('item_name');
        $product = DB::select("SELECT i.id, i.name, im.image FROM item_master i, item_images im WHERE i.id = im.item_master_id and i.name LIKE '$s%'");
        if (count($product) > 0) {
            return $this->sendResponse($product, 'Item List');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    public
    function verify_otp()
    {
        $otp = request('otp');
        $user = UserMaster::where(['otp' => $otp])->first();
        if (isset($user)) {
            $user_master = UserMaster::find($user->id);
            $user_master->is_confirmed = 1;
            $user_master->save();
            return $this->sendResponse($user_master, 'User Record');
        } else {
            return $this->sendError('Please enter correct otp', '');
        }
    }

    public function resend_otp()
    {
        $otp = rand(100000, 999999);
        $contact = request('contact');
        $user = UserMaster::where(['contact' => $contact])->first();
        if (isset($user)) {
            $user->otp = $otp;
            $user->save();
            file_get_contents("http://api.msg91.com/api/sendhttp.php?sender=CONONE&route=4&mobiles=$user->contact&authkey=213418AONRGdnQ5ae96f62&country=91&message=Dear%20user,%20OTP%20to%20verify%20your%20organicdolchi%20account%20is%20$otp");
            return $this->sendResponse($user, 'Otp has been send to your number');
        } else {
            return $this->sendError('Invalid Credentials', '');
        }
    }

    public function getlogin(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'mobile_email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $mobile_email = request('mobile_email');
        $password = md5(request('password'));
        $otp = rand(100000, 999999);
        $user = UserMaster::where(['contact' => $mobile_email, 'password' => $password])->first();
        if (isset($user)) {
            if ($user->is_active == 1) {
                if ($user->is_confirmed == 1) {
                    return $this->sendResponse($user, 'User Record');
                } else {
                    $user->otp = $otp;
                    $user->save();
//                    file_get_contents("http://api.msg91.com/api/sendhttp.php?sender=CONONE&route=4&mobiles=$user->contact&authkey=213418AONRGdnQ5ae96f62&country=91&message=Dear%20Organic%20Dolchi%20user,Your%20verification%20code%20is%20$user->otp");
                    return $this->sendResponse($user, 'Your account in not verified, verification code has been sent to your registered mobile no');
                }
            } else {
                return $this->sendError('Your account is deactivated by administrator, Please contact to organic dolchi administrator', '');
            }
        } else {
            return $this->sendError('Mobile Number or Password is Invalid', '');
        }
    }

    public
    function forgot_password()
    {
        $otp = rand(100000, 999999);
        $contact = request('contact');
        $user = UserMaster::where(['contact' => $contact])->first();
        if (isset($user)) {
            $user_master = UserMaster::find($user->id);
            $user_master->password = md5($otp);
            $user_master->save();
//            file_get_contents("http://63.142.255.148/api/sendmessage.php?usr=connectingone&apikey=A0F25813739CF5A748C8&sndr=CONONE&ph=$user->contact&message=Dear%20user,%20Password%20to%20login%20into%20connectingone%20is%20$otp");
            file_get_contents("http://api.msg91.com/api/sendhttp.php?sender=CONONE&route=4&mobiles=$user_master->contact&authkey=213418AONRGdnQ5ae96f62&country=91&message=Dear%20user,%20Password%20to%20login%20into%20connectingone%20is%20$otp");
            return $this->sendResponse($user_master, 'Password has been send to your no');
        } else {
            return $this->sendError('Please enter registered mobile no', '');

        }
    }


    public function getregister(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $useremail = UserMaster::where(['email' => request('email')])->first();
        $usermob = UserMaster::where(['contact' => request('mobile')])->first();
        if (isset($useremail)) {
            return $this->sendError('Email is already exist', '');
        } elseif (isset($usermob)) {
            return $this->sendError('Contact is already exist', '');
        } else {
            $rc = rand(10000000, 99999999);
            $otp = rand(100000, 999999);
            $data = new UserMaster();
            $data->rc = "rc" . $rc;
            $data->otp = $otp;
            $data->name = request('name');
            $data->email = request('email');
            $data->contact = request('mobile');
            $data->password = md5(request('password'));
            $data->created_at = Carbon::now('Asia/Kolkata');
            $data->save();
            if (request('ref_code') != '') {
                $this->CreateRelation(request('ref_code'), $data->id); //ref_code = user contact no
            }
            $name = str_replace(' ', '', $data->name);
            file_get_contents("http://api.msg91.com/api/sendhttp.php?sender=CONONE&route=4&mobiles=$data->contact&authkey=213418AONRGdnQ5ae96f62&country=91&message=Dear%20$name,%20OTP%20to%verify%20your%20account%20is%20$otp");

            /***********Mail************/
            $allmails = [request('email')];

            foreach ($allmails as $mail) {
                $email[] = $mail;
            }
            if (count($email) > 0) {
                $mail = new \App\Mail();
                $mail->to = implode(",", $email);
                $mail->subject = 'Organic Dolchi - Support Team';
                $siteurl = 'http://www.organicdolchi.com/';
                $username = $data->name;

                $message = '<table width="650" cellpadding="0" cellspacing="0" align="center" style="background-color:#ececec;padding:40px;font-family:sans-serif;overflow:scroll"><tbody><tr><td><table cellpadding="0" cellspacing="0" align="center" width="100%"><tbody><tr><td><div style="line-height:50px;text-align:center;background-color:#fff;border-radius:5px;padding:20px"><a href="' . $siteurl . '" target="_blank" ><img src="' . $siteurl . 'images/organic_logo.png"></a></div></td></tr><tr><td><div><img src="' . $siteurl . 'images/acknowledgement.jpg" style="height:auto;width:100%;" tabindex="0"><div dir="ltr" style="opacity: 0.01; left: 775px; top: 343px;"><div><div class="aSK J-J5-Ji aYr"></div></div></div></div></td></tr><tr><td style="background-color:#fff;padding:20px;border-radius:0px 0px 5px 5px;font-size:14px"><div style="width:100%"><h1 style="color:#007cc2;text-align:center">Thank you ' /*. $salutation . ' '*/ . $username . '</h1><p style="font-size:14px;text-align:center;color:#333;padding:10px 20px 10px 20px">Thank you for register with organicdolchi. organicdolchi.com is a Quick and easy shopping: Online/ Telephonic Call-back facility. Free Home Delivery: The products are delivered in 2 working days or less and your doorsteps. Convenient Payment Options: Payment via net banking facility, Payumoney and Indian credit/debit cards. We also accept Cash on Delivery<br/></p></div></td></tr></tbody></table></td></tr><tr><td style="padding:20px;font-size:12px;color:#797979;text-align:center;line-height:20px;border-radius:5px 5px 0px 0px">DISCLAIMER - The information contained in this electronic message (including any accompanying documents) is solely intended for the information of the addressee(s) not be reproduced or redistributed or passed on directly or indirectly in any form to any other person.</td></tr></tbody></table>';
                $mail->body = $message;
                if ($mail->send_mail()) {
                    //return redirect('mail')->withErrors('Email sent...');
                } else {
                    //return redirect('mail')->withInput()->withErrors('Something went wrong. Please contact admin');
                }

            }
            $user = UserMaster::find($data->id);
            return $this->sendResponse($user, 'Registration has been successful...');
        }
    }

    public
    function CreateRelation($rfrcd, $user_id)
    {
        if (empty($rfrcd))
            $rfrcd = 0;
        $rcuser = UserMaster::where(['contact' => $rfrcd])->first();
        // parent_id is referal_id here, Usinf Id as referal_id
        $add_rltns = array('parent_id' => $rfrcd, 'p_id' => $rcuser->id, 'child_id' => $user_id);
        DB::table('relations')->insert($add_rltns);
    }

    public
    function edit_profile(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user = UserMaster::find(request('user_id'));
        if (isset($user)) {
            $email = request('email');
            $mobile = request('mobile');
            $useremail = DB::selectone("SELECT * FROM `users` WHERE id != $user->id and email = '$email'");
            $usermob = DB::selectone("SELECT * FROM `users` WHERE id != $user->id and contact = '$mobile'");
            if (isset($useremail)) {
                return $this->sendError('Email is already exist', '');
            } elseif (isset($usermob)) {
                return $this->sendError('Contact is already exist', '');
            } else {
                $user->name = request('name');
                $user->email = request('email');
                $user->contact = request('mobile');
                $file = $request->file('profile_img');
                if ($request->file('profile_img') != null) {
                    $destination_path = 'u_img/' . $user->id . '/';
                    $filename = str_random(6) . '_' . $file->getClientOriginalName();
                    $file->move($destination_path, $filename);
                    $user->profile_img = $filename;
                }
                $user->save();
                return $this->sendResponse($user, 'Profile has been updated...');
            }
        } else {
            return $this->sendError('No record found', '');
        }
    }

    /**************Address API**********************/
    public
    function insert_user_address(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'pincode' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $client_address = new UserAddress();
        $client_address->user_id = request('user_id');
        $client_address->name = request('name');
        $client_address->contact = request('phone');
        $client_address->email = request('email');
        $client_address->address = request('address');
        $client_address->address2 = request('address2');
        $client_address->zip = request('pincode');
        $client_address->city_id = request('city_id');
        $client_address->state_id = request('state_id');
        $client_address->save();
        return $this->sendResponse($client_address, 'Address has been saved');
    }

    public
    function update_user_address(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'address_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'pincode' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $client_address = UserAddress::find(request('address_id'));
        if (isset($client_address)) {
            $client_address->name = request('name');
            $client_address->contact = request('contact');
            $client_address->email = request('email');
            $client_address->address = request('address');
            $client_address->address2 = request('address2');
            $client_address->zip = request('pincode');
            $client_address->city_id = request('city_id');
            $client_address->state_id = request('state_id');
            $client_address->save();
            return $this->sendResponse($client_address, 'Address has been updated');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    public
    function getaddress(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id = request('user_id');
        $user_addresses = DB::select("select u.*, (select c.state from cities c where u.state_id = c.id) as state, (select c.state from cities c where u.city_id = c.id) as city from user_address u where user_id = '$user_id'");
        if (count($user_addresses) > 0) {
            return $this->sendResponse($user_addresses, 'User Address List');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    public
    function getaddressbyid(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'address_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_addresses = UserAddress::find(request('address_id'));
        if (isset($user_addresses) > 0) {
            return $this->sendResponse($user_addresses, 'User Address');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    /**************Address API**********************/

    /**************Reviews API**********************/
    public
    function insert_review(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'item_master_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'review' => 'required',
            'star_rating' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $review = new Review();
        $review->user_id = request('user_id');
        $review->item_master_id = request('item_master_id');
        $review->name = request('name');
        $review->email = request('email');
        $review->review = request('review');
        $review->star_rating = request('star_rating');
        $review->save();
        return $this->sendResponse($review, 'Review has been saved');
    }

    public
    function getreview(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'item_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $review = Review::where(['item_master_id' => request('item_id')])->first();
        if (isset($review)) {
            return $this->sendResponse($review, 'Review List');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    /**************Reviews API**********************/


    public
    function delivery_charge(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $total = request('total');
        $pin = request('pin');
        if (!isset($pin)) {
            $delivery_charge = DB::selectOne("select delivery_charge from delivery_charges where amount>$total and is_active= '1'");
            return $this->sendResponse($delivery_charge, 'Delivery Charge');
        } else {
            $delivery_charge = DB::selectOne("select delivery_charge from delivery_charges where amount>$total and is_active= '1' and pin = '$pin'");
            return $this->sendResponse($delivery_charge, 'Delivery Charge');
        }
    }

    public
    function change_password(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id = request('user_id');
        $password = request('password');
        $user = UserMaster::find($user_id);
        if ($user != null) {
            $user->password = md5($password);
            $user->save();
            return $this->sendResponse($user, 'Password has been changed..!');
        } else {
            return $this->sendError('No record available', '');
        }
    }

    /**************************Checkout Confirm************************************/
    public
    function confirm_checkout(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'address_id' => 'required',
            'cart' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $total = request('total');
        $user_id = request('user_id');
        $address_id = request('address_id');
        $address = UserAddress::find($address_id);

        $delivery_charge = DB::selectOne("select delivery_charge from delivery_charges where amount>$total and is_active= '1' and pin = '$address->zip'");

        $selected_point = request('point_amt');
        $selected_promo = request('promo_amt');
        if ($selected_point > 0) {
            $user_master = UserMaster::find($user_id);
            $user_master->gain_amount = 0;
            $user_master->save();
        }

        $order = new OrderMaster();
        $order->order_no = rand(100000, 999999);
        $order->user_id = $user_id;
        $order->address_id = $address_id;
        $order->status = 'Ordered';
        $order->delivery_charge = isset($delivery_charge) ? $delivery_charge : '0';
        $order->bill_amount = $total;
        $order->point_pay = $selected_point == '' ? 0 : $selected_point;
        $order->promo_pay = $selected_promo == '' ? 0 : $selected_promo;
        $order->paid_amt = request('paid_amount');
        $order->is_cod = request('is_cod');

        $order->save();
        $cart = json_decode(request('cart'));
        foreach ($cart as $row) {
            $order_des = new OrderDescription();
            $order_des->order_master_id = $order->id;
            $order_des->item_master_id = $row->item_id;
            $order_des->qty = $row->qty;
            $order_des->unit_price = $row->unit_price;
            $order_des->total = $row->qty * $row->unit_price;
            $order_des->save();
        }

        $pointAmt = $total * 0.2 / 100;

        $queryResult = DB::select("call getParentId($user_id)");
        if (count($queryResult) > 0) {
            if (count($queryResult) >= 4) {
                for ($i = 0; $i < 4; $i++) {
                    $puser = UserMaster::find($queryResult[$i]->parent_id);
                    $puser->gain_amount += $pointAmt;
                    $puser->save();
                }
            } else {
                foreach ($queryResult as $parent_id) {
                    $puser = UserMaster::find($parent_id->parent_id);
                    $puser->gain_amount += $pointAmt;
                    $puser->save();
                }
            }
        }

        $name = str_replace(' ', '', $address->name);

        file_get_contents("http://api.msg91.com/api/sendhttp.php?sender=CONONE&route=4&mobiles=$address->contact&authkey=213418AONRGdnQ5ae96f62&country=91&message=Dear%20$name,%20Your%20order has%20been%20placed%20your%20order%20no%20is%20OrganicDolchi$order->order_no");

        /********0.2% Amount Distribution*********/

        $allmails = [$address->email];

        foreach ($allmails as $mail) {
            $email[] = $mail;
        }
        if (count($email) > 0) {
            $mail = new \App\Mail();
            $mail->to = implode(",", $email);
            $mail->subject = 'Organic Dolchi - Support Team';
            $siteurl = 'http://www.organicdolchi.com/';
            $username = $address->name;
//                $salutation = ($user->gender == 'male') ? 'Mr.' : 'Mrs.';

            $message = '<table width="650" cellpadding="0" cellspacing="0" align="center" style="background-color:#ececec;padding:40px;font-family:sans-serif;overflow:scroll"><tbody><tr><td><table cellpadding="0" cellspacing="0" align="center" width="100%"><tbody><tr><td><div style="line-height:50px;text-align:center;background-color:#fff;border-radius:5px;padding:20px"><a href="' . $siteurl . '" target="_blank" ><img src="' . $siteurl . 'images/organic_logo.png"></a></div></td></tr><tr><td><div><img src="' . $siteurl . 'images/acknowledgement.jpg" style="height:auto;width:100%;" tabindex="0"><div dir="ltr" style="opacity: 0.01; left: 775px; top: 343px;"><div><div class="aSK J-J5-Ji aYr"></div></div></div></div></td></tr><tr><td style="background-color:#fff;padding:20px;border-radius:0px 0px 5px 5px;font-size:14px"><div style="width:100%"><h1 style="color:#007cc2;text-align:center">Thank you ' /*. $salutation . ' '*/ . $username . '</h1><p style="font-size:14px;text-align:center;color:#333;padding:10px 20px 10px 20px">Thank you for shopping with organicdolchi. organicdolchi.com is a Quick and easy shopping: Online/ Telephonic Call-back facility. Free Home Delivery: The products are delivered in 2 working days or less and your doorsteps. Convenient Payment Options: Payment via net banking facility, Payumoney and Indian credit/debit cards. We also accept Cash on Delivery<br/></p></div></td></tr></tbody></table></td></tr><tr><td style="padding:20px;font-size:12px;color:#797979;text-align:center;line-height:20px;border-radius:5px 5px 0px 0px">DISCLAIMER - The information contained in this electronic message (including any accompanying documents) is solely intended for the information of the addressee(s) not be reproduced or redistributed or passed on directly or indirectly in any form to any other person.</td></tr></tbody></table>';
            $mail->body = $message;
            if ($mail->send_mail()) {
                //return redirect('mail')->withErrors('Email sent...');
            } else {
                //return redirect('mail')->withInput()->withErrors('Something went wrong. Please contact admin');
            }
        }


        return $this->sendResponse($order, 'Order has been successful...');
    }

    /**************************Checkout Confirm************************************/


    public
    function check_promo(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'promo_code' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $promo_code = request('promo_code');

        $promo_amt = DB::selectOne("select promo_amount from promo where promo_code = '$promo_code' and is_active= '1'");
        if (isset($promo_amt)) {
            return $this->sendResponse($promo_amt, 'Promo amount');
        } else {
            return $this->sendError('No record available', '');
        }

    }

    public
    function getOrders(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id = request('user_id');
        $orders = DB::select("SELECT o.*,od.id as ods_id, od.*, (select i.name from item_master i where od.item_master_id = i.id) as item_name, (select i.description from item_master i where od.item_master_id = i.id) as description, (select im.image from item_images im where od.item_master_id = im.id) as item_image, (select ua.address from user_address ua where o.address_id = ua.id) as address, (select ua.zip from user_address ua where o.address_id = ua.id) as zip, (select ua.contact from user_address ua where o.address_id = ua.id) as user_contact, (select r.star_rating FROM reviews r where r.order_description_id = od.id and r.item_master_id = od.item_master_id and r.user_id = $user_id) as star_rating, (select r.review FROM reviews r where r.order_description_id = od.id and r.item_master_id = od.item_master_id and r.user_id = $user_id) as review_desc FROM order_description od, order_master o WHERE o.user_id = $user_id and od.order_master_id = o.id");
        if (count($orders) > 0) {
            return $this->sendResponse($orders, 'User Orders list amount');
        } else {
            return $this->sendError('No record available', '');
        }
    }
}
