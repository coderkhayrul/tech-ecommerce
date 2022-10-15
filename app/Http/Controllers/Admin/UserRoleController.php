<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function userRole()
    {
        $user = DB::table('admins')->where('type', 2)->get();
        return view('admin.role.all_role', compact('user'));
    }

    public function createUser()
    {
        return view('admin.role.create_role');
    }

    public function storeUser(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['order'] = $request->order;
        $data['other'] = $request->other;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['return'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['blog'] = $request->blog;
        $data['type'] = 2;

        DB::table('admins')->insert($data);
        $notification = array(
            'message' => 'Child Admin Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.all.users')->with($notification);
    }

    public function deleteUser($id)
    {
        DB::table('admins')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Child Admin Delete Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function editUser($id)
    {
        $user = DB::table('admins')->where('id', $id)->first();
        return view('admin.role.edit_role', compact('user'));

    }

    public function updateUser(Request $request, $id)
    {
        $user  = array();
        $user['name'] = $request->name;
        $user['phone'] = $request->phone;
        $user['email'] = $request->email;
        $user['category'] = $request->category;
        $user['coupon'] = $request->coupon;
        $user['product'] = $request->product;
        $user['order'] = $request->order;
        $user['other'] = $request->other;
        $user['report'] = $request->report;
        $user['role'] = $request->role;
        $user['return'] = $request->return;
        $user['contact'] = $request->contact;
        $user['comment'] = $request->comment;
        $user['setting'] = $request->setting;
        $user['blog'] = $request->blog;

        DB::table('admins')->where('id', $id)->update($user);
        $notification = array(
            'message' => 'Child Admin Update Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.all.users')->with($notification);

    }
}
