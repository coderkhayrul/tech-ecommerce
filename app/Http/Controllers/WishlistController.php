<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class WishlistController extends Controller
{
    public function addwishlist($id)
    {
        $user_id = Auth::id();
        $check = DB::table('wishlists')->where('user_id', $user_id)->where('product_id', $id)->first();
        $data = array(
            'user_id' => $user_id,
            'product_id' => $id,
        );
        if (Auth::check()) {
            if ($check) {
                return Response::json(['error' => 'Already Has in your Wishlist!']);
            } else {
                DB::table('wishlists')->insert($data);
                return Response::json(['success' => 'Product Added to Wishlist!']);
            }
        } else {
            return Response::json(['error' => 'At First Login Your Account!']);
        }
    }
}
