<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function viewproduct($id, $product_name)
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

        return view('pages.product_details', compact('product', 'product_color', 'product_size'));
    }

    public function addCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->product_quantity;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->product_color;
            $data['options']['size'] = $request->product_size;
            Cart::add($data);
            $notification = array(
                'message' => 'Product Successfully Added!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->product_quantity;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->product_color;
            $data['options']['size'] = $request->product_size;
            Cart::add($data);
            $notification = array(
                'message' => 'Product Successfully Added!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function productView($id)
    {
        $products = DB::table('products')->where('subcategory_id', $id)->paginate(10);
        $sub_category = DB::table('sub_categories')->where('id', $id)->first();

        $categories = DB::table('categories')->get();
        $brands = DB::table('products')->where('subcategory_id', $id)->select('brand_id')->groupBy('brand_id')->get();

        // All Data Sent to Product View Page
        $params = [
            'sub_category' => $sub_category,
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ];

        return view('pages.all_product',)->with($params);
    }

    public function categoryView($id)
    {
        $products = DB::table('products')->where('category_id', $id)->paginate(10);
        $category = DB::table('categories')->where('id', $id)->first();

        $categories = DB::table('categories')->get();
        $brands = DB::table('products')->where('category_id', $id)->select('brand_id')->groupBy('brand_id')->get();
        // All Data Sent to Product View Page
        $params = [
            'single_category' => $category,
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ];
        return view('pages.all_category',)->with($params);
    }
}
