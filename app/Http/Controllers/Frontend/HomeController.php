<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $features= Blog::where('feature', true)->latest()->take(5)->get();
        $categories=Category::where('status','active')->get();
        $blogs=Blog::where('status', 'active')->latest()->paginate(10);
        $popularPosts = Blog::orderBy('countviews', 'desc')->take(5)->get();
        $socialLinks= SocialLink::all();
        return view('frontend.home.index',compact('categories','blogs','features','popularPosts','socialLinks'));
    }
}
