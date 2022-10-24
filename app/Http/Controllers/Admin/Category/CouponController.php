<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupon()
    {
        $coupons  = DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact('coupons'));
    }

    public function storecoupon(Request $request)
    {
        $validation = $request->validate([
            'coupon' => 'required|max:255',
            'discount' => 'required|max:255',
        ]);

        $data = array();
        $data['coupon'] = strtoupper($request->coupon);
        $data['discount'] = $request->discount;
        $data['created_at'] = Carbon::now();
        DB::table('coupons')->insert($data);

        $notification = array(
            'message' => 'Coupon Added Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function deletecoupon($id)
    {
        DB::table('coupons')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function editcoupon($id)
    {
        $coupon = Coupon::find($id);

        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function updatecoupon(Request $request, $id)
    {
        $validateData = $request->validate([
            'coupon' => 'required|max:255',
            'discount' => 'required|max:255',
        ]);
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        $data['updated_at'] = Carbon::now();
        $update = DB::table('coupons')->where('id', $id)->update($data);

        if ($update) {
            $notification = array(
                'message' => 'Coupon Updated Successfully!',
                'alert-type' => 'success',
            ); // returns Notification,
        } else {
            $notification = array(
                'message' => 'Nothing to Update !',
                'alert-type' => 'error',
            ); // returns Notification,
        }
        return redirect()->route('admin.coupon')->with($notification);
    }


    // NEWSLATER FUNCTIONS

    public function newslater()
    {
        $newslater  = DB::table('newslaters')->get();
        return view('admin.coupon.newslater', compact('newslater'));
    }

    public function deletenewslater($id)
    {
        DB::table('newslaters')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Subscriber Deleted Successfully!',
            'alert-type' => 'success',
        ); // returns Notification

        return redirect()->back()->with($notification);
    }

    public function allDelete(Request $request)
    {
        // $delete = DB::table('newslaters')->delete('delete from newslaters where id in (' . implode(",", $ids) . ') ');
        if ($request->ids) {
            $ids = $request->get('ids');
            foreach ($ids as $id) {
                $delete = DB::table('newslaters')->where('id', $id)->delete();
            }
            if ($delete) {
                $notification = array(
                    'message' => 'All Data Deleted Successfully!',
                    'alert-type' => 'success',
                ); // returns Notification
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Data Delete Failed!',
                    'alert-type' => 'error',
                ); // returns Notification
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Nothing to Delete!',
                'alert-type' => 'info',
            ); // returns Notification
            return redirect()->back()->with($notification);
        }
    }
}
