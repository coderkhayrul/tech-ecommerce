<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addtocart($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return Response::json(['success' => 'Product Added to Cart!']);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return Response::json(['success' => 'Product Added to Cart!']);
        }
    }
    // Demo Methord
    public function cartcheck()
    {
        $content = Cart::content();
        return response()->json($content);
    }

    public function showCart()
    {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Item Removed From Cart',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function updateCartItem(Request $request, $rowId)
    {
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        $notification = array(
            'message' => 'Cart Item Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function viewProduct($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('sub_categories', 'products.subcategory_id', 'sub_categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'sub_categories.subcategory_name', 'brands.brand_name')
            ->where('products.id', $id)
            ->first();

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return Response::json([
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size
        ]);
    }

    public function insertCart(Request $request)
    {
        // Product Id
        $id = $request->product_id;
        // Get Single Product
        $product = DB::table('products')->where('id', $id)->first();

        $data = array();
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification = array(
                'message' => 'Product Added to Cart',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification = array(
                'message' => 'Product Added to Cart',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function checkout()
    {
        if (Auth::check()) {
            $cart = Cart::content();
            return view('pages.checkout', compact('cart'));
        } else {
            $notification = array(
                'message' => 'At First Login Your Account',
                'alert-type' => 'error'
            );
            return Redirect()->route('login')->with($notification);
        }
    }

    public function wishlist()
    {
        $user_id = Auth::id();
        $product = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', 'products.id')
            ->select('products.*', 'wishlists.user_id')
            ->where('wishlists.user_id', $user_id)
            ->get();

        return view('pages.wishlist', compact('product'));
    }

    public function applyCoupon(Request $request)
    {
        // is_numeric() function check the value is number or not
        $coupon = $request->coupon;
        $check = DB::table('coupons')->where('coupon', $coupon)->first();
        if ($check) {
            Session::put('coupon', [
                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => Cart::Subtotal() - $check->discount
            ]);

            $notification = array(
                'message' => 'Coupon Applied Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Invalid Coupon',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function removeCoupon()
    {
        Session::forget('coupon');
        $notification = array(
            'message' => 'Coupon Removed Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function paymentPage()
    {
        $cart = Cart::content();
        return view('pages.payment', compact('cart'));
    }

    public function productSearch(Request $request)
    {
        $item = $request->search;
        $products = Product::where('product_name', 'LIKE', "%$item%")->paginate(20);
        return view('pages.search', compact('products'));
    }
}
