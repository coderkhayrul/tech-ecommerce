<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function returnOrder(): Factory|View|Application
    {
        $order = DB::table('orders')->where('return_order',1)->get();
        return view( 'admin.return.request', compact('order'));
    }
    public function returnOrderUpdate($id): \Illuminate\Http\RedirectResponse
    {
        DB::table('orders')->where('id',$id)->update(['return_order'=>2]);
        $notification = array(
            'message' => 'Order Return Approve!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function returnAll()
    {
        $order = DB::table('orders')->where('return_order',2)->get();
        return view( 'admin.return.all_request', compact('order'));
    }

}
