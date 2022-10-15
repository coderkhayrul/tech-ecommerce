<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategories()
    {
        $category = DB::table('categories')->get();
        $subcategories = DB::table('sub_categories')->join('categories', 'sub_categories.category_id', 'categories.id')->select('sub_categories.*', 'categories.category_name')->get();

        return view('admin.category.subcategory', compact('category', 'subcategories'));
    }

    public function storesubcategory(Request $request)
    {
        $validateData = $request->validate([
            'subcategory_name' => 'required|max:255',
            'category_id' => 'required|max:255'
        ]);
        $data = array();
        $data['subcategory_name'] = $request->subcategory_name;
        $data['category_id'] = $request->category_id;
        $data['created_at'] = Carbon::now();
        DB::table('sub_categories')->insert($data);

        $notification = array(
            'message' => 'Sub Category Added Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function deletesubcategory($id)
    {
        DB::table('sub_categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Sub Category Deleted Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function editsubcategory($id)
    {
        $subcategory = SubCategory::find($id);
        $category = Category::get();

        return view('admin.category.edit_subcategory', compact('subcategory', 'category'));
    }

    public function updatesubcategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'subcategory_name' => 'required|max:255',
            'category_id' => 'required|max:255'
        ]);
        $sub_cat = SubCategory::find($id);
        $sub_cat->subcategory_name = $request->subcategory_name;
        $sub_cat->category_id = $request->category_id;
        $sub_cat->update();

        $notification = array(
            'message' => 'Sub Category Update Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,
        return redirect()->route('admin.sub.categories')->with($notification);
    }
}
