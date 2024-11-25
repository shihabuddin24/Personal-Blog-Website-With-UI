<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatBlogController extends Controller
{
    public function show_category($id){
        $category= Category::where('id',$id)->first();
        $blogs= Blog::where('category_id',$id)->where('status','active')->paginate(4);

        return view('frontend.category.index',compact('category','blogs'));

    }


    public function show_blog(){
        $blogs=Blog::where('status', 'active')->paginate(6);
        return view('frontend.blog.index',compact('blogs'));
    }



    public function show_blog_single($id){
        $categories=Category::where('status','active')->get();
        $blog=Blog::where('id',$id)->first();
        $comments=BlogComment::with('replies')->where('blog_id', $id)->whereNull('parent_id')->get();
        $blogview=Blog::findOrFail($id);
        $blogview->increment('countviews');
        return view('frontend.blog.single',compact('categories','blog','comments','blogview'));

    }


    // public function viewstats(){
    //     $blogview=Blog::all();

    //     return view('front.blog.single.viewstats',compact('blogview'));
    // }


    public function comment(Request $request, $id){

        $request->validate([
            'comment'=>'required|max:500'
        ]);

        BlogComment::create([
            'user_id'=>Auth::user()->id,
            'blog_id'=>$id,
            'parent_id'=>$request->parent_id,
            'name'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'comment'=>$request->comment,
            'created_at'=>now(),

        ]);

        return back();
        // ->with('success_comment','Your Comment Send Successfully!');

    }


    // my error er jonno
    public function myerror(){
        return view('frontend.myerror.index');
    }



    // eta hocche blog search er jonno

    public function search(Request $request){
        $search= $request->input('search');

        $blogs= Blog::where('title', 'LIKE', "%{$search}%")
        ->orWhere('short_description', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->where('status', 'active')->paginate(4);

        return view('frontend.search.index',compact('search','blogs'));
    }


}
