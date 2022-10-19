<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Contact(): Factory|View|Application
    {
        return view('pages.contact');
    }

    public function contactStore(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        $data['created_at'] = Carbon::now();
        $contact = DB::table('contact')->insert($data);
        $notification = array(
            'message' => 'Thanks For Contact Us We Will Notify You Soon!',
            'alert-type' => 'success',
        ); // returns Notification,
        return redirect()->back()->with($notification);

    }
}
