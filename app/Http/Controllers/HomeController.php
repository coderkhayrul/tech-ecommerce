<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changePassword()
    {
        return view('auth.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $password = Auth::user()->password;
        $oldpass = $request->oldpass;
        $newpass = $request->password;
        $confirm = $request->password_confirmation;
        if (Hash::check($oldpass, $password)) {
            if ($newpass === $confirm) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                $notification = array(
                    'message' => 'Password Changed Successfully ! Now Login with Your New Password',
                    'alert-type' => 'success'
                );
                return Redirect()->route('login')->with($notification);
            } else {
                $notification = array(
                    'message' => 'New password and Confirm Password not matched!',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Old Password not matched!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Logout Application Dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Successfully Logout',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->route('login')->with($notification);
    }

    // USER ORDER VIEW
    public function orderView($id)
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
        $setting = DB::table('settings')->first();

        return view('pages.order_view', compact('order', 'shipping', 'details', 'setting'));
    }

    public function orderTrack(Request $request)
    {
        $status_code = $request->status_code;
        $code = DB::table('orders')->where('status_code', $status_code)->first();
        if ($code){
            return view('pages.order_track', compact('code'));
        }else{
            $notification = array(
                'message' => 'Status Code Invalid',
                'alert-type' => 'error',
            ); // returns Notification,
            return redirect()->back()->with($notification);
        }
    }
}
