<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function siteSetting()
    {
        $setting = DB::table('sitesetting')->first();
        return view('admin.setting.site_setting', compact('setting'));
    }

    public function siteSettingUpdate(Request $request){
        $id = $request->setting_id;
        $data = array();
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['facebook_link'] = $request->facebook_link;
        $data['youtube_link'] = $request->youtube_link;
        $data['instragram_link'] = $request->instragram_link;
        $data['twitter_link'] = $request->twitter_link;
        $setting = DB::table('sitesetting')->where('id',$id)->update($data);
        if ($setting){
            $notification = array(
                'message' => 'Site Setting Update Successfully!',
                'alert-type' => 'success',
            ); // returns Notification,
        }else{
            $notification = array(
                'message' => 'Site Setting Nothing To Update!',
                'alert-type' => 'info',
            ); // returns Notification,
        }

        return redirect()->back()->with($notification);
    }
}
