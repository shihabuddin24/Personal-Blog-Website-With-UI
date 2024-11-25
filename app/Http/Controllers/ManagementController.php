<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagementController extends Controller
{
    public function index(){
        return view('dashboard.management.index');
    }

    public function create_user(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role'=>'required'
        ]);

        if(!$request->role==""){

            User::insert([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
                'role'=> $request->role,
                'created_at'=> now()
            ]);
        }else{
            return back()->withErrors(['role'=>'Please Select Any Role'])->withInput();
        }

        return back()->with('management','User Created Succesfully!');
    }




    public function role_assign(){
        $users= User::where('role', "!=", 'admin')->get();
        return view('dashboard.management.index2',[
            'users'=>$users,
        ]);
    }

    public function role_assign_update(Request $request){
        $request->validate([
            'name'=> 'required|string|max:255',
            'role'=>'required'
        ]);

        User::find($request->name)->update([
            'role'=> $request->role,
            'updated_at' => now(),
        ]);

        return back()->with('management','Role Assigned Successfully');
    }


}
