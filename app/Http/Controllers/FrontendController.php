<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function storenewslater(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:newslaters|max:55',
        ]);

        $data = array();
        $data['email'] = $request->email;
        DB::table('newslaters')->insert($data);

        $notification = array(
            'message' => 'Thanks for Subscribing',
            'alert-type' => 'success',
        ); // returns Notification,
        return redirect()->back()->with($notification);
    }
}
