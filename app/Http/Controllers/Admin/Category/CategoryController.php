<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    public function storecategory(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_slug'] = Str::slug($request->category_name, '-');
        $data['created_at'] = Carbon::now();
        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category Added Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function deletecategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function editcategory($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit_category', compact('category'));
    }

    public function updatecategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name' => 'required|max:255'
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $update = DB::table('categories')->where('id', $id)->update($data);

        if ($update) {
            $notification = array(
                'message' => 'Category Updated Successfully!',
                'alert-type' => 'success',
            ); // returns Notification,
        } else {
            $notification = array(
                'message' => 'Nothing to Update !',
                'alert-type' => 'error',
            ); // returns Notification,
        }
        return redirect()->route('admin.categories')->with($notification);
    }
}
