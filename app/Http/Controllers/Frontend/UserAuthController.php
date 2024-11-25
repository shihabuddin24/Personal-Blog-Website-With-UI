<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Colors\Rgb\Channels\Red;

class UserAuthController extends Controller
{
    public function register(){
        return view('frontend.auth.register');
    }


    public function register_post(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'user',
            'created_at'=>now()
        ]);

        return redirect()->route('guest.login')->with('success','Registration Successful!');
    }


    public function login(){
        return view('frontend.auth.login');
    }


    public function login_post(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            return redirect()->route('home');
        }else{
            return back()->withErrors(['email'=>'User Not Found'])->withInput();
        }
    }
}
