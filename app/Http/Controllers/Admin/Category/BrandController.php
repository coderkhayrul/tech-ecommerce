<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand()
    {
        $brands = Brand::all();
        return view('admin.category.brand', compact('brands'));
    }

    public function storebrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_url = $request->brand_url;
        $image = $request->file('brand_logo');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'media/brand/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $brand->brand_logo = $image_url;
            $brand->save();
            $notification = array(
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $brand->save();
            $notification = array(
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function deletebrand($id)
    {
        $data = DB::table('brands')->where('id', $id)->first();
        $image = $data->brand_logo;
        if ($image) {
            unlink($image);
        }
        $brand = DB::table('brands')->where('id', $id)->delete();

        if ($brand) {
            $notification = array(
                'message' => 'Brand Deleted Successfully!',
                'alert-type' => 'success',
            ); // returns Notification,
        }
        return redirect()->back()->with($notification);
    }

    public function editbrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.category.edit_brand', compact('brand'));
    }

    public function updatebrand(Request $request, $id)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|max:255',
        ], [
            'brand_name.required' => 'Please Input Brand Name',
        ]);


        // Old Image
        $oldimage = $request->old_logo;
        // Brand Find
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_url = $request->brand_url;
        $image = $request->file('brand_logo');
        // Brand Image Remove And Create New Image
        if ($image) {
            unlink($oldimage);
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'media/brand/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $brand->brand_logo = $image_url;
            $brand->update();
            $notification = array(
                'message' => 'Brand Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.brands')->with($notification);
        } else {
            $brand->save();
            $notification = array(
                'message' => 'Brand Update Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.brands')->with($notification);
        }
    }
}
