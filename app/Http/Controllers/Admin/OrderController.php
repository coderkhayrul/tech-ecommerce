<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Get All Panding Order
    public function newOrder()
    {
        $order = DB::table('orders')->where('status', 0)->get();
        return view('admin.order.pending', compact('order'));
    }
    // Get Panding Order Details
    public function viewOrder($id)
    {
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->select('orders.*', 'users.name', 'users.phone')
            ->where('orders.id', $id)->first();
        $shipping = DB::table('shipping')->where('order_id', $id)->first();

        $details = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.product_code', 'products.image_one')
            ->where('orders_details.order_id', $id)
            ->get();
        return view('admin.order.view_order', compact('order', 'shipping', 'details'));
    }
    // Order Accepted
    public function paymentAccepted($id)
    {
        $data = array();
        $data['status'] = 1;
        DB::table('orders')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Payment Accepted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.order.new')->with($notification);
    }
    // Order Cancelled
    public function orderCancelled($id)
    {
        $data = array();
        $data['status'] = 4;
        DB::table('orders')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Order Cancelled',
            'alert-type' => 'danger'
        );
        return Redirect()->back()->with($notification);
    }
    // Get All Accept Order
    public function orderAccepted()
    {
        $order = DB::table('orders')->where('status', 1)->get();
        return view('admin.order.accept', compact('order'));
    }
    // Get All Process Order
    public function orderProcess()
    {
        $order = DB::table('orders')->where('status', 2)->get();
        return view('admin.order.process', compact('order'));
    }
    // Get All Delivery Order
    public function orderDelivery()
    {
        $order = DB::table('orders')->where('status', 3)->get();
        return view('admin.order.delivery', compact('order'));
    }
    // Get All Cancel Order
    public function orderCancelAll()
    {
        $order = DB::table('orders')->where('status', 4)->get();
        return view('admin.order.cancel', compact('order'));
    }

    public function orderProcessUpdate($id)
    {
        $data = array();
        $data['status'] = 2;
        DB::table('orders')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Order Process Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.order.accept.list')->with($notification);
    }
    public function orderDeliveryUpdate($id)
    {
        $product = DB::table('orders_details')->where('order_id', $id)->get();
        foreach ($product as $row) {
            DB::table('products')
                ->where('id', $row->product_id)
                ->update(['product_quantity' => DB::raw('product_quantity - ' . $row->quantity)]);
        }
        DB::table('orders')->where('id', $id)->update(['status' => 3]);
        $notification = array(
            'message' => 'Order Delivery Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.order.accept.list')->with($notification);
    }

    public function orderDelete($id)
    {
        DB::table('orders')->where('id', $id)->delete();
        DB::table('orders_details')->where('order_id', $id)->delete();
        DB::table('shipping')->where('order_id', $id)->delete();

        $notification = array(
            'message' => 'Order Delete Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.order.cancel.list')->with($notification);
    }
}
