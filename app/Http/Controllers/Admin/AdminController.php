<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Admin Successfully Logout!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->route('admin.login')->with($notification);
    }

    public function seo()
    {
        $seo = DB::table('seo')->first();
        return view('admin.coupon.seo', compact('seo'));
    }

    public function seoUpdate(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['bing_analytics'] = $request->bing_analytics;
        DB::table('seo')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Seo Setting Updated!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function contactMessage()
    {
        $contact = DB::table('contact')->get();
        return view('admin.contact.contact', compact('contact'));
    }
}
