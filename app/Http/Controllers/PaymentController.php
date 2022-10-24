<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;

        //Condition For Stripe Payment Gateway
        if ($request->payment == 'stripe') {
            return view('pages.payment.stripe', compact('data'));
        } else if ($request->payment == 'paypal') {
            return view('pages.payment.paypal', compact('data'));
        } else if ($request->payment == 'oncash') {
            return view('pages.payment.oncash', compact('data'));
        } else {
            echo "Handcash";
        }
    }

    public function stripeCharge(Request $request)
    {
        $email = Auth::user()->email;
        $total = $request->total;
        $customer = Auth::user()->name;
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51IyMkAJ1VeIVckU3reASjOpbrTI52ZESWpI0q8zyt9k51VoEp5mY82YQKUAKzuB1hTrklnFw4lkUvlxqwdTUNWXb00miRhwJr7');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total * 100,
            'currency' => 'usd',
            'description' => 'Ecommerce Website Product Payment',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        // INSERT ORDER DATA INTO DATABASE
        $data = array();
        $data['user_id'] = Auth::id();
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['blnc_transection'] = $charge->balance_transaction;
        $data['stripe_order_id'] = $charge->metadata->order_id;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->shipping;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = uniqid();
        if (Session::has('coupon')) {
            $data['subtotal'] = Session::get('coupon')['balance'];
        } else {
            $data['subtotal'] = Cart::Subtotal();
        }
        $data['status'] = 0;
        $data['date'] = Carbon::now()->format('d-m-y');
        $data['month'] = Carbon::now()->format('F');
        $data['year'] = Carbon::now()->format('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        // SENT EMAIL TO USER FOR INVOICE
        Mail::to($email)->send(new InvoiceMail($data));

        // INSERT SHIPPING DATA INTO DATABASE
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_address'] = $request->ship_address;
        $shipping['ship_city'] = $request->ship_city;
        DB::table('shipping')->insert($shipping);

        // INSERT ORDER DETAILS DATA INTO DATABASE
        $content = Cart::content();
        $details = array();
        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['singleprice'] = $row->price;
            $details['totalprice'] = $row->price * $row->qty;
            DB::table('orders_details')->insert($details);
        }

        // Destroy All Session Data
        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $notification = array(
            'message' => 'Order Process Successfully Done!',
            'alert-type' => 'success'
        );

        return Redirect()->to('/')->with($notification);
    }


    public function onCashCharge(Request $request)
    {
        // INSERT ORDER DATA INTO DATABASE
        $data = array();
        $data['user_id'] = Auth::id();
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->shipping;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = uniqid();

        if (Session::has('coupon')) {
            $data['subtotal'] = Session::get('coupon')['balance'];
        } else {
            $data['subtotal'] = Cart::Subtotal();
        }
        $data['status'] = 0;
        $data['date'] = Carbon::now()->format('d-m-y');
        $data['month'] = Carbon::now()->format('F');
        $data['year'] = Carbon::now()->format('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        // INSERT SHIPPING DATA INTO DATABASE
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_address'] = $request->ship_address;
        $shipping['ship_city'] = $request->ship_city;
        DB::table('shipping')->insert($shipping);

        // INSERT ORDER DETAILS DATA INTO DATABASE
        $content = Cart::content();
        $details = array();
        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['singleprice'] = $row->price;
            $details['totalprice'] = $row->price * $row->qty;
            DB::table('orders_details')->insert($details);
        }

        // Destroy All Session Data
        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $notification = array(
            'message' => 'Order Process Successfully Done!',
            'alert-type' => 'success'
        );

        return Redirect()->to('/')->with($notification);
    }

    public function successOrderList(): Factory|View|Application
    {
        $order = DB::table('orders')
            ->where('user_id', Auth::user()->id)
            ->where('status', 3)
            ->orderBy('id', 'DESC')
            ->limit(5)->get();
        return view('pages.return_order', compact('order'));
    }
    public function orderReturn($id): string
    {
        DB::table('orders')->where('id', $id)->update(['return_order' => 1]);
        $notification = array(
            'message' => 'Return Order Request Sent!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
