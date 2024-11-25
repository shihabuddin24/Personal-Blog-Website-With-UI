<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutContractController extends Controller
{
    public function index1(){
        return view('frontend.about.index');
    }


    public function index2(){
        return view('frontend.contact.index');
    }


    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);

        Message::create([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>now()
        ]);

        return back()->with('contact','Your Message Send Successfully!');
    }



    public function author_index(){
        $users=User::where('role', '!=', 'user')->paginate(4);
        return view('frontend.author.index',compact('users'));
    }


    public function author_name($id){
        $users=User::where('id',$id)->get();
        $blogs=Blog::where('user_id',$id)->where('status','active')->paginate(5);
        return view('frontend.author.authors_blog',compact('users','blogs'));
    }



}
