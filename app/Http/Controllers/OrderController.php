<?php

namespace App\Http\Controllers;

use App\OrderDetails;
use App\OrderMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();

class OrderController extends Controller
{
    public function orderlist($id)
    {
        $tee = decrypt($id);
        if ($tee == 1) {
            $orderdata = OrderMaster::orderBy('id', 'desc')->get();
            $orderdetails = OrderDetails::orderBy('id', 'desc')->get();
            return view('adminview.allorder', ['orderdata' => $orderdata, 'orderdetails' => $orderdetails]);
        }
    }


    public function ordered()
    {
        try {

            $idd = request('IDD');
            $data = array(
                'status' => 'Ordered',
                'updated_time' => NOW()
            );
            OrderMaster::where('id', request('IDD'))
                ->update($data);
            return 1;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function packed()
    {
        $idd = request('IDD');
        $data = array(
            'status' => 'Packed',
            'updated_time' => NOW()
        );
        OrderMaster::where('id', request('IDD'))
            ->update($data);
        return 1;
    }

    public function shipped()
    {
        $idd = request('IDD');
        $data = array(
            'status' => 'Shipped',
            'updated_time' => NOW()
        );
        OrderMaster::where('id', request('IDD'))
            ->update($data);
        return 1;
    }

    public function delivered()
    {
        $idd = request('IDD');
        $data = array(
            'status' => 'Delivered',
            'updated_time' => NOW()
        );
        OrderMaster::where('id', request('IDD'))
            ->update($data);

        $order_master = OrderMaster::find(request('IDD'));
        OrderMaster::distibute_points($order_master->bill_amount, $order_master->user_id);

        return 1;
    }

    public function active_order()
    {
        $idd = request('IDD');
        $data = array(
            'is_active' => '1'
        );
        OrderMaster::where('id', request('IDD'))
            ->update($data);
        return 1;
    }

    public function inactive_order()
    {
        $idd = request('IDD');
        $data = array(
            'is_active' => '0'
        );
        OrderMaster::where('id', request('IDD'))
            ->update($data);
        return 1;
    }

    public function update_cancelled()
    {
        try {
            $idd = request('IDD');
            $reason = request('reson');
            $can_by = request('can_by');
            $data = array(
                'is_cancelled' => '1',
                'cancelletion_reason' => $reason,
                'cencalled_by'=>$can_by

            );
            OrderMaster::where('id', request('IDD'))
                ->update($data);
            return ['success' => true, 'data' => [], 'message' => 'orderd Cenceled'];
        } catch (\Exception $ex) {
            return ['success' => false, 'data' => [], 'message' => $ex->getMessage()];

        }
    }


    public function more_order($id)
    {
        $order_data = OrderMaster::find($id);
        $order_details = OrderDetails::where(['order_master_id' => $id])->get();

        return view('adminview.order_full_details', ['order_data' => $order_data, 'order_details' => $order_details]);
    }

    public function bill_order($id)
    {
        $order_data = OrderMaster::find($id);
        $order_details = OrderDetails::where(['order_master_id' => $id])->get();
        $total_price = DB::select("select sum(total) as total FROM order_description WHERE order_master_id=$id");
        /*return $total_price;*/

        return view('adminview.bill_order', ['order_data' => $order_data, 'order_details' => $order_details, 'total_price' => $total_price]);
    }

}
