<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function english()
    {
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'english');
        return redirect()->back();
    }

    public function hindi()
    {
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'hindi');
        return redirect()->back();
    }

    public function blogPost()
    {
        $post = DB::table('posts')
            ->join('post_category', 'posts.category_id', 'post_category.id')
            ->select('posts.*', 'post_category.category_name_en', 'post_category.category_name_in')
            ->get();

        return view('pages.blog', compact('post'));
    }

    public function singleBlogPost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('pages.single_blog', compact('post'));
    }
}
