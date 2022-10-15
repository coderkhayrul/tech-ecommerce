<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getsubcategory($category_id)
    {
        $cat = DB::table('sub_categories')->where('category_id', $category_id)->get();
        return json_encode($cat);
    }

    public function index()
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function storeproduct(Request $request)
    {
        $validateData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'product_quantity' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'selling_price' => 'required|max:255',
        ]);


        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['status'] = 1;
        $data['created_at'] = Carbon::now();

        if ($request->hasFile('image_one')) {
            $image_one = $request->file('image_one');
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('media/product/' . $image_one_name);
            $data['image_one'] = 'media/product/' . $image_one_name;
        }
        if ($request->hasFile('image_two')) {
            $image_two = $request->file('image_two');
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save('media/product/' . $image_two_name);
            $data['image_two'] = 'media/product/' . $image_two_name;
        }
        if ($request->hasFile('image_three')) {
            $image_three = $request->file('image_three');
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save('media/product/' . $image_three_name);
            $data['image_three'] = 'media/product/' . $image_three_name;
        }
        $data['created_at'] = Carbon::now();
        $product = DB::table('products')->insert($data);
        $notification = array(
            'message' => 'Product Added Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    // Product Active and Inactive Status
    public function productactive($id)
    {
        $product = DB::table('products')->where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function productinactive($id)
    {
        $product = DB::table('products')->where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product InActive Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function deleteproduct($id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        $one = $data->image_one;
        $two = $data->image_two;
        $three = $data->image_three;
        if ($one) {
            unlink($one);
        }
        if ($two) {
            unlink($two);
        }
        if ($three) {
            unlink($three);
        }
        $product = DB::table('products')->where('id', $id)->delete();

        if ($product) {
            $notification = array(
                'message' => 'Product Deleted Successfully!',
                'alert-type' => 'success',
            ); // returns Notification,
        }
        return redirect()->back()->with($notification);
    }

    public function viewproduct($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('sub_categories', 'products.subcategory_id', 'sub_categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name', 'sub_categories.subcategory_name')
            ->where('products.id', $id)
            ->first();
        return view('admin.product.show', compact('product'));
    }

    public function editproduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    public function updatewithoutproduct(Request $request, $id)
    {
        $validateData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'product_quantity' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'selling_price' => 'required|max:255',
        ]);

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;

        $data['status'] = 1;
        $data['updated_at'] = Carbon::now();

        $update = DB::table('products')->where('id', $id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Product Updated Without Image!',
                'alert-type' => 'success',
            ); // returns Notification,
            return redirect()->back()->with($notification);
        }
    }

    public function updatewithproduct(Request $request, $id)
    {

        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;

        if ($request->hasFile('image_one')) {
            if ($old_one) {
                unlink($old_one);
            }
            $image_one = $request->file('image_one');
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(120, 120)->save('media/product/' . $image_one_name);
            $data['image_one'] = 'media/product/' . $image_one_name;
        } else {
            $data['image_one'] = $request->old_one;
        }
        if ($request->hasFile('image_two')) {
            if ($old_two) {
                unlink($old_two);
            }
            $image_two = $request->file('image_two');
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(120, 120)->save('media/product/' . $image_two_name);
            $data['image_two'] = 'media/product/' . $image_two_name;
        } else {
            $data['image_two'] = $request->old_two;
        }
        if ($request->hasFile('image_three')) {
            if ($old_three) {
                unlink($old_three);
            }
            $image_three = $request->file('image_three');
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(120, 120)->save('media/product/' . $image_three_name);
            $data['image_three'] = 'media/product/' . $image_three_name;
        } else {
            $data['image_three'] = $request->old_three;
        }

        DB::table('products')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'Product Image Updated Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,
        return redirect()->back()->with($notification);
    }
}
