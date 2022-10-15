<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function blogcategory(){
        $blogcat = DB::table('post_category')->get();
        return view('admin.blog.category.index', compact('blogcat'));
    }

    public function storeblogcategory(Request $request)
    {
        $validateData = $request->validate([
            'category_name_en' => 'required|unique:post_category|max:255',
            'category_name_in' => 'required|unique:post_category|max:255'
        ]);
        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_in'] = $request->category_name_in;
        $data['created_at'] = Carbon::now();
        DB::table('post_category')->insert($data);

        $notification = array(
            'message' => 'Category Added Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function deleteblogcategory($id)
    {
        DB::table('post_category')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success',
        ); // returns Notification,

        return redirect()->back()->with($notification);
    }

    public function editblogcategory($id)
    {
        $category = DB::table('post_category')->where('id', $id)->first();

        return view('admin.blog.category.edit', compact('category'));
    }

    public function updateblogcategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_in' => 'required|max:255'
        ]);
        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_in'] = $request->category_name_in;
        $update = DB::table('post_category')->where('id', $id)->update($data);

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
        return redirect()->route('admin.all.blog.category')->with($notification);
    }

    // BLOG POST METHOD START

    public function blogpost()
    {
        $post = DB::table('posts')
        ->join('post_category','posts.category_id','post_category.id')
        ->select('posts.*','post_category.category_name_en')
        ->get();
        return view('admin.blog.index', compact('post'));
    }

    public function blogpostcreate()
    {
        $categories = DB::table('post_category')->get();
        return view('admin.blog.create', compact('categories'));
    }

    public function storeblogpost(Request $request)
    {
        $validateData = $request->validate([
            'post_title_en' => 'required|max:255',
            'post_title_in' => 'required|max:255',
            'category_id' => 'required|max:255',
        ]);

        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_in'] = $request->post_title_in;
        $data['category_id'] = $request->category_id;
        $data['details_en'] = $request->details_en;
        $data['details_in'] = $request->details_in;
        $data['created_at'] = Carbon::now();
        if ($request->hasFile('post_image')) {
            $post_image = $request->file('post_image');
            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('media/post/' . $post_image_name);
            $data['post_image'] = 'media/post/'.$post_image_name;
        }
        $post = DB::table('posts')->insert($data);
        if ($post) {
            $notification = array(
                'message' => 'Post Added Successfully!',
                'alert-type' => 'success',
            ); // returns Notification,

            return redirect()->route('admin.all.blog.post')->with($notification);
        }
    }

    public function deleteblogpost($id)
    {
        $data = DB::table('posts')->where('id', $id)->first();
        $image = $data->post_image;
        if ($image) {
            unlink($image);
        }
        $post = DB::table('posts')->where('id', $id)->delete();

        if ($post) {
            $notification = array(
                'message' => 'Post Deleted Successfully!',
                'alert-type' => 'success',
            ); // returns Notification,
        }
        return redirect()->back()->with($notification);
    }

    public function editblogpost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $categories = DB::table('post_category')->get();

        return view('admin.blog.edit', compact('post', 'categories'));
    }

    public function updateblogpost(Request $request, $id)
    {
        $validateData = $request->validate([
            'post_title_en' => 'required|max:255',
            'post_title_in' => 'required|max:255',
            'category_id' => 'required|max:255',
        ]);
        $post = array();
        $post['post_title_en'] = $request->post_title_en;
        $post['post_title_in'] = $request->post_title_in;
        $post['category_id'] = $request->category_id;
        $post['details_en'] = $request->details_en;
        $post['details_in'] = $request->details_in;
        $post['updated_at'] = Carbon::now();

        if ($request->hasFile('post_image')) {
            if ($request->old_image) {
                unlink($request->old_image);
            }
            $post_image = $request->file('post_image');
            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('media/post/' . $post_image_name);
            $post['post_image'] = 'media/post/'.$post_image_name;
        }
        $update = DB::table('posts')->where('id',$id)->update($post);
        if ($update) {
            $notification = array(
                'message' => 'Post Updated Successfully!',
                'alert-type' => 'success',
            ); // returns Notification,

            return redirect()->route('admin.all.blog.post')->with($notification);
        }
    }

}
